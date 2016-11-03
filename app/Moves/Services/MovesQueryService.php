<?php

namespace MobilityPal\Moves\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use MobilityPal\Moves\Auth\MovesAuthClient;
use MobilityPal\Moves\Auth\MovesUserClient;
use MobilityPal\Moves\Entities\MovesStoryline;
use MobilityPal\Moves\Entities\MovesUser;
use MobilityPal\Moves\Entities\MovesUserSurvey;
use MobilityPal\Survey;
use MobilityPal\Surveys\SurveyService;

/**
 * Class MovesQueryService
 * @package MobilityPal\Moves\Services
 */
class MovesQueryService
{

    /**
     * @var MovesUserClient
     */
    protected $moves;

    /**
     * @var Survey
     */
    protected $surveyModel;

    /**
     * @var SurveyService
     */
    private $surveyService;

    /**
     * @var MovesAuthClient
     */
    private $authClient;


    /**
     * MovesQueryService constructor.
     *
     * @param SurveyService    $surveyService
     */
    public function __construct(SurveyService $surveyService)
    {
        $this->surveyService = $surveyService;
        $this->authClient = MovesAuthClient::create();
        $this->moves       = new MovesUserClient('');
        $this->surveyModel = new Survey();
    }


    /**
     * @param $surveyId
     *
     * @return array
     */
    public function getSurveyUsers($surveyId)
    {
        $users = [];
        $userSurveys = MovesUserSurvey::where('survey_id', $surveyId)->get();
        foreach ($userSurveys as $survey) {
            $user = $survey->user;
            if (!$user['disabled']) {
                $users[$user['user_id']] = $user;
            }
        }

        return $users;
    }


    /**
     * @return array
     */
    public function getAllUsersFromActiveSurveys()
    {
        $surveys = $this->surveyService->getActiveSurveys();
        $users = [];
        foreach ($surveys as $survey) {
            $surveyUsers = $this->getSurveyUsers($survey['sid']);
            foreach ($surveyUsers as $user) {
                $users[$user['user_id']] = $user;
            }
        }

        return $users;
    }


    /**
     * @param $date
     *
     * @return array
     */
    public function saveAllUsersStorylines($date)
    {
        $users = $this->getAllUsersFromActiveSurveys();
        foreach ($users as $user) {
            $this->saveUserStoryline($date, $user);
        }

        return true;
    }


    /**
     * @param $date
     * @param $user
     */
    public function saveUserStoryline($date, $user)
    {
        try {
            $this->moves->setAccessToken($user['access_token']);
            $storyline = $this->moves->dailyStoryline($date, [ 'trackPoints' => 'true' ]);
            MovesStoryline::create([
                'user_id'   => $user['user_id'],
                'date'      => $date,
                'storyline' => json_encode($storyline)
            ]);
        } catch (\Exception $e) {
            Log::error('Could not pull storyline for ' . $user['user_id']);
            Log::error($e->getMessage());
        }
    }


    /**
     * @param $date
     */
    public function generateTrackData($date)
    {
        $records = MovesStoryline::where('date', $date)->get();
        foreach ($records as $record) {
            $this->generateUserTrackData($record->user_id, $date);
        }
    }


    /**
     * @param $user_id
     * @param $date
     */
    public function generateUserTrackData($user_id, $date)
    {
        if (! $record = MovesStoryline::where('date', $date)->where('user_id', $user_id)->first()) {
            return;
        }
        $data = json_decode($record['storyline']);
        $segments =  (array)$data[0]->segments;

        foreach ($segments as $segment) {
            if ($segment->type === 'place') {
                $this->parsePlace($user_id, $date, $segment);
            }
            elseif ($segment->type === 'move') {
                $this->parseMove($user_id, $date, $segment);
            }
        }

    }


    /**
     * @param $user_id
     * @param $date
     * @param $segment
     */
    public function parsePlace($record, $segment)
    {
        return [
            'date'       => $record['date'],
            'id'         => $record['submissionId'],
            'user_id' => (string) '_' . $record['user_id'],
            'type'       => $segment->type,
            'activity'   => '',
            'start_time' => Carbon::createFromFormat('Ymd*HisT', $segment->startTime)->setTimezone('UTC'),
            'end_time'   => Carbon::createFromFormat('Ymd*HisT', $segment->endTime)->setTimezone('UTC'),
            'place_id'   => $segment->place->id,
            'place_type' => $segment->place->type,
            'place_lat'  => $segment->place->location->lat,
            'place_lng'  => $segment->place->location->lon,
            'trackpoint_lat' => '',
            'trackpoint_lng' => '',
            'trackpoint_time' => '',
        ];
    }



    /**
     * @param $user_id
     * @param $date
     * @param $segment
     */
    public function parseMove($record, $segment)
    {
        $tracks = [];
        foreach ($segment->activities as $activity) {
            foreach($activity->trackPoints as $trackPoints) {
                $tracks[] = [
                    'date' => $record['date'],
                    'id'         => $record['submissionId'],
                    'user_id' => (string) '_' . $record['user_id'],
                    'type' => $segment->type,
                    'activity' => $activity->activity,
                    'start_time' => Carbon::createFromFormat('Ymd*HisT',$segment->startTime)->setTimezone('UTC'),
                    'end_time' => Carbon::createFromFormat('Ymd*HisT',$segment->endTime)->setTimezone('UTC'),
                    'place_id'   => '',
                    'place_type' => '',
                    'place_lat'  => '',
                    'place_lng'  => '',
                    'trackpoint_lat' => $trackPoints->lat,
                    'trackpoint_lng' => $trackPoints->lon,
                    'trackpoint_time' => Carbon::createFromFormat('Ymd*HisT',$trackPoints->time)->setTimezone('UTC')
                ];
            }
        }

        return $tracks;
    }

    public function getNumberOfMovesRegistrationsToday()
    {
        $today = Carbon::today()->toDateTimeString();
        $tomorrow = Carbon::tomorrow()->toDateTimeString();

        return MovesUser::where('created_at', '>', $today)->where('created_at', '<', $tomorrow)->count();
    }

    public function exportSurveyUsersTracksData($surveyId)
    {
        $users = $this->getSurveyUsers($surveyId);
        foreach ($users as $user) {
            $user['submission_id'] = MovesUser::where('user_id', $user['user_id'])->first()->surveySubmission($surveyId)['submission_id'];
        }
        // get all survey users storylines on or after survey creation date
        $startDate = $this->surveyService->getClient()->get_survey_properties($surveyId, ['datecreated'])['datecreated'];
        $storylines = MovesStoryline::where('date', '>=', $startDate)->whereIn('user_id', array_keys($users) )->get();
        // parse storylines into a single grid
        $tracks = [];
        foreach ($storylines as $storyline) {
            $storyline['submissionId'] = $users[$storyline['user_id']]['submission_id'];
            $record = json_decode($storyline['storyline']);
            $segments =  (array)$record[0]->segments;
            foreach ($segments as $segment) {
                if ($segment->type === 'place') {
                    $tracks[] = $this->parsePlace($storyline,   $segment);
                }
                elseif ($segment->type === 'move') {
                    foreach($this->parseMove($storyline, $segment) as $track) {
                        $tracks[] = $track;
                    }
                }
            }
        }
        $maxRows = 500000;
        $offset = 0;
        $fileCounter = 0;
        $files = [];
        while($chunk = array_slice($tracks, $offset, $maxRows)) {
            // save grid to spreadsheet
            $filename = time() . '_' . $surveyId . '_' . 'MovesTracksData_' . ++$fileCounter;
            $files[] = Excel::create($filename, function($excel) use ($surveyId, $chunk) {
                $excel->sheet($surveyId . '_' . 'MovesTracksData', function($sheet) use ($chunk) {
                    $sheet->setColumnFormat(array(
                        'C' => '@'
                    ));
                    $sheet->fromArray($chunk);
                });

            })->store('csv', storage_path('exports/moves-track-data/' . $surveyId));

            $offset+=$maxRows;
        }

        return $files;
    }
}

<?php

namespace MobilityPal\Http\Controllers;

use Chumper\Zipper\Facades\Zipper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;
use MobilityPal\Http\Requests;
use MobilityPal\Moves\Services\MovesQueryService;
use MobilityPal\Surveys\SurveyService;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * Class SurveysController
 * @package MobilityPal\Http\Controllers
 */
class SurveysController extends Controller
{

    /**
     * @var SurveyService
     */
    private $surveyService;

    /**
     * @var MovesQueryService
     */
    private $movesQueryService;


    public function __construct(SurveyService $surveyService, MovesQueryService $movesQueryService)
    {
        $this->surveyService = $surveyService;
        $this->movesQueryService = $movesQueryService;
    }

    public function index()
    {
        $activeSurveys = $this->surveyService->getActiveSurveys();

        return view('surveys.index', compact('activeSurveys'));
    }

    public function exportSurveyData($surveyId)
    {
        $files = [];
        if ($surveyResponses = $this->surveyService->exportSurveyResponses($surveyId)) {
            $files[] = $surveyResponses;
        }
        foreach($this->surveyService->exportMapQuestionResponses($surveyId) as $file) {
            $files[] = $file;
        }
        foreach($this->movesQueryService->exportSurveyUsersTracksData($surveyId) as $file) {
            $files[] = $file;
        }

        if (empty($files)) {
            Flash::error('No data for selected survey');
            return redirect()->back();
        }
        $filePaths = array_map(function($file){
            return $file['full'];
        }, $files);

        // generate zip archive
        $fileShortName = $surveyId . '_surveydata.zip';
        $filename = time() . '_' . $fileShortName;
        $relativePath = 'exports/survey-data/' . $surveyId . '/' . $filename;
        $pathToFile = storage_path($relativePath);
        $zip = Zipper::make($pathToFile)->add($filePaths);
        $filePath = $zip->getFilePath();

        return view('surveys.download', compact('filePath', 'fileShortName'));
    }

    /**
     * @param Request $request
     * @param Session $session
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function submitted(Request $request, Session $session)
    {
        $session->set('sid', $request->sid);
        $session->set('savedid', $request->savedid);

        return view('surveys/submitted');
    }
}

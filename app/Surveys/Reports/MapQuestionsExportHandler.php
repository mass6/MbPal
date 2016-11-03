<?php

namespace MobilityPal\Surveys\Reports;

use Illuminate\Support\Facades\Log;
use MobilityPal\Survey;
use MobilityPal\Surveys\Entities\LimeQuestion;
use MobilityPal\Surveys\Reports\Exceptions\ParserNotFoundException;
use MobilityPal\Surveys\Reports\Parsers\MarkerBasicParser;
use MobilityPal\Surveys\Reports\Parsers\MarkerSelectOneParser;
use MobilityPal\Surveys\Reports\Parsers\MarkerSelectTwoParser;
use MobilityPal\Surveys\Reports\Parsers\MobilityConflictsParser;
use MobilityPal\Surveys\Reports\Parsers\NullObjectParser;
use MobilityPal\Surveys\Reports\Parsers\PolygonAreaParser;

/**
 * Class MapQuestionsExportHandler
 * @package MobilityPal\Surveys\Reports
 */
class MapQuestionsExportHandler
{

    /**
     * @var Survey
     */
    protected $survey;

    /**
     * @var
     */
    private $surveyId;


    public function __construct($surveyId)
    {
        $this->surveyId = $surveyId;
        $this->survey = new Survey();
        $this->survey->setSurvey($surveyId);
    }


    public function handle()
    {
        $questions = $this->getMapQuestions($this->surveyId);

        $reportFilesPaths = [];
        foreach ($questions as $question) {
            try {
                $reportFilesPaths[] = $this->generateReport($question);
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }

        return $reportFilesPaths;
    }

    protected function generateReport($question)
    {
        $question['surveyId'] = $this->surveyId;
        $question['column'] = $this->surveyId . 'X' . $question->gid . 'X' . $question->qid;
        $question['mapQuestionType'] = $this->getMapQuestionType($question);
        $question['responses'] = $this->getResponses($question);

        $mapQuestionReport = new MapQuestionReport($question);
        $mapQuestionReport->setParser($this->getParserStrategy($question['mapQuestionType']));

        return $mapQuestionReport->generate();
    }

    private function getResponses($question)
    {
        return $this->survey->select('id', $question['column'] . ' as ' . $question['title'] )->get();
    }


    /**
     * @param $surveyId
     *
     * @return mixed
     */
    private function getMapQuestions($surveyId)
    {
        return LimeQuestion::where('sid', $surveyId)->where('help', 'like', '%MAP SETTINGS%')->select('qid', 'gid', 'title', 'question', 'help')->get();
    }


    /**
     * @param $question
     *
     * @return string
     */
    private function getMapQuestionType($question)
    {
        $openQuote = strpos($question['help'], "'", strpos($question['help'], 'mapQuestionType'));

        $closeQuote = strpos($question['help'], "'", $openQuote + 1); // 370

        return substr($question['help'], $openQuote + 1, $closeQuote - $openQuote - 1);
    }


    /**
     * @param $mapQuestionType
     *
     * @return MarkerBasicParser|PolygonAreaParser
     * @throws ParserNotFoundException
     */
    private function getParserStrategy($mapQuestionType)
    {
        switch ($mapQuestionType) {
            case 'marker-basic':
                return new MarkerBasicParser;
            case 'marker-select-one':
            case 'mobility-challenges':
                return new MarkerSelectOneParser;
                break;
            case 'marker-select-two':
                return new MarkerSelectTwoParser;
                break;
            case 'mobility-conflicts':
                return new MobilityConflictsParser;
                break;
            case 'polygon-area':
                return new PolygonAreaParser;
                break;
            default:
                throw new ParserNotFoundException('No parser found for map question of type ' . $mapQuestionType);
        }
    }
}

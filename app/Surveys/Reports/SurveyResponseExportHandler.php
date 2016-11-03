<?php

namespace MobilityPal\Surveys\Reports;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class SurveyResponseExportHandler
{

    private $surveyId;


    public function __construct($surveyId)
    {
        $this->surveyId = $surveyId;
    }

    public function handle($responses)
    {
        $data = [];
        foreach ($responses as $response) {
            $data[] = $this->removeLineBreaks($response);
        }

        $reportFilePath = Excel::create(time() . '_' . $this->surveyId . '_responses', function($excel) use ($data) {

            $excel->sheet('SurveySubmissions', function($sheet) use ($data) {

                $sheet->fromArray($data);

            });

        })->store('csv', storage_path('exports/survey_responses/' . $this->surveyId));

        return $reportFilePath;
    }

    protected function removeLineBreaks($response)
    {
        $cleanedResponse = [];
        foreach (current($response) as $question => $answer) {
            $cleanedResponse[$question] = trim( preg_replace( '/\s+/', ' ', $answer ) );
        }

        return $cleanedResponse;
    }
}

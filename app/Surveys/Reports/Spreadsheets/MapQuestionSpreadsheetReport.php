<?php

namespace MobilityPal\Surveys\Reports\Spreadsheets;

use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class MapQuestionSpreadsheetReport implements SpreadsheetReport
{

    /**
     * @var array
     */
    private $report;

    /**
     * @var
     */
    private $question;


    public function __construct(Array $report, $question)
    {
        $this->report = $report;
        $this->question = $question;
    }


    public function toArray()
    {
        return $this->report;
    }

    public function toSpreadsheet()
    {
        $filename = time() . '_' . $this->question['surveyId'] . '_' . $this->question['title'];

        $file = Excel::create($filename, function($excel) {
            $excel->sheet($this->question['title'], function($sheet) {
                $sheet->fromArray($this->report);
            });
        })->store('csv', storage_path('exports/survey_map_responses/' . $this->question['surveyId']));

        return $file;
    }


}

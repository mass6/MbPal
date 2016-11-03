<?php

namespace MobilityPal\Surveys\Reports;

use Illuminate\Support\Facades\Log;
use MobilityPal\Surveys\Reports\Parsers\MapQuestionParser;
use MobilityPal\Surveys\Reports\Spreadsheets\MapQuestionSpreadsheetReport;

/**
 * Class MapQuestionReport
 * @package MobilityPal\Surveys\Reports
 */
class MapQuestionReport
{

    /**
     * @var MapQuestionParser
     */
    protected $parser;

    protected $question;


    public function __construct($question)
    {
        $this->question = $question;
    }

    /**
     * @param MapQuestionParser $parser
     */
    public function setParser(MapQuestionParser $parser)
    {
        $this->parser = $parser;
    }


    /**
     * @param string $type
     *
     * @return mixed
     */
    public function generate($type = 'spreadsheet')
    {
        $report = $this->parser->parse($this->question);
        if ($type === 'array') {
            return $report;
        }

        return $this->toSpreadsheet($report);
    }

    protected function toSpreadsheet($report)
    {
        $spreadsheetReport = new MapQuestionSpreadsheetReport($report, $this->question);
        return $spreadsheetReport->toSpreadsheet();
    }
}

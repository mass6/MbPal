<?php

namespace MobilityPal\Surveys\Reports\Spreadsheets;

interface SpreadsheetReport
{
    public function toArray();
    public function toSpreadsheet();
}
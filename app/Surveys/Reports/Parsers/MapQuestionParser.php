<?php

namespace MobilityPal\Surveys\Reports\Parsers;

/**
 * Interface MapQuestionParser
 * @package MobilityPal\Surveys\Parsers
 */
interface MapQuestionParser
{

    /**
     * @return mixed
     */
    public function parse($question);
}
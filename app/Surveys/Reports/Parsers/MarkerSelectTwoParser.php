<?php

namespace MobilityPal\Surveys\Reports\Parsers;

class MarkerSelectTwoParser implements MapQuestionParser
{

    /**
     * @param $question
     *
     * @return array
     */
    public function parse($question)
    {
        $report = [];
        foreach ($question['responses'] as $answer) {

            $answer = $answer->toArray();
            $markers = object_to_array(json_decode($answer[$question['title']]));
            if (! is_array($markers)) {
                continue;
            }

            foreach ($markers as $marker) {
                $report[] = $this->formatReportRow($answer, $marker);
            }
        }

        return $report;
    }


    /**
     * @param $answer
     * @param $marker
     *
     * @return array
     */
    protected function formatReportRow($answer, $marker)
    {
        return [
            'id' => $answer['id'],
            'marker_index' => $marker['mindex'],
            'lat' => substr($marker['latlong'], 0, strpos($marker['latlong'], ',')),
            'lng' => substr($marker['latlong'], strpos($marker['latlong'], ',') + 1),
            'pov.heading' => $marker['pov']['heading'],
            'pov.pitch' => $marker['pov']['pitch'],
            'pov.zoom' => $marker['pov']['zoom'],
            'select_one' => $marker['selectOne'],
            'select_two' => $marker['selectTwo'],
            'description' => trim( preg_replace( '/\s+/', ' ', $marker['description'] ) ) ,
        ];
    }
}

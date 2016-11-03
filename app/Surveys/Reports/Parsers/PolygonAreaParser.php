<?php

namespace MobilityPal\Surveys\Reports\Parsers;

class PolygonAreaParser implements MapQuestionParser
{

    /**
     * @return mixed
     */
    public function parse($question)
    {
        $report = [];
        foreach ($question['responses'] as $answer) {

            $mapData = object_to_array(json_decode($answer[$question['title']]));
            if (! is_array($mapData)) {
                continue;
            }
            $count = 1;
            foreach ($mapData['coordinates'] as $polygon) {
                $report[] = $this->formatReportRow($count, $answer, $mapData, $polygon);
                $count++;
            }
        }

        return $report;
    }


    /**
     * @param $count
     * @param $answer
     * @param $mapData
     * @param $polygon
     *
     * @return array
     */
    protected function formatReportRow($count, $answer, $mapData, $polygon)
    {
        return [
            'id' => $answer['id'],
            'point' => $count,
            'lat' => $polygon['lat'],
            'lng' => $polygon['lng'],
            'description' => trim( preg_replace( '/\s+/', ' ', $mapData['description'] ) )
        ];
    }
}

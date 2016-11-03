<?php
/**
 * Created by:
 * User: sam
 * Date: 6/18/16
 * Time: 11:47 PM
 */

/**
 * @param $path
 * @param bool $parent
 * @return string
 */
function isPath($path, $parent = false)
{
    if (request()->is($path)){
        if ($parent == true){
            return 'open active';
        }
        else return 'active';
    }
    return '';
}

/**
 * Converts and object to an array
 *
 * @param $data
 * @return array
 */
function object_to_array($data)
{
    if(is_array($data) || is_object($data))
    {
        $result = array();

        foreach($data as $key => $value) {
            $result[$key] = object_to_array($value);
        }

        return $result;
    }

    return $data;
}

function jsonToArray($jsonArray)
{
    if(isset($jsonArray))
    {
        $jsonArray = json_decode($jsonArray);

        // final array to be returned
        $attributes = array();

        foreach ($jsonArray as $attribute)
        {
            // if only 1 index, add second blank index
            if ( ! is_object($attribute)  ) {
                $attribute = array($attribute => "");
            }

            foreach($attribute as $key => $val)
            {
                $attributes[] = array($key, $val);
            }

        }
        return json_encode($attributes);
    }
    else
        return false;
}
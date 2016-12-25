<?php

function get_type($type){
    $CI =& get_instance();
    switch ($type) {
        case "IN":
            return "Input";
            break;
        case "OP":
            return "Output";
            break;
        case "PO":
            return "Process";
            break;
        case "OC":
            return "Outcome";
            break;
        default:
            return "--";
    }
}

function marital_status($code){
    $CI =& get_instance();
    switch ($code) {
        case 0:
            return "Single";
            break;
        case 1:
            return "Married";
            break;
        case 2:
            return "Divorced";
            break;
        case 3:
            return "Widowed";
            break;
        case 4:
            return "Prefer not say";
            break;
        default:
            return "--";
    }
}

function array_reindex($array) {
    if(is_array($array)) {
        return array_map('array_reindex', array_values($array));
    } else {
        return $array;
    }
}


function array_flatten($array) {
    if (!is_array($array)) {
        return FALSE;
    }
    $result = array();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $result = array_merge($result, array_flatten($value));
        }
        else {
            $result[$key] = $value;
        }
    }
    return $result;
}


function in_array_r($needle, $haystack, $strict = false) {
    foreach ($haystack as $item) {
        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && in_array_r($needle, $item, $strict))) {
            return true;
        }
    }

    return false;
}
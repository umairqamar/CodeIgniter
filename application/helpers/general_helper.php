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

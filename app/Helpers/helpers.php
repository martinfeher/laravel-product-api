<?php

function mapModelToArray($model, $propertyIndex, $propertyValue) {
    $array = array();
    foreach($model as $item) {
        $array[$item->$propertyIndex] = $item->$propertyValue;
    }

    return $array;
}

function testFnc() {
    return 'hello';
}
<?php 

function doRequest($bdd, $request) {
    $response = $bdd->query($request);
    return $response->fetchAll(PDO::FETCH_ASSOC);
}

function doSingleRequest($bdd, $request) {
    $response = $bdd->query($request);
    return $response->fetch(PDO::FETCH_ASSOC);
}

function isFilled($variable) {
    return (isset($variable) && !empty($variable)) ? true : false;
}

function isInt($number) {
    return ((int) $number == $number) ? true : false;
}

function checkSize($value, $size) {
    return ($value <= $size) ? true : false;
}

function checkExtension($value) {
    $validFormats = ['png', 'jpeg', 'jpg'];
    return (in_array($value, $validFormats)) ? true : false;
}

?>
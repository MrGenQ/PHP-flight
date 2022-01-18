<?php
$validationErrors = [];
function saveMessage($data){
    $file = 'data/messages.txt';
    $content = file_get_contents($file);
    $formData = implode(',', $data); //konvertuojam masyva i stringa
    $content =$formData ."/n";
    file_put_contents($file, $content);
}
function getData(){
    $messages = file_get_contents('data/messages.txt');
    $messages = explode('/n', $messages); //konvertuojam i masyva is stringo
    return $messages;
}
function validate($data){
    global $validationErrors;
    if(empty($data['fname']) && !preg_match("/[a-zA-Z]/", $data['fname']) || preg_match("/\\s/", $data['fname'])){
        $validationErrors[]="Wrong input of Firstname";
    }
    if(empty($data['lname']) && !preg_match("/[a-zA-Z]/", $data['lname']) || preg_match("/\\s/", $data['lname'])){
        $validationErrors[]="Wrong input of Lastname";
    }
    if(empty($data['flightNo']) && !preg_match("/^[A-Za-z]/",$data['flightNo']))
    {
        $validationErrors[]="Choose flight number";
    }
    if(empty($data['remarks']) && !preg_match('/^[A-Za-z0-9]{0,200}$/', $data['remarks'])){
        $validationErrors[]="To many characters";
    }

    return $validationErrors;
}

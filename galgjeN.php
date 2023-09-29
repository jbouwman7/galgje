<?php

session_start();

$availableLetters = range('A', 'Z');
$_SESSION["availableLetters"] = $availableLetters;

$theWord = "birdi";
$_SESSION["theWord"] = str_split($theWord, 1);

$pickedLetter = 'i';
$_SESSION["pickedLetter"] = $pickedLetter;

$key = count($_SESSION["theWord"]);

if (!isset($_SESSION["guessedArray"])) {
    for ($i=0; $i < $key ; $i++) { 
        $guessedArray[$i] = '-';
    }
    $_SESSION["guessedArray"] = $guessedArray;
}


// var_dump($_SESSION);

$wrongcount = 0;
checkLetter($wrongcount);

function checkLetter($wrongCount)
{
    $key = array_search($_SESSION["pickedLetter"], $_SESSION["availableLetters"]);
    unset($_SESSION["availableLetters"], $key);
    if (in_array($_SESSION["pickedLetter"], $_SESSION["theWord"])) {
        correctLetter();
    } else {
        $wrongCount++;
    }
}

function correctLetter() {
    $replace = array_keys($_SESSION["theWord"], $_SESSION["pickedLetter"]);
    foreach ($replace as $key) {
        $_SESSION["guessedArray"][$key] = $_SESSION["pickedLetter"];
    }
    
}
PHP_EOL;
var_dump($_SESSION);
session_destroy();
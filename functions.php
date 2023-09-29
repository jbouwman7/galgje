<?php

function delLetterFromArrWord()
{
    $key = array_search($_SESSION["chosenLetter"], $_SESSION['availableLetters']);
    unset($_SESSION['availableLetters'][$key]);
    unset($_SESSION['chosenLetter']);
}

function correctLetter()
{
    // Just added the if statement here
    if (array_keys($_SESSION["arrWord"], $_SESSION["chosenLetter"]) !== false) {
        $replace = array_keys($_SESSION["arrWord"], $_SESSION["chosenLetter"]);
        foreach ($replace as $key) {
            $_SESSION["guessedArray"][$key] = $_SESSION["chosenLetter"];
        }
    }
}

function checkLetter()
{
    if (isset($_SESSION['chosenLetter'])) {
        if (in_array($_SESSION["chosenLetter"], $_SESSION["arrWord"])) {
            correctLetter();
            delLetterFromArrWord();
        } else {
            $_SESSION['wrongCount']++;
            delLetterFromArrWord();
        }
    }
}

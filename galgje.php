<?php

$input = "test";
$_SESSION["chosenWord"] = explode($input, '');
$availableLetters = range('A', 'Z');
$i = 0;


if (isset($chosenLetter)) {
    foreach ($_SESSION["chosenWord"] as $letter) {
        $i++;
        if ($letter == $chosenLetter) {
            $correctLetters[$i] = $chosenLetter;
        }
    }
}

if (isset($_SESSION["pickedLetter"])) {
    $key = array_search($_SESSION["pickedLetter"], $availableLetters);
    unset($availableLetters[$key]);
    unset($_SESSION["pickedLetter"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php foreach ($availableLetters as $availableLetter) : ?>
        <input type="submit" name="<?= $availableLetter?>" value="<?=$availableLetter?>" id="<?=$availableLetter?>">

    <?php endforeach ?>
    
</body>
</html>


<?php
session_start();

$availableLetters = range('A', 'Z');
$chosenWord = str_split($_SESSION["chosenWord"]);
$chosenLetter = $_POST['chosenLetter'];

$i = 0;
if (isset($chosenLetter)) {
    foreach ($chosenWord as $letter) {
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
    <link rel="stylesheet" href="style/output.css">
    <title>Galgje</title>
</head>

<body class="bg-gradient-to-r from-amber-400 to-amber-700">
    <form action="" method="post">
        <?php foreach ($availableLetters as $key => $aLetter) : ?>
            <input type="submit" name="chosenLetter" value="<?= $aLetter ?>" id="<?= $aLetter ?>" class="hover:cursor-pointer">
        <?php endforeach ?>
    </form>

</body>

</html>
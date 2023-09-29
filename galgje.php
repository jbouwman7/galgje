<?php

require_once 'functions.php';
session_start();
if (isset($_POST['restart'])) {
    session_destroy();
    header('location: word.php');
    exit;
}

if (!isset($_SESSION['chosenWord'])) {
    header('location: word.php');
    exit;
}

if (!isset($_SESSION['wrongCount'])) $_SESSION['wrongCount'] = 0;
if (!isset($_SESSION['availableLetters'])) $_SESSION['availableLetters'] = range('A', 'Z');
if (isset($_POST['chosenLetter'])) $_SESSION['chosenLetter'] = $_POST['chosenLetter'];

$_SESSION['arrWord'] = str_split($_SESSION["chosenWord"]);
$key = count($_SESSION["arrWord"]);

checkLetter();

if (!isset($_SESSION["guessedArray"])) {
    for ($i = 0; $i < $key; $i++) {
        $guessedArray[$i] = '-';
    }
    $_SESSION["guessedArray"] = $guessedArray;
}

if (array_search('-', $_SESSION['guessedArray']) === false) {
    $winLose = TRUE;
}

if ($_SESSION['wrongCount'] >= 7) {
    $winLose = FALSE;
}


$_SESSION['kansen'] = 7 - $_SESSION['wrongCount'];

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
    <div class="mx-auto w-fit">
        <?php if (isset($winLose)) : ?>
            <div class="text-center my-5">
                <?php if ($winLose) : ?>
                    <h1 class="font-bold text-5xl">Gefeliciteerd!</h1>
                    <h2 class="text-3xl">U heeft het juiste woord geraden</h2>
                <?php else : ?>
                    <h1 class="font-bold text-5xl">U heeft verloren</h1>
                    <h2 class="text-3xl">Het juiste woord was: <span class="underline"><?= $_SESSION['chosenWord'] ?></span></h2>
                <?php endif ?>
            </div>
        <?php endif ?>
        <?php if (!isset($winLose)) : ?>
            <div class="text-center mt-3">
                <p>U heeft nog: <span class="undelrine"><?= $_SESSION['kansen'] ?></span?> kansen</p>
            </div>
        <?php endif ?>
        <div class="flex gap-x-1 w-fit mx-auto mt-3">
            <?php foreach ($_SESSION['guessedArray'] as $letter) : ?>
                <p><?= $letter ?></p>
            <?php endforeach ?>
        </div>
        <form action="" method="post" class="flex gap-x-3 w-fit">
            <?php foreach ($_SESSION['availableLetters'] as $key => $aLetter) : ?>
                <input type="submit" name="chosenLetter" value="<?= $aLetter ?>" id="<?= $aLetter ?>" class="hover:cursor-pointer hover:underline font-bold">
            <?php endforeach ?>
        </form>
        <form action="" method="post" class="text-center">
            <input type="submit" value="restart" name="restart" class="hover:cursor-pointer hover:font-semibold">
        </form>
    </div>

</body>

</html>
<?php
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

if (!isset($_SESSION['wrongCount'])) {
    $_SESSION['wrongCount'] = 0;
}
if (!isset($_SESSION['availableLetters'])) {
    $_SESSION['availableLetters'] = range('A', 'Z');
}
$_SESSION['arrWord'] = str_split($_SESSION["chosenWord"]);
$key = count($_SESSION["arrWord"]);
if (isset($_POST['chosenLetter'])) {
    $_SESSION['chosenLetter'] = $_POST['chosenLetter'];
}

checkLetter();

if (!isset($_SESSION["guessedArray"])) {
    for ($i = 0; $i < $key; $i++) {
        $guessedArray[$i] = '-';
    }
    $_SESSION["guessedArray"] = $guessedArray;
}

var_dump($_SESSION);

function delLetterFromArrWord()
{
    $key = array_search($_SESSION["chosenLetter"], $_SESSION['availableLetters']);
    unset($_SESSION['availableLetters'][$key]);
    unset($_SESSION["pickedLetter"]);

}

function checkLetter()
{
    if (isset($_SESSION['chosenLetter'])) {
        if (in_array($_SESSION["chosenLetter"], $_SESSION["arrWord"])) {
            correctLetter();
        } else {
            $_SESSION['wrongCount']++;
            delLetterFromArrWord();
        }
    }
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
        <?php foreach ($_SESSION['guessedArray'] as $letter) : ?>
            <p><?= $letter ?></p>
        <?php endforeach ?>
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

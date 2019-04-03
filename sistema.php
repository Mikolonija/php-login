<?php

if (isset($_POST['vardas']) && (!empty($_POST['vardas']))) {
    $name = $_POST['vardas'];
    setcookie('vardas', $name);
} else if (isset($_COOKIE['vardas'])) {
    $name = $_COOKIE['vardas'];
} else {
    $name = 'Anonimus';
}


$db = mysqli_connect('localhost', 'root', '', 'vartotojai');

if (isset($_POST['act']) && $_POST['act'] == 'act') {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $vardas = filter_input(INPUT_POST, '$vardas', FILTER_SANITIZE_STRING);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $pavarde = filter_input(INPUT_POST, 'pavarde', FILTER_SANITIZE_STRING);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $psw = filter_input(INPUT_POST, 'psw', FILTER_SANITIZE_STRING);
    }

    $vardas = $_POST['vardas'];
    $pavarde = $_POST['pavarde'];
    $psw = $_POST['psw'];

    $user_check_query = "SELECT * FROM vartotojai WHERE vardas='$vardas'  AND pavarde='$pavarde' AND slaptazodis = '$psw' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);

    if (!$row = mysqli_fetch_assoc($result)) {
        echo "Your username or password is incorrect!";
    } else {
        Header("Location: vidus.php");
    }
}
?>
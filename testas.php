
<?php
if (isset($_POST['vardas']) && (!empty($_POST['vardas']))) {
    $name = $_POST['vardas'];
    setcookie('vardas', $name);
} else if (isset($_COOKIE['vardas'])) {
    $name = $_COOKIE['vardas'];
} else {
    $name = 'Anonimus';
}



$point = 0;
$point1 = 0;
$point2 = 0;
$nezinau = 0;
if (isset($_POST['Klausimas1'])) {
    $select1 = $_POST['Klausimas1'];
    switch ($select1) {
        case '0':
            $nezinau++;

            break;
        case '1':
            $point++;
            break;
        case '2':
            $point1++;
            break;
        case '3':
            $point2++;
            break;
        default:
            break;
    }
}
if (isset($_POST['Klausimas2'])) {
    $select2 = $_POST['Klausimas2'];
    switch ($select2) {
        case '0':
            $nezinau++;

            break;
        case '1':
            $point++;



            break;
        case '2':
            $point1++;
            break;
        case '3':
            $point2++;
            break;
        default:
            break;
    }
}
if (isset($_POST['Klausimas3'])) {
    $select3 = $_POST['Klausimas3'];
    switch ($select3) {
        case '0':
            $nezinau++;

            break;
        case '1':
            $point++;
            break;

        case '2':
            $point1++;
            break;
        case '3':
            $point2++;
            break;
        default:
            break;
    }
}
if (isset($_POST['Klausimas4'])) {
    $select4 = $_POST['Klausimas4'];
    switch ($select4) {
        case '0':
            $nezinau++;

            break;
        case '1':
            $point++;

            break;
        case '2':
            $point1++;
            break;
        case '3':
            $point2++;
            break;
        default:
            break;
    }
}


if (isset($_POST['Klausimas5'])) {
    $select5 = $_POST['Klausimas5'];
    switch ($select5) {
        case '0':
            $nezinau++;
            break;
        case '1':
            $point++;

            break;
        case '2':
            $point1++;
            break;
        case '3':
            $point2++;
            break;
        default:
            break;
    }

    $vid = $point * 10 / 5;
    $vid1 = $point1 * 5 / 5;
    $vid2 = $point2 * 2 / 5;
    $nezinau = 0;

    $viso = $vid + $vid1 + $vid2;
    if ($viso >= 8) {
        echo $viso . " puikiai";
    } else if ($viso >= 6) {

        echo $viso . "gerai ";
    } else if ($viso >= 0.10 || $viso >= 5) {
        echo $viso . " blogai ";
    } else {
        echo"Pazymekite savo pasirinkima ";
    }
}



if (isset($_POST['Answer'])) {

    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "vartotojai";
    $Answer = filter_input(INPUT_POST, 'Answer', FILTER_SANITIZE_STRING);
    if (empty($Answer)) {
        echo("Please enter your produkt!<br>");
    } else {
        $mysql = mysqli_connect($host, $username, $password, $db_name);
        if (mysqli_connect_errno()) {
            printf("Connect failed %s\n", mysqli_connect_error());
            exit();
        } else {
            $sql = "INSERT INTO vertinimas(vartotojo_id,vidurkis )VALUES('" . $name . "','" . $viso . "')";
            $res = mysqli_query($mysql, $sql);
        }
    }
    mysqli_close($mysql);
}
?> 
<html> 
    <head> 
        <title>game</title> 
    </head> 
    <body> 
        <p>Sveiki,<?php echo $name; ?> </p>

        <form  method="post">
            <center>
                <h2>Klausimai</h2> 
                <p>Kaip vertinate produktu kokybe?</p>

                <select name="Klausimas1">
                    <option value="0">Nezinaus</option>
                    <option value="1">Puikiai</option>
                    <option value="2">Gerai</option>
                    <option value="3">Blogai</option>
                </select>

                <p>Kaip vertinate produktu kainas?</p>

                <select name="Klausimas2">
                    <option value="0">Nezinaus</option>

                    <option value="1">Puikiai</option>
                    <option value="2">Gerai</option>
                    <option value="3">Blogai</option>

                </select>
                <p>Kaip vertinate porduotuves isvaizda?</p>

                <select name="Klausimas3">
                    <option value="0">Nezinaus</option>

                    <option value="1">Puikiai</option>
                    <option value="2">Gerai</option>
                    <option value="3">Blogai</option>

                </select>
                <p>Kaip vertinate apsiprkima savaitgaliais  </p>

                <select name="Klausimas4">
                    <option value="0">Nezinaus</option>

                    <option value="1">Puikiai</option>
                    <option value="2">Gerai</option>
                    <option value="3">Blogai</option>

                </select>
                <p>Kaip vertinate parduotuves darbuotoju atliktu darbu</p>

                <select name="Klausimas5">
                    <option value="0">Nezinaus</option>

                    <option value="1">Puikiai</option>
                    <option value="2">Gerai</option>
                    <option value="3">Blogai</option>

                </select>
                <br>
                <input type="submit" value="Answer" name="Answer"> 


            </center>
        </form> 
        <form action="vidus.php">
            <input type="submit" value="Grizti" name="Grizti" />
        </form>
    </body> 
</html>
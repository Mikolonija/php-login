<?php
session_start();
if (isset($_POST['vardas']) && (!empty($_POST['vardas']))) {
    $name = $_POST['vardas'];
    setcookie('vardas', $name);
} else if (isset($_COOKIE['vardas'])) {
    $name = $_COOKIE['vardas'];
    $cookie_value = "vardas";
    $cookie_name = $name;
    setcookie($cookie_name, $cookie_value, time() + 14400);
} else {
    $name = 'Anonimus';
}



if (isset($_POST['Atsiujungti'])) {
    $_SESSION["krepselis"] = array();

}
$prekes = array(
    "Prekes1" => array(
        "Prekes1",
        "Batutai su tiklu",
        "Bokso pirstines"
    ),
    "Prekes2" => array(
        "Prekes2",
        "Pienas",
        "Kefiras",
        "Pomidorai",
        "Agurkai"),
    "Prekes3" => array(
        "Prekes3",
        "Plytos",
        "Akmens vata")
);

if (isset($_POST['Pateikti'])) {
    if (!isset($_SESSION["krepselis"])) {
        $_SESSION["krepselis"] = array();
    }

    if (isset($_POST["prideti_i_krepseli1"])) {

        if ($_POST["prideti_i_krepseli1"] != "Prekes1" && $_POST["prideti_i_krepseli1"] != "Prekes2" && $_POST["prideti_i_krepseli1"] != "Prekes3") {
            echo array_push($_SESSION["krepselis"], $_POST["prideti_i_krepseli1"]);
  
              $fp = fopen("cart_userid", "a");
    fwrite($fp, $_POST["prideti_i_krepseli1"] . "\r\n");
    fclose($fp);
            
        }
    }
  
//    $read = file("klientoprekes.txt");
}
if (isset($_POST['Baigti'])) {

    if ($fh = fopen('cart_userid', 'r')) {
        while (!feof($fh)) {
            $line = fgets($fh);
            echo $line . "<br>";
        }
        fclose($fh);
    }
            file_put_contents('cart_userid', '');

    $_SESSION["krepselis"] = array();
    echo 'BAIGTA';
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>

    <body>
        <p>Sveiki,<?php echo $name; ?> </p>


        <form method="POST" >

            <select name="prideti_i_krepseli1">
                <?php foreach ($prekes["Prekes1"] as $key => $value) { ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php }
                ?>
                <?php foreach ($prekes["Prekes2"] as $key => $value) { ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php } ?>
                <?php foreach ($prekes["Prekes3"] as $key => $value) { ?>
                    <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                <?php } ?>
            </select>


            <input type="submit" value="Pateikti" name="Pateikti"/>

            <input type="submit" value="Baigti" name="Baigti"/>



        </form>
        <form action="index.php">
            <input type="submit" value="Atsiujungti" name="Atsiujungti" />
        </form>


        <p>Ar norite atlikti testa ?</p>
         <form action="testas.php">
             <input type="submit" name="reg_user"  value="Testas"/>
        </form>

    </body>

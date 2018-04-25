<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'interfejsy');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if(isset($_POST["ok"]))
{


    $skad = $_POST["skad"];
    $dokad = $_POST["dokad"];
    $kiedy = $_POST["kiedy"];
    $sitnumber = $_POST["sitnumber"];
    $hour = $_POST["hour"];
    $cena = $_POST["cena"];
    $skad = mysqli_real_escape_string($db, $skad);
    $dokad = mysqli_real_escape_string($db, $dokad);
    $kiedy = mysqli_real_escape_string($db, $kiedy);
    $sitnumber = mysqli_real_escape_string($db, $sitnumber);
    $hour = mysqli_real_escape_string($db, $hour);
    $cena = mysqli_real_escape_string($db, $cena);
    mysqli_set_charset($db,"utf8");

    if(empty($skad) || empty($dokad) || empty($kiedy) || empty($sitnumber)|| empty($hour)|| empty($cena))

    {

        header('Location: profil.php');
        $_SESSION['blad3'] = '<span style="color:red">Wszystkie pola sa wymagane!</span>';
    }

    else
    {

        $query = mysqli_query($db, "INSERT INTO `ad`(`idad`, `email`, `skad`, `dokad`, `kiedy`, `cena`, `czas`, `miejsca`)VALUES (0, '".$_SESSION['login']."', '$skad','$dokad','$kiedy','$cena','$hour','$sitnumber')");

        if($query)
        {

            header('Location: profil.php');
        }
    }
}

?>
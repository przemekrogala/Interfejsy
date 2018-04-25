<?php

session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
    header('Location: logowanie.php');
    exit();
}

require_once "connection.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
{
    echo "Error: ".$polaczenie->connect_errno;
}
else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");

    if ($rezultat = @$polaczenie->query(
    sprintf("SELECT * FROM user WHERE email='$login' AND password='$haslo'",
    mysqli_real_escape_string($polaczenie,$login),
    mysqli_real_escape_string($polaczenie,$haslo))))
    {
        $ilu_userow = $rezultat->num_rows;
        if($ilu_userow>0)
        {
            $_SESSION['zalogowany'] = true;
            $_SESSION['login'] = $login;


            unset($_SESSION['blad']);
            $rezultat->free_result();
            $redirectUrl = 'profil.php';
            echo '<script type="application/javascript">alert("Zalogowano!"); window.location.href = "'.$redirectUrl.'";</script>';
           

        } else {

            $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
            header('Location: logowanie.php');

        }

    }

    $polaczenie->close();
}

?>
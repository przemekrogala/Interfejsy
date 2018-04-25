<?php

session_start();

if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
{
    header('Location: profil.php');
    exit();
}
if (!isset($_SESSION['zalogowany']))
{
    header('Location: logowanie.php');
    exit();
}

?>
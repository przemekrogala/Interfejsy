<?php
session_start();
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'interfejsy');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if(isset($_POST["submit"]))
{

    $email = $_POST["email"];
    $name = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $password = $_POST["haslo"];
    $nr = $_POST["phonenumber"];



    $email = mysqli_real_escape_string($db, $email);
    $name = mysqli_real_escape_string($db, $name);
    $lastname = mysqli_real_escape_string($db, $lastname);
    $password = mysqli_real_escape_string($db, $password);
    $nr = mysqli_real_escape_string($db, $nr);






    $sql = "SELECT email FROM user WHERE email='$email'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if(mysqli_num_rows($result) == 1)
    {
       header('Location: register.php');
       $_SESSION['blad2'] = '<span style="color:red">Podany email jest juz przypisany do konta!</span>';


    }
    if(empty($email) || empty($name) || empty($lastname) || empty($password)|| empty($nr))

    {

        header('Location: register.php');
        $_SESSION['blad3'] = '<span style="color:red">Wszystkie pola sa wymagane!</span>';
    }
    else
    {
        $query = mysqli_query($db, "INSERT INTO `user`(`email`, `name`, `surname`, `password`, `telnumber`)VALUES ('$email', '$name', '$lastname','$password','$nr')");

        if($query)
        {
            $redirectUrl = 'logowanie.php';
            echo '<script type="application/javascript">alert("Rejestracja przebiegla pomyslnie. Mozesz sie teraz zalogowac!"); window.location.href = "'.$redirectUrl.'";</script>';



            

        }
    }
}







?>
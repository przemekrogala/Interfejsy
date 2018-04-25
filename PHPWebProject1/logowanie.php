

<?php
session_start();


?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <link href="StyleSheet4.css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
</head>

<body>
    <div id=wrapper>
     
        <nav>
            <img src="logo_big.png" />
            <div id="menu">
            <li><a href="check.php">Dodaj przejazd!</a></li>
            <li><a href="register.php">Załóż konto</a></li>
            <li><a href="logowanie.php">Moje konto</a></li>
                </div>
        </nav>



        <main>

            <article>
             
                <div id="forma">
                    <section>
                        <form action="search.php" method="post">

                            <input type="text" name="skad" placeholder="Miejsce początkowe..." />




                            <input type="text" name="dokad" placeholder="Miejsce docelowe..." />




                            <input id="kiedy" type="date" name="kiedy" />
                            <button name="search">Szukaj</button>
                        </form>
                    </section>

                </div>
               
                <div id="formularz">
                    <section>
                        <form action="zaloguj.php" method="POST">
                            <centre><h1>Zaloguj sie!</h1></centre>
                            <p>Adres e-mail</p>
                            <input type="text" name="login">
                            <p>Hasło</p>
                            <input type="password" name="haslo">
                         
                            <?php
                            if (isset($_SESSION['blad']))
                            {
                                echo '<div class="error">'.$_SESSION['blad'].'</div>';
                                unset($_SESSION['blad']);
                            }
                            ?>
                           

                    </section>
                    <button type "button" >Zaloguj</button>
                    </form>
                     <?php
                     if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
                     ?>
                </div>

            </article>


           
    </div>

   

    <footer>
        <p>footer</p>
    </footer>


</body>

</html>



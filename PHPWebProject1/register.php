
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
            <img src="logo_big.png"/>

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

                        <input type="date" name="kiedy" />

                        <button name="search">Szukaj</button>
                    </form>
                </section>
            </div>

            <div id="formularz">
                <section>
                    <form action="rejestracja.php" method="post">
                     <h1>Załóż konto za darmo!</h1>
                        <p>Adres e-mail</p>
                        <input type="text" name="email">                        
                        <?php
                        if (isset($_SESSION['blad2']))
                        {
                        echo '<div class="error">'.$_SESSION['blad2'].'</div>';
                        unset($_SESSION['blad2']);
                        }
                        ?>
                        <p>Imię</p>
                        <input type="text" name="firstname">
                        <p>Nazwisko</p>
                        <input type="text" name="lastname">
                        <p>Hasło</p>
                        <input type="password" name="haslo">
                        <p>Numer telefonu</p>
                        <input type="text" name="phonenumber" maxlength="9">

                        <button name="submit">Zarejestruj</button>                       
                        <?php
                        if (isset($_SESSION['blad3']))
                        {
                        echo '<div class="error">'.$_SESSION['blad3'].'</div>';
                        unset($_SESSION['blad3']);
                        }

                        if (isset($_SESSION['blad4']))
                        {
                            echo '<div class="error">'.$_SESSION['blad4'].'</div>';
                            unset($_SESSION['blad4']);
                        }

                        ?>
                    </form>

                </section>



            </div>

        </article>
    </main>
    </div>




</body>

</html>
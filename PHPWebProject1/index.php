



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <link href="StyleSheet1.css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title></title>
</head>

<body>
    <div id="wrapper">
        <header>
            <img src="logo_big.png" ;

        </header>
        <nav>
            <li><a href="check.php">Dodaj przejazd!</a></li>
            <li><a href="register.php">Załóż konto</a></li>
            <li><a href="check.php" >Moje konto</a></li>
        </nav>



        <main>
         
            <article>
                <div id="naglowki">
                    <h1>Tanie Linie Samochodowe</h1>
                    <h3>zbuduj z nami największą społeczność wspólnych podróżników</h3>
                </div>

                <div id="forma">
                    <section>

                        <div id="naglowki2">
                            <h2>Szukaj połączeń</h2>
                            <h4>Wspólne przejazdy to łatwiejsze podróżowanie.</h4>

                        </div>

                        <form action="search.php" method="post">
                      
                            <input type="text" name="skad" placeholder="Miejsce początkowe..." />
                     
                    
                            <input type="text" name="dokad" placeholder="Miejsce docelowe..." />

                     

                      
                            <input id="date" type="date" placeholder="YYYY-MM-DD" name="kiedy">
                            <button name="search">Szukaj</button>

                        </form>
                     
                    </section>
                </div>
                    <div id="tagi">
                    <p>#szybko</p>
                    <p>#łatwo</p>
                    <p>#wygodnie</p>

                </div>
            </article>
            </main>

    </div>

    <footer>
     
    </footer>
</body>

</html>
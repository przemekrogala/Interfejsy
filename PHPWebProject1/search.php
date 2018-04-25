
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interfejsy";


if(isset($_POST["search"]))
{

    $skad = $_POST["skad"];
    $dokad = $_POST["dokad"];
    $kiedy = $_POST["kiedy"];



    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    //select ad.skad , ad.dokad, ad.kiedy, ad.cena, ad.czas, ad.miejsca, user.name,user.telnumber from ad inner join user on ad.email=user.email where ad.skad="" and ad.dokad="" and ad.kiedy=""

}

?>






<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <link href="StyleSheet4.css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 

    <title></title>
</head>

<body>
    <div id="wrapper">
      
        <nav>
          
            <img src="logo_big.png" />

            <div id="menu">
            <li><a href="check.php">Dodaj przejazd!</a></li>
            <li><a href="register.php">Załóż konto</a></li>
            <li><a href="check.php" >Moje konto</a></li>
            </div>
        </nav>



        <main>
         
            <article>

                <div id="forma">
                    <section>
                        
                        <form action="search.php" method="post">
                            <input type="text" name="skad" placeholder="Miejsce początkowe..." />
                            <input type="text" name="dokad" placeholder="Miejsce docelowe..." />
                            <input id="date" type="date" name="kiedy">
                            <button name="search">Szukaj</button>
                        </form>
                     
                    </section>
                </div>

                    <div id="tytul">

                        <p>
                            Lista dostępnych przejazdów:

                        </p>


                  

                    </div>

                    <table >
            
                        <?php

                        $sql="select user.name, ad.skad , ad.dokad, ad.kiedy, ad.cena, ad.czas, ad.miejsca, user.telnumber from ad inner join user on ad.email=user.email where ad.skad='$skad' and ad.dokad='$dokad' and ad.kiedy='$kiedy'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";

                                //  echo " ".$row['skad']." ".$row['dokad']." ".$row['kiedy']." ".$row['cena']." ".$row['czas']."".$row['miejsca']." ";
                                echo "<td>".$row['name']."</td>";

                                echo"<td>".$row['kiedy']." ".$row['czas']."<br>".$row["dokad"]."-".$row['skad']."</br></td>";



                                echo"<td>Wolne ".$row["miejsca"]." miejsca</td>";
                                echo"<td>".$row["cena"]."zł <br>za osobę</br></td>";
                                echo"<td>".$row["telnumber"]."</td>";

                                echo "</tr>";

                            }

                        }
                        else
                        {

                            echo "<td>Brak dostępnych przejazdów." . "</td>";

                        }


                        ?>


                        </table>







            </article>
            </main>

    </div>

   
    

</body>

</html>
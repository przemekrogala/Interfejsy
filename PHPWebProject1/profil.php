<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'interfejsy');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

mysqli_set_charset($db,"utf8");

    $sql="select ad.skad, ad.dokad,ad.kiedy,ad.cena,ad.czas,ad.miejsca from ad inner join user on user.email=ad.email and ad.email='".$_SESSION['login']."'";
    $result = mysqli_query($db,$sql);

    $sql2="select email,name, surname,telnumber from user where email='".$_SESSION['login']."'";
    $result2=mysqli_query($db,$sql2);


?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <link href="StyleSheet3.css" rel="stylesheet" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
    <title></title>
</head>

<body>
    <div id=wrapper>
    
        <nav>     
            <img src="logo_big.png" />

            <div id="menu">
            

                <li><a href="wyloguj.php">Wyloguj <?php echo "(".$_SESSION['login'].")" ?></a></li>
                <li> <a href="profil.php"name="profile">Mój profil</a> </li>
                <li><a href="index.php" class="szukaj">Szukaj</a> </li>

            </div>

        </nav>
        <div id="podmenu">
        </div>
        <div id="paragraf">
<p>Informacje o Twoim profilu:</p>
        
        </div>
       


        <div id="templatka">
            <div id="zdjecie">
                <div id="tytul">
                    <p>Twój profil</p>
                </div>
          <!--<img src="photo_profile.png" />-->
              
              
              
              </div>
           
            <div id="info">
            <!--   <input id="image" type="file" name="profile_photo" placeholder="Photo"/>-->
              
            </div>


         <!--menu zakladkowe-->
            <div id="informacje">


                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'informacja')"id="defaultOpen">Informacje</button>
                    <button class="tablinks" onclick="openCity(event, 'mojeprzejazdy')">Moje przejazdy</button>
                    <button class="tablinks" onclick="openCity(event, 'dodajprzejazd')">Dodaj przejazd</button>
                </div>
                <!--informacje o uzytkowniku: email, imie, nazwisko, numer telefonu...-->
                <div id="informacja" class="tabcontent" >


                    <div id="profileInfo">
                        <p id="tytul3">Dane osobowe</p>
                        <div id="inputy">
                            <?php

                        while($row = mysqli_fetch_array($result2)) {
                            echo "<tr>";

                            //  echo " ".$row['skad']." ".$row['dokad']." ".$row['kiedy']." ".$row['cena']." ".$row['czas']."".$row['miejsca']." ";

                            echo '<p><input type="text" value="'.$row['email'].'"disabled/>E-mail</p>';
                            echo '<p><input type="text" value="'.$row['name'].'"disabled/>Imię</p>';
                            echo '<p><input type="text" value="'.$row['surname'].'"disabled/>Nazwisko</p>';
                            echo '<p><input type="text" value="'.$row['telnumber'].'"/>Numer telefonu</p>';



                            //  echo("<td><img src='arrow.png". $row['arrow.png'] ."' width=35 ></td>");


                            //echo("<td><img src='head.png". $row['head.png'] ."' width=35 ></td>");

                        }

                            ?>

                            <button id="saveChangesBtn">Zatwierdź</button>
                        </div>
                    </div>
                </div>

                <div id="mojeprzejazdy" class="tabcontent" >


                    <!--tabela-->

                    <table>
                        <tr>
                            <th>Miejsce odjazdu</th>
                            <th>Miejsce docelowe</th>
                            <th>Czas</th>
                            <th>Kiedy</th>
                            <th>Miejca</th>
                            <th>Cena</th>

                        </tr>

                        <?php

                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";

                            //  echo " ".$row['skad']." ".$row['dokad']." ".$row['kiedy']." ".$row['cena']." ".$row['czas']."".$row['miejsca']." ";

                            echo "<td>".$row['skad']."</td>";
                            echo"<td>".$row["dokad"]."</td>" ;
                            echo "<td>".$row["czas"]."</td>" ;
                            echo"<td>".$row["kiedy"]."</td>";
                            //  echo("<td><img src='arrow.png". $row['arrow.png'] ."' width=35 ></td>");

                            echo"<td> ".$row["miejsca"]."</td>";
                            echo"<td>".$row["cena"]." zł</td>";
                            //echo("<td><img src='head.png". $row['head.png'] ."' width=35 ></td>");
                            echo "</tr>";
                        }
                        ?>


                    </table>
                </div>

                <!--formularz dodawania przejazdu-->

                <div id="dodajprzejazd" class="tabcontent">
                    <section>
                        <div id="przejazd">
                            <form action="dodajprzejazd.php" method="post">
                               <div id="tekst"><p>Nowe ogłoszenie</p></div>
                                <p><input type="text" name="skad" />Miejsce początkowe</p>
                               
                                <p> <input type="text" name="dokad" />Miejsce docelowe</p>
                               
                                <p><input type="date" name="kiedy" />Kiedy?</p>
                             
                                <p>  <input type="text" name="cena" />Cena</p>
                               
                                <p><input type="time" name="hour" />Godzina</p>
                                
                                <p>  <input type="text" name="sitnumber" />Liczba wolnych miejsc</p>
                               

                                <button name="ok">Dodaj przejazd</button>
                                <?php
                                if (isset($_SESSION['blad3']))
                                {
                                    echo '<div class="error">'.$_SESSION['blad3'].'</div>';
                                    unset($_SESSION['blad3']);
                                }

                                ?>

                            </form>



                        </div>
                    </section>
                </div>

                 

                </div>
         

        </div>



        <main>

            <article>
                <section>
                    <div id="tabela">
                      
                      

                          
                                <!--<table>
                                

                                    <?php

                              //  while($row = mysqli_fetch_array($result)) {
                              //      echo "<tr>";

                                    //  echo " ".$row['skad']." ".$row['dokad']." ".$row['kiedy']." ".$row['cena']." ".$row['czas']."".$row['miejsca']." ";
                              //      echo "<td>".$row["czas"]." ".$row["kiedy"]." <br><br>".$row['skad']." ".$row["dokad"]."</td> " ;
                                     //  echo("<td><img src='arrow.png". $row['arrow.png'] ."' width=35 ></td>");




                                //       echo"<td> Wolne ".$row["miejsca"]." miejsca"."</td>";
                              //         echo"<td>".$row["cena"]."zł za osobę</td>";
                                       //echo("<td><img src='head.png". $row['head.png'] ."' width=35 ></td>");
                              //     echo "</tr>";
                            //    }
                                    ?>
                                

</table>-->

                            </div>
                      
</section>


         





            </article>



        </main>


        <script>
            function openCity(evt, cityName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
             
            }
            document.getElementById("defaultOpen").click();
        </script>
        </div>

</body>


</html>


<<<<<<< HEAD
<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<link rel="stylesheet" href="Stile2.css">
<link rel="stylesheet" href="Stile.css">
=======
<?php session_start(); ?>
<html>

<head>
  <title>Carrello</title>
  <link rel="stylesheet" href="Stile.css">
</head>
>>>>>>> b172e4ea956da49a82af1da2d0581e38ead5a7ee
<nav class="header">
  <ul>
    <li class="alignLI"><a id="selected" href="Carrello.php">Carrello</a></li>
    <li class="alignLI"><a href="Catalogo.php">Catalogo</a></li>
    <li class="alignLI"><a href="Cerca.php">Cerca</a></li>
    <li class="alignLI"><a href="ScansioneCodice.php">Scansiona codici</a></li>
    <li class="alignLI"><a href="Tessera.php">Tessera</a></li>
    <li class="alignLI"><a href="Logout.php">Logout</a></li>
  </ul>
</nav>

<body>
  <br>
  <br>
  <center><label class="AlignLabel">IL TUO CARRELLO:</label></center>
  <?php
  require_once 'Config.php';
  $ID_Cliente=$_SESSION['ID_Cliente'];
    //devo mettere il for per i prodotti
    $sql= "SELECT NomeProdotto,PrezzoUnitario,Quantita,carrello.CodiceProdotto FROM prodotto,carrello WHERE ((prodotto.CodiceProdotto = carrello.CodiceProdotto) AND ID_Utente=$ID_Cliente)";
    if ($result=mysqli_query($link,$sql)){                    
      if(mysqli_num_rows($result)>0){
              echo "<table class='TableProvaCarrello'>";
                echo "<thead>";
                    echo "<tr>";
                    echo "<th class='Text'>Codice prodotto</th>";
                        echo "<th class='Text'>Prodotto</th>";
                        echo "<th class='Text'>Quantità</th>";
                        echo "<th class='Text'>Prezzo</th>";
                        echo "<th class='Text'>Elimina</th>";
                    echo "</tr>";
                echo "</thead>";
                while($row=mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<th class='Text2'>" .$row['CodiceProdotto']."</th>";
                      echo "<td class='Text2'>" .$row["NomeProdotto"]. "</td>";
                      echo "<td class='Text2'>" .$row["Quantita"]."</td>";
                      echo "<td class='Text2'>" .$row["PrezzoUnitario"]. "</td>";
                      echo "<td class='Text2'><a href='EliminaProdotto.php?&CodiceProdotto=".$row['CodiceProdotto']."'><img src='bottone.svg'></a></td>";
                  echo "</tr>";
              }
              echo "</table>";
              mysqli_free_result($result);
          }else{
            echo "<br><br><p class='Avvisi'>IL TUO CARRELLO AL MOMENTO E' VUOTO</p>";
          }
        }else{
          echo "ERROR: non abile ad eseguire".$sql;
        }
        mysqli_close($link);
?>
<br>
<br>
<form action="EliminaProdottiCarrello.php" method="POST">
  <div class="Acquista">
      <button type="submit" name="btn_Acqista">Acquista</button>
  </div>
</form>
</body>
<<<<<<< HEAD
=======

>>>>>>> b172e4ea956da49a82af1da2d0581e38ead5a7ee
</html>
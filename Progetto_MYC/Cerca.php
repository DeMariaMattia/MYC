<?php session_start();?>
<link rel="stylesheet" href="Stile.css">
<nav class="header">
<<<<<<< Updated upstream
  <ul>
    <li><a href="Catalogo.php">Catalogo</a></li>
    <li><a id="selected" href="Cerca.php">Cerca</a></li>
    <li><a href="Tessera.php">Tessera</a></li>
    <li><a href="ScansioneCodici.php">Scansiona codici</a></li>
    <li><a href="Carrello.php">Carrello</a></li>
    <?php
    if (isset($_SESSION["ID_Cliente"])) {
      echo "<li><a href=Logout.php>Logout</a></li>";
    } else {
      echo "<li><a href=Login.php>Login</a></li>";
      echo "<li><a href=Registrazione.php>Registrazione</a></li>";
    }
    ?>

  </ul>
</nav>

<body>
  <h2 class="text">Inserire codice prodotto da cercare</h2>
  <div class="search_wrap search_wrap_3">
    <div class="search_box">
      <form action="elaboraCerca.php" method="post">
        <input type="text" id="TxtStringa" name="TxtStringa" class="input" placeholder="Codice prodotto...">
        <input type="submit" id="BtnStringa" name="BtnStringa" class="rosso">
      </form>
    </div>
  </div>
</body>

=======
            <ul>
              <li><a href="Catalogo.php">Catalogo</a></li>
              <li><a href="ScansioneCodice.php">Scansiona codici</a></li>
              <li><a href="Tessera.php">Tessera</a></li>
              <li><a href="Carrello.php">Carrello</a></li>
              <li><a href="Logout.php">Logout</a></li>
            </ul>
          </nav>
      <body class="DettagliProdotto">
            <h1>Dettagli del prodotto</h1>
      </body>
</html>
<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<?php
require_once 'Config.php';
$CodiceProdotto="";
$CodiceProdotto_err="";
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $input_Codice=trim($_POST["TxtStringa"]);
    if(empty($input_Codice)){
        $CodiceProdotto_err="Inserisci un codice di prodotto valido.";
    }else{
        $CodiceProdotto=$input_Codice;
    }
}
    if((empty($CodiceProdotto_err))){
        $sql="SELECT * FROM prodotto WHERE (CodiceProdotto='$CodiceProdotto')";
            if($stmt= mysqli_prepare($link,$sql)){
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    if(mysqli_num_rows($result)==1){
                        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $NomeProdotto=$row['NomeProdotto'];
                        $Categoria=$row['Categoria'];
                        $Reparto=$row['Reparto'];
                        $PrezzoUnitario=$row['PrezzoUnitario']; 
                        echo "<table>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th>Codice Prodotto</th>";
                                echo "<th>Nome Prodotto</th>";
                                echo "<th>Categoria</th>";
                                echo "<th>Reparto</th>";
                                echo "<th>PrezzoUnitario</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tr>";
                        echo "<th>" .$row['CodiceProdotto']."</th>";
                        echo "<td>" .$row['NomeProdotto']."</td>";
                        echo "<td>" .$row['Categoria']."</td>";
                        echo "<td>" .$row['Reparto']."</td>";
                        echo "<td>" .$row['PrezzoUnitario']."</td>";
                        echo "</tr>";
                    echo "</table>";
                    }else{
                        header("location:ScansioneCodice.php");
                        exit();
                    }
                }
            }
            if(mysqli_stmt_execute($stmt)){
                //header("location:Visualizza.php");
                exit();
            }else{
                echo "OPS, qualcosa è andato storto... Riprovare più tardi";
            }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
?>
<html>
<link rel="stylesheet" href="Stile.css">
<nav class="header">
  <ul>
    <li><a href="Catalogo.php">Catalogo</a></li>
    <li><a href="ScansioneCodice.php">Scansiona Codice</a></li>
    <li><a href="Tessera.php">Tessera</a></li>
    <li><a href="Carrello.php">Carrello</a></li>
    <li><a href="Logout.php">Logout</a></li>
  </ul>
</nav>
      <body>
        <h2 class="text">Inserire codice prodotto da cercare</h2>
        <div class="search_wrap search_wrap_3">
			    <div class="search_box">
            <form action="Cerca.php" method="post">
				    <input type="text" id="TxtStringa" name="TxtStringa" class="input" placeholder="Codice prodotto...">
            <input type="submit" id="BtnStringa" name="BtnStringa" class="rosso">
            </form>
		      </div>
          </div>
      </body>
>>>>>>> Stashed changes
</html>
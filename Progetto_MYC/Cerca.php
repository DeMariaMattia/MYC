<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<html>
<link rel="stylesheet" href="Stile.css">
<nav class="header">
  <ul>
    <li class="alignLI"><a href="Carrello.php">Carrello</a></li>
    <li class="alignLI"><a href="Catalogo.php">Catalogo</a></li>
    <li class="alignLI"><a id="selected" href="Cerca.php">Cerca</a></li>
    <li class="alignLI"><a href="ScansioneCodice.php">Scansiona codici</a></li>
    <li class="alignLI"><a href="Tessera.php">Tessera</a></li>
    <li class="alignLI"><a href="Logout.php">Logout</a></li>
  </ul>
</nav>
      <body>
        <h2 class="text">Inserire codice prodotto da cercare</h2>
        <a class ="Collegamento" href="CercaProdottoPerNome.php">Cerca il prodotto per nome</a>
        <div class="search_wrap search_wrap_3">
			    <div class="search_box">
            <form action="Cerca.php" method="post">
				    <input type="number" id="TxtStringa" name="TxtStringa" class="input" placeholder="Codice prodotto...">
            <input type="submit" id="BtnStringa" name="BtnStringa" class="rosso">
            </form>
		      </div>
          </div>
      </body>
</html>
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
    if((empty($CodiceProdotto_err))&&$CodiceProdotto!=0){
        $sql="SELECT * FROM prodotto WHERE (CodiceProdotto='$CodiceProdotto')";
            if($stmt= mysqli_prepare($link,$sql)){
                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    if(mysqli_num_rows($result)==1 ||$CodiceProdotto==0){
                        $row=mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $NomeProdotto=$row['NomeProdotto'];
                        $Categoria=$row['Categoria'];
                        $Reparto=$row['Reparto'];
                        $PrezzoUnitario=$row['PrezzoUnitario']; 
                        echo "<table class='TableProva'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th class='Text'>Codice Prodotto</th>";
                                echo "<th class='Text'>Nome Prodotto</th>";
                                echo "<th class='Text'>Categoria</th>";
                                echo "<th class='Text'>Reparto</th>";
                                echo "<th class='Text'>PrezzoUnitario</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tr>";
                        echo "<th class='Text2'>" .$row['CodiceProdotto']."</th>";
                        echo "<td class='Text2'>" .$row['NomeProdotto']."</td>";
                        echo "<td class='Text2'>" .$row['Categoria']."</td>";
                        echo "<td class='Text2'>" .$row['Reparto']."</td>";
                        echo "<td class='Text2'>" .$row['PrezzoUnitario']."</td>";
                        echo "</tr>";
                    echo "</table>";
                    }else{
                        echo "<p class='Avvisi'>Prodotto non presente nel database</p>";
                    }
                }
            }
            if(mysqli_stmt_execute($stmt)){
                //header("location:Visualizza.php");
            }else{
                echo "OPS, qualcosa è andato storto... Riprovare più tardi";
            }
    }else{
        //echo "Codice prodotto non presente nel database";
    }
    //mysqli_stmt_close($stmt);
    mysqli_close($link);
?>

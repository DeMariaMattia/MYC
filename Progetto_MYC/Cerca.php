<html>
<link rel="stylesheet" href="Stile.css">
<link rel="stylesheet" href="Dettagli.css">
<nav class="header">
            <ul>
              <li><a href="Catalogo.html">Catalogo</a></li>
              <li><a href="ScansioneCodici.html">Scansiona codici</a></li>
              <li><a href="Tessera.html">Tessera</a></li>
              <li><a href="Carrello.html">Carrello</a></li>
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
                        header("location:ScansioneCodice.html");
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
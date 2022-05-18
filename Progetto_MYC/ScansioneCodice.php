<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<?php
require_once 'Config.php';
$CodiceProdotto="";
$Quantita=0;
$Magazzino=0;
$CodiceProdotto_err=$Quantita_err="";
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $input_Codice=trim($_POST["TxtStringa"]);
    if(empty($input_Codice)){
        $CodiceProdotto_err="Inserisci un codice di prodotto valido.";
    }else{
        $CodiceProdotto=$input_Codice;
    }
}
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $input_Qta=trim($_POST["TxtQuantita"]);
    if(empty($input_Qta)){
        $Quantita_err="Inserisci una quantità valida.";
    }else{
        $Quantita=$input_Qta;
    }
}
$Presente=0;
$ID_Cliente=$_SESSION['ID_Cliente'];
$sqlVerifica="SELECT DISTINCT CodiceProdotto FROM carrello WHERE ID_Utente=$ID_Cliente";
if($result=mysqli_query($link,$sqlVerifica)){
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $Test=$row["CodiceProdotto"];
            if($Test==$CodiceProdotto){
                $Presente=1;
            }
        }
    }
}
if($Presente!=1){
    if((empty($CodiceProdotto_err))&&(empty($Quantita_err))){
        $ID_Cliente=$_SESSION['ID_Cliente'];
                //Controllo magazzino
                $sqlMagazzino="SELECT Magazzino FROM prodotto WHERE CodiceProdotto=$CodiceProdotto";
                if($result=mysqli_query($link,$sqlMagazzino)){
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_array($result)){
                            $Magazzino=$row["Magazzino"];
                        }
                    }
                }
                if(($Magazzino-$Quantita)>=0){
                    $sql="INSERT INTO carrello (ID_Utente,CodiceProdotto,Quantita) VALUES ($ID_Cliente, $CodiceProdotto, $Quantita)";
                    if($stmt= mysqli_prepare($link,$sql)){
                        if(mysqli_stmt_execute($stmt)){
                            if(($Magazzino-$Quantita)>=0){
                    $sql2="UPDATE prodotto SET Magazzino=(Magazzino-$Quantita) WHERE CodiceProdotto=$CodiceProdotto";
                    if($stmt2= mysqli_prepare($link,$sql2)){
                        if(mysqli_stmt_execute($stmt2)){
                            header("location:ScansioneCodice.php");
                        }
                        mysqli_stmt_close($stmt2);
                    }
                    }else{
                        echo "<p class='Avvisi'>Quantità eccessiva per le scorte presenti in magazzino</p>";
                        echo "<a href='ScansioneCodice.php' class='Avvisi'>Scansiona un altro prodotto</a>";
                        exit();
                    }
                    }else{
                        echo "<p class='Avvisi'>OPS, qualcosa è andato storto... Riprovare più tardi, verificare se il prodotto inserito è corretto</p>";
                        echo "<a href='ScansioneCodice.php' class='Avvisi'>Scansiona un altro prodotto</a>";
                        exit();
                    }
                    mysqli_stmt_close($stmt);
                }
                }
        }
}else{
            $ID_Cliente=$_SESSION['ID_Cliente'];
            $sqlMagazzino="SELECT Magazzino FROM prodotto WHERE CodiceProdotto=$CodiceProdotto";
            if($result=mysqli_query($link,$sqlMagazzino)){
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result)){
                        $Magazzino=$row["Magazzino"];
                    }
                }
            }    
            if(($Magazzino-$Quantita)>=0){
            $sqlAggiungi="UPDATE carrello SET Quantita=(Quantita+$Quantita) WHERE ((CodiceProdotto=$CodiceProdotto) AND (ID_Utente=$ID_Cliente))";
                    if($stmtAggiungi= mysqli_prepare($link,$sqlAggiungi)){
        if(mysqli_stmt_execute($stmtAggiungi)){
                header("location:ScansioneCodice.php");
            }
        mysqli_stmt_close($stmtAggiungi);
        }else{
            echo "<p class='Avvisi'>OPS, qualcosa è andato storto... Riprovare più tardi, verificare se il prodotto inserito è corretto</p>";
            echo "<a href='ScansioneCodice.php' class='Avvisi'>Scansiona un altro prodotto</a>";
            exit();
        }
    }else{
        echo "<p class='Avvisi'>Quantità eccessiva per le scorte presenti in magazzino</p>";
        echo "<p class='Avvisi'><a href='ScansioneCodice.php' class='Avvisi'>Scansiona un altro prodotto</a></p>";
    }
}
    mysqli_close($link);
    
?>
<html>
  <head>
    <link rel="stylesheet" href="Stile.css">
  </head>
          <nav class="header">
            <ul>
            <li class="alignLI"><a href="Carrello.php">Carrello</a></li>
            <li class="alignLI"><a  href="Catalogo.php">Catalogo</a></li>
            <li class="alignLI"><a href="Cerca.php">Cerca</a></li>
            <li class="alignLI"><a id="selected" href="ScansioneCodice.php">Scansiona codici</a></li>
            <li class="alignLI"><a href="Tessera.php">Tessera</a></li>
            <li class="alignLI"><a href="Logout.php">Logout</a></li>
            </ul>
          </nav>
      <body>
        <form action="ScansioneCodice.php" method="post">
          <div class="text">
            <h2>Inserire codice prodotto</h2>    
          <div class="search_wrap search_wrap_3">
			    <div class="search_box">
				    <input type="text" id="TxtStringa" name="TxtStringa" class="input" placeholder="Codice prodotto...">
              <h2>Inserire Quantita prodotto</h2>
            </div>       
            <div class="search_wrap search_wrap_3">
            <div class="search_box">
              <input type="text" id="TxtQuantita" name="TxtQuantita" class="input" placeholder="Quantita prodotto...">
            <input type="submit" id="BtnStringa" name="BtnStringa" class="rosso">
		      </div>
          </div>
        </form>
    </body>
</html>

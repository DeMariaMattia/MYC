<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<?php
require_once 'Config.php';
$CodiceProdotto="";
$Quantita=0;
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
    if((empty($CodiceProdotto_err))&&(empty($Quantita_err))){
        $ID_Cliente=$_SESSION['ID_Cliente'];
        $sql="INSERT INTO carrello (ID_Utente,CodiceProdotto,Quantita) VALUES ($ID_Cliente, $CodiceProdotto, $Quantita)";
            if($stmt= mysqli_prepare($link,$sql)){
                if(mysqli_stmt_execute($stmt)){
                    $sql2="UPDATE prodotto SET Magazzino=(Magazzino-$Quantita) WHERE CodiceProdotto=$CodiceProdotto";
                    if($stmt2= mysqli_prepare($link,$sql2)){
                        if(mysqli_stmt_execute($stmt2)){
                            header("location:ScansioneCodici.php");
                        }
                        mysqli_stmt_close($stmt2);
                    }
                    }else{
                        echo "OPS, qualcosa è andato storto... Riprovare più tardi";
                        exit();
                    }
                    mysqli_stmt_close($stmt);
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
              <li><a href="Catalogo.php">Catalogo</a></li>
              <li><a href="Cerca.php">Cerca</a></li>
              <li><a href="Tessera.php">Tessera</a></li>
              <li><a href="Carrello.php">Carrello</a></li>
              <li><a href="Logout.php">Logout</a></li>
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

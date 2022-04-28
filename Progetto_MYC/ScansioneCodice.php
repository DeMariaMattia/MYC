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
        $sql="INSERT INTO carrello FROM prodotto WHERE (CodiceProdotto='$CodiceProdotto')";
            if($stmt= mysqli_prepare($link,$sql)){
                if(mysqli_stmt_execute($stmt)){
                        $ID_Cliente=$_SESSION['ID_Cliente'];
                        $sql_query = "INSERT INTO carrello (ID_Utente,CodiceProdotto,Quantita) VALUES ($ID_Cliente, $CodiceProdotto, $Quantita)";
                        if ($stmt = mysqli_prepare($link, $sql_query)) {
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

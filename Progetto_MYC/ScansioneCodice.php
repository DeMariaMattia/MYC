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
                        $NomeProdotto=$row["NomeProdotto"];
                        $Categoria=$row["Categoria"];
                        $Reparto=$row["Reparto"];
                        $PrezzoUnitario=$row["PrezzoUnitario"];
                        $ID_Cliente=$_SESSION['ID_Cliente'];
                        echo($ID_Cliente);
                        //Aggiunta al carello
                        //header("location:Visualizzadati.php?&Matricola=".$Matricola);
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

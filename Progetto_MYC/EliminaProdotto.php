<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<?php
require_once 'Config.php';
if(isset($_GET["CodiceProdotto"]) && !empty($_GET["CodiceProdotto"])){
    $sql = "DELETE FROM carrello WHERE CodiceProdotto = ?";
    if($stmt = mysqli_prepare($link, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["CodiceProdotto"]);
        if(mysqli_stmt_execute($stmt)){
            header("location: Carrello.php");
            exit();
        } else{
            echo "Errore nella rimozione del prodotto";
        }
    }
    mysqli_stmt_close($stmt);
} else{
    if(empty(trim($_GET["CodiceProdotto"]))){
        header("location: error.php");
        exit();
    }
}
?>
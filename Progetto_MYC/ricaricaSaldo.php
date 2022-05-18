<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<html>
<head>
    <title>Ricarica</title>
    <link rel="stylesheet" href="Stile.css">
</head>
<nav class="header">
    <ul>
            <li class="alignLI"><a href="Carrello.php">Carrello</a></li>
            <li class="alignLI"><a href="Catalogo.php">Catalogo</a></li>
            <li class="alignLI"><a href="Cerca.php">Cerca</a></li>
            <li class="alignLI"><a href="ScansioneCodice.php">Scansiona codici</a></li>
            <li class="alignLI"><a id="selected" href="Tessera.php">Tessera</a></li>
            <li class="alignLI"><a href="Logout.php">Logout</a></li>
    </ul>
</nav>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="loginForm">
    <div class="white-rounded-input-container">
        <input class="white-rounded-input" type="number" placeholder="1-999" name="ricarica" min="1" max="999" required><br>
    </div>
        <button type="submit">Ricarica</button>
    </div>
    </form>
</body>
</html>
<?php
require_once "Config.php";
$Ricarica=0;
$Ricarica_err="";
$ID_Cliente=$_SESSION['ID_Cliente'];
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $input_Ricarica=trim($_POST["ricarica"]);
    if(empty($input_Ricarica)){
        $Ricarica_err="Inserisci una quantità di denaro valida per la ricarica.";
    }else{
        $Ricarica=$input_Ricarica;
    }
}
if (isset($_SESSION["ID_Cliente"]) && !empty($_POST["ricarica"])) {
    $sqlRicarica="UPDATE tessera SET Saldo=(Saldo+$Ricarica) WHERE Id_Utente=$ID_Cliente";
    if($stmtRicarica= mysqli_prepare($link,$sqlRicarica)){
        if(mysqli_stmt_execute($stmtRicarica)){
            header("location:Tessera.php");
        }
        mysqli_stmt_close($stmtRicarica);
    }else{
        echo "Non possibile effettuare la ricarica della tessera";
        exit();
    }
} 
?>

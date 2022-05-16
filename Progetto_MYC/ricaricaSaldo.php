<?php
<<<<<<< HEAD
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<html>
=======
require_once "Config.php";
session_start();

if (isset($_SESSION["ID_Cliente"]) && $_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["ricarica"])) {
    $select_query = "SELECT Saldo FROM tessera WHERE ID_Utente = $_SESSION[ID_Cliente]";
    $result = mysqli_query($link, $select_query);
    $row = mysqli_fetch_array($result);

    $nuovo_saldo = $row["Saldo"] + $_POST["ricarica"];

    $update_query = "UPDATE tessera SET saldo = $nuovo_saldo WHERE ID_Utente = $_SESSION[ID_Cliente]";
    mysqli_query($link, $update_query);

    header("location:Tessera.php");
} 
?>

<html>

>>>>>>> b172e4ea956da49a82af1da2d0581e38ead5a7ee
<head>
    <title>Ricarica</title>
    <link rel="stylesheet" href="Stile.css">
</head>
<nav class="header">
    <ul>
<<<<<<< HEAD
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
        <input class="white-rounded-input" type="number" placeholder="0-999" name="ricarica" required><br>
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
=======
        <li class="alignL_R"><a href="Logout.php">Logout</a></li>
    </ul>
</nav>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="number" name="ricarica" placeholder="0-999">
        <input type="submit" value="Ricarica" name="ricarica">
    </form>
</body>

</html>
>>>>>>> b172e4ea956da49a82af1da2d0581e38ead5a7ee

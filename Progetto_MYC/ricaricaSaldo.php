<?php
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

<head>
    <title>Ricarica</title>
    <link rel="stylesheet" href="Stile.css">
</head>
<nav class="header">
    <ul>
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
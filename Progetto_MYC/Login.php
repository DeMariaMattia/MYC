<?php
session_start();
require_once "Config.php";

if (isset($_POST['btn_login'])) {
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $sql_query = "SELECT COUNT(*) as cntUser FROM utenti WHERE Username = '" . $username . "' AND Password = '" . $password . "' ";
    $sql_ID = "SELECT ID_Utente FROM utenti WHERE Username = '" . $username . "' AND Password = '" . $password . "' ";
    $result = mysqli_query($link, $sql_query);
    $resultID = mysqli_query($link, $sql_ID);
    $row = mysqli_fetch_array($result);
    $row2 = mysqli_fetch_array($resultID);
    $count = $row['cntUser'];
    $ID_Cliente = $row2['ID_Utente'];
    if ($count > 0) {
        $_SESSION['ID_Cliente'] = $ID_Cliente;
<<<<<<< Updated upstream
        header('Location: ScansioneCodici.php');
=======
        header('Location: ScansioneCodice.php');

>>>>>>> Stashed changes
    } else {
        $err = "Username e/o password non valido/i";
        echo "<script>alert('$err')</script>";
    }
}
?>

<html>
<link rel="stylesheet" href="Stile.css">
<nav class="header">
<<<<<<< Updated upstream
    <ul>
        <li><a href="Catalogo.php">Catalogo</a></li>
        <li><a href="Cerca.php">Cerca</a></li>
        <li><a href="Tessera.php">Tessera</a></li>
        <li><a href="ScansioneCodici.php">Scansiona codici</a></li>
        <li><a href="Carrello.php">Carrello</a></li>
    </ul>
</nav>

=======
            <ul>
              <li><a href="Registrazione.php">Registrazione</a></li>
            </ul>
          </nav>
>>>>>>> Stashed changes
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="centerForm search_box">
            <label class="label" for="username">Username</label>
            <input type="text" placeholder="Inserire Username" name="username" required><br>

            <label class="text" for="password">Password</label>
            <input class="input" type="password" placeholder="Inserire Password" name="password" required><br>

            <button type="submit" name="btn_login">Login</button>
        </div>
    </form>
</body>

</html>
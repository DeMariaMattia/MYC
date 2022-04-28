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
    $ID_Cliente=$row2['ID_Utente'];
    if ($count > 0) {
        $_SESSION['ID_Cliente'] = $ID_Cliente;
        header('Location: ScansioneCodici.html');

    } else {
        $err = "Username e/o password non valido/i";
        echo "<script>alert('$err')</script>";
    }
}
?>

<html>
<link rel="stylesheet" href="Stile.css">
<nav class="header">
            <ul>
              <li><a href="Catalogo.html">Catalogo</a></li>
              <li><a href="Cerca.html">Cerca</a></li>
              <li><a href="Tessera.html">Tessera</a></li>
              <li><a href="Carrello.html">Carrello</a></li>
              <li><a href="Logout.php">Logout</a></li>
            </ul>
          </nav>
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
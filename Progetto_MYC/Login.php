<?php
require_once "Config.php";

if (isset($_POST['btn_login'])) {
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $sql_query = "SELECT COUNT(*) as cntUser FROM utenti WHERE username = '" . $username . "' AND password = '" . $password . "' ";

    $result = mysqli_query($link, $sql_query);
    $row = mysqli_fetch_array($result);
    $count = $row['cntUser'];

    if ($count > 0) {
        $_SESSION['uname'] = $username;
        header('Location: Carrello.html');
    } else {
        $err = "Username e/o password non valido/i";
        echo "<script>alert('$err')</script>";
    }
}
?>

<html>
<link rel="stylesheet" href="Stile.css">
<hr class="SpostaBar" size="80" width="100%" color="red" noshade>
<div class="container">
    <nav class="Sposta">
        <ul>
            <li><a href="Catalogo.html">Catalogo</a></li>
            <li><a href="Cerca.html">Cerca</a></li>
            <li><a href="ScansioneCodici.html">Scansione Codici</a></li>
            <li><a href="Carrello.html">Carrello</a></li>
        </ul>
    </nav>
</div>
</header>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="centerForm">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Inserire Username" name="username" required><br>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Inserire Password" name="password" required><br>

            <button type="submit" name="btn_login">Login</button>
            <a href="Registrazione.php">Registrazione</a><br>
        </div>
    </form>
</body>

</html>
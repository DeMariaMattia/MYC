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
        header('Location: ScansioneCodice.php');
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
        <li class="alignL_R"><a href="Registrazione.php">Registrazione</a></li>
    </ul>
</nav>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="loginForm">
        <img class="alignIMG" src="Logo.png">
        <label for="username">Username</label>

            <div class="white-rounded-input-container">
                <input class="white-rounded-input" type="text" placeholder="Inserire Username" name="username" required><br>
            </div>
            
        <label for="password">Password</label>

            <div class="white-rounded-input-container">
                <input class="white-rounded-input" type="text" placeholder="Inserire Password" name="password" required><br>
            </div>

            <button type="submit" name="btn_login">LOGIN</button>
        </div>
    </form>
</body>

</html>
<?php
require_once "Config.php";

if (isset($_POST['btn_registrazione'])) {

    $email = mysqli_real_escape_string($link, $_POST["email"]);
    $nome = mysqli_real_escape_string($link, $_POST["nome"]);
    $cognome = mysqli_real_escape_string($link, $_POST["cognome"]);
    $username = mysqli_real_escape_string($link, $_POST["username"]);
    $password = mysqli_real_escape_string($link, $_POST["password"]);
    $password_conferma = mysqli_real_escape_string($link, $_POST["password_conferma"]);

    if ($password == $password_conferma) {
        $sql_query = "INSERT INTO utenti (Email,Nome,Cognome,Username,Password) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql_query)) {
            mysqli_stmt_bind_param($stmt, "sssss", $param_email, $param_nome, $param_cognome, $param_username, $param_password);
            $param_email = $email;
            $param_nome = $nome;
            $param_cognome = $cognome;
            $param_username = $username;
            $param_password = $password;

            if (mysqli_stmt_execute($stmt)) {
                $sql_ID = "SELECT ID_Utente FROM utenti WHERE Username = '" . $username . "' AND Password = '" . $password . "' ";
                $resultID = mysqli_query($link, $sql_ID);
                $row = mysqli_fetch_array($resultID);
                $ID_Cliente = $row['ID_Utente'];
                $sql_Tessera = "INSERT INTO tessera (ID_Utente,Punti) VALUES ($ID_Cliente, '500')";
                $result = mysqli_query($link, $sql_Tessera);
                header('Location: Login.php');
            } else {
                $err = mysqli_stmt_error($stmt);
                echo "<script>alert('$err')</script>";
            }
        }
    } else {
        $err = "Errore: controllare che le password inserite siano uguali";
        echo "<script>alert('$err')</script>";
    }
}
?>

<html>

<head>
    <title>Registrazione</title>
    <link rel="stylesheet" href="Stile.css">
</head>
<nav class="header">
    <ul>
        <li class="alignL_R"><a href="Login.php">Login</a></li>
    </ul>
</nav>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="registerForm">

            <label for="email"><b>Email</b></label>
            <div class="white-rounded-input-container">
                <input class="white-rounded-input" type="text" placeholder="Inserire una mail " name="email" required><br>
            </div>

            <label for="nome"><b>Nome</b></label>
            <div class="white-rounded-input-container">
                <input class="white-rounded-input" type="text" placeholder="Inserire nome " name="nome" required><br>
            </div>

            <label for="cognome"><b>Cognome</b></label>
            <div class="white-rounded-input-container">
                <input class="white-rounded-input" type="text" placeholder="Inserire cognome " name="cognome" required><br>
            </div>

            <label for="username"><b>Username</b></label>
            <div class="white-rounded-input-container">
                <input class="white-rounded-input" type="text" placeholder="Inserire un username " name="username" required><br>
            </div>

            <label for="password"><b>Password</b></label>
            <div class="white-rounded-input-container">
                <input class="white-rounded-input" type="text" placeholder="Inserire una password " name="password" required><br>
            </div>
            <label for="password_conferma"><b>Conferma password</b></label>
            <div class="white-rounded-input-container">
                <input class="white-rounded-input" type="text" placeholder="Conferma password " name="password_conferma" required><br>
            </div>
            <button type="submit" name="btn_registrazione">REGISTRAZIONE</button>
        </div>
    </form>
</body>

</html>
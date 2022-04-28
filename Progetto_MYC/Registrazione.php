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
                header("Location:Login.html");
                exit();
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

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Inserire E-mail" name="email" required><br>

            <label for="nome"><b>Nome</b></label>
            <input type="text" placeholder="Inserire Nome" name="nome" required><br>

            <label for="cognome"><b>Cognome</b></label>
            <input type="text" placeholder="Inserire Cognome" name="cognome" required><br>

            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Inserire Username" name="username" required><br>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Inserire Password" name="password" required><br>

            <label for="password_conferma"><b>Conferma Password</b></label>
            <input type="password" placeholder="Confermare Password" name="password_conferma" required><br>

            <button type="submit" name="btn_registrazione">Registrazione</button>
        </div>
    </form>
</body>

</html>
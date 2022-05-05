<?php
require_once "Config.php";
session_start();
if (isset($_SESSION["ID_Cliente"])) {

  $nome = "";
  $cognome = "";
  $punti = "";
  $id_utente = $_SESSION['ID_Cliente'];

  $select_query = "SELECT utenti.Nome, utenti.Cognome, tessera.Punti, tessera.CodiceTessera FROM utenti, tessera WHERE utenti.ID_Utente = tessera.ID_Utente AND utenti.ID_Utente = $id_utente";
  $result_select = mysqli_query($link, $select_query);
  $row = mysqli_fetch_array($result_select);

  $nome = $row['Nome'];
  $cognome = $row['Cognome'];
  $punti = $row['Punti'];
  $codiceTessera = $row['CodiceTessera'];
} else {
  header("Location:Login.php");
}
?>

<<<<<<< Updated upstream
<link rel="stylesheet" href="Stile.css">
<nav class="header">
  <ul>
    <li><a href="Catalogo.php">Catalogo</a></li>
    <li><a href="Cerca.php">Cerca</a></li>
    <li><a id="selected" href="Tessera.php">Tessera</a></li>
    <li><a href="ScansioneCodici.php">Scansiona codici</a></li>
    <li><a href="Carrello.php">Carrello</a></li>
  </ul>
</nav>
</header>

=======
<html>
  <head>
    <link rel="stylesheet" href="Stile.css">
  </head>
          <nav class="header">
            <ul>
              <li><a href="Catalogo.php">Catalogo</a></li>
              <li><a href="Cerca.php">Cerca</a></li>
              <li><a href="ScansioneCodice.php">Scansione Codice</a></li>
              <li><a href="Carrello.php">Carrello</a></li>
              <li><a href="Logout.php">Logout</a></li>
            </ul>
          </nav>
      <body>
>>>>>>> Stashed changes
<body>
  <p>
    <label>Nome: </label>
    <?php echo $nome; ?><br>
    <label>Cognome: </label>
    <?php echo $cognome; ?><br>
    <label>Punti: </label>
    <?php echo $punti; ?><br>
    <label>Codice tessera: </label>
    <?php echo $codiceTessera; ?><br>
  </p>
</body>
</html>
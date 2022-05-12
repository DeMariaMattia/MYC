<?php
require_once "Config.php";
session_start();
if (isset($_SESSION["ID_Cliente"])) {

  $nome = "";
  $cognome = "";
  $punti = "";
  $id_utente = $_SESSION['ID_Cliente'];

  $select_query = "SELECT utenti.Nome, utenti.Cognome, tessera.Punti, tessera.CodiceTessera, tessera.Saldo FROM utenti, tessera WHERE utenti.ID_Utente = tessera.ID_Utente AND utenti.ID_Utente = $id_utente";
  $result_select = mysqli_query($link, $select_query);
  $row = mysqli_fetch_array($result_select);

  $nome = $row['Nome'];
  $cognome = $row['Cognome'];
  $punti = $row['Punti'];
  $codiceTessera = $row['CodiceTessera'];
  $saldo = $row['Saldo'];
} else {
  header("Location:Login.php");
}
?>
<html>

<head>
  <title>Tessera</title>
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
      <label>Saldo tessera: </label>
      <?php echo $saldo; ?><br>
    <form action="ricaricaSaldo.php" method="POST">
      <input type="submit" value="Ricarica Saldo">
    </form>
    </p>
  </body>

</html>
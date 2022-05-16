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
  <link rel="stylesheet" href="StileTessera.css">
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
  <form action="ricaricaSaldo.php" method="POST">
    <div class="RicaricaForm">
    <div class="wrapper">
    <div class="product-img">
      <img src="Logo.png" height="360" width="345">
    </div>
    <div class="product-info">
      <div class="product-text">
        <h1>Intestatario: <?php echo"<br>".$cognome."&nbsp";echo$nome;?> </h1>
        <?php echo"<br><br>"?>
        <h2>Codice Tessera: <?php echo$codiceTessera?> </h2>
        <h2>Punti: <?php echo$punti?> </h2>
        <h2>Saldo: <?php echo$saldo?> </h2>
      </div>
    </div>
  </div>
  <br>
      <button type="submit">Ricarica Saldo</button>
      </div>
    </form>
  </body>
</html>

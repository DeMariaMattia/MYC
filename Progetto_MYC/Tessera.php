<?php
require_once "Config.php";
session_start();
if ($_SESSION['ID_Cliente'] != "") {

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
  echo '<script>alert("Devi aver fatto il login per accedere a questa pagina!")</script>';
  header("Location:Login.php");
}
?>

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
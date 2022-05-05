<?php session_start();?>
<html>

<head>
  <link rel="stylesheet" href="Stile.css">
</head>
<nav class="header">
  <ul>
    <li><a href="Catalogo.php">Catalogo</a></li>
    <li><a href="Cerca.php">Cerca</a></li>
    <li><a href="Tessera.php">Tessera</a></li>
    <li><a id="selected" href="ScansioneCodici.php">Scansiona codici</a></li>
    <li><a href="Carrello.php">Carrello</a></li>
    <?php
    if (isset($_SESSION["ID_Cliente"])) {
      echo "<li><a href=Logout.php>Logout</a></li>";
    } else {
      echo "<li><a href=Login.php>Login</a></li>";
      echo "<li><a href=Registrazione.php>Registrazione</a></li>";
    }
    ?>
  </ul>
</nav>

<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="text">
      <h2>Inserire codice prodotto</h2>
      <div class="search_wrap search_wrap_3">
        <div class="search_box">
          <input type="text" id="TxtStringa" name="TxtStringa" class="input" placeholder="Codice prodotto...">
          <h2>Inserire Quantita prodotto</h2>
        </div>
        <div class="search_wrap search_wrap_3">
          <div class="search_box">
            <input type="text" id="TxtQuantita" name="TxtQuantita" class="input" placeholder="Quantita prodotto...">
            <input type="submit" id="BtnStringa" name="BtnStringa" class="rosso">
          </div>
        </div>
  </form>
</body>

</html>
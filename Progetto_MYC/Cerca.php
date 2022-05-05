<?php session_start();?>
<link rel="stylesheet" href="Stile.css">
<nav class="header">
  <ul>
    <li><a href="Catalogo.php">Catalogo</a></li>
    <li><a id="selected" href="Cerca.php">Cerca</a></li>
    <li><a href="Tessera.php">Tessera</a></li>
    <li><a href="ScansioneCodici.php">Scansiona codici</a></li>
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
  <h2 class="text">Inserire codice prodotto da cercare</h2>
  <div class="search_wrap search_wrap_3">
    <div class="search_box">
      <form action="elaboraCerca.php" method="post">
        <input type="text" id="TxtStringa" name="TxtStringa" class="input" placeholder="Codice prodotto...">
        <input type="submit" id="BtnStringa" name="BtnStringa" class="rosso">
      </form>
    </div>
  </div>
</body>

</html>
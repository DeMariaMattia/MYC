<<<<<<< Updated upstream
<?php session_start(); ?>
<html>
<link rel="stylesheet" href="Stile.css">
<nav class="header">
  <ul>
    <li><a id="selected" href="Catalogo.php">Catalogo</a></li>
    <li><a href="Cerca.php">Cerca</a></li>
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
</body>

=======
<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<html>
  <link rel="stylesheet" href="Stile.css">
  <nav class="header">
    <ul>
      <li><a href="ScansioneCodice.php">Scansiona codici</a></li>
      <li><a href="Cerca.php">Cerca</a></li>
      <li><a href="Tessera.php">Tessera</a></li>
      <li><a href="Carrello.php">Carrello</a></li>
      <li><a href="Logout.php">Logout</a></li>
    </ul>
  </nav>
      <body>
      </body>
>>>>>>> Stashed changes
</html>
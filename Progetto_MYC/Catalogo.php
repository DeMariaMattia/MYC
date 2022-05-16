<?php
session_start();
if(!isset($_SESSION['ID_Cliente']))
header("location:Login.php");
?>
<html>
<<<<<<< HEAD
  <link rel="stylesheet" href="Stile2.css">
  <link rel="stylesheet" href="Stile.css">
  <script src="function.js"></script>
  <nav class="header">
    <ul>
            <li class="alignLI"><a href="Carrello.php">Carrello</a></li>
            <li class="alignLI"><a id="selected" href="Catalogo.php">Catalogo</a></li>
            <li class="alignLI"><a href="Cerca.php">Cerca</a></li>
            <li class="alignLI"><a href="ScansioneCodice.php">Scansiona codici</a></li>
            <li class="alignLI"><a href="Tessera.php">Tessera</a></li>
            <li class="alignLI"><a href="Logout.php">Logout</a></li>
    </ul>
=======

<head>
  <title>Catalogo</title>
  <link rel="stylesheet" href="Stile.css">
</head>
<nav class="header">
  <ul>
    <li class="alignLI"><a href="Carrello.php">Carrello</a></li>
    <li class="alignLI"><a id="selected" href="Catalogo.php">Catalogo</a></li>
    <li class="alignLI"><a href="Cerca.php">Cerca</a></li>
    <li class="alignLI"><a href="ScansioneCodice.php">Scansiona codici</a></li>
    <li class="alignLI"><a href="Tessera.php">Tessera</a></li>
    <li class="alignLI"><a href="Logout.php">Logout</a></li>
  </ul>
>>>>>>> b172e4ea956da49a82af1da2d0581e38ead5a7ee
</nav>
<body>
  <br>
  <div class="test">
  <div class="sidenav">
    <button onclick="prova()"class="dropdown-btn">Alimenti
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href=CarnePesce.html>Carne e Pesce</a>
      <a href=Dispensa.html>Dispensa</a>
      <a href=Snack.html>Snack</a>
    </div>
    <button onclick="prova()"class="dropdown-btn">Bevande
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href=AcquaBibite.html>Acqua e bibite</a>
      <a href=Alcolici.html>Alcolici</a>
      <a href=Vino.html>Vino</a>
    </div>
    <button onclick="prova()"class="dropdown-btn">Elettronica
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href=Informatica.html>Informatica</a>
      <a href=Telefonia.html>Telefonia</a>
        </div>
    <button onclick="prova()"class="dropdown-btn">Sport
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href=Bici.html>Bici</a>
      <a href=Calcio.html>Calcio</a>
    </div>
    <button onclick="prova()"class="dropdown-btn">Igiene
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a href=Casa.html>Cura della casa</a>
      <a href=Corpo.html>Cura del corpo</a>
    </div>
  </div>
</div>
</body>

</html>
<!DOCTYPE html>
<head>
  <title>Kategorija</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="with=device-width, initial-scale=1.0" />
  </style>
</head>
<body>
  <?php 
    include 'connect.php';
    define('UPLPATH', 'img/'); 
  ?>
  <div class="naslov">
    <h1> MOPO </h1>
    <p> HAMBURGER MORGENPOST </p>
  </div>
  <header>
    <nav class="navigacija">
      <div></div>
      <div><a href="index.php" class="navigacijaGumb">HOME</a></div>
      <div><a href="kategorija.php?id=putovanje" class="navigacijaGumb">REISE</a></div>
      <div><a href="kategorija.php?id=financije" class="navigacijaGumb">VERBRAUCHER</a></div>
      <div><a href="unos.php" class="navigacijaGumb">UNOS VIJESTI</a></div>
      <div><a href="administracija.php" class="navigacijaGumb">ADMINISTRACIJA</a></div>
      <div><a href="registracija.php" class="navigacijaGumb">REGISTRACIJA</a></div>
    </nav>
  </header>

  <main>
    <section class="main">
    <?php
        $kategorija=$_GET['id'];
        echo '<section class="putovanje">';
        if($kategorija == "putovanje") echo '<h2>REISE</h2>';
        if($kategorija == "financije") echo '<h2>VERBRAUCHER</h2>';
        echo '<hr><br>';
        echo '<div class="articles">';
        $query = "SELECT * FROM vijesti WHERE kategorija = '$kategorija'"; 
        $result = mysqli_query($dbc, $query); 
        $i=0; 
        while($row = mysqli_fetch_array($result)) { 
            echo '<article class="grupa">'; 
            echo'<div class="article">'; 
            echo '<div class="img">'; 
            echo '<img src="' . UPLPATH . $row['slika'] . '"';
            echo '</div>'; 
            echo '<div class="media_body">'; 
            echo '<h3>'; 
            echo '<a href="clanak.php?id='.$row['id'].'" class="clanak">'; 
            echo $row['naslov']; 
            echo '</a></h3>'; 
            echo '</div></div>'; 
            echo '</article>'; 
        }
        echo '</div>';
        echo '</section>';
    ?>
    </section>
    </main>
  <footer>
    <p>Copyright 2019 Morgenpost Verlag GmbH</p>
  </footer>
</body>
</html>
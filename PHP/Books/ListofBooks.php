<?php
require '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase;
$collection = $db->getListBook();
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../../CSS/ListofBooks.css">
  <link rel="stylesheet" href="../Font/fonts.css">

  <title>Buku</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <div class="logo">
        <a href="../Intro.php" title="Back to main menu">
          <p>Perpustakaan<br>Mantap</p>
        </a>
      </div>
      <!-- <a class="navbar-brand col-sm-2 text-monospace" href="#">Movieku</a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="ListofBooks.php">Buku</a>
          <a class="nav-item nav-link" href="../Visitors/Visitors.php">Pengunjung</a>
          <a class="nav-item nav-link" href="../Borrowers/Borrowers.php">Pinjaman</a>
          <a class="nav-item nav-link" href="../Publishers/Publishers.php">Penerbit</a>
        </div>
      </div>
    </div>
  </nav>

  <section>
    <div class="container">
      <?= Flasher::flash(); ?>
      <h1 class="text-center">List of Books</h1>
      <br><br>

      <a type="button" href="AddBooks.php?" class="btn btn-outline-primary">Add</a>
      <div class="clear"></div>
      <?php
      echo '<div class="bagian-card" style="color:black;">';
      foreach ($collection as $penerbit) {
        foreach ($penerbit->buku as $buku) {
      ?>
          <div class="card mt-2 mb-2" style="width: 20rem;float:left;margin-right:20px;height: 30rem;">
            <img class="card-img-top" src="data:jpeg;base64,<?= base64_encode($buku->img->getData()) ?>" alt="Card image cap" style="height: 15rem;">
            <div class="card-body">
          <?php
          echo '<h4 class="card-title card-color text-center">' . $buku->judul . '</h4>';
          echo '<p class="card-text text-center text-secondary">' . $buku->deskripsi . '</p>';
          echo '<p class="card-text text-secondary"> Kategori : <a href="BookByCategory.php?kategori=' . $buku->kategori . '"> ' . $buku->kategori . ' </a></p>';
          echo '<a type="button" href= "BooksDetail.php?isbn=' . $buku->isbn . '" class="btn btn-primary btn-block">Detail</a>';
          echo '</div>';
          echo '</div>';
        }
      }
          ?>
            </div>
          </div>
  </section>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>
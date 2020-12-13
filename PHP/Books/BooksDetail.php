<?php
require '../../Database/MongodbDatabase.php';

$db = new MongodbDatabase;
$isbn = $_GET['isbn'];
$publisher = $db->getDataBookByISBN($isbn);
$image = base64_encode($publisher[0]->buku[0]->img->getData());
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../../CSS/BooksDetail.css">
  <link rel="stylesheet" href="../../CSS/Navigation.css">
  <link rel="stylesheet" href="../Font/fonts.css">

  <title>Detail Buku</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <div class="logo">
        <a href="../Intro.php" title="Back to main menu">
          <p>Perpustakaan<br>Mantap</p>
        </a>
      </div>
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
  <div class="container">
    <div class="row justify-content-sm-center">
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="data:jpeg;base64,<?= $image ?>" class="img-thumbnail" alt="picture">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h2 class="card-title"><?= $publisher[0]->buku[0]->judul ?></h2>
              <h5><?= $publisher[0]->buku[0]->isbn ?></h5>
              <p class="card-text"><b>Kategori:</b><a href="BookByCategory.php?kategori=<?= $publisher[0]->buku[0]->kategori; ?>"> <?= $publisher[0]->buku[0]->kategori ?></a></p>
              <p class="card-text"><b>Penerbit:</b> <?= $publisher[0]->buku[0]->penerbit ?></p>
              <p class="card-text"><b>Tebal Halaman:</b> <?= $publisher[0]->buku[0]->tebal_buku ?></p>
              <?php if (isset($publisher[0]->buku[0]->deskripsi)) : ?>
                <p class="card-text"><b>Deskripsi:</b> <?= $publisher[0]->buku[0]->deskripsi ?></p>
              <?php endif; ?>
              <p class="card-text"><b>Alih bahasa:</b> <?= $publisher[0]->buku[0]->alih_bahasa ?></p>
              <?php if (count($publisher[0]->buku[0]->penulis) == 1) :  ?>
                <p class="card-text"><b>Penulis:</b> <?= $publisher[0]->buku[0]->penulis[0]; ?></p>
              <?php else : ?>
                <p class="card-text"><b>Penulis:</b></p>
                <ul>
                  <?php foreach ($publisher[0]->buku[0]->penulis as $writer) : ?>
                    <li><?= $writer ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
              <div class="row justify-content-center pt-2 pb-3">
                <a class="btn btn-outline-primary btn-sml mr-2" href="Read.php?isbn=<?= $publisher[0]->buku[0]->isbn ?>" role="button">Read</a>
                <a class="btn btn-outline-success btn-sml ml-2 mr-2" href="Edit.php?isbn=<?= $publisher[0]->buku[0]->isbn ?>" role="button">Edit</a>
                <form action="Delete.php" method="POST">
                  <input type="hidden" name="isbn" value="<?= $publisher[0]->buku[0]->isbn ?>">
                  <button type="submit" class="btn btn-outline-danger btn-sml ml-2">Delete</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>
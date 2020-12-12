<?php
require '../../Database/MongodbDatabase.php';

$db = new MongodbDatabase;
$isbn = $_GET['isbn'];
$penerbit = $db->getDataBookByISBN($isbn);

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
          <a class="nav-item nav-link" href="../Pengunjung/visitor.php">Pengunjung</a>
          <a class="nav-item nav-link" href="../Pinjaman/borrowes.php">Pinjaman</a>
        </div>
      </div>
    </div>
  </nav>

  <section>
    <div class="jumbotron jumbotron-fluid">
      <section id="cardmovie" class="cardmovie">
        <div class="container-fluid">
          <div class="row justify-content-sm-center">
            <div class="col-sm-4">
              <div class="card" style="width: 215.9px; height:279.4px;">
                <img src="data:jpeg;base64,<?= base64_encode($penerbit[0]->buku[0]->img->getData())
                                            ?>" class="img-thumbnail" alt="picture">
                <br>
              </div>
              <div class="col-sm-4 mt-1">
                <h5 style="color:white;">Genre : </h5>
                <p style="color:white;"> <?php echo $penerbit[0]->buku[0]->kategori ?> </p>
              </div>
            </div>

            <div class="col-sm-8 explain mt-sm-5">

              <h1> <?php echo $penerbit[0]->buku[0]->judul ?> </h1>

              <p>Rilis Buku</p>
            </div>
          </div>
        </div>
      </section>

      <section id="overview" class="overview">
        <div class="row justify-content-sm-center">
          <div class="col-5">
            <h1>Overview</h1>
            <p>
              <p> <?php echo $penerbit[0]->buku[0]->deskripsi ?> </p>
          </div>
          <div class="col-1"></div>
          <div class="col-3">
            <h1>Penulis</h1>
            <p></p>
            <?php
            foreach ($penerbit[0]->buku[0]->penulis as $penulis) {
              echo '<a style="color: white;">' . $penulis . '</a><br>';
            }
            ?>
          </div>
        </div>
      </section>

      <div class="row justify-content-center pt-5 pb-3">
        <a name="" id="" class="btn btn-outline-primary btn-lg mr-2" href="Read.php?isbn=<?php echo $penerbit[0]->buku[0]->isbn ?>" role="button">Read</a>
        <a name="" id="" class="btn btn-outline-success btn-lg ml-2 mr-2" href="Edit.php?isbn=<?php echo $penerbit[0]->buku[0]->isbn ?>" role="button">Edit</a>
        <a name="" id="" class="btn btn-outline-danger btn-lg ml-2" href="Delete.php?isbn=<?php echo $penerbit[0]->buku[0]->isbn ?>" role="button">Delete</a>
      </div>




    </div>
  </section>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>
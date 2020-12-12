<?php
require '../../Database/MongodbDatabase.php';

$db = new MongodbDatabase;
$kategori = $db->getCategory();
$collection = $db->getDataPenerbit();

if (isset($_POST['penerbit'])) {
    $hasil = $db->insertNewBook([
        'isbn' => $_POST['isbn'],
        'judul' => $_POST['judul'],
        'deskripsi' => $_POST['deskripsi'],
        'penulis' => $_POST['penulis'],
        'penulis2' => $_POST['penulis2'],
        'penulis3' => $_POST['penulis3'],
        'penerbit' => $_POST['penerbit'],
        'alih_bahasa' => $_POST['alih_bahasa'],
        'tebal_buku' => $_POST['tebal_buku'],
        'kategori' => $_POST['kategori'],
        'image' => $_FILES['image'],
        'pdf' => $_FILES['pdf']
    ]);
}
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

    <title>Add Buku</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="logo">
                <a href="../Intro.php" title="Back to main menu">
                    <p>Perpustakaan<br>Mantap</p>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation" >
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
        <div class="container">
            <form name="formCreate" action="AddBooks.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12 py-2">
                        <h5>Tambah Buku</h5>
                        <a type="button" href="AddPenerbit.php" class="btn btn-outline-primary">Tambah Penerbit</a>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="image">Image*</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="ISBN">ISBN*</label>
                        <input type="text" class="form-control" id="ISBN" name="isbn" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="Judul">Judul*</label>
                        <input type="text" class="form-control" id="Judul" name="judul" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="Deskripsi">Deskripsi</label>
                        <input type="text" class="form-control" id="Deskripsi" name="deskripsi">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="Translator">Alih Bahasa</label>
                        <input type="text" class="form-control" id="alih_bahasa" name="alih_bahasa">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="Tbl">Tebal Buku*</label>
                        <input type="number" class="form-control" id="tebal_buku" name="tebal_buku">
                    </div>

                    <div class="col-md-3 mb-3">
                        <label for="Kategori">Penerbit*</label>
                        <select class="custom-select" id="Penerbit" name="penerbit" required>
                            <?php

                            foreach ($collection as $penerbit) {
                                echo '<option>' . $penerbit->nama . '</option>';
                            }

                            ?>

                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="Kategori">Kategori*</label>
                        <input type="text" class="form-control" id="kategori" name="kategori">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="pdf">PDF*</label>
                        <input type="file" class="form-control" id="pdf" name="pdf" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="Penulis">Penulis 1*</label>
                        <input type="text" class="form-control" id="Penulis" name="penulis" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="Penulis2">Penulis 2</label>
                        <input type="text" class="form-control" id="Penulis2" name="penulis2">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="Penulis3">Penulis 3</label>
                        <input type="text" class="form-control" id="Penulis3" name="penulis3">
                    </div>
                </div>
                <center>
                    <button class="btn btn-primary" type="submit">Add</button>
                </center>
            </form>

        </div>
    </section>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>
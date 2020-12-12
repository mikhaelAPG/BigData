<?php
require '../../Database/MongodbDatabase.php';

$db = new MongodbDatabase;
if(isset($_POST['nama'])){
    $hasil = $db->insertPenerbit([
        'nama' => $_POST['nama'],
        'jalan' => $_POST['jalan'],
        'kode_pos' => $_POST['kode_pos'],
        'website' => $_POST['website'],
        'lokasi' => $_POST['lokasi'],
        'kota' => $_POST['kota'],
        'telepon' => $_POST['telp'],
        'email' => $_POST['email'],
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

    <title>Add Penerbit</title>
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
        <div class="container">
            <form name="formCreate" action="AddPenerbit.php" method="POST">
                <div class="row">
                    <div class="col-sm-12 py-2">
                        <h5>Tambah Penerbit</h5>
                    </div>
                    

                    <div class="col-md-6 mb-3">
                        <label for="nama">Nama*</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="jln">Jalan*</label>
                        <input type="text" class="form-control" id="jln" name="jalan" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kota">Kota*</label>
                        <input type="text" class="form-control" id="kota" name="kota" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="pos">Kode Pos</label>
                        <input type="number" class="form-control" id="pos" name="kode_pos">
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="telp">Telepon</label>
                        <input type="number" class="form-control" id="telp" name="telp">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="web">Website</label>
                        <input type="text" class="form-control" id="web" name="website">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" required>
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
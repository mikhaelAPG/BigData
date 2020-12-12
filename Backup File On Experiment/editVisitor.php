<?php
require '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase;
$pengunjung = $db->getDataVisitor($_GET['nik']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../CSS/ListofBooks.css">
    <link rel="stylesheet" href="../Font/fonts.css">

    <title>Pengunjung</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="logo">
                <a href="../Intro.html" title="Back to main menu">
                    <p>Perpustakaan<br>Mantap</p>
                </a>
            </div>
            <!-- <a class="navbar-brand col-sm-2 text-monospace" href="#">Movieku</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="../Books/ListofBooks.php">Buku</a>
                    <a class="nav-item nav-link active" href="visitor.php">Pengunjung</a>
                    <a class="nav-item nav-link" href="../Pinjaman/borrowes.php">Pinjaman</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row pt-5">
            <a type="button" href="detailVisitor.php?nik=<?= $pengunjung->NIK ?>" class="btn btn-outline-secondary">Back</a>
            <div class="col-12 pt-3">
                <h1 class="text-center mb-5">Edit Visitor Data</h1>
                <form class="w-50 ml-auto mr-auto" action="edit.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" class="form-control bg-dark text-white" name="nik_old" value="<?= $pengunjung->NIK ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Nama</label>
                        <input type="text" class="form-control bg-dark text-white" name="nama" value="<?= $pengunjung->nama ?>">
                    </div>
                    <fieldset style="border: 1px solid white; padding:10px;">
                    <legend style="font-size: 18px;">Alamat</legend>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jalan</label>
                            <input type="text" class="form-control bg-dark text-white" name="jalan" value="<?= $pengunjung->alamat->jalan; ?>">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kota</label>
                            <input type="text" class="form-control bg-dark text-white" name="kota" value="<?= $pengunjung->alamat->kota; ?>">
                        </div>
                        <?php if (isset($pengunjung->alamat->kode_pos)) : ?>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Kode Pos</label>
                                <input type="text" class="form-control bg-dark text-white" name="pos" value="<?= $pengunjung->alamat->kode_pos; ?>">
                            </div>
                        <?php endif; ?>
                    </fieldset>
                    <?php if (isset($pengunjung->alamat->kode_pos)) : ?>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">E-mail</label>
                            <input type="email" class="form-control bg-dark text-white" name="email" value="<?= $pengunjung->kontak->email; ?>">
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">No. Telp.</label>
                        <input type="text" class="form-control bg-dark text-white" name="telp" value="<?= $pengunjung->kontak->phone; ?>">
                    </div>
                    <?php if (isset($pengunjung->pekerjaan)) : ?>
                        <div class="form-group">
                            <label for="formGroupExampleInputTelp">Pekerjaan</label>
                            <input type="text" class="form-control bg-dark text-white" name="pekerjaan" value="<?= $pengunjung->pekerjaan; ?>">
                        </div>
                    <?php endif; ?>
                    <div class="text-center">
                        <button type='submit' name="update" class="btn btn-primary btn-lg w-100 mt-5 mb-4">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
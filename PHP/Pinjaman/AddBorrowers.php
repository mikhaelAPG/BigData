<?php
require '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase;
$pengunjung = $db->fetchDataVisitor();
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
                    <a class="nav-item nav-link" href="ListofBooks.php">Buku</a>
                    <a class="nav-item nav-link" href="../Pengunjung/visitor.php">Pengunjung</a>
                    <a class="nav-item nav-link active" href="../Pinjaman/borrowes.php">Pinjaman</a>
                    <a class="nav-item nav-link" href="../Publisher/publisher.php">Penerbit</a>
                </div>
            </div>
        </div>
    </nav>

    <section>
        <div class="container">
            <form name="formCreate" action="createBorrowers.php" method="POST">
                <div class="row">
                    <div class="col-sm-12 py-2">
                        <h3><b>Form Peminjaman</b></h3>
                    </div>
                    <div class="col-md-12 mb-3">
                        <!-- NIK Select dari db pengunjung -->
                        <label for="NIK">Peminjam</label>
                        <select class="custom-select" id="NIK" required name="nik">
                            <option selected disabled>--Pilih NIK--</option>
                            <?php foreach ($pengunjung as $p) : ?>
                                <option value="<?= $p->NIK ?>"><?= $p->nama ?>: <?= $p->NIK ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <!-- select judul buku dari db penerbit -->
                        <label for="JudulBuku">Judul Buku</label>
                        <select class="custom-select" id="JudulBuku" required name="judulbuku">
                            <option selected disabled value="">--Pilih Buku--</option>
                            <?php
                            foreach ($collection as $penerbit) {
                                foreach ($penerbit->buku as $buku) {
                                    echo "<option value='" . $buku->judul . "'>" . $buku->judul . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <!-- current date -->
                        <label for="TglPinjam">Tanggal Pinjam</label>
                        <input type="date" class="form-control" id="TglPinjam" required name="tanggalpinjam">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="TglBalik">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="TglBalik" required name="tanggalkembali">
                    </div>
                </div>

                <button class="btn btn-primary justify-content-end" style="float: right;margin-left: 20px" type="submit">Add</button>
                <a type="button" href="borrowes.php" style="float: right" class="btn btn-outline-warning">Back</a>
        </div>
        </form>

        </div>
    </section>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>
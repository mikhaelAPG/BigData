<?php
require '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase;
$publisher = $db->getDataPublisher($_GET['nama']);

$location = '';
$zip = '';
$website = '';
$telp = '';
if (isset($publisher->kontak->telepon)) {
    $telp = $publisher->kontak->telepon[0];
}

if (isset($publisher->kode_pos)) {
    $zip = $publisher->kode_pos;
}
if (isset($publisher->kontak->website)) {
    $website = $publisher->kontak->website;
}
if (isset($publisher->lokasi)) {
    $location = $publisher->lokasi;
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

    <title>Edit Penerbit</title>
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
                    <a class="nav-item nav-link" href="../Books/ListofBooks.php">Buku</a>
                    <a class="nav-item nav-link" href="../Visitors/Visitors.php">Pengunjung</a>
                    <a class="nav-item nav-link" href="../Borrowers/Borrowers.php">Pinjaman</a>
                    <a class="nav-item nav-link active" href="Publishers.php">Penerbit</a>
                </div>
            </div>
        </div>
    </nav>

    <section>
        <div class="container">
            <form name="formCreate" action="Edit.php" method="POST">
                <div class="row">
                    <div class="col-sm-12 py-2">
                        <h3><b>Edit Penerbit <?= $publisher->nama ?></b></h3>
                    </div>
                    <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $publisher->nama ?>" required>

                    <div class="col-md-6 mb-3">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?= $location ?>">
                    </div>

                    <div class=" col-md-6 mb-3">
                        <label for="jln">Jalan*</label>
                        <input type="text" class="form-control" id="jln" name="jalan" value="<?= $publisher->jalan ?>" required>
                    </div>

                    <div class=" col-md-6 mb-3">
                        <label for="kota">Kota*</label>
                        <input type="text" class="form-control" id="kota" name="kota" value="<?= $publisher->kota ?>" required>
                    </div>

                    <div class=" col-md-6 mb-3">
                        <label for="pos">Kode Pos</label>
                        <input type="number" class="form-control" id="pos" name="kode_pos" value="<?= $zip ?>">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= $publisher->kontak->email ?>" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="web">Website</label>
                        <input type="text" class="form-control" id="web" name="website" value="<?= $website ?>">
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="telp1">Telepon</label>
                        <input type="number" class="form-control" id="telp1" name="telp1" value="<?= $telp; ?>">
                    </div>
                    <?php
                    if (isset($publisher->kontak->telepon)) :
                        $i = 2;
                        foreach ($publisher->kontak->telepon as $phone) :
                    ?>
                            <div class=" col-md-6 mb-3">
                                <label for="telp<?= $i; ?>">Telepon <?= $i ?></label>
                                <input type="number" class="form-control" id="telp<?= $i; ?>" name="telp<?= $i; ?>" value="<?= $phone; ?>">
                            </div>
                    <?php $i++;
                        endforeach;
                    endif; ?>

                    <!-- <div class="col-md-6 mb-3">
                        <label for="telp2">Telepon 2</label>
                        <input type="number" class="form-control" id="telp2" name="telp2">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="telp3">Telepon 3</label>
                        <input type="number" class="form-control" id="telp3" name="telp3">
                    </div> -->
                </div>
                <button class="btn btn-primary" style="float: right;margin-left: 20px" type="submit">Edit</button>
            </form>

        </div>
    </section>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>

</html>
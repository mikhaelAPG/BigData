<?php
require '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase;
$pengunjung = $db->getDataVisitor($_GET['nik']);

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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

    <section>
        <div class="container">
            <div class="row pt-5">
                <div class="col-12 pt-3">
                    <h1 class="text-center">Detail Pengunjung</h1>
                    <br><br>
                </div>
                <a type="button" href="visitor.php" class="btn btn-outline-warning">Back</a>
                <div class="table-responsive">
                    <table class="table mt-3 mx-auto w-auto">
                        <tr>
                            <th scope="col">NIK</th>
                            <?php echo "<td>" . $pengunjung->NIK . "</td>"; ?>
                        </tr>
                        <tr>
                            <th scope="col">Name</th>
                            <?php echo "<td>" . $pengunjung->nama . "</td>"; ?>
                        </tr>
                        <tr>
                            <th scope="col">Address</th>

                            <td><ul id="data">
                        <?php
                        if (isset($pengunjung->alamat->jalan)) {
                            echo "<li>Jalan: " . $pengunjung->alamat->jalan . "</li>";
                        }
                        if (isset($pengunjung->alamat->kota)) {
                            echo "<li>Kota: " . $pengunjung->alamat->kota . "</li>";
                        }
                        if (isset($pengunjung->alamat->kode_pos)) {
                            echo "<li>Kode Pos: " . $pengunjung->alamat->kode_pos . "</li>";
                        }
                        echo "</ul></td>";
                        ?>
                        </tr>
                        <tr>
                            <th scope="col">Kontak</th>
                            <td><ul id="data">
                        <?php
                        if (isset($pengunjung->kontak->email)) {
                            echo "<li>Email: " . $pengunjung->kontak->email . "</li>";
                        }
                        if (isset($pengunjung->kontak->phone)) {
                            echo "<li>Phone: " . $pengunjung->kontak->phone . "</li>";
                        }
                        echo "</ul></td>";
                        ?>
                        </tr>
                        <?php if (isset($pengunjung->pekerjaan)) : ?>
                        <tr>
                            <th scope="col">Profession</th>
                            <td><?= $pengunjung->pekerjaan ?></td>
                        </tr>
                        <?php endif; ?>
                        <tr>
                            <td colspan="2">
                                <a href='delete.php?nik=<?= $pengunjung->NIK; ?>' style="float: right;margin-left: 20px"
                                    class='btn btn-danger ml-3'>Delete</a>
                                <a href='editVisitor.php?nik=<?= $pengunjung->NIK; ?>' style="float: right"
                                    class='btn btn-primary'>Edit</a>

                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <h2>Pinjaman</h2>
            <table class="table mt-3">
                <tr>
                    <th>Judul</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
                <?php
                    if (isset($pengunjung->pinjam)) :
                        foreach ($pengunjung->pinjam as $book) : ?>
                <!-- Ini daftar pinjama bisa banyak, di foreach. Cuman contoh datanya masih belum array, baru single objek -->
                <tr>
                    <td><?= $book->judul ?></td>
                    <td><?= $book->tanggal_pinjam ?></td>
                    <td><?= $book->tanggal_kembali ?></td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                <tr>
                    <th colspan="3">Belum ada Pinjaman Buku</th>
                </tr>
                <?php endif; ?>
            </table>

        </div>
    </section>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

</body>

</html>
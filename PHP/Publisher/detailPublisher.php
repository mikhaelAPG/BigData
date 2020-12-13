<?php
require '../../Database/MongodbDatabase.php';
$db = new MongodbDatabase;
$publisher = $db->getDataPublisher($_GET['nama']);

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

    <title>Publisher</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="logo">
                <a href="../Intro.html" title="Back to main menu">
                    <p>Perpustakaan<br>Mantap</p>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="../Books/ListofBooks.php">Buku</a>
                    <a class="nav-item nav-link" href="../Pengunjung/visitor.php">Pengunjung</a>
                    <a class="nav-item nav-link" href="../Pinjaman/borrowes.php">Pinjaman</a>
                    <a class="nav-item nav-link active" href="publisher.php">Publisher</a>
                </div>
            </div>
        </div>
    </nav>

    <section>
        <div class="container">
            <div class="row pt-5">
                <div class="col-12 pt-3">
                    <h1 class="text-center">Detail Penerbit</h1>
                    <br><br>
                </div>
                <table class="table mt-3">
                    <tr>
                        <th scope="col">Name</th>
                        <?php echo "<td>" . $publisher->nama . "</td>"; ?>
                    </tr>
                    <tr>
                        <th scope="col">Address</th>
                        <?php
                        echo "<td><ul>";
                        if (isset($publisher->lokasi)) {
                            echo $publisher->lokasi . ", ";
                        }
                        if (isset($publisher->jalan)) {
                            echo $publisher->jalan . ", ";
                        }
                        if (isset($publisher->kota)) {
                            echo $publisher->kota . " ";
                        }
                        if (isset($publisher->kode_pos)) {
                            echo $publisher->kode_pos;
                        };
                        echo "</ul></td>";
                        ?>
                    </tr>
                    <tr>
                        <th scope="col">Website</th>
                        <?php
                        echo "<td><ul>";
                        if (isset($publisher->kontak->website)) {
                            echo "<li>" . $publisher->kontak->website . "</li>";
                        }
                        echo "</ul></td>";
                        ?>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <a href='editVisitor.php?nik=<?= $publisher->nama; ?>' class='btn btn-primary'>Edit</a>
                            <a href='delete.php?nik=<?= $publisher->nama; ?>' class='btn btn-danger ml-3'>Delete</a><br>
                        </td>
                    </tr>
                </table>

                <h2>Buku Penerbit</h2>
                <table class="table mt-3 table-borderless">

                    <?php
                    $cursor = $db->findBook();
                    $i = 0;

                    if (isset($cursor)) :
                        foreach ($publisher->buku as $book) :
                            $i++;
                    ?>
                            <hr>
                            <tr>
                                <td><?= $i . ". " . $book->judul ?></td>
                            </tr>
                        <?php
                        endforeach;
                        ?>

                    <?php else : ?>
                        <tr>
                            <th colspan="3">Belum ada buku yang dirilis</th>
                        </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
    </section>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>
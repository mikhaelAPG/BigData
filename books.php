<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Perpustakaan MANTAP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="books.php">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="visitor.php">Visitors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="borrowers.php">Borrowers</a>
                </li>
            </ul>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="find a book">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
    </nav>
    <div class="container">
        <div class="row pt-5">
            <div class="col-12 pt-3">
                <h1 class="text-center">Books Data</h1>
            </div>
            <button type="button" class="btn btn-outline-secondary">Add</button>
            <table class="table mt-3">
                <thead>
                    <tr>
                        <th scope="col">ISBN</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Penulis</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mencari Cinta</td>
                        <td>Mark Otto</td>
                        <td>Vinz</td>
                        <td>Romance</td>
                        <td><button type="button" class="btn btn-primary btn-sm">Detail</button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Kisah Cinta</td>
                        <td>Jacob Thornton</td>
                        <td>CC</td>
                        <td>Romance</td>
                        <td><button type="button" class="btn btn-primary btn-sm">Detail</button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Arti Cinta</td>
                        <td>Larry Bird</td>
                        <td>Vins</td>
                        <td>Romance</td>
                        <td><button type="button" class="btn btn-primary btn-sm">Detail</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
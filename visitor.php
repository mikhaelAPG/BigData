<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Vin Journey</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Visitors</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
              </ul>
          </nav>
          <div class="container">
            <div class="row pt-5">
                <div class="col-12 pt-3">
                    <h1 class="text-center">Visitor List</h1>
                </div>
                <button type="button" class="btn btn-outline-secondary">Add</button>
                <table class="table mt-3">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Visitor Name</th>
                        <th scope="col">Detail</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>21/11/2020</td>
                        <td>19.08</td>
                        <td>Mark Otto</td>
                        <td><button type="button" class="btn btn-secondary btn-sm">Detail</button></td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>21/11/2020</td>
                        <td>19.09</td>
                        <td>Jacob Thornton</td>
                        <td><button type="button" class="btn btn-secondary btn-sm">Detail</button></td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>21/11/2020</td>
                        <td>19.10</td>
                        <td>Larry Bird</td>
                        <td><button type="button" class="btn btn-secondary btn-sm">Detail</button></td>
                      </tr>
                    </tbody>
                  </table>
            </div>
          </div>
	</body>
</html>
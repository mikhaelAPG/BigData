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
              <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="find a book">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
          </nav>

          <div class="container">
            <div class="col-12 pt-4">
                <h1 class="text-center">Books</h1>
            </div>
                <div class="row justify-content-center">
                    <div class="col-md-4 pt-5">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="images/hush.jpg" alt="Card image cap" height="300px">
                            <div class="card-body">
                                <h4 class="font-weight-bold">Hush</h4>
                                <p class="card-text text-muted">Rubin Naiman PhD</p>
                                <a style="color:#9B51E0;text-decoration:none;color:blue" href="#">Detail</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-4 pt-5">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="images/memory.jpg" alt="Card image cap" height="300px">
                            <div class="card-body">
                                <h4 class="font-weight-bold">Memory</h4>
                                <p class="card-text text-muted">Angelina Aludd</p>
                                <a style="color:#9B51E0;text-decoration:none;color:blue" href="#">Detail</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-4 pt-5">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="images/no_place_like_here.jpg" alt="Card image cap" height="300px">
                            <div class="card-body">
                                <h4 class="font-weight-bold">No Place Right Here</h4>
                                <p class="card-text text-muted">Christina June</p>
                                <a style="color:#9B51E0;text-decoration:none;color:blue" href="#">Detail</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-4 pt-5">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="images/sugar_run.jpg" alt="Card image cap" height="300px">
                            <div class="card-body">
                                <h4 class="font-weight-bold">Sugar Run</h4>
                                <p class="card-text text-muted">Mesha Maren</p>
                                <a style="color:#9B51E0;text-decoration:none;color:blue" href="#">Detail</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-4 pt-5">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="images/the_hobbit.jpg" alt="Card image cap" height="300px">
                            <div class="card-body">
                                <h4 class="font-weight-bold">The Hobbit</h4>
                                <p class="card-text text-muted">J.R.R. Tolkien</p>
                                <a style="color:#9B51E0;text-decoration:none;color:blue" href="#">Detail</a>
                            </div>
                          </div>
                    </div>
                    <div class="col-md-4 pt-5">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="images/the_martian.jpg" alt="Card image cap" height="300px">
                            <div class="card-body">
                                <h4 class="font-weight-bold">The Martian</h4>
                                <p class="card-text text-muted">Andy Weir</p>
                                <a style="color:#9B51E0;text-decoration:none;color:blue" href="#">Detail</a>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="row justify-content-center pt-5 pb-3">
                    <a name="" id="" class="btn btn-outline-primary btn-lg w-25" href="#" role="button">Show more</a>
                </div>
        </div> 
    </body>
</html>
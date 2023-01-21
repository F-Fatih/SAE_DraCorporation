<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Pour importer le CSS de Bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  
  <!-- Pour importer les icons de Bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">  

  <!-- Pour importer le JS de Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  
  <!-- Pour importer le CSS custom-->
  <link href="style.css" rel="stylesheet">
  <title>Dracorporation</title>
</head>

<body>
  <header> <!-- Navbar-->
    <nav class="navbar navbar-expand-lg degrade">
      <div class="container-fluid">
      <img src="\SAE\img\dracorporation.png" class='logo-navbar' alt='dracorporation-logo'/>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"aria-expanded="false">Algorithmes </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Films ou personnes en commun</a></li>
                <li><a class="dropdown-item" href="#">Rapprochement de films</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control length-search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
          </form>
          <button class="btn btn-outline-light margin-moon" type=""><i class="bi bi-moon-fill"></i></button>
          <button class="btn btn-outline-light margin-switch" type="">EN</button>
        </div>
      </div>
    </nav>
  </header>

  <div id="carouselExampleCaptions" class="carousel slide hstack gap-3 container" data-bs-ride="false">
    <div class="carousel-inner w-50">
      <div class="carousel-item active">
        <img src="https://www.premiere.fr/sites/default/files/styles/scale_crop_1280x720/public/2020-05/the%20last%20of%20us.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>THE LAST OF US</h5>
          <p>Voir plus ></p>
        </div>
      </div>
      <div class="carousel-item w-50">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item w-50">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
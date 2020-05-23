<link rel="stylesheet" type="text/css" href="CSS/navbar2.css">
<link rel="stylesheet" href="fontawesome/css/all.css">

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <a class="nav-link navbar-brand active" href="homepage.php"><img src="Images/logo.png" width="120px"></a>    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
             <li class="nav-item">
                <a class="nav-link" href="homepage.php">Consigliati per te</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="homepage.php#allMovies">Tutti i film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="lista.php">La mia lista</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Account
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item impostazioni-nav" href="#">Impostazioni</a>
                    <div class="dropdown-divider">
                    </div>
                    <a class="dropdown-item exit-nav" href="logout.php">Esci</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="POST" action="search_result.php">
        <input  name="title" type="search" class="form-control mr-sm-2 search"  placeholder="Cerca per titolo o regista">
        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" ><i class="fas fa-search"></i></button>
        </form>
    </div>
</nav>

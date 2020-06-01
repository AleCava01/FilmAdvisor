
<?php
session_start();
if(isset($_SESSION['id_u'])){
    header("location: homepage.php");
}
else{
    echo("
    <link rel='stylesheet' type='text/css' href='CSS/navbar2.css'>
    <link rel='stylesheet' href='fontawesome/css/all.css'>
    
    <nav class='navbar navbar-expand-lg navbar-dark sticky-top' >
        <a class='nav-link navbar-brand active' href='homepage.php'><img src='Images/logo.png' width='120px'></a>    
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
    
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='navbar-nav mr-auto'>
                <li class='nav-item'>
                    <a class='nav-link' href='catalogo.php'>Catalogo</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='login.html'>Accedi</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href='register.html'>Registrati</a>
                </li>
                
            </ul>
        
            <form class='form-inline my-2 my-lg-0' method='POST' action='search_result.php'>
            <input  name='title' type='search' class='form-control mr-sm-2 search'  placeholder='Cerca per titolo o regista'>
            <button class='btn btn-outline-secondary my-2 my-sm-0' type='submit' ><i class='fas fa-search'></i></button>
            </form>
        </div>
    </nav>
    ");
}

?>
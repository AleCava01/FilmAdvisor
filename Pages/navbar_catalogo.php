
<?php
session_start();
if(isset($_SESSION['id_u'])){
    header("location: homepage.php");
}
else{
    echo("
    <link rel='stylesheet' type='text/css' href='CSS/navbar2.css'>
    <link rel='stylesheet' href='fontawesome/css/all.css'>
    <style> 
        .navbar-nav.navbar-center { 
            position: absolute; 
            left: 50%; 
            transform: translatex(-50%); 
        } 
    </style> 
    <nav class='navbar navbar-expand-lg navbar-dark sticky-top' >
        <a class='nav-link navbar-brand active' href='welcome.html'><i class='fas fa-arrow-left'></i></a>    
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
    
        <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <ul class='nav navbar-nav navbar-center'>
                <li class='nav-item'>
                    <a class='nav-link active'>Catalogo</a>
                </li>                
            </ul>
        </div>
    </nav>
    ");
}

?>
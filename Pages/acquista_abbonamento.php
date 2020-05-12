<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/acquista_abbonamento.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="CSS/navbar2.css">
        <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="icon" href="Images/icon.png">


    </head>
    <body style="background-color: rgb(8, 8, 8);">
        <div class="container-fluid">
            <?php
                include "DBsettings.php";
                include "logcontrol.php";
            ?>
            <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="#" onclick="history.back();return false;" class="nav-link active"><i class="fas fa-times"></i></a>
                        </li>
                    </ul>
            </nav>
            <div class='title'>
                <h2 class="page-title">Scegli l'abbonamento che fa per te!</h2>
            </div>
            <div class="container d-flex justify-content-center">
                <div class="row">
                    <div class="col-md-4">
                    <a data-toggle='modal' data-target='#pagamento' onclick="month();" href='#'>
                            <div class="month sub-title sub-container">
                                <div class="sub-container" style="height:100%; width:100%">
                                    <div class="sub-inner-center">
                                        <h6 class="sub_months">1 Mese</h6>
                                    </div>
                                </div>
                                <div class="sub-inner-bottom">
                                    <hr class="separator-hr" style="border-top: 1px solid white; width:90%;">
                                    <h6 class="price">7,99€</h6>
                                </div>
                            </div>     
                        </a>       
                    </div>
                    <div class="col-md-4">
                        <a data-toggle='modal' data-target='#pagamento' onclick="quarter();" href='#'>
                            <div class="quarter sub-title sub-container">
                                <div class="sub-container" style="height:100%">
                                    <div class="sub-inner-center">
                                        <h6 class="sub_months">3 Mesi</h6>
                                    </div>
                                </div>
                                <div class="sub-inner-bottom">
                                    <hr class="separator-hr" style="border-top: 1px solid white;width:90%;">
                                    <h6 class="price">19,99€</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="col-md-4">
                    <a data-toggle='modal' data-target='#pagamento' onclick="year();" href='#'>
                            <div class="year sub-title sub-container">
                                <div class="sub-container" style="height:100%">
                                    <div class="sub-inner-center">
                                        <h6 class="sub_months">12 Mesi</h6>
                                    </div>
                                </div>
                                <div class="sub-inner-bottom">
                                    <hr class="separator-hr" style="border-top: 1px solid white;width:90%;">
                                    <h6 class="price">49,99€</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <?php
            include "pagamento.php";
            ?>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
        </div>
    </body>
</html>
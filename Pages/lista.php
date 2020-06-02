<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/lista.css">
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="fontawesome/css/all.css">

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="icon" href="Images/icon.png">
        <style>
            .checked{
                color:orange;
            }
        </style>

    </head>
    <body style="background-color:rgb(8, 8, 8)">
        <?php
        include "DBsettings.php";
        include "navbar_list.php";
        include "logcontrol.php";

        $id_u = $_SESSION["id_u"];
        ?>
        <div class="container-fluid" style="margin:0">
            <br>
            <h4 class="h5-title">La mia lista</h4>
            <div class="wrapper">
            <?php
            $movies = $conn -> query("SELECT f.id_f, f.locandina FROM film AS f, lista AS l WHERE f.id_f=l.id_f AND l.id_u=".$id_u.";");
            $film = mysqli_fetch_assoc($movies);
            while($film){
                echo("
                <div class='locandina_div'>
                    <div style='display:block;'>
                        <a href='"."video_buffer.php?id_f=".$film["id_f"]."'>
                            <img class='locandina_img' src='".$film["locandina"]."'>
                        </a>
                        <div class='valutazione_div'>
                        ");
                        $rating=mysqli_fetch_assoc($conn -> query("SELECT valutazione FROM feedback WHERE id_u=".$id_u." AND id_f=".$film["id_f"]))["valutazione"];
                        if($rating==1){
                            echo("
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star'></span>
                            <span class='fas fa-star'></span>
                            <span class='fas fa-star'></span>
                            <span class='fas fa-star'></span>"
                            );
                        }
                        if($rating==2){
                            echo("
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star'></span>
                            <span class='fas fa-star'></span>
                            <span class='fas fa-star'></span>"
                            );
                        }
                        if($rating==3){
                            echo("
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star'></span>
                            <span class='fas fa-star'></span>"
                            );
                        }
                        if($rating==4){
                            echo("
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star'></span>"
                            );
                        }
                        if($rating==5){
                            echo("
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>
                            <span class='fas fa-star checked'></span>"
                            );
                        }
                    echo("
                        </div>
                    </div>
                </div>"
            );
                $film = mysqli_fetch_assoc($movies);
            }
            ?>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
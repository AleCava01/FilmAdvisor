<?php
include "DBsettings.php";
include "logcontrol.php";

$id_f = $_GET["id_f"];
$id_u = $_SESSION["id_u"];

if((mysqli_fetch_assoc($conn->query("SELECT EXISTS(SELECT * FROM lista WHERE id_u=".$id_u." AND id_f=".$id_f.") as x;")))["x"]==0){
    mysqli_query($conn, "INSERT INTO lista(id_u, id_f) VALUES (".$id_u.",".$id_f.");");
}


$filmpath = mysqli_fetch_assoc($conn->query("SELECT URI from film where id_f = ".$id_f.";"))["URI"];
session_write_close();
?>
</div>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="CSS/navbar2.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link rel="icon" href="Images/icon.png">
    <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <link href="https://unpkg.com/video.js@7/dist/video-js.min.css"rel="stylesheet"/>
    <style>
        *{overflow:hidden;outline:none;}
        nav{
            background-color:black;
        }
        body{
            background-color:black;
        }
        .rate-div{
            background-color :red;
            position:absolute;
            top:0;
            left:0;
            right:0;
            bottom:0;
            height:100%;
            width:100%;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a href="#" onclick="history.back();return false;" class="nav-link active"><i class="fas fa-arrow-left"></i></a>
            </li>
        </ul>
        <a class="nav-link navbar-brand active mr-auto" href="homepage.php"><img src="Images/logo.png" width="120px"></a>   
    </nav>
    <div class="rate-div" id="rate-div">
    <video
        id="my-video"
        class="video-js vjs-theme-city"
        controls
        preload="auto"
        width="2560"
        height="1300"
        poster=""
        data-setup="{}"
    >
    <?php 
    echo("<source src='".$filmpath."' type='video/mp4'/>");
    echo("<source src='".$filmpath."' type='video/webm'/>");
    ?>
        <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a
        web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video>
    </div>
    <script src="https://vjs.zencdn.net/7.7.6/video.js"></script>
    <script src="node_modules/videojs-hls-quality-selector/dist/videojs-hls-quality-selector.min.js"></script>
    <script>
    document.getElementById("my-video").setAttribute('width',document.documentElement.clientWidth);
    document.getElementById("my-video").setAttribute('height',document.documentElement.clientHeight-60);	
    var player= videojs('#my-video');
    player.autoplay(true);
    var ended = player.ended();
 
    player.ready(function(){
        this.on("ended", function(){  

        document.getElementById("my-video").style.setProperty("display", "none", "important");

        });
    });      
    </script> 
</body>


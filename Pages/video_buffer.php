<?php
include "DBsettings.php";
include "logcontrol.php";

$id_f = $_GET["id_f"];
echo("<script>var id_f = ".$id_f.";</script>");
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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

    <link rel="icon" href="Images/icon.png">
    <link href="https://vjs.zencdn.net/7.7.6/video-js.css" rel="stylesheet" />
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <link href="https://unpkg.com/video.js@7/dist/video-js.min.css"rel="stylesheet"/>

    <style>
        .back{
            align:center;
            margin-top:80px;
        }
       video{
           
           outline:none;
       }
        body{
            background-color:black;
        }
        .vjs-control-bar{
            color:white;
        }
        .rate-div-wrapper{
            position:relative;
            height:70%;
            width:100%;
            display:none;
        }
        .rate-div{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        .title{
            text-align:center;
            color:rgb(255,255,255,0.8);
        }
        /*---------------------------------------------*/
    </style>
    <style>
        .rating {
        margin: -20 ;
        width: 400px;
        }
        .rating > * {
        float: right;
        }
        @keyframes pulse {
        50% {
            color: #5e5e5e;
            text-shadow: 0 0 15px #777;
        }
        }
        .rating label {
        height: 40px;
        width: 20%;
        display: block;
        position: relative;
        cursor: pointer;
        }
        .rating label:nth-of-type(5):after {
        animation-delay: 0.25s;
        }
        .rating label:nth-of-type(4):after {
        animation-delay: 0.2s;
        }
        .rating label:nth-of-type(3):after {
        animation-delay: 0.15s;
        }
        .rating label:nth-of-type(2):after {
        animation-delay: 0.1s;
        }
        .rating label:nth-of-type(1):after {
        animation-delay: 0.05s;
        }
        .rating label:after {
        transition: all 0.4s ease-out;
        -webkit-font-smoothing: antialiased;
        position: absolute;
        content: "☆";
        color: #444;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        text-align: center;
        font-size: 80px;
        animation: 1s pulse ease;
        }
        .rating label:hover:after {
        color: #5e5e5e;
        text-shadow: 0 0 15px #5e5e5e;
        }
        .rating input {
        display: none;
        }
        .rating input:checked + label:after, .rating input:checked ~ label:after {
        content: "★";
        color: #F9BF3B;
        text-shadow: 0 0 20px #F9BF3B;
        }
        body {
        background-color: #111;
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
    <div class="rate-div-wrapper" id="rate-div-wrapper">
        <div class="rate-div"id="rate-div">
            <h1 class="title">Valuta il film</h1>
            <div class="rating" id="rating-div-stars">

                <input type="radio" name="rating" id="r1" value="5">
                <label for="r1"></label>

                <input type="radio" name="rating" id="r2" value="4">
                <label for="r2"></label>

                <input type="radio" name="rating" id="r3" value="3">
                <label for="r3"></label>

                <input type="radio" name="rating" id="r4" value="2">
                <label for="r4"></label>

                <input type="radio" name="rating" id="r5" value="1">
                <label for="r5"></label>

            </div>
            <div style="text-align:center;">
            <a href="homepage.php" class="btn btn-primary back">Torna a FilmAdvisor</a>
            </div>
        </div>
    </div>
    </div>
    <video
        id="my-video"
        class="video-js"
        controls
        preload="auto"
        width="1920"
        height="1080"
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="https://vjs.zencdn.net/7.7.6/video.js"></script>

    <script>
    document.getElementById("my-video").setAttribute('width',document.documentElement.clientWidth-2);
    document.getElementById("my-video").setAttribute('height',document.documentElement.clientHeight-56);	
    var options = {
        controlBar: {
            volumePanel: {
                
            }
        },
    };
    var player= videojs('#my-video',options);
    player.autoplay(true);
   

    player.ready(function(){
        this.on("ended", function(){  

            document.getElementById("my-video").style.setProperty("display", "none", "important");
            document.getElementById("rate-div-wrapper").style.setProperty("display", "block", "important");

        });

    });      

    $("input").click(function(){
        var rate=$("input:radio[name=rating]:checked").val();
        if(rate>=0 && rate<=5){
            sendVal(rate);
        }
    })

    function sendVal(val){
        $.ajax({
            url: 'rating_script.php',
            type: 'POST',
            data: {
                rate: val,
                film: id_f 
            }
        });
    }
    </script> 
</body>


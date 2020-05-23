<?php
$id_f=$_POST["id_f"];
include "DBsettings.php";

$trailer = mysqli_fetch_assoc($conn -> query("SELECT trailer_URI FROM film WHERE id_f = ".$id_f))["trailer_URI"];
   echo("<video
   id='my-video'
   class='video-js vjs-theme-city'
   controls
   preload='auto'
   poster='Images/trailer.png'
   data-setup='{}'
   fluid='true'
   
   >
   <source src='".$trailer."' type='video/mp4' />
   <p class='vjs-no-js'>
     To view this video please enable JavaScript, and consider upgrading to a
     web browser that
     <a href='https://videojs.com/html5-video-support/' target='_blank'
       >supports HTML5 video</a
     >
   </p>
 </video>");




?>
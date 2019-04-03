<?php

// Source
$video_src = "./video.mp4";
$format = "538x300";

// Commande
$cmd = "/usr/local/bin/ffmpeg -y -i $video_src -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss 2 './flipbook.jpg'";


// Résultat
echo $cmd;

$result = exec( $cmd, $output);

// Affichage d'autres informations
print_r ($output);

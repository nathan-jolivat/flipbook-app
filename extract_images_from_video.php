<?php

// Source
$video_src = "./video.mp4";


// Commande
$cmd = "/usr/local/bin/ffmpeg -i $video_src -vcodec mjpeg -vframes 1 -an -f rawvideo -s 640x360 -ss 10 './flipbook.jpg'";


// Résultat
echo $cmd;

$result = exec( $cmd, $output);

// Affichage d'autres informations
print_r ($output);

<?php

// Source
$video_src = "./video.mp4";
$format = "538x300";

// Commande pour connaître la durée
$cmd_duration = "/usr/local/bin/ffprobe -v error -show_entries format=duration \
  -of default=noprint_wrappers=1:nokey=1 $video_src";


$duree = exec( $cmd_duration );

echo "La vidéo dure: " . $duree;


// Commande
$cmd = "/usr/local/bin/ffmpeg -y -i $video_src -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss 2 './flipbook.jpg'";

// Résultat
$result = exec( $cmd, $output);


// La boucle
$timing = $duree / 30;
$cpt = 1;

for ( $i = 0; $i < $duree ; $i+=$timing)
{
	$cmd = "/usr/local/bin/ffmpeg -y -i $video_src -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss $i './flipbook_$cpt.jpg'";


	$result = exec ( $cmd );

	echo '<img src="./flipbook_$cpt.jpg">';
	echo "<br/>";

	$cpt++;
}

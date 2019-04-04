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

define ( 'FFPROBE', 'c:\laragon\www\flipbook-app\ffmpeg\bin\ffprobe.exe');
define ( 'FFMPEG', 'c:\laragon\www\flipbook-app\ffmpeg\bin\ffmpeg.exe');
function extractFlips ( $videoSrc, $format = "538x300" )
{
    $videoSrc = realpath($videoSrc);

    // Commande pour connaître la durée
    $cmd_duration = FFPROBE . " -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 $videoSrc 2>&1";
    // Exécution
    $duree = exec( $cmd_duration , $output);

    //echo "La vidéo dure: " . $duree;
    // Commande
    //$cmd = FFMPEG . " -y -i $videosrc -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss 2 './flipbook.jpg'";
    // Dossier de la video source
    $videoSrcDir = dirname( $videoSrc );
    // La boucle
    $timing = floatval($duree) / 30;
    $cpt = 1;

    for ( $i = 0; $i < $duree ; $i+=$timing)
    {
        $cmd = FFMPEG . " -y -i $videoSrc -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss $i $videoSrcDir\flipbook$cpt.jpg 2>&1";

        echo $cmd;
        $result = exec ( $cmd, $output );
        $cpt++;
    }
}

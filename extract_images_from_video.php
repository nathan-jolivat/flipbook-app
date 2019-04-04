<?php
define ( 'FFPROBE', 'c:\\laragon\\www\\cesi\\flipbook-app\\ffmpeg\\bin\\ffprobe.exe');
define ( 'FFMPEG', 'c:\\laragon\\www\\cesi\\flipbook-app\\ffmpeg\\bin\\ffmpeg.exe');

function extractFlips ( $videoSrc, $format = "538x300" )
{
    $videoSrc = realpath($videoSrc);

    // Commande pour connaître la durée
    $cmd_duration = FFPROBE . " -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 $videoSrc 2>&1";
    // Exécution
    $duree = exec( $cmd_duration , $output);

    // echo "La vidéo dure: " . $duree;

    // Dossier de la video source
    $videoSrcDir = dirname( $videoSrc );

    // La boucle
    $timing = floatval($duree) / 60;
    $cpt = 1;

    for ( $i = 0; $i < $duree ; $i+=$timing)
    {
        $cmd = FFMPEG . " -y -i $videoSrc -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss $i $videoSrcDir\\flipbook$cpt.jpg 2>&1";

        // echo $cmd;
        $result = exec ( $cmd, $output );
        $cpt++;
    }
}
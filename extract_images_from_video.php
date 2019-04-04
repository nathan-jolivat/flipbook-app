<?php

define ( 'FFPROBE', 'c:\\laragon\\www\\flipbook-app\\ffmpeg\\bin\\ffprobe.exe');
define ( 'FFMPEG', 'c:\\laragon\\www\\flipbook-app\\ffmpeg\\bin\\ffmpeg.exe');

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
        $cmd = FFMPEG . " -y -i $videoSrc -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss $i $videoSrcDir\\flipbook$cpt.jpg 2>&1";

        //echo $cmd;
        $result = exec ( $cmd, $output );
        $cpt++;
    }
    // Bonus
    // On crée une dernière image pour le titre
    //On importe l'image a laquelle nous allons ajouter le texte
    $img = imagecreatefromjpeg( $videoSrcDir . DIRECTORY_SEPARATOR . "flipbook_1.jpg" );
    //On prepare la couleur, en RGB
    $white = imagecolorallocate($img, 255, 255, 255);
    // Chemin vers notre fichier de police ttf
    $font_file = './includes/fonts/police.otf';

    //On ajoute le texte a l'aide de la fonction imagettftext
    imagefttext($img, 60, 0, 105, 80, $white, $font_file, 'Benji FlipBook');

    // On enregistre l'image
    imagejpeg($img, $videoSrcDir . DIRECTORY_SEPARATOR . "flipbook_title.jpg");
}
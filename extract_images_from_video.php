<?php

define ( 'FFPROBE', '/usr/local/bin/ffprobe');
// Windows
// Attention aux doubles Slashes et au dossier contenant le programme ffprobe.exe
//define ( 'FFPROBE', 'c:\\laragon\\www\\flipbook-app\\ffmpeg\\bin\\ffprobe.exe');

define ( 'FFMPEG', '/usr/local/bin/ffmpeg');
// Windows
// Attention aux doubles Slashes et au dossier contenant le programme ffmpeg
// define ( 'FFMPEG', 'c:\\laragon\\www\\flipbook-app\\ffmpeg\\bin\\ffmpeg.exe');

// Le nombre de vignettes qui sera généré
define ( 'NB_FLIPS', 30 );


function extractFlips ( $videoSrc, $format = "538x300" )
{
	// On récupère d'abord le chemin absolu du fichier video
	$videoSrc = realpath($videoSrc);

	// Commande pour connaître la durée
	// On ajoute 2>&1 à la fin afin de récupérer la sortier erreur si on a besoin de debugger
	$cmd_duration = FFPROBE . " -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 $videoSrc 2>&1";

	// Exécution
	$duree = exec( $cmd_duration, $output );

	// DEBUG
	// var_dump ( $output );

    // Dossier de la video source
	$videoSrcDir = dirname( $videoSrc );

	// Pour déterminer les intervalles entre chaque vignettes
	$timing = floatval( $duree ) / NB_FLIPS;

	// Initialisation du compteur nécessaire à la pagination du PDF
	$cpt = 1;

	// La boucle
	for ( $i = 0; $i < $duree ; $i+=$timing)
	{
		// Commande pour extraire une vignette à un instant $i
		// On ajoute 2>&1 à la fin afin de récupérer la sortier erreur si on a besoin de debugger
		$cmd = FFMPEG . " -y -i $videoSrc -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss $i '" . $videoSrcDir . DIRECTORY_SEPARATOR . "flipbook_$cpt.jpg' 2>&1";

		// La commande de génération d'une vignette est appelée
		$result = exec ( $cmd, $output );

		// DEBUG
		// var_dump ( $output );
		// var_dump ( $result );
		// var_dump ( $ cmd );

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
		imagefttext($img, 60, 0, 105, 80, $white, $font_file, 'Folioscope');

		// On enregistre l'image
		imagejpeg($img, $videoSrcDir . DIRECTORY_SEPARATOR . "flipbook_title.jpg");
}
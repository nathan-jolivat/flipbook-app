<?php

define ( 'FFPROBE', '/usr/local/bin/ffprobe');
define ( 'FFMPEG', '/usr/local/bin/ffmpeg');

function extractFlips ( $videoSrc, $format = "538x300" )
{
	// Commande pour connaître la durée
	$cmd_duration = FFPROBE . " -v error -show_entries format=duration -of default=noprint_wrappers=1:nokey=1 $videoSrc";

	// Exécution
	$duree = exec( $cmd_duration );
	echo "La vidéo dure: " . $duree;

	// Commande
	//$cmd = FFMPEG . " -y -i $video_src -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss 2 './flipbook.jpg'";

	// Dossier de la video source
	$videoSrcDir = dirname( $videoSrc );

	// La boucle
	$timing = $duree / 30;
	$cpt = 1;

	for ( $i = 0; $i < $duree ; $i+=$timing)
	{
		$cmd = FFMPEG . " -y -i $videoSrc -vcodec mjpeg -vframes 1 -an -f rawvideo -s $format -ss $i '$videoSrcDir/flipbook_$cpt.jpg'";

		$result = exec ( $cmd );

		echo '<img src="./flipbook_' . $cpt . '.jpg">';
		echo "<br/>";

		$cpt++;
	}

}
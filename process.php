<?php
//var_dump($_FILES["video"]["name"]);

$var = "exec ( 'c:\\laragon\\www\\flipbook-app\\ffmpeg\\ffmpeg.exe' );";


exec ('C:\\laragon\\bin\\php\\php-7.2.11-Win32-VC15-x64\\php.exe -r "' . $var . '"', $output);

var_dump($output);

echo 'C:\\laragon\\bin\\php\\php-7.2.11-Win32-VC15-x64\\php.exe -r "' . $var;


exec ('C:\laragon\bin\php\php-7.2.11-Win32-VC15-x64/php.exe -v', $output2);

var_dump($output2);
echo "ttt";

exec ( 'c:\\laragon\\www\\flipbook-app\\ffmpeg\\ffmpeg.exe', $output3 );

var_dump($output3);
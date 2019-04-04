<?php

echo exec ('c:\\laragon\\www\\flipbook-app\\ffmpeg\\bin\\ffmpeg.exe -version 2>&1', $output, $value);

var_dump ($output);
var_dump($value);
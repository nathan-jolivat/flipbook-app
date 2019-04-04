<?php

require_once ("extract_images_from_video.php");
require_once ("generation_flipbook.php");

$title_upload = $_POST['titre'];

$tmp_name = $_FILES['video'] ['tmp_name'];
$name = $_FILES['video']['name'];


// Slugify a string
function slugify($text)
{
    // Strip html tags
    $text=strip_tags($text);
    // Replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // Transliterate
    setlocale(LC_ALL, 'en_US.utf8');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Trim
    $text = trim($text, '-');
    // Remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // Lowercase
    $text = strtolower($text);
    // Check if it is empty
    if (empty($text)) { return 'n-a'; }
    // Return result
    return $text;
}

$titre = $_POST['titre'];
$titre_clean = slugify($titre);

if (!mkdir($titre_clean, 0777, true)) {
    die('Erreur de création du dossier...');
}

 if (move_uploaded_file($tmp_name, "$titre_clean/$name"))
    {
        extractFlips ( "$titre_clean/$name" );
        generateFlipBook( $titre_clean, "Titre");
    }

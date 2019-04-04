<?php

$title_upload = $_POST['titre'];

$tmp_name = $_FILES['video'] ['tmp_name'];
$name = $_FILES['video']['name'];


$_FILES['video']['name'];
$_FILES['video']['size'];
$_FILES['video']['tmp_name'];

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

move_uploaded_file($tmp_name, "$titre_clean/$name");






var_dump($_FILES);
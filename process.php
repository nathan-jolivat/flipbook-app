<?php
require_once('xtract_images_from_video.php');
require_once('generation_flipbook.php');

$uploads_dir = './uploads';

// Slugify a string
function slugify($text) {
    // Strip html tags $text=strip_tags($text);
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
    if (empty($text)) {
        return 'n-a';
    }
    // Return result
    return $text;
}
$titre = basename($_POST["title"]);
$titre_clean = slugify($titre);

$extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);

if ($_POST['video-title'] !== "") {
    $titre_video = basename($_POST["video-title"]);
    $titre_video_clean = slugify($titre_video) . "." . $extension;
    $titre_video_clean_without_extension = slugify($titre_video);
} else {
    $titre_video_clean = slugify($_FILES['video']['name']) . "." . $extension;
    $titre_video_clean_without_extension = slugify($_FILES['video']['name']);
}

if (is_dir($uploads_dir)) {
    $dir_name = slugify($_POST["title"]);
    $name = $_FILES["video"]["name"];
    mkdir("$uploads_dir/$dir_name", 0777, true);
    $temp_dir = $uploads_dir . "/" . $dir_name;

    if ( move_uploaded_file($_FILES["video"]["tmp_name"], "$temp_dir/$titre_video_clean")) {

        extractFlips("$temp_dir/$titre_video_clean");
        generateFlipBook($temp_dir, $titre_video_clean_without_extension);
    }

    return header('location:index.php?success');
}
return header('location:index.php?error');
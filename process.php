<?php
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
$titre = basename($_FILES["video"]["name"]);
$titre_clean = slugify($titre);

if (is_dir($uploads_dir)) {
    $tmp_name = basename($_FILES["video"]["tmp_name"]);
    $name = $_FILES["video"]["name"];
    mkdir("$uploads_dir/$tmp_name", 0777, true);
    $temp_dir = $uploads_dir . "/" . $tmp_name;
    move_uploaded_file($_FILES["video"]["tmp_name"], "$temp_dir/$titre");
}
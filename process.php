<?php

require ('./extract_images_from_video.php');
require ('./generation_flipbook.php');

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

$title=$_POST['title'];
$name= $_FILES['file']['name'];

$clean_title = slugify($title);
$clean_name = slugify($name);

$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);


if (isset($name)) {
    $path= 'Uploads/videos/'.$clean_title.'/';
    if (empty($name))
    {
        echo "Choissisez un fichier";
    }
    else if (!empty($name)){
        if ($fileextension !== "mp4")
        {
            echo "L'extension du fichier n'est pas bonne (seulement .mp4)";
        }
        else if ($fileextension == "mp4")
        {
            if (!file_exists($path)){
                mkdir($path, 0777, true);
            }
            if (move_uploaded_file($tmp_name, $path."/".$name))
            {
                //echo "$path/$clean_name";
                extractFlips( "$path/$name" );
                // L'extraction a marché on génère le PDF
                generateFlipBook( $path, $clean_title);
            }
        }
    }
}

/*
if ($fileextension == "mp4")
{
    echo "<video width='320' controls>
    <source src='$path/$name' type='video/$fileextension'>
        Votre navigateur ne supporte pas les vidéos.
    </video>";
}*/

?>
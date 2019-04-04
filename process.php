<?php

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

$name= $_FILES['file']['name'];

$titre_clean = slugify($name);

$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);


if (isset($name)) {
    $path= 'Uploads/videos/'.$titre_clean.'/';
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
                echo 'Uploaded!';
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

extractFlips ( "./video.mp4" );

?>
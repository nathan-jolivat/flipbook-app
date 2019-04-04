<?php

// On clean les données textuelles entrantes (espace, caractères interdits  avec une fonction SLUGIFY
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

//Appel aux fonctions d'extractions de frame sur Video + PDF
require_once('extract_images_from_video.php');
require_once('generation_flipbook.php');



//GET Data File
$title_upload = $_POST['title-video'];
$file_name = $_FILES['video']['name'];
$file_size = $_FILES['video']['size'];
$file_tmp = $_FILES['video']['tmp_name'];


$title_upload_clean = slugify($title_upload);

//DEBEUG
//    var_dump($file_type);
//var_dump($file_name);
////var_dump($file_size);
    //var_dump($file_tmp);
//$file_type = basename($file_type);
$file_type = pathinfo($file_name);
$file_type = $file_type['extension'];

//SET Type File OK
$type_files = array('png','m4a','mp3','avi','mp4','gif','svg');

if( $file_size <= 8000000) {
    //    Taille ok
        if(in_array($file_type, $type_files)){

            //  Type file ok
            $date = new DateTime();
            $date = $date->format('Y-m-d');
//            var_dump($date);

            // Format de nom de fichier : titre - date -extension
            $final_folder = $title_upload_clean . '-' . $date;
            $final_file = $title_upload_clean . ' - '. $date . '.' . $file_type;
            // Incrémentation test
//            $i = 1 ;

                // Check if DIR Exist
                if (!file_exists($final_folder)){
                    mkdir("$final_folder");
                    move_uploaded_file($file_tmp,"$final_folder/$final_file");

                // Fonction de création des frames + PDF
                    extractFlips ( "$title_upload_clean/$final_file" );
                        // via le logiciel ftmpeg (extract_images...)
                    generateFlipBook( $title_upload_clean, "Titre");
                        //via un module qui crée des pdf avec un layout prédéfini (generation_flipbook...)
                }
                else{
                        for($i=1;$i<=3;$i++){
//                            $i++;
                            $final_folder = $final_folder . '_' . $i;
                        // $final_folder = "dossier" . ' -' . "bis";
                            mkdir($final_folder);
                            move_uploaded_file($file_tmp,"$final_folder/$final_file");
                            echo 'Le répertoire existe déjà, mais on va faire une nouvelle version BRO tkt ma poule';

                            // die('Le répertoire existe déjà');


                        }

                }

        }
            else {
                echo 'le type de fichier est incorrek';
            }
}
else {
    echo "la taille de fichier est trop importante";
}


//ReLocation after treatement
//header('Location: index.php');

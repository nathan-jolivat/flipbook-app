<?php
//GET Data File
$title_upload = $_POST['title-video'];
$file_type = $_FILES['video']['type'];
$file_size = $_FILES['video']['size'];
$file_name = $_FILES['video']['name'];
$file_tmp = $_FILES['video']['tmp_name'];

//DEBEUG
//    var_dump($file_type);
//var_dump($file_name);
////var_dump($file_size);
    //var_dump($file_tmp);
//$file_type = basename($file_type);
$file_type = pathinfo($file_name);
echo $file_type['extension'];
die();

//SET Type File OK
$type_files = array('png','m4a','mp3','avi','mp4');

if( $file_size <= 9000000) {
    //    Taille ok
        if(in_array($file_type, $type_files)){
            //  Type file ok
            $date = new DateTime();
            $date = $date->format(Y-m-d);
            var_dump($date);

            $final_folder = $title_upload . $date ;
            var_dump($final_folder);

            move_uploaded_file($file_tmp,"$final_folder");
        }
        else {
            echo 'le type de fichier est incorrect';
        }
}
else {
    echo "la taille est trop importante";
}


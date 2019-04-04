<?php

$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);


if (isset($name)) {
    $cleaname = filter_var($name,FILTER_SANITIZE_ENCODED);
    $path= 'Uploads/videos/'.$cleaname;


    if (empty($name))
    {
        echo "Pas de fichier selectionné";
    }
    else if (!empty($name)){
        if (($fileextension !== "mp4"))
        {
            echo "L'extension doit être de format mp4";
        }
        else
        {
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            if (move_uploaded_file($tmp_name, $path.'/'.$name)) {
                echo 'reçu!';
            }

        }
    }
}
?>

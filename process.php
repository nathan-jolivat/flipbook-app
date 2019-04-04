<?php
    require_once 'extract_images_from_video.php';
    require_once 'generation-flipbook.php';

$errors = array();

if ( (isset($_POST['book-title']))  && (isset($_FILES['video'])) ) {

    $title = htmlspecialchars($_POST['book-title']);
    $maxfilesize = 8388608;
    $acceptable = array(
        'video/mp4',
        'video/avi',
        'video/mpeg',
        'video/mpg',
        'video/gif',
        'video/mov',
        'video/webm'
    );

    // Commandes de débug
    /*    var_dump($_POST);
        var_dump($_FILES);*/


    // Slugify a string
    function slugify($text)
    {
        // Strip html tags
        $text = strip_tags($text);
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

    $titre_clean = slugify($title);

    if (!mkdir($titre_clean, 0777, true)) {
        $errors[] = "Le dossier n'a pas pu être créé. ";
    }

    // Fichier en cours d'upload
    $tmp_name = $_FILES['video']['tmp_name'];

    // basename() peut empêcher les attaques de système de fichiers;
    // la validation/assainissement supplémentaire du nom de fichier peut être approprié
    $name = basename($_FILES['video']['name']);


    // Gestion des erreurs
    if (($_FILES['video']['size'] >= $maxfilesize) || ($_FILES['video']["size"] == 0)) {
        $errors[] = "Ah, désolé, ça ne passe pas. La vidéo doit faire moins de 8Mo.";
    }

    if ((!in_array($_FILES['video']['type'], $acceptable)) && (!empty($_FILES['video']['type']))) {
        $errors[] = "Loupé. Seuls les formats suivants sont acceptés : avi, mp4, mpg, gif, mov, webm.";
    }

    if (count($errors) === 0) {

        move_uploaded_file($tmp_name, "$titre_clean/$name");

        $titre = $_POST['book-title'];
        $titre_clean = slugify($titre);
        // move_uploaded_file($_FILES['uploaded_file']['tmpname'], '/store/to/location.file');

        extractFlips("$titre_clean/$name");

    } else {

        foreach ($errors as $error) {

            echo '<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                    <h4 class=\"alert-heading\"> Oups !</h4> '
                . $error .
                '<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                  </div>';

            // header('Location: index.php?param' . $_SERVER['HTTP_REFERER']);
            die(); //Ensure no more processing is done
        }
    }


    /*$acceptedtypes = ['mp4', 'avi', 'mpeg', 'gif', 'mpg', 'mov', 'webm'];
        $extension = strtolower(pathinfo($name, PATHINFO_EXTENSION));*/

//(in_array($extension,$acceptedtypes)){ /* do your stuff */}
}

?>
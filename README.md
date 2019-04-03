# Application FLIPEO


## 1/ Formulaire d'upload d'une vidéo

Champs à afficher:
* Titre de la vidéo
* Fichier Vidéo
* Gaucher ou Droitier


Attention, il faudra bien vérifier les paramètres liès à la configuration de la taille maximale d'upload

** Fichier php.ini **
<code>
; Maximum size of POST data that PHP will accept.  
post_max_size = 32M  
  
; Maximum allowed size for uploaded files.  
upload_max_filesize = 32M  
</code>



## 2/ Script PHP

Le script d'action (celui qui va récupérer les données du formulaire d'upload doit effectuer les actions suivantes:

### Création d'un dossier d'accueil de la vidéo

On va utiliser le titre de la video pour le nom du dossier. Il faudra prendre soin de **nettoyer** le titre avant!

<code>
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

$titre = $_POST['title'];
$titre_clean = slugify($titre);
</code>


On crée alors le dossier avec ce titre nettoyé.

<code>
if (!mkdir($titre_clean, 0777, true)) {
    die('Erreur de création du dossier...');
}
</code>



On peut alors déplacer le fichier en cours d'upload dans le dossier nouvellement créé!

<code>

// Fichier en cours d'upload
$tmp_name = $_FILES["tmp_name"];

// basename() peut empêcher les attaques de système de fichiers;
// la validation/assainissement supplémentaire du nom de fichier peut être approprié
$name = basename($_FILES["name"]);

move_uploaded_file($tmp_name, "$titre_clean/$name");
</code>




### Extraction des images de la vidéo

<code>

</code>

### Génération d'un fichier PDF

Utilisation de la librairie (TCPDF)[https://github.com/tecnickcom/tcpdf]

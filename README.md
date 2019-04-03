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


### Extraction des images de la vidéo

<code>

</code>

### Génération d'un fichier PDF

Utilisation de la librairie (TCPDF)[https://github.com/tecnickcom/tcpdf]

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Project - Flipeo</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/papy.css">
    </head>
    <body>
    <main id="main-content" class="main-light">

<?php

//include_once('process.php');
//
//$title_upload = 'un titre';
//$file_name = 'nom file';
//$file_size = 'size file';
//$file_type = '';
//
//    if(isset($file_type)) {
//        echo $file_type;
//} else {
//        $file_type = "random";
//        echo $file_type;
//    }


;?>
        <div class="logo-brand">
            <img src="assets/img/logo-flipeo.svg" alt="Logo Flipio">
        </div>

        <div class="container mt-5">

            <div class="row">



                <form method="post" action="process.php" enctype="multipart/form-data" class="col-md-6">

                    <div class="main-title-container">
                        <h1 class="main-title">Générez votre FlipBook depuis une <span class="underliner-title">vidéo</span></h1>
                    </div>

                    <div class="form-group">
                        <label for="title" class="flipbook-title">Titre du flip book</label>
                        <input type="text" class="form-control  custom-input custom-input-text"  name="title-video" id="title">

                        <input type="file" class="form-control custom-input custom-input-file"  name="video" id="video">
                        <small id="emailHelp" class="form-text text-muted">
                            Le fichier vidéo ne doit pas excéder 8Mo
                        </small>
                    </div>
                    <button type="submit" class="btn btn-primary custom-btn submit-btn">Envoyer</button>
                </form>

                <div class="preview-content col-md-6">
                </div>

            </div>
        </div>

    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/main.js" async defer></script>
    </body>
</html>

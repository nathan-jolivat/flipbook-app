<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Flipeo - Transformez vos vidéos en Flipboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="css/animate.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/drop-zone.css">
        <link rel="stylesheet" type="text/css" href="css/snackbar.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js" integrity="sha256-qGOnfp7iY6DsnB55K7M+0PZjWCtzafRyJh33tgQJkMQ=" crossorigin="anonymous"></script>
    </head>
    <body>
    <script>

            let submitButton = document.getElementById( 'submitButton' );
            let loader = document.getElementById( 'loader-screen' );

            setTimeout(function() {
                loader.style.display = "none";
            }, 800);

            submitButton.addEventListener( 'click', function() {
                loader.style.display = "";

                setTimeout( function() {
                    loader.style.display = "none";
                }, 6000 );
            } );

            let succeed = document.getElementById( 'succeed' );
            if( succeed.innerText !== undefined ) {

                if( succeed.innerText === "Succeed" ) {
                    Snackbar.show( {
                        text: '👍 Vidéo envoyée et FlipBook généré',
                        actionText: "Ok !",
                        actionTextColor: "#F8EF28",
                        pos: "top-center"
                    } );
                } else {
                    Snackbar.show( {
                        text: '💔 Une erreur s\'est produite durant l\'envoi',
                        actionText: "Mais euh 😰",
                        actionTextColor: "red",
                        pos: "top-center"
                    } );
                }
            }
    </script>
    <div id="loader-screen">
        <svg viewBox="0 0 275 275" xmlns="http://www.w3.org/2000/svg">
            <rect class="oval-top" x="12.5" y="12.5" width="100" height="100" rx="50" ry="50" stroke="#000000" fill="transparent" stroke-width="25" />
            <rect class="oval-right" x="162.5" y="12.5" width="100"  height="100" rx="50" ry="50" stroke="#000000" fill="transparent" stroke-width="25" />
            <rect class="oval-bot" x="12.5" y="162.5" width="250" height="100" rx="50" ry="50" stroke="#000000" fill="transparent" stroke-width="25" />
            <rect class="oval-left" x="12.5" y="12.5" width="100"  height="100" rx="50" ry="50" stroke="#000000" fill="transparent" stroke-width="25" />
            <style>
                .oval-left {
                    visibility: hidden;
                }
            </style>
        </svg>
    </div>
        <div>
            <div class="row">
                <a href="index.php">
                    <div class="logo animated zoomIn">
                        <img src="img/logo.svg" alt="Flipeo Logo">
                    </div>
                </a>
                <div class="col-md-6 padding-left">
                    <div class="fingerprint-title animated fadeInUp">
                        <h1 class="animated jackInTheBox">Générez votre FlipBook depuis une vidéo</h1>
                    </div>
                    <form method="post" action="process.php" enctype="multipart/form-data" class="animated fadeInUp">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6 class="text-center">Titre du FlipBook</h6>
                                    <input type="text" class="form-control" name="title" placeholder="Saisissez un titre" required>
                                    <small class="text-muted" data-toggle="modal" data-target="#exampleModal"></small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h6 class="text-center">Renommer la vidéo ?</i></h6>
                                    <input type="text" class="form-control" name="video-title" placeholder="Nom vidéo (Optionnel)">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="drop-area">
                                <div class="preview-zone hidden">
                                    <div class="box box-solid">
                                        <div class="box-body"></div>
                                    </div>
                                </div>
                                <div class="dropzone-wrapper animated zoomInUp">
                                    <div class="dropzone-desc">
                                        <img src="img/upload-illustration.png" alt="">
                                        <p class="margin-top-10">Faites glisser votre vidéo ici</p>
                                    </div>
                                    <input type="file" name="video" accept="video/mp4" class="dropzone">
                                </div>
                                <small id="emailHelp" class="form-text text-muted text-center animated heartBeat delay-2s">
                                    Le fichier vidéo ne doit pas excéder <?= ini_get('upload_max_filesize')?>o
                                </small>
                        </div>
                        </div>

                        <div class="button-wrap animated bounceIn margin-top-30">
                            <button class="button" id="submitButton" type="submit"><i class="fa fa-cloud-upload-alt"></i> Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="illustration animated fadeInRight">
                        <img src="img/illustration.png" width="92%" alt="Illustration Flipeo">
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/drop-zone.js"></script>
    <script src="js/snackbar.js"></script>
    <script src="js/loader-animation.js"></script>

    <?php
    if($_GET['success'] !== null) {
        echo "<div id='succeed' style='display: none'>Succeed</div>";
    } elseif($_GET['error'] !== null) {
        echo "<div id='succeed' style='display: none'>Error</div>";
    }
    ?>

    </body>
</html>
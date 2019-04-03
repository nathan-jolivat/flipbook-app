<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Flipeo - Transformez vos vidéos en Flipboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/drop-zone.css">
    </head>
    <body>
        <div class="container mt-4">
            <div class="row">
                <div class="logo animated zoomIn">
                    <img src="assets/img/logo.svg" alt="Flipeo Logo">
                </div>
                <div class="col-md-6">
                    <div class="fingerprint-title animated fadeInUp">
                        <h1>Générez votre FlipBook depuis une vidéo</h1>
                    </div>

                    <form method="post" action="process.php" enctype="multipart/form-data" class="animated fadeInUp">
                        <div class="form-group">
                            <div id="drop-area">
                                <div class="preview-zone hidden">
                                    <div class="box box-solid">
                                        <div class="box-body"></div>
                                    </div>
                                </div>
                                <div class="dropzone-wrapper animated zoomInUp">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <img src="assets/img/upload-illustration.png" alt="">
                                        <p class="margin-top-10">Faites glisser votre vidéo ici</p>
                                    </div>
                                    <input type="file" name="video" class="dropzone">
                                </div>
                                <small id="emailHelp" class="form-text text-muted text-center animated heartBeat delay-2s">
                                    Le fichier vidéo ne doit pas excéder 8Mo
                                </small>
                        </div>
                        </div>

                        <div class="button-wrap animated bounceIn margin-top-50">
                            <button class="button" type="submit"><i class="fa fa-cloud-upload-alt"></i> Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="illustration animated fadeInRight">
                        <img src="assets/img/illustration.png" width="140%" alt="Illustration Flipeo">
                    </div>
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/drop-zone.js"></script>
    </body>
</html>
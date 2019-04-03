<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Flipéo | Votre flipbook personnalisé</title>

        <!-- Polices de caractère et feuilles de style -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,700" rel="stylesheet">
        <!-- CSS personnalisé -->
        <link rel="stylesheet" type="text/css" href="res/style.css">


    </head>
    <body>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6 p-5">
                    <h1>Générez votre FlipBook depuis une vidéo</h1>

                    <form method="post" action="process.php" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="book-title">Titre de votre folioscope</label>
                            <input type="text" class="form-control" name="book-title" id="book-title" placeholder="La grande descente">
                        </div>

                        <div class="form-group">
                            <label for="video">Faites glisser votre vidéo ici</label>
                            <img src="res/img/icon-video.png" alt="icon-video">
                            <input type="file" accept="video/*" class="form-control-file" id="video">
                            <small class="form-text text-muted">Le fichier ne doit pas dépasser 8 Mo.</small>
                        </div>

                        <button type="submit" class="btn btn-warning">Envoyer</button>
                    </form>
                </div>

                <div class="col-md-6 p-5">
                    <img class="img-fluid" id="main-img" src="res/img/flipbook.png" alt="Un folioscope">
                </div>

            </div>


        </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
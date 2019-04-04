<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Upload Image</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>
    <body>
    <img src="img/Groupe_6.svg" style="width: 20%;margin-top: 32px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="margin-top: 32px;">
                    <h2 style="font-size: 60px; font-weight: bold; margin-bottom:32px;">Générez votre <br> FlipBook depuis <br> une vidéo</h2>
                    <form method="post" action="process.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <div style="display: flex; justify-content: center">
                                <label for="video">Titre du Flipbook</label>
                            </div>
                            <input style="margin-bottom:10px;border: none;background: rgb(112, 112, 112,0.2); border-bottom:3px solid #F8EF28;border-radius: 0px;padding: 10px;width: 100%;" type="text" class="form-control" name="titre" id="titre" >
                            <input type="file" class="form-control" name="video" id="video" style="background-image:url(img/Groupe-5.png);background-position: center;background-repeat: no-repeat;height: 162px;border: 3px dashed #F8EF28 ">
                            <small id="emailHelp" class="form-text text-muted">
                        Le fichier vidéo ne doit pas excéder 8Mo
                            </small>
                        </div>
                        <div style="display: flex; justify-content: center">
                        <button style="border-radius: 50px; background-color:#F8EF28; color: black; border: none;padding-left: 30px; padding-right: 30px;"  type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <img src="img/flipbook.png" style="width: 100%; height: auto; border-left: 10px solid #F8EF28 ">
                </div>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
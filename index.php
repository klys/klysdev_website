<?php
    include_once("settings.php");
    $url = "{$api}/home";
    $data = json_decode(file_get_contents($url));

    $lastProjs = json_decode(file_get_contents($api."/projects?_limit=3&_sort=startDate:DESC"));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Klys.dev</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="jumbotron-narrow.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            
                <?php include('navbar.php'); ?>
                
            <div class="jumbotron">
                <h1 class="display-3"><?= $data->subtitle ?></h1>
                <p class="lead"><?= $data->subdescription ?></p>
                <p class="lead"></p>
                <p class="lead"><strong><?= $data->subdescription2 ?></strong></p>
                <p><a class="btn btn-lg btn-success" href="about.php" role="button">Read more</a></p>
            </div>
            
            <h3>Lastest Projects @ #klysDev</h3>
            <?php foreach($lastProjs as $key => $value) { 

                $imgUrl = "imgs/noimage.png";
                if ($value->image != null) {
                    $imgUrl = $api.$value->image->url;
                }
                $imgType = explode(".", $imgUrl)[1];
                $imgData = "data:image/".$imgType.";base64,".base64_encode(file_get_contents($imgUrl));

                ?>

            <div class="media"> 
                <img class="d-flex mr-3" src="<?= $imgData ?>" alt="Generic placeholder image" width="150"> 
                <div class="media-body"> 
                    <h5 class="mt-0"><?= $value->title ?></h5>  
                    <?= $value->short_description ?>                    
                </div>                 
            </div>

            <?php } ?>
            <?php include("footer.php"); ?>
        </div>         
        <!-- /container -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>
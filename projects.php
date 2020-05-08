<?php
    include_once("settings.php");
    $url = "{$api}/projects?_sort=StartDate:DESC";
    $data = json_decode(file_get_contents($url));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Projects @ #klys</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="jumbotron-narrow.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            
        <?php include('navbar.php'); ?>

            <h3>Projects @ #klys</h3>
            
            <div class="card-group">
            <?php 
                $n = 0;
                foreach ($data as $key => $value) { 
                $n++;    
                    $imgUrl = "imgs/noimage.png";
                    if ($value->image != null) {
                        $imgUrl = $api.$value->image->url;
                    }
                    $imgType = explode(".", $imgUrl)[1];
                    $imgData = "data:image/".$imgType.";base64,".base64_encode(file_get_contents($imgUrl));
                    $date = DateTime::createFromFormat('Y-m-j', $value->startDate);
                    $date = $date->format("F Y");
                ?>
                <div class="card"> 
                    <img class="card-img-top" src="<?= $imgData ?>" alt="Card image cap"> 
                    <div class="card-body"> 
                        <a href = "project.php?pro=<?= $value->id ?>"><h4 class="card-title"><?= $value->title ?></h4></a> 
                        <p class="card-text"><?= $value->short_description ?></p> 
                        <p> <?= $imgType ?> </p>
                        <p> <?= $imgUrl ?> </p>
                        <p> <?= $imgData ?> </p>
                    </div>                     
                    <div class="card-footer"> 
                        <small class="text-muted"><span class = "glyphicon glyphicon-calendar"></span><?= $date ?></small> 
                        <small class="text-muted"><span class = "glyphicon glyphicon-folder-open"></span><?= $value->Type ?></small>
                    </div>                     
                </div>  



            <?php if ($n >= 3) { ?>
                </div>
                <div class="card-group">

                <?php 
                $n = 0;    
            }    
                
                    } ?>
            </div>
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
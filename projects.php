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
                ?>
                <div class="card"> 
                    <img class="card-img-top" src="<?= $imgUrl ?>" alt="Card image cap"> 
                    <div class="card-body"> 
                        <h4 class="card-title"><?= $value->title ?></h4> 
                        <p class="card-text"><?= $value->description ?></p> 
                    </div>                     
                    <div class="card-footer"> 
                        <small class="text-muted"><?= $value->startDate ?></small> 
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
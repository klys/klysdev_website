<?php
    include_once("settings.php");
    $url = "{$api}/about";
    $data = json_decode(file_get_contents($url));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="klys">
        <title>About Klys</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="jumbotron-narrow.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php include('navbar.php'); ?>
            <h3><?= $data->title ?></h3>
            <div class="marketing row">
                <div class="col-lg-12">
                    <div class="col-md-12">
                       <?= $data->content ?>
                    </div>
                    
                </div>
                
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
<?php
    include_once("settings.php");
    $url = "{$api}/home";
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
            <h3>Lastest News &amp; Projects @ #klys</h3>
            <div class="marketing row">
                <div class="col-lg-6">
                    <h4>Flux in React</h4>
                    <p>A new way to develop on react with a more lineal advance method.</p>
                    <h4>Best server lenguage</h4>
                    <p>It may be php, or python, or go, in this topic we talk about our review and experience in server software developing</p>
                    <h4>Marketing during quarentine</h4>
                    <p>Is really the fear so powerfull when moving crows for market motivation, the numbers talk by itself...</p>
                </div>
                <div class="col-lg-6">
                    <h4>Nova</h4>
                    <p>Nova is a real time action game where you are part of a galactic spaceship team fighting against another team for destroying the headquarter to win.</p>
                    <h4>Block Rusher</h4>
                    <p>A mobile game to avoid obstacles</p>
                    <h4>Nations</h4>
                    <p>A war game web based for nation administration to war managing</p>
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
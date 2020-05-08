<?php
    // validatin and curating id
    if (!isset($_GET["pro"])) { // first check that is set at all
        header("location: projects.php");
    }

    if (!is_numeric($_GET["pro"])) { // later check if is a number
        header("location: projects.php");
    }

    // later to check is if we got any value from the api

    include_once("settings.php");
    $url = "{$api}/projects/".$_GET["pro"];
    $data = json_decode(file_get_contents($url));
?>


<?php 
    // date manipulation
    //$date = $data->startDate;
    $date = DateTime::createFromFormat('Y-m-j', $data->startDate);
    $date = $date->format("F Y");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?= $data->title ?> @ Projects #klysDev</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="jumbotron-narrow.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">

            <?php include("navbar.php"); ?>

            <div class="jumbotron">
                <p style = "float:right;display:block;"><?= $date ?></p>
                <p class="lead"></p>
                <h1 class="display-3"><?= $data->title ?></h1>
                <p class="lead"><?= $data->description ?></p>

            <?php if ($data->website != null) { ?>
                <p class="lead"></p>
                <p class="lead">wanna give a try?</p>
                <p><a class="btn btn-lg btn-success" href="<?= $data->website ?>" role="button">Check out more</a></p>
            <?php } ?>
                <p><?= var_dump($data) ?></p>
            </div>

            <h3>Gallery of Project</h3>

            <div class="card-group">
                <div class="card"> 
                    <img class="card-img-top" src="http://pinegrow.com/placeholders/img12.jpg" alt="Card image cap"> 
                    <div class="card-body"> 
                        <h4 class="card-title">3ds spaceships</h4> 
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> 
                    </div>                     
                    <div class="card-footer"> 
                        <small class="text-muted">Last updated 3 mins ago</small> 
                    </div>                     
                </div>                 
                <div class="card"> 
                    <img class="card-img-top" src="http://pinegrow.com/placeholders/img12.jpg" alt="Card image cap"> 
                    <div class="card-body"> 
                        <h4 class="card-title">Online experience</h4> 
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p> 
                    </div>                     
                    <div class="card-footer"> 
                        <small class="text-muted">Last updated 3 mins ago</small> 
                    </div>                     
                </div>                 
                <div class="card"> 
                    <img class="card-img-top" src="http://pinegrow.com/placeholders/img15.jpg" alt="Card image cap"> 
                    <div class="card-body"> 
                        <h4 class="card-title">Full action in real time</h4> 
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p> 
                    </div>                     
                    <div class="card-footer"> 
                        <small class="text-muted">Last updated 3 mins ago</small> 
                    </div>                     
                </div>
                
            </div>
            <h3>Techonolgies involved in this project:</h3>

            <div class="marketing row">
                <div class="col-lg-6">
            <?php 
                $techs = $data->technologies;
                $n = 0;
                foreach($techs as $key => $value) {
                    $n++;
            ?>
                <h4><?= $value->title ?></h4>
                <p><?= $value->description ?></p>

                <?php 
                if ($n >= 3) { 
                    $n = 0;
                    ?>
                </div>
                <div class="col-lg-6">
                <?php }
                } // end of foreach ?>
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
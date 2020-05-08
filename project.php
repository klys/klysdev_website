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

            <?php if ($data->website != null) { ?>
                <p class="lead"></p>
                <p class="lead">wanna give a try?</p>
                <p><a class="btn btn-lg btn-success" href="<?= $data->website ?>" role="button">Check out more</a></p>
            <?php } ?>
            </div>

            <p id = "content-location"><?= $data->description ?></p>

            <h3>Gallery of Project</h3>

            <div class="card-group">
            <?php 
                $f = 0;
                $n = 0;
                foreach ($data->galleries as $key => $value) { 
                $n++;    
                $f++;
                    $imgUrl = "imgs/noimage.png";
                    if ($value->picture != null) {
                        $imgUrl = $api.$value->picture->url;
                    }
                    $imgType = explode(".", $imgUrl)[1];
                    $imgData = "data:image/".$imgType.";base64,".base64_encode(file_get_contents($imgUrl));
                    
                ?>
                <div class="card"> 
                    <img class="card-img-top" src="<?= $imgData ?>" alt="Card image cap"> 
                    <div class="card-body"> 
                        <p class="card-text"><?= $value->description ?></p> 
                    </div>                     
                                      
                </div>  



            <?php if ($n >= 3) { ?>
                </div>
                <div class="card-group">

                <?php 
                $n = 0;    
            }    
                
                    } // end of foreach 
                    
                    // no files
                    if ($f == 0) { ?>
                        <p>No images added to this gallery yet.</p>
                    <?php }
                    
                    ?>
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
            <h3>Related Project Links</h3>
            <ul> 
                <?php 
                    $f = 0;
                    foreach ($data->links as $key => $value) { 
                        $f++;
                        ?>

                    <li><a href = "<?= $value->URL ?>"> <?= $value->Name ?> </a>
                    <?php if ($value->description != null) { ?>
                        <ul>
                            <li> <?= $value->description ?> </li>
                        </ul>
                    <?php } ?>
                    </li>  
                    
                <?php } 
                
                if ($f == 0) { ?>
                    <p> Not links added yet for this project. </p>
                <?php } ?>               
            </ul>
            <?php include("footer.php"); ?>
        </div>         
        <!-- /container -->
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/showdown.min.js"></script>
        <script>
            var converter = new showdown.Converter();
            var html = converter.makeHtml(<?= json_encode($data->description) ?>);
            $("#content-location").html(html)
        </script>
    </body>
</html>
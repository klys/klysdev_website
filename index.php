<?php
    include_once("settings.php");
    $url = "{$api}/home";
    $data = json_decode(file_get_contents($url));

    $lastProjs = json_decode(file_get_contents($api."/projects?_limit=3&_sort=startDate:DESC"));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <meta name="description" content="Home page showing a slogan and lastest projects and news in the page">
        <meta name="author" content="Junior Jimenez">
        <title>Klys.dev</title>
        
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
            <hr>
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
                    <h5 class="mt-0"><a href = "project.php?pro=<?= $value->id ?>"><?= $value->title ?></a></h5>  
                    <?= $value->short_description ?>                    
                </div>                 
            </div>
            <hr>

            <?php } ?>
            <?php include("footer.php"); ?>
        </div>         
        <?php include_once("footer_js.php"); ?>
    </body>
</html>
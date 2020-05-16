<?php
    include_once("settings.php");
    $ordering = "_sort=StartDate:DESC";
    if (isset($_GET['tech'])) {
        $url = "{$api}/projects?technologies.title=".urlencode($_GET['tech'])."&".$ordering;
    }
    if (isset($_GET['type'])) {
        $url = "{$api}/projects?Type=".urlencode($_GET['type'])."&".$ordering;
    }
    if (!isset($url)) {
        $url = "{$api}/projects?".$ordering;
    }
    $data = json_decode(file_get_contents($url));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <meta name="description" content="Website of projects from Junior Jimenez">
        <meta name="author" content="Junior Jimenez">
        <title>Projects @ #klys</title>
        
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

                    $techs = "";
                    $tech_count = 0;
                    foreach($value->technologies as $k => $tech) {
                        $tech_count++;
                        $techs .= $tech->title;
                        if ($tech_count < count($value->technologies)) {
                            $techs .=", ";
                        }
                    }
                ?>
                <div class="card"> 
                    <img class="card-img-top" src="<?= $imgData ?>" alt="Card image cap"> 
                    <div class="card-body"> 
                        <a href = "/project/<?= $value->slug ?>"><h4 class="card-title"><?= $value->title ?></h4></a> 
                        <p class="card-text"><?= $value->short_description ?></p> 
                    </div>                     
                    <div class="card-footer"> 
                        <small class="text-muted"><?= $date ?></small> 
                        <small class="text-muted"><a class = "btn btn-sm btn-danger" style="color:white;" data-toggle="tooltip" data-placement="top" title="<?= $techs ?>" href = "<?= $server ?>/project-type/<?= $value->Type ?>"><?= $value->Type ?></a></small>
                    </div>                     
                </div>  



            <?php if ($n >= 3) { ?>
                </div>
                <div class="card-group">

                <?php 
                $n = 0;    
            }    
                
                    } // end of foreach ?>
            </div>
            <?php include("footer.php"); ?>
        </div>         
        <?php include_once("footer_js.php"); ?>
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </body>
</html>
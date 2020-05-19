<?php
    include_once("settings.php");
    $url = "{$api}/privacy-policy";
    $data = json_decode(file_get_contents($url));
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('header.php'); ?>
        <meta name="description" content="Privacy Policy">
        <meta name="author" content="Junior Jimenez">
        <title>Privacy Policy @ #KlysDev</title>
        
    </head>
    <body>
        <div class="container">
            <?php include('navbar.php'); ?>
            <h3>Privacy policy on klys.dev</h3>
            <div class="marketing row">

                <div class="col-lg-12">
                    <div class="col-md-12">
                       Last Edition: <?= $data->updated_at ?>
                    </div>
                    
                </div>
                <hr>
                <div class="col-lg-12">
                    <div class="col-md-12" id = "content-location">
                       <?= $data->content ?>
                    </div>
                    
                </div>
                
            </div>
            <?php include("footer.php"); ?>
        </div>         
        <?php include_once("footer_js.php"); ?>
        <script src="<?= $server ?>/assets/js/showdown.min.js"></script>
        <script>
            var converter = new showdown.Converter();
            var html = converter.makeHtml(<?= json_encode($data->content) ?>);
            $("#content-location").html(html)
        </script>
    </body>
</html>
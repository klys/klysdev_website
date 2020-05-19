<?php
    if (!isset($_SESSION['cookie_consent'])) {
        
   
?>
<div class = "cookie-consent">By using this website you agree our privacy policy <a class = "btn btn-dark" id = "cookie-consent-button" href = "#">Got it</a> <a class = "btn btn-dark" href = "<?= $server ?>/privacy-policy">Read more</a></div>

<style>
    .cookie-consent{
        position:fixed; 
        left: 30px; 
        bottom:30px;
        background-color:black;
        color:white;
        padding:5px;
        border:solid;
        border-color:red;
    }
</style>

<script>
    $(document).ready(function(){
        $("#cookie-consent-button").click(function(){
            $.ajax({
                url:"<?= $server ?>/cookie_consent.php",
                success: function() {
                    console.log("cookie consent debug!")
                    $(".cookie-consent").css("display","none");
                }
            });
        });
    });
</script>

<?php 
    } // cookie consent
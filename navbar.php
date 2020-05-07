<?php
    $actual = explode("/", $_SERVER['PHP_SELF'])[2];
?>
<div class="clearfix header">
                <nav>
                    <ul class="float-right nav nav-pills">
                        <li class="nav-item">
                            <?php if ($actual == "index.php"){ ?>
                            <a class="active nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            <?php } else { ?>
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                            <?php } ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($actual == "about.php") {  ?>
                            <a class="active nav-link" href="about.php">About</a>
                            <?php } else { ?>
                                <a class="nav-link" href="about.php">About</a>
                            <?php } ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($actual == "projects.php") { ?>
                            <a class="active nav-link" href="projects.php">Projects</a>
                            <?php } else { ?>
                                <a class="nav-link" href="projects.php">Projects</a>
                            <?php } ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($actual == "news.php") { ?>
                            <a class="active nav-link" href="news.php">News</a>
                            <?php } else { ?>
                            <a class="nav-link" href="news.php">News</a>
                            <?php } ?>
                        </li>
                        <li class="nav-item">
                            <?php if ($actual == "contact.php") { ?>
                            <a class="active nav-link" href="contact.php">Contact</a>
                            <?php } else { ?>
                                <a class="nav-link" href="contact.php">Contact</a>
                            <?php } ?>
                        </li>
                    </ul>
                </nav>



                <h3 class="text-muted">@klysDev</h3>



</div>
<html>
    <head>
        <title>Senva Engineering</title>
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo URL; ?>public/css/default.css">


        <script src="<?php echo URL; ?>public/js/jquery-2.1.1.min.js"></script>
        <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>



        <link rel="shortcut icon" href="<?php echo URL; ?>public/images/favicon.ico" />
    </head>    
    <body>

        <div class="row" style="background-color: #4cae4c;">
            <div class="col-sm-1"></div>
            <div class="col-sm-8">

                <?php
                if (Session::get('loggedIn') == false) {
                    ?>
                    <a href="<?php echo URL; ?>Index">
                        <img src="<?php echo URL; ?>public/images/logo.png">
                    </a>

                    <?php
                } else {
                    ?>
                    <img src="<?php echo URL; ?>public/images/logo.png">
                    <?php
                }
                ?>




            </div>
            <div class="col-sm-2">

            </div>

            <div class="col-sm-1"> 

                <?php
                Session::init();
                if (Session::get('loggedIn') != false) {
                    ?>

                    <a href="<?php echo URL; ?>Dashboard/logout">
                        <button type="submit" class="btn btn-xs btn-danger btn-block">
                            Logout
                        </button>
                    </a>
                    <?php
                }
                ?>


            </div> 
        </div>
        <div class="row">

            <div class="col-sm-1"></div>
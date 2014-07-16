<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" >
        <title>Flights</title>

        <link rel="shortcut icon" href="//www.redtag.ca/favicon.ico" >
        
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?=BASEURL?>public/css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?=BASEURL?>public/css/grid-min.css" />
        <link rel="stylesheet" type="text/css" href="<?=BASEURL?>public/css/base-min.css" />
        
        <link rel="stylesheet" href="<?=BASEURL?>public/css/flight-styles5.css" />

        <link href='https://fonts.googleapis.com/css?family=Sorts+Mill+Goudy|Rufina|Libre+Baskerville|Medula+One|Fjalla|Archivo+Narrow|Playfair+Display+SC' rel='stylesheet' type='text/css'>
        
        <!-- <link rel="stylesheet" href="http://lib.redtag.ca/global/css/jquery-ui-min.css" /> -->
        <!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/blitzer/jquery-ui.css" /> -->
        <link rel="stylesheet" type="text/css" href="<?=BASEURL?>public/css/jquery-ui-min-4.css" />
        <link rel="stylesheet" type="text/css" href="<?=BASEURL?>public/css/flights.css" />
        <link rel="stylesheet" type="text/css" href="<?=BASEURL?>public/css/jquery.qtip.min.css" />
        <link rel="stylesheet" type="text/css" href="<?=BASEURL?>public/css/pretty-photo.css" />
        
        <!-- JS -->
        <script src="<?=BASEURL?>public/js/jquery.min.js"></script>
        <script src="<?=BASEURL?>public/js/jquery-ui.js"></script>	
        <script src="<?=BASEURL?>public/js/airports.js"></script>
    </head>
    <body>
    

<?php  load_view('common/header'); ?>

<div id="main_container">

    <?php
        load_view('search/form', null);
    ?>

    <div id="bottom_container">

        <div id="footer">
            <!-- Footer Top -->

            <br clear="all"></div>
        <!-- /Footer Top -->
        <!-- Footer Bottom -->
        <div class="footer_bottom">
            
        <!-- Box -->
        <div class="box">
            <div class="address" style="float:left; width: 330px;">
                <strong>5450 Explorer Dr. Suite 100 Mississauga ON, L4W 5N1</strong>
                <br>
                Copyright © 2004 - 2012 redtag.ca.
                <br>All rights reserved. A division of Red Label Vacations Inc.</div>

            <div id="footer_top" style="float:left; margin-left:90px;">
                <div class="left">
                    <div class="customer_support">
                        Customer Support
                        <span class="number">1-866-573-3824</span>
                        <div class="subtext_blue">Over 85 agents to serve you</div>
                    </div>
                </div>

                <div class="clear"></div>
            </div>
            <!-- /Box --> </div>
        <!-- /Footer Bottom --> </div>
</div>

</div> <!-- /Main container -->

<div class="clear"></div>



</body>
</html>
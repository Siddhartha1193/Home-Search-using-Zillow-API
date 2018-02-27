<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset ="UTF-8">
        <meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
        <link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel = "stylesheet" type="text/css" href="./css/homepage.css">
        <title>LSP HOME</title>
        
    </head>
    <body>
        <br>
        <div class="container">
            <div class="panel panel-primary">
                <div class = "panel panel-heading">
                    <h3 class= "panel-title">Home Evaluator</h3>
                </div>
                <div class="panel-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>                        
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="./media/image1.jpg" alt="slide1">
                            </div>
                            <div class="item">
                                <img src="media/image2.jpg" alt="slide2">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <br>
                    <div class="container-fluid">
                        <a class="btn btn-primary btn-lg" href="search.php" role="button">Search for Homes</a>
                    </div>
                </div>   
            </div>    
        <?php
        // put your code here
        ?>
        </div>   
    </body>
</html>

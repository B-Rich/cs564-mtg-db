<!DOCTYPE HTML>
<!-- 
The splash page for the project. Doesn't contain any functionality other than pretty text & slideshow.
 -->
<html>
    <?php 
    $title = 'MTG DB CS 564 Final Project';
    require_once('heading.php'); 
    ?>
    <div class="container">
        <div class="row">
    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height=50%;">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active">
                    
                </li>
                <li data-target="#myCarousel" data-slide-to="1" class="">
                    
                </li>
                <li data-target="#myCarousel" data-slide-to="2" class="">
                    
                </li>
                <li data-target="#myCarousel" data-slide-to="3" class="">
                    
                </li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="http://media.wizards.com/images/magic/daily/wallpapers/Wallpapper_JOU_PW01_Miller_1920x1080.jpg">
                </div>
                <div class="item">
                    <img src="http://media.wizards.com/images/magic/daily/wallpapers/Wallpaper_KeyArt_JOU_1920x1080.jpg">
                </div>
                <div class="item">
                    <img src="http://media.wizards.com/images/magic/daily/wallpapers/WeightoftheUnderworld_BNG_1920x1080_Wallpaper.jpg">
                </div>
                <div class="item">
                    <img src="http://media.wizards.com/images/magic/daily/wallpapers/Sunbond_BNG_1920x1080_Wallpaper.jpg">
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left">
                    
                </span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right">
                    
                </span>
            </a>
        </div>
    </div>
        <div class="jumbotron">
            <div class="container">
                <h1>
                    MTG DB
                </h1>
                <p>
                    This is a database application for the Magic The Gathering Collectible Card Game (CCG). Use the navigation bar above to query and modify the database of Cards, Players, and more.
                </p>
            </div>
        </div>
    </div>
</body>
</html>
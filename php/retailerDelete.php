<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Retailer Deletion';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
            <?php
                $retailerName = $_GET['retailerName'];
                $location = $_GET['location'];
                $sql = <<<QUERY
START TRANSACTION;
DELETE FROM Sells WHERE retailerName="$retailerName" AND location="$location";
DELETE FROM Retailers WHERE retailerName="$retailerName" AND location="$location";
COMMIT;
QUERY;
                $r = $db->multi_query($sql);
                if(!$r){
                    echo dbError($sql,$db);
                    return;
                }
                else {
                    echo dbSuccess($sql);
                    echo "<p>Retailer successfully deleted.</p>";
                }
            ?>
        </div>
    </body>
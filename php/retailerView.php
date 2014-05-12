<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - View Retailer';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
        ?>
    <body>
        <div class="container">
           <?php
           $retailerName = $_GET['retailerName'];
           $location = $_GET['location'];
           $locationURLEncode = urlencode($location);
           $sql = "SELECT * FROM Retailers WHERE retailerName='$retailerName' AND location='$location';";
           $r = $db->query($sql);
           if(!$r){
                echo dbError($sql,$db);
                return;
            }
            else if($r->num_rows <= 0){
                echo dbWarning($sql);
                return;
            }
            $r = $db->query($sql);
            $data = $r->fetch_array();
            $mapsHTML = <<<HTML
<iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/search?q=$locationURLEncode&key=AIzaSyDDHLA-44-fb8CE9lsX-XvVQd6XvX_oZOo"></iframe>
HTML;
            $retailerHTML = <<<HTML
<h1>$retailerName</h1>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Where is $retailerName?</h3>
  </div>
  <div class="panel-body">
    <p class="lead">$location</p>
    <div class="row text-center">
    $mapsHTML
    </div>
  </div>
</div>
HTML;
            echo $retailerHTML;
            $sql = "SELECT cardId,cardName,price,quantity FROM Sells NATURAL JOIN Cards WHERE retailerName = '$retailerName' AND location='$location';";
           $r = $db->query($sql);
           if(!$r){
                echo dbError($sql,$db);
                return;
            }
            else if($r->num_rows <= 0){
                echo dbWarning($sql);
                return;
            }
            $r = $db->query($sql);
            if(!$r){
                echo dbError($sql,$db);
                return;
            }
            else if($r->num_rows <= 0){
                echo dbWarning($sql);
                return;
            }
            $fields = array('cardId','cardName','price','quantity');
            $columnNames = $fields;
            $theadHTML = tableHeading($columnNames);
            $tableBody = '';
            while ($row = $r->fetch_array()) {
                $tableBody = $tableBody . tableRowFromFields($row,$fields);
            }
            $tbl = table($theadHTML,$tableBody);      
            echo <<<HTML
<h2>Cards available from $retailerName:</h2>
$tbl
HTML;
           ?> 
        </div>
    </body>
</html>
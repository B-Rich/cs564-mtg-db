<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - View Set';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
        ?>
    <body>
        <div class="container">
           <?php
           $setName = $_GET['setName'];
           $sql = "SELECT * FROM Cards WHERE setName='$setName';";
           $r = $db->query($sql);
           if(!$r){
                echo dbError($sql,$db);
                return;
            }
            else if($r->num_rows <= 0){
                echo dbWarning($sql);
                return;
            }
            $fields = array('cardName','setName','rarity','cost','cmc','type','subtype','ruleText','flavorText','power','toughness','artist');
            $columnNames = $fields;
            $theadHTML = tableHeading($columnNames);
            $tableBody = '';
            while ($row = $r->fetch_array()) {
                $tableBody = $tableBody . tableRowFromFields($row,$fields);
            }
            echo table($theadHTML,$tableBody);
           ?> 
        </div>
    </body>
</html>
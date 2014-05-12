<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Set Deletion';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
            <?php
                $setName = $_GET['setName'];
                $sql = <<<QUERY
START TRANSACTION;
DELETE FROM Cards WHERE setName="$setName";
DELETE FROM Sets  WHERE setName="$setName";
COMMIT;
QUERY;
                $r = $db->multi_query($sql);
                if(!$r){
                    echo dbError($sql,$db);
                    return;
                }
                else {
                    echo dbSuccess($sql);
                    echo "<p>Set successfully deleted.</p>";
                }
            ?>
        </div>
    </body>
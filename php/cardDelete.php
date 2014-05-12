<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Card Deletion';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
            <?php
                $cardId = $_GET['cardId'];
                $sql = <<<QUERY
DELETE 
FROM Cards 
WHERE cardId=$cardId;
QUERY;
                $r = $db->query($sql);
                if(!$r){
                    echo dbError($sql,$db);
                    return;
                }
                else {
                    echo dbSuccess($sql);
                    echo "<p>Card successfully deleted.</p>";
                }
            ?>
        </div>
    </body>
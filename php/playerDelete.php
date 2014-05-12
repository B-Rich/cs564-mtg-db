<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Player Deletion';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
            <?php
                $playerUsername = $_GET['playerUsername'];
                $sql = <<<QUERY
START TRANSACTION;
DELETE FROM Blogs      WHERE playerUsername="$playerUsername";
DELETE FROM CardInDeck WHERE playerUsername="$playerUsername";
DELETE FROM Decks      WHERE playerUsername="$playerUsername";
DELETE FROM Players    WHERE playerUsername="$playerUsername";
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
<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Update Prices';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
            <?php
                $price = $_POST['price'];
                $rarity = $_POST['rarity'];
                $retailerName = $_POST['retailerName'];
                $sql = <<<QUERY
UPDATE Sells, Cards
SET price = $price
WHERE Sells.cardId = Cards.cardId
AND Cards.rarity = "$rarity"
AND Sells.retailerName LIKE "%$retailerName%";
QUERY;
                $r = $db->query($sql);
                if(!$r){
                    echo dbError($sql,$db);
                    return;
                }
                else {
                    echo dbSuccess($sql);
                    echo "<p>Prices successfully updated.</p>";
                }
            ?>
        </div>
    </body>
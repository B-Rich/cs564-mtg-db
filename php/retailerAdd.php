<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Retailer Added';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
            <?php
                $attrArr = array();
                $valueArr = array();
                echo backToQueryButton('retailers.php');
                foreach ($_POST as $key => $value) {
                    if($value){
                        array_push($attrArr,$key);
                        if (is_numeric($value)){
                            array_push($valueArr,$value);    
                        }
                        else{
                            // Quote the value.
                            array_push($valueArr,"'$value'");   
                        }
                        
                    }
                }
                $attr = join(",",$attrArr);
                $values = join(",",$valueArr);
                $sql = <<<QUERY
INSERT INTO Retailers($attr)
VALUES ($values);
QUERY;
                $r = $db->query($sql);
                if(!$r){
                    echo dbError($sql,$db);
                    return;
                }
                else {
                    echo dbSuccess($sql);
                }
            ?>
        </div>
    </body>
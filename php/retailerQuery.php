<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Retailer Search Results';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
            <?php
                $conditionBlock = array();
                echo backToQueryButton('retailers.php');
                foreach ($_POST as $key => $value) {
                    if($value){
                        $op = rangeOpStr($_POST[$key.'Range']);
                        $condition = " $key LIKE '%$value%' ";
                        array_push($conditionBlock, $condition);
                    }
                }
                $where = '';
                if(count($conditionBlock) > 0){
                    // Join with AND.
                    $where = "WHERE " . join("AND",$conditionBlock);    
                }
                $sql = <<<QUERY
SELECT * 
FROM Retailers
$where;
QUERY;
                $r = $db->query($sql);
                if(!$r){
                    echo dbError($sql,$db);
                    return;
                }
                else if($r->num_rows <= 0){
                    echo dbWarning($sql);
                    return;
                }
                else {
                    echo dbSuccess($sql);
                }
                $columnNames = array('Name','Location','Rating');
                $theadHTML = tableHeading($columnNames);
                $tableBody = '';
                $fields = array('retailerName','location','rating');
                while ($row = $r->fetch_array()) {
                    $tableBody = $tableBody . tableRowFromFields($row,$fields);
                }
                echo table($theadHTML,$tableBody);
            ?>
        </div>
    </body>
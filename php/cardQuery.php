<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Cards';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
        	<?php
        		$conditionBlock = array();
        		// Initialize with attributes we always want.
        		$sAttrArr = array('cardName','setName');
        		echo backToQueryButton('cards.php');
        		foreach ($_POST as $key => $value) {
        			if($key == 'rarity' and $value == 'Any'){
        				// Means we don't add rarity to the where condition.
        				continue;
        			}
        			if($value){
        				$condition = " $key='$value' ";
        				array_push($conditionBlock, $condition);
        				array_push($sAttrArr,$key);
        			}
        		}
        		$selectAttr = '';
        		if(count($sAttrArr) > 0){
        			$selectAttr = join(",",$sAttrArr);
        		}
        		$where = '';
        		if(count($conditionBlock) > 0){
        			// Join with AND.
        			$where = "WHERE " . join("AND",$conditionBlock);	
        		}
        		$sql = <<<QUERY
SELECT $selectAttr 
FROM Cards 
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
				$columnNames = $sAttrArr;
		        $theadHTML = tableHeading($columnNames);
		        $tableBody = '';
		        $fields = $sAttrArr;
		        while ($row = $r->fetch_array()) {
		            $tableBody = $tableBody . tableRowFromFields($row,$fields);
		        }
		        echo table($theadHTML,$tableBody);
        	?>
        </div>
    </body>
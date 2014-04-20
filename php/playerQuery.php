<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Player Search Results';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
        	<?php
        		$conditionBlock = array();
        		echo backToQueryButton('players.php');
        		foreach ($_POST as $key => $value) {
        			if(stripos($key,'Range')){
        				// Don't pick up the range dropdowns.
        				continue;
        			}
        			if($value){
        				$op = rangeOpStr($_POST[$key.'Range']);
        				$condition = " $key$op'$value' ";
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
FROM Players 
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
				$columnNames = array('Username','First Name','Last Name','Birthday','Wins','Losses','Draws','Ranking');
                $theadHTML = tableHeading($columnNames);
		        $tableBody = '';
		        $fields = array('playerUsername','firstName','lastName','birthday','wins','losses','draws','ranking');
		        while ($row = $r->fetch_array()) {
		            $tableBody = $tableBody . tableRowFromFields($row,$fields);
		        }
		        echo table($theadHTML,$tableBody);
        	?>
        </div>
    </body>
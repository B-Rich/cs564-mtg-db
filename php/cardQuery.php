<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Cards';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
            $cardName = $_POST["cardName"];
    ?>
    <body>
        <div class="container">
        	<?php
        		echo backToQueryButton('cards.php');
        		$sql = <<<QUERY
SELECT cardName,setName 
FROM Cards 
WHERE cardName='$cardName';
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
					echo dbSuccess();
				}
				$columnNames = array('Card Name', 'Set Name');
		        $theadHTML = tableHeading($columnNames);
		        $tableBody = '';
		        $fields = array('cardName','setName');
		        while ($row = $r->fetch_array()) {
		            $tableBody = $tableBody . tableRowFromFields($row,$fields);
		        }
		        echo table($theadHTML,$tableBody);
        	?>
        </div>
    </body>
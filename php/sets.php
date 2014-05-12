<!DOCTYPE HTML>
<!-- 
List sets ORDER(ED) BY the most recent sets.
 -->
<html>
    <?php 
    $title = 'MTG DB - Sets';
    require_once('heading.php'); 
    require_once('bootstrap.php');
    require_once('utils.php');
    ?>
    <div class="container">
        <?php
        $sql = 'SELECT * FROM Sets ORDER BY dateReleased DESC;';
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
        $columnNames = array('Set Name', 'Date Released');
        $theadHTML = tableHeading($columnNames);
        $tableBody = '';
        $row = $r->fetch_assoc();
        $fields = array('setName','dateReleased');
        while ($row = $r->fetch_array()) {
            $tableBody = $tableBody . tableRowFromFields($row,$fields);
        }
        $tableHTML = table($theadHTML,$tableBody);
        echo $tableHTML;
        ?>
    </div>
</body>
</html>

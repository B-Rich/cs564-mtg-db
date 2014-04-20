<!DOCTYPE HTML>

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
        if (!$r) {
            printf ("Query '$sql' failed: %s (%d)\n", $db->error, $db->errno);
            exit();
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

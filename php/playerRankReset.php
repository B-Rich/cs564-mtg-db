<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Player Rank Reset';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
            <?php
                echo backToQueryButton('players.php');
                $sql = <<<QUERY
UPDATE Players
SET ranking = 999;
QUERY;
                $r = $db->query($sql);
                if(!$r){
                    echo dbError($sql,$db);
                    return;
                }
                else {
                    echo dbSuccess($sql);
                    echo <<<HTML
<p class="lead-text">The ranks have been successfully reset.</p>
HTML;
                }
                $sql = <<<QUERY
SELECT * 
FROM Players ORDER BY ranking ASC LIMIT 100;
QUERY;
                $r = $db->query($sql);
                if(!$r){
                    echo dbError($sql,$db);
                    return;
                }
                else {
                    echo dbSuccess($sql);
                }
                echo <<<HTML
<h3>Reset Player Rankings:</h3>
HTML;
                $columnNames = array('Username','Ranking','First Name','Last Name','Birthday','Wins','Losses','Draws',);
                $theadHTML = tableHeading($columnNames);
                $tableBody = '';
                $fields = array('playerUsername','ranking','firstName','lastName','birthday','wins','losses','draws');
                while ($row = $r->fetch_array()) {
                    $tableBody = $tableBody . tableRowFromFields($row,$fields);
                }
                echo table($theadHTML,$tableBody);
            ?>
        </div>
    </body>
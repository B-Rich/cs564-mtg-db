<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Player Rank Calculation';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
    ?>
    <body>
        <div class="container">
            <?php
                echo backToQueryButton('players.php');
                $sql = <<<QUERY
UPDATE Players AS p,
    (
        SELECT @rownum:=@rownum+1 rownum, playerUsername, wins
        FROM Players, (SELECT @rownum := 0) rn
        ORDER BY wins DESC
    ) AS pr
SET p.ranking = pr.rownum
WHERE p.playerUsername = pr.playerUsername;
QUERY;
                $r = $db->query($sql);
                if(!$r){
                    echo dbError($sql,$db);
                    return;
                }
                else {
                    echo dbSuccess($sql);
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
<h3>Updated Player Rankings:</h3>
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
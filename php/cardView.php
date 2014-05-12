<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - View Card';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
        ?>
    <body>
        <div class="container">
           <?php
           $cardId = $_GET['cardId'];
           $sql = "SELECT * FROM Cards WHERE cardId=$cardId;";
           $r = $db->query($sql);
           if(!$r){
                echo dbError($sql,$db);
                return;
            }
            else if($r->num_rows <= 0){
                echo dbWarning($sql);
                return;
            }
            $data = $r->fetch_array();
            $imageLink = $data['imageLink'];
            $cardName = $data['cardName'];
            $prevCard = "http://cs.unm.edu/~lnunno/cs564/mtg-db/cardView.php?cardId=" . strval($cardId-1);
            $nextCard = "http://cs.unm.edu/~lnunno/cs564/mtg-db/cardView.php?cardId=" . strval($cardId+1);
            $cardDisplayHTML = <<<HTML
<ul class="pager">
  <li class="previous"><a href="$prevCard">&larr; Previous Card</a></li>
  <li class="next"><a href="$nextCard">Next Card &rarr;</a></li>
</ul>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">$cardName</h3>
  </div>
  <div class="panel-body">
    <a class="btn btn-danger btn-lg" href="cardDelete.php?cardId=$cardId">Delete this card</a>
    <div class="row text-center">
    <img src="$imageLink" class="img-thumbnail">
    </div>
  </div>
</div>
HTML;
            echo $cardDisplayHTML;
            $sellsQuery = <<<SQL
SELECT * 
FROM Sells 
WHERE cardId = $cardId;
SQL;
            $sr = $db->query($sellsQuery);
            if(!$sr){
                echo dbError($sellsQuery,$db);
                return;
            }
            else if($sr->num_rows <= 0){
                echo dbWarning($sellsQuery);
                echo 'No retailers found.';
                return;
            }
            $columnNames = array('Name','Location','Price','Quantity');
            $theadHTML = tableHeading($columnNames);
            $fields = array('retailerName','location','price','quantity');
            while ($row = $sr->fetch_array()) {
                $tableBody = $tableBody . tableRowFromFields($row,$fields);
            }
            $retailerInfoHTML = table($theadHTML,$tableBody);
            $sellsHTML = <<<HTML
<h2>Available from these retailers:</h2>
$retailerInfoHTML
HTML;
            echo $sellsHTML;
           ?> 
        </div>
    </body>
</html>
<?php
require_once('bootstrap.php');
/*
Utility functions for generating the webpages.
*/
function tableHeading($headings){
    $ths = '';
    foreach($headings as $h){
        $ths = $ths . "<th>$h</th>\n";
    }
    return <<<HTML
<thead>
    <tr>
        $ths
    </tr>
</thead>
HTML;
}

function tableRowFromFields($row,$fields){
    $tds = '';
    foreach($fields as $f){
        $tds = $tds . "<td>{$row[$f]}</td>\n";
    }
    return <<<HTML
<tr>
    $tds
</tr>
HTML;
}

function table($theadHTML,$tableBody){
    return <<<HTML
<table class="table table-hover">
    $theadHTML
    <tbody>
        $tableBody
    </tbody>
</table>
HTML;
}

function numberRangeDropdown($id){
    return <<<HTML
    <select id="$id" name="$id">
        <option value="eq">
            &#61;
        </option>
        <option value="lt">
            &lt;
        </option>
        <option value="lte">
            &le;
        </option>
        <option value="gt">
            &gt;
        </option>
        <option value="gte">
            &ge;
        </option>
    </select>
HTML;
}

function rangeOpStr($op){
    switch ($op) {
        case 'lt':
            return '<';
            break;
        case 'lte':
            return '<=';
            break;
        case 'gt':
            return '>';
            break;
        case 'ge':
            return '>=';
            break;
        default:
            return "=";
            break;
    }
}

function dbError($sql,$db){
    $errorStr = $db->error;
    $code = $db->errno;
    $content = <<<HTML
<strong>Error</strong>
<p>There was an error with the query:
<pre>
$sql
</pre>
$errorStr
($code)
</p>
HTML;
    return alert($content,'danger',True);
}

function dbWarning($sql){
    $content = <<<HTML
<strong>Warning!</strong>
<p>The following query returned 0 rows:<br>
<pre>
$sql
</pre>
</p>
HTML;
    return alert($content,'warning',True);
}

function dbSuccess($sql){
    $content = <<<HTML
<strong>Hooray!</strong>
<p> The query 
<pre>
$sql
</pre>
was successful.
</p>
HTML;
    return alert($content,'success',True);
}

function dbTabs(){
    $queryClass = '';
    $addClass = '';
    $updateClass = '';
    $deleteClass = '';
    $action = $_GET['action'];
    switch ($action) {
        case '$query':
            $queryClass = 'active';
            break;
        case 'add':
            $addClass = 'active';
            break;
        case 'update':
            $updateClass = 'active';
            break;
        case 'delete':
            $deleteClass = 'active';
            break;
        default:
            $queryClass = 'active';
            break;
    }
    $si = searchIcon();
    $ai = addIcon();
    $ui = updateIcon();
    $di = deleteIcon();
    return <<<HTML
    <ul class="nav nav-tabs nav-justified">
                <li class="$queryClass">
                    <a href="#query" data-toggle="tab">$si Query</a>
                </li>
                <li class="$addClass">
                    <a href="#add" data-toggle="tab">$ai Add</a>
                </li>
                <li class="$updateClass">
                    <a href="#update" data-toggle="tab">$ui Update</a>
                </li>
                <li class="$deleteClass">
                    <a href="#delete" data-toggle="tab">$di Delete</a>
                </li>
    </ul>
HTML;
}
?>
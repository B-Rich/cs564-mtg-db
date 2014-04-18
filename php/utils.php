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
    <select id="$id">
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

function dbError($sql,$db){
    $content = <<<HTML
<strong>Error</strong>
<p>There was an error with the query:
<pre>
$sql
</pre>
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

function dbSuccess(){
    $content = <<<HTML
<strong>Hooray!</strong>
<p> The query was successful, here are the results:
</p>
HTML;
    return alert($content,'success',True);
}
?>
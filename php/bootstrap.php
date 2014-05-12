<?php
/*
A collection of functions to generate bootstrap html components.
*/

/*
Gets the Bootstrap 3 CSS and javascript resources.
*/
function bootstrapCDN($bootswatchName='None'){
	if($bootswatchName == "None"){
		$cssLink = "http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css";
	}
	else {
		$cssLink = "http://netdna.bootstrapcdn.com/bootswatch/3.1.1/$bootswatchName/bootstrap.min.css";
	}
	$bootswatchNames = array('amelia','cerulian');
	$cdn = <<<HTML
<script src="http://code.jquery.com/jquery-1.10.2.min.js">
    
</script>
<link rel="stylesheet" href="$cssLink">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js">
    
</script>
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
HTML;
	return $cdn;
}

/*
Create a Glyphicon Icon.
*/
function glyphicon($iconName){
	return "<span class=\"glyphicon glyphicon-$iconName\"></span>";
}


function searchIcon(){
	return glyphicon('search');
}

function addIcon(){
	return '<i style="color: green;" class="fa fa-plus-square"></i>';
}

function updateIcon(){
	return '<i style="color: gold;" class="fa fa-refresh"></i>';
}

function deleteIcon(){
	return '<i style="color: red;" class="fa fa-minus-square"></i>';
}

function deleteIconLg(){
	return '<i style="color: red;" class="fa fa-minus-square fa-lg"></i>';
}

function backIcon(){
	return '<i style="color: blue;" class="fa fa-arrow-circle-left"></i>';
}

function listIcon(){
	return glyphicon('th-list');
}

function backToQueryButton($href){
	$icon = backIcon();
	return <<<HTML
	<a class="btn btn-default btn-lg" href="$href">$icon Back to Query</a>
HTML;
}


/*
Create a panel.
*/
function panel($panelHeading,$panelBody='',$table='',$class='default'){
	$panelBodyDiv = '';
	if($panelBody){
		$panelBodyDiv = <<<HTML
<div class="panel-body">
        $panelBody
</div>
HTML;
	}
	$panelDiv = <<<HTML
<div class="panel panel-$class">
      <!-- Default panel contents -->
      <div class="panel-heading">$panelHeading</div>
      $panelBodyDiv
      $table
</div>
HTML;
	return $panelDiv;
}

class Image{

	public $src;
	public $caption;

	public function __construct($src,$caption='') {
		$this->src = $src;
		$this->caption = $caption;
	}

}

function carousel($id,$images){
	$indicators = '<ol class="carousel-indicators">';
	$imageSlides = '';
	foreach($images as $key=>$value){
		$indicatorClass = '';
		if($key == '0'){
			$indicatorClass = 'class="active"';
		}
		$indicators = $indicators . "<li data-target=\"#$id\" data-slide-to=\"$key\" $indicatorClass></li>";
		$slideClass = 'item';
		if($key == '0'){
			$slideClass = $slideClass . ' active';
		}
		$captionHTML = '';
		if($value->caption){
			$captionHTML = <<<HTML
<div class="carousel-caption">
    {$value->caption}
</div>
HTML;
		}
		$imageSlides = $imageSlides . <<<IMG
		<div class="$slideClass">
			<img src="{$value->src}">
			$captionHTML
		</div>
IMG;
	}
	$indicators = $indicators . '</ol>';
	$carouselHtml = <<<HTML
<div id="$id" class="carousel slide" data-ride="carousel">
     $indicators
      <div class="carousel-inner">
      	$imageSlides
      </div>
      <a class="left carousel-control" href="#$id" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#$id" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
HTML;
	return $carouselHtml;
}

/*
Create an alert with the given information type.
*/
function alert($content,$type='warning',$dismissable=False){
	$dismissHtml = '';
	if($dismissable){
		$dismissHtml = '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	}
	$alertHtml = <<<HTML
<div class="alert alert-$type">
	$dismissHtml
$content
</div>
HTML;
	return $alertHtml;
}
?>

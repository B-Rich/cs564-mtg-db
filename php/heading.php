<head>
	<?php
	include_once "bootstrap.php";
	echo bootstrapCDN();
	function searchIcon(){
		echo glyphicon('search');
	}

	function addIcon(){
		echo '<i class="fa fa-plus-square btn-success"></i>';
	}

	function deleteIcon(){
		echo '<i class="fa fa-minus-square btn-danger"></i>';
	}

	function listIcon(){
		echo glyphicon('th-list');
	}
	?>

</head>
<body style="padding-top: 70px;">
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home" style="padding-right: 5px;"></span>MTG DB</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sets<b class="caret"></b></a>
            	<ul class="dropdown-menu">
                <li><a href="#"><?php listIcon() ?> List sets</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Modifications</li>
                <li><a href="#"><?php addIcon() ?> Add set</a></li>
                <li><a href="#"><?php deleteIcon() ?> Remove set</a></li>
              </ul>
            </li>
            <li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cards<b class="caret"></b></a>
            	<ul class="dropdown-menu">
                <li><a href="#"><?php searchIcon() ?> Find card</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Modifications</li>
                <li><a href="#"><?php addIcon() ?> Add card</a></li>
                <li><a href="#"><?php deleteIcon() ?> Remove card</a></li>
              </ul>
            </li>
            <li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Players<b class="caret"></b></a>
            	<ul class="dropdown-menu">
                <li><a href="#"><?php searchIcon() ?> Find player</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Modifications</li>
                <li><a href="#"><?php addIcon() ?> Add player</a></li>
                <li><a href="#"><?php deleteIcon() ?> Remove player</a></li>
              </ul>
            </li>
            <li class="dropdown">
            	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Blogs<b class="caret"></b></a>
            	<ul class="dropdown-menu">
                <li><a href="#"><?php searchIcon() ?> Find blog</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Modifications</li>
                <li><a href="#"><?php addIcon() ?> Add blog</a></li>
                <li><a href="#"><?php deleteIcon() ?> Remove blog</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Retailers<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><?php searchIcon() ?> Find retailer</a></li>
                <li><a href="#"><i class="fa fa-star" style="color: gold;"></i> Rate retailer</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Modifications</li>
                <li><a href="#"><?php addIcon() ?> Add player</a></li>
                <li><a href="#"><?php deleteIcon() ?> Remove player</a></li>
              </ul>
            </li>
          </ul>
          <span class="nav navbar-nav navbar-right">
          </span>
        </div><!--/.nav-collapse -->
      </div>
    </div>
</body>
<!DOCTYPE HTML>
<html>
	<?php 
						require_once("heading.php"); 
						require_once("bootstrap.php");
						require_once("utils.php")
						?>
	<head>
		<title></title>
	</head>
	<body>
		<div class="container">
			<h1>
				Retailers
			</h1><!-- Nav tabs -->
			<ul class="nav nav-tabs nav-justified">
				<li class="active">
					<a href="#query" data-toggle="tab"><?php echo searchIcon(); ?> Query</a>
				</li>
				<li>
					<a href="#add" data-toggle="tab"><?php echo addIcon(); ?> Add</a>
				</li>
				<li>
					<a href="#update" data-toggle="tab"><?php echo updateIcon(); ?> Update</a>
				</li>
				<li>
					<a href="#delete" data-toggle="tab"><?php echo deleteIcon(); ?> Delete</a>
				</li>
			</ul><!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane active" id="query">
					<form role="form" action="retailerQuery.php" method="post">
						<p class="help-block">
							The fields below are optional.
						</p>
						<div class="form-group">
							<label for="retailerName">Retailer Name</label> <input class="form-control" id="retailerName" name="retailerName" placeholder="Twin Suns">
						</div>
						<div class="form-group">
							<label for="location">Location</label> <input class="form-control" id="location" name="location" placeholder="Albuquerque, New Mexico">
						</div>
						<div class="form-group form-inline">
							<label for="rating">Rating</label> <input type="number" class="form-control" id="rating" name="rating" min="0"> <?php echo numberRangeDropdown("ratingRange"); ?>
						</div><button type="submit" class="btn btn-primary btn-lg">Search for Retailers</button>
					</form>
				</div>
				<div class="tab-pane" id="add">
					<form role="form" action="retailerAdd.php" method="post">
						<p class="help-block">
							All fields are required.
						</p>
						<div class="form-group">
							<label for="retailerName">Retailer Name</label> <input class="form-control" id="retailerName2" name="retailerName" placeholder="Twin Suns" required="">
						</div>
						<div class="form-group">
							<label for="location">Location</label> <input class="form-control" id="location2" name="location" placeholder="Albuquerque, New Mexico" required="">
						</div><button type="submit" class="btn btn-success btn-lg">Add Retailer</button>
					</form>
				</div>
				<div class="tab-pane" id="update">
					<div class="row">
						<h3>
							Update card prices
						</h3>
					</div>
					<form role="form" action="retailerUpdatePrice.php" method="post">
						<div class="form-group form-inline">
							<label for="retailerName">Retailer Name</label> <input class="form-control" id="retailerName" name="retailerName" required>
							<label for="rarity">Rarity</label> <select id="rarity" name="rarity">
								<option value="Common">
									Common
								</option>
								<option value="Uncommon">
									Uncommon
								</option>
								<option value="Rare">
									Rare
								</option>
								<option value="Mythic Rare">
									Mythic Rare
								</option>
							</select>
							<label for="price">Price</label> <input type="number" step="any" class="form-control" id="price" name="price" min="0" required>
							<button type="submit" class="btn btn-warning">Update Prices</button>
						</div>
					</form>
				</div>
				<div class="tab-pane" id="delete">
					Delete
				</div>
			</div>
		</div>
	</body>
</html>
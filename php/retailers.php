<!DOCTYPE HTML>
<html>
	<?php 
			require_once("heading.php"); 
			require_once("bootstrap.php");
			require_once("utils.php")
			?>
	<body>
		<div class="container">
			<h1>Retailers</h1>
			<!-- Nav tabs -->
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
                        </div>
						<button type="submit" class="btn btn-primary btn-lg">Search for Retailers</button>
					</form>
				</div>
				<div class="tab-pane" id="add">
					<form role="form" action="retailerAdd.php" method="post">
						<p class="help-block">
							All fields are required.
						</p>
						<div class="form-group">
							<label for="retailerName">Retailer Name</label> <input class="form-control" id="retailerName" name="retailerName" placeholder="Twin Suns" required>
						</div>
						<div class="form-group">
							<label for="location">Location</label> <input class="form-control" id="location" name="location" placeholder="Albuquerque, New Mexico" required>
						</div>
						<button type="submit" class="btn btn-success btn-lg">Add Retailer</button>
					</form>
				</div>
				<div class="tab-pane" id="update">
					Update
				</div>
				<div class="tab-pane" id="delete">
					Delete
				</div>
			</div>
		</div>
	</body>
</html>
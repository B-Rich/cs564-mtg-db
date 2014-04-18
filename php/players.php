<!DOCTYPE HTML>
<html>
	<?php 
			require_once("heading.php"); 
			require_once("bootstrap.php");
			require_once("utils.php")
			?>
	<body>
		<div class="container">
			<h1>Players</h1>
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
					<form role="form">
						<p class="help-block">
							The fields below are optional.
						</p>
						<div class="form-group">
							<label for="username">Username</label> <input class="form-control" id="username" placeholder="billysmith">
						</div>
						<div class="form-group">
							<label for="firstName">First Name</label> <input class="form-control" id="firstName" placeholder="Billy">
						</div>
						<div class="form-group">
							<label for="lastName">Last Name</label> <input class="form-control" id="lastName" placeholder="Smith">
						</div>
						<div class="form-group">
							<label for="birthday">Birthday</label> <input type="date" class="form-control" id="birthday">
						</div>
						<div class="form-group form-inline">
							<label for="ranking">Ranking</label> <input type="number" class="form-control" id="ranking" min="0"> <?php echo numberRangeDropdown("rankingRange"); ?>
						</div>
						<div class="form-group form-inline">
							<label for="wins">Wins</label> <input type="number" class="form-control" id="wins" min="0"> <?php echo numberRangeDropdown("winsRange"); ?>
						</div>
						<div class="form-group form-inline">
							<label for="losses">Losses</label> <input type="number" class="form-control" id="losses" min="0"> <?php echo numberRangeDropdown("lossesRange"); ?>
						</div>
						<div class="form-group form-inline">
							<label for="draws">Draws</label> <input type="number" class="form-control" id="draws" min="0"> <?php echo numberRangeDropdown("drawsRange"); ?>
						</div>
						<button type="submit" class="btn btn-primary btn-lg">Search for Players</button>
					</form>
				</div>
				<div class="tab-pane" id="add">
					<form role="form">
						<p class="help-block">
							Username is the only required field.
						</p>
						<div class="form-group">
							<label for="username">Username</label> <input class="form-control" id="username" placeholder="billysmith" required>
						</div>
						<div class="form-group">
							<label for="firstName">First Name</label> <input class="form-control" id="firstName" placeholder="Billy">
						</div>
						<div class="form-group">
							<label for="lastName">Last Name</label> <input class="form-control" id="lastName" placeholder="Smith">
						</div>
						<div class="form-group">
							<label for="birthday">Birthday</label> <input type="date" class="form-control" id="birthday">
						</div>
						<button type="submit" class="btn btn-success btn-lg">Add Player</button>
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
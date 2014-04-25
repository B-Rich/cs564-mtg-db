<!DOCTYPE HTML>
<!-- 
	Player form 
-->
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
					<form role="form"  action="playerQuery.php" method="post">
						<p class="help-block">
							The fields below are optional.
						</p>
						<div class="form-group">
							<label for="playerUsername">Username</label> <input class="form-control" id="playerUsername" name="playerUsername" placeholder="billysmith">
						</div>
						<div class="form-group">
							<label for="firstName">First Name</label> <input class="form-control" id="firstName" name="firstName" placeholder="Billy">
						</div>
						<div class="form-group">
							<label for="lastName">Last Name</label> <input class="form-control" id="lastName" name="lastName" placeholder="Smith">
						</div>
						<div class="form-group">
							<label for="birthday">Birthday</label> <input type="date" class="form-control" id="birthday" name="birthday">
						</div>
						<div class="form-group form-inline">
							<label for="ranking">Ranking</label> <input type="number" class="form-control" id="ranking" name="ranking" min="0"> <?php echo numberRangeDropdown("rankingRange"); ?>
						</div>
						<div class="form-group form-inline">
							<label for="wins">Wins</label> <input type="number" class="form-control" id="wins" name="wins" min="0"> <?php echo numberRangeDropdown("winsRange"); ?>
						</div>
						<div class="form-group form-inline">
							<label for="losses">Losses</label> <input type="number" class="form-control" id="losses" name="losses" min="0"> <?php echo numberRangeDropdown("lossesRange"); ?>
						</div>
						<div class="form-group form-inline">
							<label for="draws">Draws</label> <input type="number" class="form-control" id="draws" name="draws" min="0"> <?php echo numberRangeDropdown("drawsRange"); ?>
						</div>
						<button type="submit" class="btn btn-primary btn-lg">Search for Players</button>
					</form>
				</div>
				<div class="tab-pane" id="add">
					<form role="form" action="playerAdd.php" method="post">
						<p class="help-block">
							Username is the only required field.
						</p>
						<div class="form-group">
							<label for="playerUsername">Username</label> <input class="form-control" id="playerUsername" name="playerUsername" placeholder="billysmith" required>
						</div>
						<div class="form-group">
							<label for="firstName">First Name</label> <input class="form-control" id="firstName" name="firstName" placeholder="Billy">
						</div>
						<div class="form-group">
							<label for="lastName">Last Name</label> <input class="form-control" id="lastName" name="lastName" placeholder="Smith">
						</div>
						<div class="form-group">
							<label for="birthday">Birthday</label> <input type="date" class="form-control" id="birthday" name="birthday">
						</div>
						<button type="submit" class="btn btn-success btn-lg">Add Player</button>
					</form>
				</div>
				<div class="tab-pane" id="update">
					<p class="help-block">
							Operations that update the Player table.
					</p>
					<a class="btn btn-danger btn-lg" href="playerRankReset.php">Reset player rankings</a>
					<a class="btn btn-primary btn-lg" href="playerCalcRanks.php">Calculate player rankings</a>
				</div>
				<div class="tab-pane" id="delete">
					Delete
				</div>
			</div>
		</div>
	</body>
</html>
<!DOCTYPE HTML>
<html>
    <?php 
            $title = 'MTG DB - Cards';
            require_once("heading.php"); 
            require_once("bootstrap.php");
            require_once("utils.php");
        ?>
    <body>
        <div class="container">
            <h1>
                Cards
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
                    <form role="form" action="cardQuery.php" method="post">
                        <p class="help-block">
                            Most of the fields below are optional.
                        </p>
                        <div class="form-group">
                            <label for="cardName">Card Name</label> <input class="form-control" id="cardName" name="cardName" placeholder="Grave Titan">
                        </div>
                        <div class="form-group">
                            <label for="setName">Set Name</label> <input class="form-control" id="setName" name="setName" placeholder="Magic 2014">
                        </div>
                        <div class="form-group">
                            <label for="rarity">Rarity</label> <select id="rarity" name="rarity">
                                <option value="Any">
                                    Any
                                </option>
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
                        </div><!-- <label for="color">Colors</label>
                        <div class="checkbox">
                            <label><input type="checkbox" name="color" value="red"> Red</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="color" value="blue"> Blue</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="color" value="green"> Green</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="color" value="black"> Black</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="color" value="white"> White</label>
                        </div> -->
                        <div class="form-group">
                            <label for="ruleText">Rule Text</label> <input class="form-control" id="ruleText" name="ruleText" placeholder="Trample">
                        </div>
                        <div class="form-group">
                            <label for="flavorText">Flavor Text</label> <input class="form-control" id="flavorText" name="flavorText" placeholder="Excelsior!">
                        </div>
                        <div class="form-group form-inline">
                            <label for="cmc">Converted Mana Cost</label> <input type="number" class="form-control" id="cmc" name="cmc" min="0"> <?php echo numberRangeDropdown("cmcRange"); ?>
                        </div>
                        <div class="form-group form-inline">
                            <label for="power">Power</label> <input type="number" class="form-control" id="power" name="power" min="0"> <?php echo numberRangeDropdown("powerRange"); ?>
                        </div>
                        <div class="form-group form-inline">
                            <label for="toughness">Toughness</label> <input type="number" class="form-control" id="toughness" name="toughness" min="0"> <?php echo numberRangeDropdown("toughnessRange"); ?>
                        </div><button type="submit" class="btn btn-primary btn-lg">Search for Cards</button>
                    </form>
                </div>
                <div class="tab-pane" id="add">
                    Add
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
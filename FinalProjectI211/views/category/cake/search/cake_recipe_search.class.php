<?php

/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: cake_recipe_search.class.php
 * Description:this is search page
 */
class CakeRecipeSearch extends CakeNav
{
    public function display($terms, $recipes)
    {
        parent::displayHeader("Baker's Central Cake Search Results");

        ?>
        <div style="text-align: center"><h1>Search Results for <i><?= $terms ?></i></h1></div>
        <span class="rcd-numbers">
            <?php
            echo((!is_array($recipes)) ? "( 0 - 0 )" : "( 1 - " . count($recipes) . " )");
            ?>
        </span>
        <div style="width: 100%; margin-top: 40px">
            <div id="searchbar" style="width:360px;margin:auto;">
                <form method="get" action="<?= BASE_URL ?>/cake/search">
                    <input style="height: 50px; width: 300px; margin: 0;border: none; padding: 0;" type="text"
                           name="query-terms" id="searchtextbox" placeholder="Search recipe by name" autocomplete="off"
                           onkeyup="handleKeyUp(event)">
                    <input style="height: 50px; width: 50px; border: none; margin: 0;padding: 0;" type="submit"
                           value="Go"/>
                </form>
                <div id="suggestionDiv"></div>
            </div>
        </div>
        <div class="recipeList">

            <?php
            if ($recipes === 0) {
                echo "<h1 style='text-align: center;font-size: 50px;'>No recipes have been found.</h1>";
            } else {
                //display recipes in a grid; six recipes per row
                foreach ($recipes as $i => $recipe) {
                    $id = $recipe->getId();
                    $name = $recipe->getName();
                    $publish_date = new \DateTime($recipe->getPublishDate());
                    $category = $recipe->getCategory();
                    $difficulty = $recipe->getDifficulty();
                    $image = $recipe->getImage();
                    if ($category == "Bread") {
                        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                            $image = BASE_URL . "/" . BREAD_IMG . $image;
                        }
                    } elseif ($category == "Cake") {
                        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                            $image = BASE_URL . "/" . CAKE_IMG . $image;
                        }
                    } elseif ($category == "Cookie") {
                        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                            $image = BASE_URL . "/" . COOKIE_IMG . $image;
                        }
                    }
                    if ($i % 4 == 0) {
                        echo "<div class='row'>";
                    }
                    ?>
                    <div class="recipeHolder" onclick="window.open('<?= BASE_URL ?>/cake/detail/<?= $id ?>','_self')">
                        <div class="recipeImage">
                            <img src="<?php echo $image ?>">
                        </div>
                        <div class="overlay">
                            <div class="publishDate"><p>Publish Date: <?php echo $publish_date->format('m-d-Y') ?></p>
                            </div>
                            <div class="difficulty"><p>Difficulty: <?php echo $difficulty ?></p></div>
                            <div style="bottom: 0px; position: absolute; width: 100%;">
                                <div class="name"><p><?php echo $name ?></p></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($i % 4 == 3 || $i == count($recipes) - 1) {
                        echo "</div>";
                    }
//                        echo "<div class='col'><p><a href='", BASE_URL, "/all/detail/$id'><img src='" . $image .
//                            "'></a><span>$name<br>Difficulty $difficulty<br>" . $publish_date->format('m-d-Y') . "</span></p></div>";
//
                }
            }
            ?>
        </div>
        <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/cake/index','_self')">
            <p>Go Back to Full Catalog</p>
        </div>
        <?php
        parent::displayFooter();
    }
}
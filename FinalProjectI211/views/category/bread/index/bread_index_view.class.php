<?php
/**
 * Author: "Carlos Banuelos"
 * Date: 4/28/2020
 * File: bread_index_view.class.php
 * Description:
 */

class BreadIndex extends BreadNav
{
    public function display($recipes)
    {
        parent::displayHeader('Bakers Center Bread Recipes Catalog');
        ?>
        <div>
            <h1 style="text-align: center">Scroll through our selection!</h1>
        </div>
        <div style="width: 100%; margin-top: 40px">
            <div id="searchbar" style="width:402px;margin:auto;">
                <form method="get" action="<?= BASE_URL ?>/bread/search">
                    <input class ="searchInput" type="text"
                           name="query-terms" id="searchtextbox" placeholder="Search recipe by name" autocomplete="off"
                           onkeyup="handleKeyUp(event)">
                    <input class="search " type="submit"
                           value="Submit"/>
                </form>
                <div id="suggestionDiv"></div>
            </div>
        </div>
        <?php
        $login_status = 0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['login_status'])) {
            $login_status = $_SESSION['login_status'];
        }
        if ($login_status == 1) {
            ?>
            <div class="addRecipeContainer" onclick="window.open('<?= BASE_URL ?>/bread/add','_self')">
                <p style="font-size: 25px;">Add Recipe</p>
                <!--                <a href="--><?//= BASE_URL ?><!--/all/add"> Add recipe</a>-->
            </div>
            <?php
        } else {
            ?>
            <div class="addRecipeContainer" style="position: relative">
                <p style="font-size: 25px;">Add Recipe</p>
                <!--                <a href="--><?//= BASE_URL ?><!--/all/add"> Add recipe</a>-->
                <div class="addRecipeContainerUser">
                    <p>Please Login First</p>
                </div>
            </div>
            <?php
        }
        ?>
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
                    <div class="recipeHolder" onclick="window.open('<?= BASE_URL ?>/bread/detail/<?= $id ?>','_self')">
                        <div class="recipeImage">
                            <img src="<?php echo $image ?>">
                        </div>
                        <div class="overlay">
                            <div class="publishDate"><p>Publish Date: <?php echo $publish_date->format('m-d-Y')?></p></div>
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

        <?php
        parent::displayFooter();
    }
}
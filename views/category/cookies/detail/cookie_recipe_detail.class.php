<?php
/**
 * Author: "Justin Rice"
 * Date: 4/28/2020
 * File: cookie_recipe_detail.class.php
 * Description:
 */

class CookieRecipeDetail extends CookieNav
{
    public function display($recipe, $confirm = "")
    {
        parent::displayHeader("Recipe Details");

        $id = $recipe->getId();
        $author = $recipe->getAuthor();
        $authorID = $recipe->getAuthorId();
        $recipeName = $recipe->getName();
        $category = $recipe->getCategory();
        $publish_date = new \DateTime($recipe->getPublishDate());
        $ingredients = $recipe->getIngredients();
        $steps = $recipe->getSteps();
        $image = $recipe->getImage();
        $difficulty = $recipe->getDifficulty();
        $description = $recipe->getDescription();
        if ($category == "Cookie") {
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
        ?>
        <div class="middle-row">
            <div class="food">
                <img src="<?= $image ?>">
            </div>
            <div class="detail">
                <h1 class="segmentHeader"><?php echo $recipeName; ?></h1>
                <div class="infoColor">
                    <br>
                    <h3 class="info">Recipe Written by: <span><?php echo $author; ?></span></h3>
                    <br>
                    <h3 class="info">Category: <span><?php echo $category; ?></span></h3>
                    <br>
                    <h3 class="info">Difficulty: <span><?php echo $difficulty; ?></span></h3>
                    <br>
                    <h3 class="info">Publish Date: <span><?php echo $publish_date->format('m-d-Y'); ?></span></h3>
                    <br>
                </div>
                <h1 class="segmentHeader">Description</h1>
                <div class="infoColor">
                    <br>
                    <h3 class="info"><span><?php echo $description; ?></span></h3>
                    <br>
                </div>
                <h1 class="segmentHeader">Ingredients</h1>
                <div class="infoColor">
                    <br>
                    <h3 class="info"><span><?php echo $ingredients ?></span></h3>
                    <br>
                </div>
                <h1 class="segmentHeader">Steps</h1>
                <div class="infoColor">
                    <br>
                    <h3 class="info"><span><?php echo $steps; ?></span></h3>
                    <br>
                </div>
                <div class="edge">
                    <div style="color: white; text-align: center" id="confirm-message"><h1><?= $confirm ?> </h1></div>
                </div>
            </div>
            <?php
            $userID = 0;
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (isset($_SESSION['role'], $_SESSION['user_id'])) {
                $userID = $_SESSION['user_id'];
            }
            if ($userID == 5 || $userID == $authorID) {
                ?>
                <div class="editButton">
                    <input style="float: left" type="button" id="Edit" value="  Edit  "
                           onclick="window.location.href = '<?= BASE_URL ?>/cookie/edit/<?= $id ?>'">
                    <input style="float: right" type="button" id="Delete" value="  Delete  "
                           onclick=" var r = confirm('Are u sure you want to delete the recipe'); if(r == true){window.open('<?= BASE_URL ?>/cookie/delete/<?= $id ?>/','_self')}">
                </div>
                <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/cookie/index','_self')">
                    <p>Go Back</p>
                </div>
                <?php
            } else {
                ?>
                <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/cookie/index','_self')">
                    <p>Go Back</p>
                </div>
                <?php
            }

            ?>

        </div>
        <?php
        parent::displayFooter();
    }
}
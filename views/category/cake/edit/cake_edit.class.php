<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: cake_edit.class.php
 * Description:this is the edit page for recipes
 */

class CakeEdit extends CakeNav
{
    public function display($recipe)
    {
        parent::displayHeader("Cake Recipe Edit Page");

        $userID = 0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['role'], $_SESSION['user_id'])) {
            $userID = $_SESSION['user_id'];
        }

        $id = $recipe->getId();
        $author = $recipe->getAuthor();
        $authorID = $recipe->getAuthorId();
        $recipeName = $recipe->getName();
        $category = $recipe->getCategory();
        $publish_date = $recipe->getPublishDate();
        $difficulty = $recipe->getDifficulty();
        $ingredients = $recipe->getIngredients();
        $steps = $recipe->getSteps();
        $image = $recipe->getImage();
        $description = $recipe->getDescription();
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

        if ($userID == 5 || $userID == $authorID) {
            ?>
            <div class="middle-row">
                <form action="<?= BASE_URL ?>/cake/update/<?= $id ?>" method="post">
                    <div class="food">
                        <img src="<?= $image ?>">
                    </div>
                    <div class="detail">
                        <h1 class="segmentHeader"><input style="font-size: 30px; border: none; width: 425px"
                                                         name="Name" maxlength="30"
                                                         value="<?php echo $recipeName; ?>"></h1>
                        <div class="infoColor">
                            <br>
                            <h3 class="info">Recipe Written by: <span><?php echo $author; ?></span></h3>
                            <br>
                            <h3 class="info">Category: <select name="Category" style="border: none; font-size: 20px">
                                    <option value="Bread" <?php if ($category == 'Bread') echo 'selected="selected"'; ?>>
                                        Bread
                                    </option>
                                    <option value="Cookie" <?php if ($category == 'Cookie') echo 'selected="selected"'; ?>>
                                        Cookie
                                    </option>
                                    <option value="Cake" <?php if ($category == 'Cake') echo 'selected="selected"'; ?>>
                                        Cake
                                    </option>
                                </select></h3>
                            <br>
                            <h3 class="info">Difficulty: <select name="Difficulty"
                                                                 style="border: none; font-size: 20px">
                                    <option value="Simple" <?php if ($difficulty == 'Simple') echo 'selected="selected"'; ?>>
                                        Simple
                                    </option>
                                    <option value="Advanced" <?php if ($difficulty == 'Advanced') echo 'selected="selected"'; ?>>
                                        Advanced
                                    </option>
                                </select></h3>
                            <br>
                            <h3 class="info">Publish Date: <span><?php echo $publish_date ?></span>
                            </h3>
                            <br>
                        </div>
                        <h1 class="segmentHeader">Description</h1>
                        <div class="infoColor">
                            <br>
                            <h3 class="info"><span><textarea style="width: 100%;white-space: pre-wrap;resize: none;font-size: 20px"
                                                             name="Description" rows="6"
                                                             required><?php echo $description; ?></textarea></span></h3>
                            <br>
                        </div>
                        <h1 class="segmentHeader">Ingredients</h1>
                        <div class="infoColor">
                            <br>
                            <h3 class="info"><span><textarea style="white-space: pre-wrap;resize: none;font-size: 20px;width: 100%;w"
                                                             name="Ingredients" rows="15"
                                                             required><?php echo $ingredients ?></textarea></span></h3>
                            <br>
                        </div>
                        <h1 class="segmentHeader">Steps</h1>
                        <div class="infoColor">
                            <br>
                            <h3 class="info"><span><textarea style="white-space: pre-wrap;resize: none;font-size: 20px;width: 100%;"
                                                             name="Steps" rows="25"
                                                             required><?php echo $steps ?></textarea></span></h3>
                            <br>
                        </div>
                        <div class="edge">
                            <h1 class="segmentHeader">Link: <input style="font-size: 20px; border: none; width: 86%;"
                                                                   name="Image" type="text" size="54"
                                                                   value="<?php echo $image; ?>" required></h1>
                        </div>
                    </div>
                    <div class="editButton">
                        <input style="float: left" type="submit" value="Update">
                        <input style="float: right" type="button" value="cancel" onclick='window.location.href = "<?= BASE_URL . "/cake/detail/" . $id ?>"'>
                    </div>


                </form>
            </div>
            <?php
        } else {
            ?>
            <div style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">
                <h1>You do not hve permission to edit this cake recipe. Please log in as admin or author of the recipe to
                    edit.</h1>
            </div>

            <?php
        }
        parent::displayFooter();
    }

}
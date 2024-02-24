<?php
/**
 * Author: "Justin Eice"
 * Date: 4/28/2020
 * File: cookie_add_recipe.class.php
 * Description:
 */

class CookieAddRecipe extends BreadNav
{
    public function display()
    {
        parent::displayHeader('Bakers Center Bread Recipe');
        $login_status = " ";
        $user_id = 0;
        $user_name = " ";
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['login'], $_SESSION['user_id'], $_SESSION['user_id'])) {
            $login_status = $_SESSION['login_status'];
            $user_name = $_SESSION['login'];
            $user_id = $_SESSION['user_id'];
        }
        if ($login_status == "1") {
            ?>
            <div class="top-row" style="text-align: center">
                <h1>Create New Cookie Recipe</h1>
            </div>
            <br>
            <div class="middle-row">
                <form action="<?= BASE_URL ?>/cookie/register" method="post">
                    <div class="food">
                        <h3 style="position: absolute; width: 500px;  left: 210px; top: 250px; text-align: center">Image
                            will display here. With a max height of 500px. For the width the image will automatically
                            adjust to fit popper aspect ratios.</h3>
                        <img src="<?= BASE_URL ?>/www/img/example.png">
                    </div>
                    <br>
                    <h4 style="text-align: center">Please complete the entire form to submit a new recipe. All fields
                        are
                        required.</h4>
                    <div class="detail">
                        <h1 class="segmentHeader"><input style="font-size: 30px; border: none; width: 425px"
                                                         name="Name" maxlength="30"
                                                         placeholder="Name of Recipe"></h1>
                        <div class="infoColor">
                            <br>
                            <input type="hidden" name="UsersId" value="<?php echo $user_id; ?>">
                            <h3 class="info">Recipe Written by: <span><?php echo $user_name; ?></span></h3>
                            <br>
                            <h3 class="info">Category: <span><input
                                        style="border: none; background-color: transparent;" name="Category"
                                        value="Cookie"
                                        readonly/></span></h3>
                            <br>
                            <h3 class="info">Difficulty: <select name="Difficulty"
                                                                 style="border: none; font-size: 20px">
                                    <option value="Simple">Simple</option>
                                    <option value="Advanced">Advanced</option>
                                </select></h3>
                            <br>
                            <h3 class="info">Publish Date: <span><input
                                        style="border: none;background-color: transparent;" name="Publish_date"
                                        type="date" value="<?= date("Y-m-d") ?>"
                                        readonly/></span></h3>
                            <br>
                        </div>
                        <h1 class="segmentHeader">Description</h1>
                        <div class="infoColor">
                            <br>
                            <h3 class="info"><span><textarea
                                        style="width: 100%;white-space: pre-wrap;resize: none;font-size: 20px"
                                        name="Description" rows="6"
                                        placeholder="Please give a brief description about the recipe!"
                                        required></textarea></span></h3>
                            <br>
                        </div>
                        <h1 class="segmentHeader">Ingredients</h1>
                        <div class="infoColor">
                            <br>
                            <h3 class="info"><span><textarea
                                        style="width: 100%;white-space: pre-wrap;resize: none;font-size: 20px"
                                        name="Ingredients" rows="15" placeholder="List of ingredients that will be required in this recipe.
EX:
Dought
    -Ingredient1
    -ingredient2
Frosting
    -ingredient1
    -ingredient2"
                                        required></textarea></span></h3>
                            <br>
                        </div>
                        <h1 class="segmentHeader">Steps</h1>
                        <div class="infoColor">
                            <br>
                            <h3 class="info"><span><textarea
                                        style="width: 100%;white-space: pre-wrap;resize: none;font-size: 20px"
                                        name="Steps" rows="25" placeholder="List the proper steps to complete the recipe.
EX:
Step 1) directions for what to do in step 1
Step 2) directions for what to do in step 2"
                                        required></textarea></span></h3>
                            <br>
                        </div>
                        <div class="edge">
                            <h1 class="segmentHeader">Link: <input style="font-size: 20px; border: none; width: 86%;"
                                                                   name="Image" type="text" size="54"
                                                                   value="" required></h1>
                        </div>
                    </div>
                    <div class="editButton">
                        <input style="float: left" type="submit" value="Add">
                        <input style="float: right" type="button" value="cancel"
                               onclick='window.location.href = "<?= BASE_URL ?>/cookie/index/"'>
                    </div>


                </form>
            </div>
            <?php
        } else {
            ?>
            <div>
                <h3 style='margin-top:25%;text-align: center;font-size: 50px;'>You must first login or create an account
                    to use this page!</h3>
            </div>
            <?php
        }
        parent::displayFooter();
    }

}
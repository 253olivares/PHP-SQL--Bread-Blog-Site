<?php
/**
 * Author: Zach Gregory
 * Date: 4/19/2020
 * File: compare_index.class.php
 * Description: This CompareIndex class provides the two dropdown menus in a form that allows a user
 * to select two specific celebrities to compare.
 */

class CompareIndex extends IndexView {
    public function display($compare) {
        //display page header
        parent::displayHeader("CI Compare Page");
        ?>
<div class="log">
        <div id="main-header">Compare Celebrities!</div>
        <hr>
        <!--Zach add your code here!-->
<div id="comp">
        <p style="margin-top: 25px; padding-top: 30px;">Choose two celebrities to compare data:</p>

        <form method="post" action="<?= BASE_URL ?>/compare/detail/">
            <label for="celebs">Choose first celebrity:</label>
            <select id="celebs1" name="Celebrities_1">
                <?php
                //echo "<option>", count($compare),"</option>";

                foreach ($compare as $i => $value) {
                    $fname = $value->getFirstName();
                    $lname = $value->getLastName();
                    $name = $fname . " " . $lname;
                    $id1 = $value->getCelebId();
                    ?>
                    <option value="<?= $id1 ?>"><?= $name ?></option>
                <?php
                }
                ?>
            </select>
            <br>
            <br>
            <label for="celebs">Choose second celebrity:</label>
            <select id="celebs2" name="Celebrities_2">
                <?php
                //echo "<option>", count($compare),"</option>";

                foreach ($compare as $i => $value) {
                    $fname = $value->getFirstName();
                    $lname = $value->getLastName();
                    $name = $fname . " " . $lname;
                    $id2 = $value->getCelebId();
                    ?>
                    <option value="<?= $id2 ?>"><?= $name ?></option>
                    <?php
                }
                ?>

            </select>
            <br>
            <br>
            <input class="button" type="submit">
        </form>

</div>
    <br>
        <hr>
</div>
        <?php
        //display page footer
        parent::displayFooter();
    }
}
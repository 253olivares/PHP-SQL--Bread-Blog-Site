<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: Category_index.class.php
 * Description: the user controller
 *
 */

class AllError extends AllNav
{
    public function display($message){
        parent::displayHeader("Error");
        ?>

        <div>
            <h1 style="text-align: center; padding-top: 10px">Error!</h1>
        </div>
        <div style="padding-top: 30px">
            <h2 style="text-align: center; ">Im sorry but you seem to of ran into an issue!</h2>
            <div style="justify-content:center; width: 45%; margin: auto; padding-top: 50px">
                <img src='<?= BASE_URL ?>/www/img/error.png' style="width: 80px; float:left;border: none"/>
                <div style="color: red;">
                    <?= urldecode($message)
                    ?>
                </div>
            </div>
        </div>
<?php
        parent::displayFooter();
    }
}
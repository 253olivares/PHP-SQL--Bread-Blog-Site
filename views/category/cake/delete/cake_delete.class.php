<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: cake_delete.class.php
 * Description:this is the delete view page that confirms that you have deleted a recipe
 */


class CakeDelete extends CakeNav
{
    public function display(){
        parent::displayHeader("Delete Confirmation");
        ?>
        <h1 style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">Your cake recipe has been successfully deleted.</h1>
        <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/cake/index','_self')">
            <p>Go to catalog</p>
        </div>
        <?php
        parent::displayFooter();
    }
}
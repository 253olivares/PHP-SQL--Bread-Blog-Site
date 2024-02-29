<?php
/**
 * Author: "Justin Rice"
 * Date: 4/28/2020
 * File: bread_delete.class.php
 * Description:
 */

class CookieDelete extends CookieNav
{
    public function display(){
        parent::displayHeader("Delete Confirmation");
        ?>
        <h1 style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">Your cookie recipe has been successfully deleted.</h1>
        <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/cookie/index','_self')">
            <p>Go to catalog</p>
        </div>
        <?php
        parent::displayFooter();
    }
}
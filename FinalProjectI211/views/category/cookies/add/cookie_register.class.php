<?php
/**
 * Author: "Justin Rice"
 * Date: 4/28/2020
 * File: cookie_register.class.php
 * Description:
 */

class CookieRegister extends CookieNav
{

    public function display($register){
        parent::displayHeader("Baker's Central Bread Registration Confirmation Page");
            ?>
            <div style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">
                <h1><?php echo $register ?></h1>
            </div>
            <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/all/index','_self')">
                <p>Go To Catalog</p>
            </div>
            <?php
        parent::displayFooter();
    }
}
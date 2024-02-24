<?php
/**
 * Author: "Carlos Banuelos"
 * Date: 4/28/2020
 * File: bread_register.class.php
 * Description:
 */

class BreadRegister extends BreadNav
{

    public function display($register){
        parent::displayHeader("Baker's Central Bread Registration Confirmation Page");
        if($register == "true"){
            ?>
            <div style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">
                <h1>Your bread recipe has been successfully created.</h1>
            </div>
            <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/bread/index','_self')">
                <p>Go to catalog</p>
            </div>
            <?php
        }else{
            ?>
            <div style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">
                <h1> Your last attempt for creating a break recipe failed. Please try again.</h1>
            </div>
            <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/bread/index','_self')">
                <p>Go to catalog</p>
            </div>
            <?php
        }
        parent::displayFooter();
    }
}
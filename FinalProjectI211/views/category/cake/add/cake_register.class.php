<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: cake_register.class.php
 * Description: this is the confirmation page for registering a new recipe
 *
 */

class CakeRegister extends CakeNav
{
    public function display($register){
        parent::displayHeader("Baker's Central Cake Registration Confirmation Page");
        if($register == "true"){
            ?>
            <div style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">
                <h1>Your cake recipe has been successfully created.</h1>
            </div>
            <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/cake/index','_self')">
                <p>Go to catalog</p>
            </div>
            <?php
        }else{
            ?>
            <div style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">
                <h1> Your last attempt for creating an cake recipe failed. Please try again.</h1>
            </div>
            <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/cake/index','_self')">
                <p>Go to catalog</p>
            </div>
            <?php
        }
        parent::displayFooter();
    }
}
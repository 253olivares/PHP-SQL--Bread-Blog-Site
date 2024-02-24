<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: Category_index.class.php
 * Description: the user controller
 *
 */

class Logout extends NavExtension
{
    public function display(){
        parent::displayHeader("Baker's Central Logout Confirmation Page");
        ?>
        <div class="top" style="width: 75%; margin: auto; text-align: center; padding-top: 50px ">
            <h1>Logout Confirmation Page</h1>
        </div>
        <div class="middle-row" style="width: 75%; margin: auto; text-align: center; padding-top: 50px ">
            <h4>You have successfully logged out. </h4>
        </div>
        <?php
        parent::displayFooter();
    }
}
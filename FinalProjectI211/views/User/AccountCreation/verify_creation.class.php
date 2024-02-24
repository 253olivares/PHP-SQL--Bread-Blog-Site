<?php
/**
 * Author: "Carlos Banuelos"
 * Date: 4/27/2020
 * File: verify_creation.class.php
 * Description:
 */

class VerifyCreation extends NavExtension
{
    public function display($output){

        parent::displayHeader('Verification');
?>
        <div class="top" style="width: 75%; margin: auto; text-align: center; padding-top: 50px ">
            <h1>Account Creation Confirmation Page</h1>
        </div>
        <div style="width: 75%; margin: auto; text-align: center; padding-top: 50px ">
            <h4><?= $output ?></h4>
        </div>
        <?php
        parent::displayFooter();
    }
}
?>
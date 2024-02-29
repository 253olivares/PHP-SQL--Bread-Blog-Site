<?php

/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: Category_index.class.php
 * Description: the user controller
 *
 */
class Verify extends NavExtension
{
    public function display($verify){
        parent::displayHeader("Baker's Central login verification Page");
        ?>
        <div class="top" style="width: 75%; margin: auto; text-align: center; padding-top: 50px ">
            <h1>Login Confirmation Page</h1>
        </div>
        <div class="middle-row" style="width: 75%; margin: auto; text-align: center; padding-top: 50px ">
            <h4><?php echo $verify;?></h4>
        </div>
        <?php
        parent::displayFooter();
    }
}
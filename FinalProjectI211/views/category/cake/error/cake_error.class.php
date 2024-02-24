<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: cake_error.class.php
 * Description:this is our error page that will display what error we are recieving and at what point
 */


class CakeError extends CakeNav
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
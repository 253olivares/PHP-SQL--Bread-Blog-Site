<?php
/**
 * Author: Louie Zhu
 * Date: Mar 6, 2019
 * Name: error.php
 * Description: this script displays an error message. This script is globally available throughout the application.
 *     The message to be displayed is passed to this script via variable $message. The dispatcher uses this to
 *     display an error message when the requested controller is not found.
 */

$page_title = "Error";
//display header
NavExtension::displayHeader($page_title);

?>
    <div>
        <h1 style="text-align: center; padding-top: 10px">Error!</h1>
    </div>
    <div style="padding-top: 30px">
        <h2 style="text-align: center; ">Im sorry but the page you are attempting to visit does not exist yet!</h2>
        <div style="justify-content:center; width: 45%; margin: auto; padding-top: 50px">
            <img src='<?= BASE_URL ?>/www/img/error.png' style="width: 80px; float:left;border: none"/>
            <div style="color: red;">
                <?= urldecode($message)
                ?>
            </div>
        </div>
    </div>


<?php
//display footer
NavExtension::displayFooter();

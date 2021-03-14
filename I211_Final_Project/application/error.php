<?php
/**
 * Author: Zach Gregory
 * Date: 4/19/2020
 * File: error.php
 * Description: This is the default error page when something goes wrong with our website.
 */


$page_title = "Error";
//display header for the page
IndexView::displayHeader($page_title);
/*this code below allows for the error code to display when unable */
?>
    <div id = "main-header">Error</div>
    <hr>
    <table style = "width: 100%; border: none">
        <tr>
            <td style = "vertical-align: middle; text-align: center; width:100px">
                <!--this shows a picture of the error to let the user know of a problem-->
                <img src = '<?= BASE_URL ?>/www/img/ErrorPicture.png' style = "width: 80px; border: none"/>
            </td>
            <td style = "text-align: left; vertical-align: top;">
                <!--this is a message that will be displayed after a error occurs-->
                <h3> Sorry, but an error has occurred with the page.</h3>
                <div style = "color: red">
                    <?= urldecode($message)
                    ?>
                </div>
                <br>
            </td>
        </tr>
    </table>
    <br><br><br><br><hr>
    <!--this code allows the user to return to the previous page but in this case the celebrities inventory-->
    <a href="<?= BASE_URL ?>/celebrity/index">Back to the Celebrities</a>
<br><br><br>

<?php
//display footer for the page
IndexView::displayFooter();
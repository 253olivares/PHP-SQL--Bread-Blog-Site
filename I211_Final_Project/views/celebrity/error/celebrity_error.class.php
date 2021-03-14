<?php
/**
 * Author: Zach Gregory
 * Date: 4/19/2020
 * File: celebrity_error.class.php
 * Description: This CelebrityError class provides a div with an error statement when something
 * goes wrong.
 */

class CelebrityError extends CelebrityIndexView {
    public function display($message) {
        //display page header
        parent::displayHeader("CI Error Page");
        ?>

        <div align="center" style="padding-left: 215px;"><div id="main-header">An Error!</div></div>

        <!--Zach add your html code here!-->
        <hr>
        <br><br><br><br>
        <div align="center">
        <table style="width: 100%; border: none">
            <tr>

                <td style="text-align: center; vertical-align: top;">
                    <h3> Sorry, but an error has occurred.</h3>
                    <div style="color: red">
                        <?=
                        urldecode($message) ?>
                    </div>
                    <br>
                </td>
            </tr>
        </table>
        </div>
        <br><br><br><br><hr>

        <?php
        //display page footer
        parent::displayFooter();
    }
}
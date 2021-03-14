<?php
/**
 * Author: Zach Gregory
 * Date: 4/30/2020
 * File: compare_error.class.php
 * Description: This CompareError class provides an error statement if something goes wrong with the
 * compare page.
 */

class CompareError extends IndexView {
    public function display($message) {
        //display page header
        parent::displayHeader("CI Error Page");
        ?>

        <div align="center"><div id="main-header">An Error!</div></div>

        <!--James add your html code here!-->
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
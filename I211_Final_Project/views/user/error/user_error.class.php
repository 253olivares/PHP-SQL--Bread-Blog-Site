<?php
/**
 * Author: Zach Gregory
 * Date: 4/19/2020
 * File: user_error.class.php
 * Description: This class extends the IndexView class. The "display" method displays an error message.
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

class UserError extends IndexView {
    public function display($message) {
        //call the header method defined in the parent class to add the header
        parent::displayHeader("CI Error Page");
        ?>
        <div class="log">
        <!-- page specific content starts -->
        <!-- top row for the page header  -->
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
            <br><br><br><br>

        <!-- bottom row for links  -->
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/index">Login</a></span>
            <span style="float: right">Don't have an account? <a href="<?= BASE_URL ?>/user/newUser">Register</a></span>
        </div>
        </div>

        <!-- page specific content ends -->

        <?php
        //call the footer method defined in the parent class to add the footer
        parent::displayFooter();
    }
}
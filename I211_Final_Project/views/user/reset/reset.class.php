<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: reset.class.php
 * Description: This class extends the IndexView class. The "display" method displays a reset form.
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

//this is the class that allows the user to reset the password for the website that they are logging into
class Reset extends IndexView {
    //this is the public function that displays for the user information entered
    public function display(){
        //adds the header for the web page but utilizing the view because it would not be cooperative with parent
        parent::displayHeader("CI Reset Page");
        $username = '';
        $password = '';
        session_status();
        if(isset($_SESSION['register'])) {
            $username = $_SESSION['register'];
        }
        if(isset($_SESSION['password'])) {
            $username = $_SESSION['password'];
        }
        ?>
        <div class="log">
        <div id = "main-header">
            Reset Password!
        </div>

        <hr>
        <div id="comp" style="height: 280px;">

        <div class = "middle-row">
            <h4 style="padding-top: 20px;">Please enter a new password. Username is not changeable.</h4>
            <div id="Reset">
                <!--this is the code that uses the method post to use the data towards the index page all within the form tag-->
                <form method="post" action="<?= BASE_URL ?>/user/do_reset">
                    <table align="center">
                        <tr>
                            <td>
                                <!--this is the code for the input of the username so that they can continue to reset the password-->
                                <input type="text" name="username" value="<?= $username ?>" readonly="readonly">
                            </td>
                        </tr>

                        <!--this is the code for the input field of password for resetting-->
                        <tr>
                            <td>
                                <!--this is the code for the input of the username so that they can continue to reset the password-->
                                <input minlength="5" type="password" name="password" placeholder="<?= $password ?>" required>
                            </td>
                        </tr>
                        <!--<input type="password" name="password" required>-->

                        <!--this is the code for the submit button that is submitting the password reset-->
                        <tr>
                            <td>
                                <div align="center"><input type="submit" class="button" value="Reset"></div>
                            </td>
                        </tr>
                    </table>
                </form>
                <br>
            </div>
        </div>
        <br>

        <!-- regarding the link for the user to log back in if they so chose to-->
        <div class="bottom-row">
            <span>Cancel password reset? <a href="<?= BASE_URL ?>/user/index"> Cancel Reset</a></span>
            <br>
        </div>

        </div>
            <br>
            <hr>
        </div>
        <!--this is the php block that basically prevents the error to occur because it is connecting the previous php block-->
        <?php

        //this is essentially the code that allow the footer to be shown
        parent::displayFooter();
    }
}
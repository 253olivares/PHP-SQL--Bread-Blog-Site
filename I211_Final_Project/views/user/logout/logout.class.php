<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: logout.class.php
 * Description: This class extends the IndexView class. The "display" method displays a logout screen.
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

//this is the class that will perform the logout functionality for the website
class Logout extends IndexView {
    //this is the following code that displays the public function for the logout class
    public function display() {
        //displays the header of the website
        parent::displayHeader("CI Logout Page");

        //this code represents the variable message that will display the  message you account has been successfully logged out
        $message = "Your account has been successfully logged out.";
        ?>
        <div class="log">
        <!--this code involves putting the message into a p tag so it will display it correctly-->
        <div id="main-header">Logout complete!</div>

        <br>
        <hr>
            <br>
        <div id="comp">
        <div class="middle-row" style="padding-top: 35px; padding-bottom: 30px;"><b><?= $message ?></b></div>
        <br>
        <!-- regarding the link for the user to log back in if they so choose to-->
        <div class="bottom-row"">
            <?php
            // this span will take you to the register page if you already have an account
            echo '<span style="float: start; padding-top: 35px;"> Already have an account? <a href="', BASE_URL, '/user/index"> Login </a></span>';
            //echo ' <span style="float: left"><a href="', BASE_URL, '/user/index"> Login </a></span>';
            ?>
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
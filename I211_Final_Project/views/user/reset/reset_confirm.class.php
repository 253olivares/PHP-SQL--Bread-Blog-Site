<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: reset_confirm.class.php
 * Description: This class extends the IndexView class. The "display" method displays a reset message.
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

//this is the class that uses the previous page involving reset the password
class ResetConfirm extends IndexView {
    //the public function for the displaying the results regarding the password reset
    public function display(){
        //adds the header for the web page but utilizing the view because it would not be cooperative with parent
        parent::displayHeader("CI Confirm Page");

        //this code represents the variable message that will display the  message you password has been reset or the password resetting has failed
        //$message = ($result) ? "You have successfully reset your password" : "Your attempt for resetting a password failed. ";
        ?>
        <div class="log">
        <div id="main-header">
            Reset Password!
        </div>
            <hr>
        <div id="comp">
        <!--this code involves putting the message into a p tag so it will display it correctly-->
        <div class ="middle-row">
            <h4 style="padding-top: 30px; padding-bottom: 70px;">You have successfully reset your password.</h4>
        </div>

        <!-- regarding the link for the user to log back in if they so chose to-->
        <div class="bottom-row" >
            <span>Want to log out? <a href="<?= BASE_URL ?>/user/logout"> Logout</a></span>
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
<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: user_index.class.php
 * Description: This UserIndex class provides the form with two input boxes for a user to type their
 * username and password. By clicking the submit button, this should login the user.
 */

class UserIndex extends IndexView {
    public function display() {
        //Admin User: admin
        //Admin Password: password


        //display page header
        parent::displayHeader("CI Login Page");
        ?>
        <div class="log">
        <div id="main-header">Login with Clout Intelligence!</div>

        <hr>
        <br>
        <div id="comp">
        <!--        The classes below will correspond to css classes that were created.-->

        <!--        this is the div to the middle row -->
        <div class="middle-row">
            <!--            this form is displayed in the login page to login to your account -->
            <!--            the line below first verifies if the username and password are valid-->
            <form action="<?= BASE_URL ?>/user/verify" method="POST">
                <!--                Below is the username input of the website-->
                <div style="padding-top: 20px;"> Username: <input required name="username" type="text" placeholder="Username"/> </div>
                <!--                Below is the password input of the website-->
                <br>
                <div> Password:  <input minlength="5" required name="password" type="password" placeholder="Password minimum of 5 characters" /> </div>
                <!--                Below is the is the submit button to submit the form to the website-->
                <br>
                <div> <input class="button" name="submit" type="submit" value="Login"/>  </div>
            </form>
        </div>
        <br>
        <!--        This class will put you in the bottom length -->
        <div class="bottom-row">
            <!--            This displays when you dont have an account -->
            <span style="float: left"> Already signed in? Want to logout? <a href = "<?= BASE_URL ?>/user/logout">Logout</a></span>
            <span style="float: right"> Don't have an account? Sign up now! <a href = "<?= BASE_URL ?>/user/newUser">Register</a></span>
        </div>
        </div>
            <br>
        <hr>
        </div>
        <?php
        //display page footer
        parent::displayFooter();
    }
}
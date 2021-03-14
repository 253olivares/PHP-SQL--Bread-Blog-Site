<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: new_user.class.php
 * Description: This class extends the View class. The "display" method displays a register form.
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

class NewUser extends IndexView {
    public function display() {
        //adds the header for the web page but utilizing the view because it would not be cooperative with parent
        parent::displayHeader("CI New User Page");
        ?>
        <div class="log">
        <div id="main-header">Create an Account!</div>

        <hr>
            <br>
        <div id="comp" style="height: 350px;">
        <div class="middle-row" style="padding-top: 10px;">
            <p>Please complete the entire form. All fields are required.</p>
            <form method="post" action="<?= BASE_URL ?>/user/register">
                <div>Username: <input id="username" type="text" name="username" style="width: 50%" required placeholder="Username"></div>
                <br>
                <div>Password: <input id="password" type="password" name="password" style="width: 50%" required minlength="5" placeholder="Password, 5 characters minimum"></div>
                <br>
                <div>Email: <input id="email" type="email" name="email" style="width: 50%" required="" placeholder="Email"></div>
                <br>
                <div>First Name: <input id="firstname" type ='text' name="fname" style="width: 50%" required placeholder="First name"></div>
                <br>
                <div>Last Name: <input id="lastname" type="text" name="lname" style="width: 50%" required placeholder="Last name"></div>
                <br>
                <div><input type="submit" class="button" value="Register"></div>
                <br>
            </form>
        </div>

        <div class="bottom-row">
            <span style="float: start">Already have an account? <a href="<?= BASE_URL ?>/user/index">Login</a></span>
        </div>

        </div>
            <br>
            <hr>
        </div>

        <?php
        //this is essentially the code that allow the footer to be shown
        parent::displayFooter();
    }
}
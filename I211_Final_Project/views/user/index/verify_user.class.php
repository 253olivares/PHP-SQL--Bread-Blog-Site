<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: verify_user.class.php
 * Description: This class extends the IndexView class. The "display" method displays a verify message.
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

class VerifyUser extends IndexView {
    //this will need a session
    public function display (){
        // this parents class comes from View, this is specifically the header
        parent::displayHeader("CI Verify Page");

        $login_status = '';
        if(isset($_SESSION['login_status'])) {
            $login_status = $_SESSION['login_status'];
        }
        ?>

        <!--        The classes below will correspond to css classes that were created.-->
        <!--        this is the div to the top row-->
        <div class="log">
        <div id="main-header">User Verification! </div>

        <hr>
            <br>
        <div id="comp">

        <!--this is the div to the middle row -->
            <?php
            if ($login_status == 2) {
                //show this message if the register failed
                echo "<div class='middle-row' style=\"padding-top: 25px; padding-bottom: 40px;\">";
                echo "<h4> Couldn't log you in, sorry.</h4>";
                echo "</div>";
            } else if($login_status == 1) {
                //show this if the register was a success
                echo "<div class='middle-row' style=\"padding-top: 25px; padding-bottom: 40px;\">";
                echo "<h4> Welcome, you are now logged in!</h4>";
                echo "</div>";
            }

        //<!--        This class will put you in the bottom length -->

            if($login_status == 2){
                // log in fails show the register and register page
                echo "<div class='bottom-row'>";
                echo '<span style="float: left"> Already have an account? <a href="', BASE_URL, '/user/index"> Login </a></span>';
                echo '<span style="float: right"> Don\'t have an account? <a href = "', BASE_URL, '/user/newUser">Register</a></span>';
                echo "</div>";
            }else if($login_status == 1){
                echo "<div class='bottom-row'>";
                // if the ask them if they want to log out or if they want to rest their password
                echo '<span style="float: left"> Do you want to log out?  <a href="', BASE_URL, '/user/logout"> Logout </a></span>';
                echo '<span style="float: right"> Old password?  <a href="', BASE_URL, '/user/reset"> Reset Password </a></span>';
                echo "</div>";
            }
            ?>
        </div>
            <br>
        <hr>
        </div>
        <?php
        // this parents class comes from View, this is specifically the footer
        parent::displayFooter();
    }
}
<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: register.class.php
 * Description: This class extends the IndexView class. The "display" method displays a register message.
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

class Register extends IndexView {
    public function display(){
        // this parents class comes from View, this is specifically the footer
        parent::displayHeader("CI Register Page");
        $register_session = '';

        if(isset($_SESSION['register_status'])) {
            $register_session = $_SESSION['register_status'];
        }
        ?>
        <!--        The classes below will correspond to css classes that were created.-->
        <div class="log">
        <!--        this is the div to the middle row -->
            <div id="main-header">User Registration!</div>
            <hr>
            <br>
            <div id="comp">

            <?php
            if ($register_session == 1) {
                //                show this message if the register failed
                echo "<div class='middle-row' style=\"padding-top: 25px; padding-bottom: 40px;\">";
                echo "<h4>Sorry, we couldn't make your account, try again.  </h4>";
                echo "</div>";
            } else if ($register_session == 2) {
//                show this if the register was a success
                echo "<div class='middle-row' style=\"padding-top: 25px; padding-bottom: 40px;\">";
                echo "<h4> Welcome to the family, you now have an account.</h4>";
                echo "</div>";
            }

            ?>

        <div class="bottom-row">
            <?php
            // this span will take you to the register page if you already have an account
            echo ' <span style="float: left"><a href="', BASE_URL,'/user/index"> Login </a></span>';
            ?>
        </div>
        </div>
            <br>
            <hr>
        </div>
        <?php
        // this parents class comes from View, this is specifically the footer
        parent::displayFooter();
    }
}
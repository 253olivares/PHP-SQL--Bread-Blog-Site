<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: index_view.class.php
 * Description: This is the parent class to all other views. It establishes the header and footer functions.
 */

class IndexView {
    //this method displays the page header

    static public function displayHeader($page_title) {
        $login_status = '';
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['login_status'])) {
            $login_status = $_SESSION['login_status'];
        }
        $username = '';
        if(isset($_SESSION['register'])) {
            $username = $_SESSION['register'];
        }
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title> <?php echo $page_title ?> </title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>/www/css/app_style.css">
            <link rel='shortcut icon' href='<?= BASE_URL ?>/www/img/Icon.jpg' type='image/x-icon' />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>

        <body>
        <div id='wrapper'>
        <div id="top">
        <div id="banner">
            <a href="<?= BASE_URL ?>/index.php" style="text-decoration: none" title="Clout Intelligence">
                <div id="left">
                    <img src='<?= BASE_URL ?>/www/img/Logo1.png' style="width: 200px; border: 5px solid black; height: 135px"/>
                    <!--<div style='color: #000; font-size: 14pt; font-weight: bold'>An interactive way to visualize research data!</div>-->
                </div>
            </a>
            <div id="right">
                <!--Navigation Bar-->
                <div style="color: white; margin: 25px; font-size: 20px;">
                <?php  if($login_status == 2) {
                    echo 'Welcome guest!';
                } else if($login_status == 1) {
                    echo 'Welcome ', $username, '!';
                } else {
                    echo 'Welcome guest!';
                }
                ?>
                </div>
                <ul>
                    <li><a <?php if($page_title == "CI Home Page") {
                        echo 'class="active"';
                        }?>
                    href="<?= BASE_URL ?>/welcome/index">Home</a></li>
                    <li><a <?php if($page_title == "CI About Page") {
                            echo 'class="active"';
                        }?>
                    href="<?= BASE_URL ?>/welcome/about">About</a></li>
                    <li><a <?php if($page_title == "CI Inventory Page") {
                            echo 'class="active"';
                        }?>
                    href="<?= BASE_URL ?>/celebrity/index">Inventory</a></li>
                    <li><a <?php if($page_title == "CI Compare Page") {
                            echo 'class="active"';
                        }?>
                    href="<?= BASE_URL ?>/compare/index">Compare</a></li>
                    <li><a <?php if($page_title == "CI Login Page") {
                            echo 'class="active"';
                        }?>
                                href="<?= BASE_URL ?>/user/index">Login</a></li>
                </ul>
            </div>
        </div>
        </div>
        <div id="body">

        <?php
    } //end of displayHeader function

    //this method displays the page footer
    public static function displayFooter() {
        ?>
        <br><br><br>
        <div id="push"></div>
        <div id="footer"><br>&copy 2020 Clout Intelligence. All Rights Reserved.<br><br></div>

        </div>
        </div>

        <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
        </body>
        </html>
        <?php
    } //end of displayFooter function
}
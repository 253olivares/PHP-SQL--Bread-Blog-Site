<?php

/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: Category_index.class.php
 * Description: the user controller
 *
 */
class WelcomeIndex extends IndexView
{
    public function display(){
        parent::displayHeader('Bakers Center Home Page');
        ?>

<!--                <div id="navigation" style="background-color: red">-->
<!---->
<!--                </div>-->
            </div>
        </div>

        <div id="content" style="z-index: 1;">

            <div id="Top_spacing" style="width: 75%; height: 150px; float: right; display: flex; align-items: center; justify-content: center">
                <h1  style=" z-index:1;font-size: 55px">Welcome to Baker's Central</h1>
            </div>
            <div id="Mid_spacing" style="width: 100%; height: 600px">
                <div id="nav" style="float: left; width: 50%; margin-top:5%;padding-top: 20px">
                    <ul>
                        <?php
                        $login_status = 0;
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        if (isset($_SESSION['login_status'])) {
                            $login_status = $_SESSION['login_status'];
                        }

                        if ($login_status  == 0) {
                            ?>
                            <a href="<?= BASE_URL ?>/user/login" style="display:table">
                                <li>Sign In</li>
                            </a>
                            <a href="<?= BASE_URL ?>/user/register" style="display:table">
                                <li>Create an Account</li>
                            </a>
                            <?php
                        } else {
                            ?>
                            <a href="<?= BASE_URL ?>/user/profile" style="display:table">
                                <li>Account</li>
                            </a>
                            <a href="<?= BASE_URL ?>/user/logout" style="display:table">
                                <li>Sign Out</li>
                            </a>
                            <?php
                        }
                            ?>
                        <a href="<?= BASE_URL ?>/category/index" style="display:table">
                            <li>Catalogs</li>
                        </a>
                    </ul>
                </div>
                <div style="float: right; width: 50%; padding-top: 20px;position: relative">
                    <h2 style="font-size:30px;text-align: center; margin:auto;width: 250px; padding: 25px;background-color:#F9A03F; color: white"> Mission Statement </h2>

                    <div style=" font-size:20px; width: 400px;margin-left: auto;margin-right: auto; margin-top: 20px; text-indent: 15%;">
                        <p style="font-size: 25px"> Baker's centeral aims to be community centered baking website. Here users from anywhere can share their invention with others to see and use. To start choose catalog to begin browsing all our recipes. If you wish to submit a recipe of your own create a profile and login to being sharing your creation with everyone else. </p>
                    </div>
                </div>

            </div>
        </div>

        <?php
        parent::displayFooter();
    }
}
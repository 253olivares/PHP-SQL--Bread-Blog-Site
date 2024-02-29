<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: navigation extension.class.php
 * Description: this is the controller to display all our recipes
 *
 */

class NavExtension extends IndexView
{
    public static function displayHeader($title)
    {
        parent::displayHeader($title);
        ?>
        <?php
        $login_status = 0;
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['login_status'])) {
            $login_status = $_SESSION['login_status'];
        }
        ?>
            <ul id="navigation">
                <a href="<?= BASE_URL ?>/index.php" style="display:table;">
                    <li style="">Home</li>
                </a>
                <a href="<?= BASE_URL ?>/category/index" style="display:table">
                    <li>Catalogs</li>
                </a>
                <?php
                if ($login_status == 0) {
                    ?>
                    <a href="<?= BASE_URL ?>/user/login" style="display:table ">
                        <li>Sign In</li>
                    </a>
                    <a href="<?= BASE_URL ?>/user/register" style="display:table">
                        <li>Create Account</li>
                    </a>

                    <?php
                } else {
                    ?>
                    <a href="<?= BASE_URL ?>/user/profile" style="display:table ">
                        <li>Account</li>
                    </a>
                    <a href="<?= BASE_URL ?>/user/logout" style="display:table ">
                        <li>Sign Out</li>
                    </a>
                    <?php
                }
                ?>
            </ul>
        </div>
        </div>
        <div id="content">
        <?php
    }

    public static function displayFooter()
    {
        ?>
        </div>
        <?php
        parent::displayFooter();
    }
}
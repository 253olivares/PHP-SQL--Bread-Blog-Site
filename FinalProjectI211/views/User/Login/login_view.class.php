<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: Category_index.class.php
 * Description: the user controller
 *
 */

class Login extends NavExtension
{
    public function display()
    {
        parent::displayHeader('Bakers Center Login Page');
        ?>
        <div class="top" style="width: 75%; margin: auto; text-align: center; padding-top: 50px ">
            <h1>Please enter your credentials to log in.</h1>
        </div>
        <div class="middle" style="width: 100%; margin-top: 40px">

            <div id="login" style="width:50%; margin: auto;padding-top: 40px">
                <form action="<?= BASE_URL ?>/user/verify" method="post">
                    <table style="margin: auto">
                        <tr>
                            <td><input class="inputStyle" style="margin-top: 10px;margin-bottom: 10px; text-transform: capitalize;" name="username"
                                       type="text" placeholder="Username" required></td>
                        </tr>
                        <tr>
                            <td><input  class="inputStyle"  style="margin-top: 10px;margin-bottom: 10px" name="password"
                                       type="password" minlength="5" placeholder="Password" required></td>
                        </tr>
                        <tr>
                            <td style="width: 100%; text-align: center;"><input class="userbtt" style=" margin-top: 10px;margin-bottom: 10px;padding:20px 30px;"
                                       type="submit" value="Login"/></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>


        <?php
        parent::displayFooter();
    }
}
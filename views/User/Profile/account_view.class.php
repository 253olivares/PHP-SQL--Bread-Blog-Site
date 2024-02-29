<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: Category_index.class.php
 * Description: the user controller
 *
 */

class Account extends NavExtension
{
    public function display($confirm = ""){
        parent::displayHeader('Bakers Center Profile Page');
        ?>
        <div class="top" style="width: 75%; margin: auto; text-align: center; padding-top: 50px ">
            <h1>Profile Page</h1>
        </div>
        <?php
        $login_status = 0;
        $username = " ";
        $password = " ";
        $role = " ";
        $usersFullname = " ";
        $email = " ";
        $usersID = " ";
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION['login_status'],$_SESSION['user_id'],$_SESSION['usersName'],$_SESSION['usersEmail'],$_SESSION['login'],$_SESSION['password'],$_SESSION['role'])) {
            $login_status = $_SESSION['login_status'];
            $username = $_SESSION['login'];
            $password = $_SESSION['password'];
            $role = $_SESSION['role'];
            $email = $_SESSION['usersEmail'];
            $usersFullname = $_SESSION['usersName'];
            $usersID = $_SESSION['user_id'];
        }
        //  When user is directed to this page with a status of 1 it displays log in successful
        if ($login_status == 1) {
            ?>
            <div class="middle-row" style="width: 75%; margin: auto; text-align: center; padding-top: 30px ">
                <h2>Here is your profile Info</h2>
                <div style="font-size: 30px; margin-top: 20px;">
                    <table style="width: 100%; margin-top: 10px">
                        <tr>
                            <td class="leftInfo" class="rightInfo">
                                <h4>Username: </h4>
                            </td>
                            <td class="rightInfo">
                                <p> <?= $username  ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftInfo">
                                <h4>Current Password: </h4>
                            </td>
                            <td class="rightInfo">
                                <p> <?= $password ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftInfo">
                                <h4>Your Name: </h4>
                            </td>
                            <td class="rightInfo">
                                <p> <?= $usersFullname ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftInfo">
                                <h4>Email: </h4>
                            </td>
                            <td class="rightInfo">
                                <p> <?= $email ?></p>
                            </td>
                        </tr>
                        <tr>
                            <td class="leftInfo">
                                <h4>Your Role: </h4>
                            </td>
                            <td class="rightInfo">
                                <p> <u><?= $role ?></u></p>
                            </td>
                        </tr>
                    </table>
                    <div style="color: white; padding-top:10px;text-align: center; color: black" id="confirm-message"><h4><?= $confirm ?></h4></div>
                    <div class="editButton">
                        <input style="padding-left: 40px; padding-right: 40px;" type="button" value="Edit Profile" onclick='window.location.href = "<?= BASE_URL . "/user/edit/" . $usersID ?>"'>
                    </div>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="middle-row" style="width: 75%; margin: auto; text-align: center; padding-top: 50px ">
                <h4>You must be logged in to view this web page.</h4>
            </div>
            <?php
        }
            ?>
        <?php
        parent::displayFooter();
    }
}
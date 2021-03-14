<?php
/**
 * Author: James Myers
 * Date: 4/19/2020
 * File: celebrity_add.class.php
 * Description: This CelebrityAdd class provides the form that allows an admin to type in data to
 * add a new celebrity to the database.
 */

class CelebrityAdd extends IndexView {
    public function display() {
        //display page header
        parent::displayHeader("CI Add Page");
        ?>

        <div align="center"><div id="main-header">Add New Celebrities!</div></div>

        <!--James add your html code here!-->
        <hr>
        <br>
        <div align="center">
            <form method="post" class="form" action="<?= BASE_URL ?>/celebrity/register">
                <table cellspacing="0" cellpadding="3">

                    <tr>
                        <td style="text-align: right; width: 100px">First Name: </td>
                        <td><input name="first_name" type="text" size="25" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Last Name: </td>
                        <td><input name="last_name" type="text" size="25" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Gender: </td>
                        <td><input name="gender" type="text" size="10" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Age: </td>
                        <td><input name="age" type="number" size="5" required /></td>
                    </tr>
                    <td style="text-align: right; width: 100px">Web Presence: </td>
                    <td><input name="web_presence" type="text" size="100" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Most Active: </td>
                        <td><input name="most_active" type="text" size="100" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Frequency: </td>
                        <td><input name="frequency" type="text" size="100" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Description: </td>
                        <td><input name="description" type="text" size="100" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Occupation: </td>
                        <td><input name="occupation" type="text" size="50" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Nationality: </td>
                        <td><input name="nationality" type="text" size="50" required /></td>
                    </tr>


                </table>
                <br>
                <div align="center">
                    <input class="button" type="submit" value="Add" />
                </div>
            </form>
            <br>
            <a href="<?= BASE_URL ?>/celebrity/index"><button class="button">Cancel</button></a>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }
}
<?php
/**
 * Author: James Myers
 * Date: 4/19/2020
 * File: celebrity_edit.class.php
 * Description: This CelebrityEdit class provides the form that allows an admin to type in data to
 * edit a celebrity's information to the database.
 */

class CelebrityEdit extends IndexView {
    public function display($celeb) {
        //display page header
        parent::displayHeader("CI Edit Page");

        $id = $celeb->getCelebId();
        $fname = $celeb->getFirstName();
        $lname = $celeb->getLastName();
        $gen = $celeb->getGender();
        $age = $celeb->getAge();
        $web = $celeb->getWebPresence();
        $act = $celeb->getMostActive();
        $freq = $celeb->getFrequency();
        $desc = $celeb->getDescription();
        $occ = $celeb->getOccupation();
        $nat = $celeb->getNationality();
        ?>

        <div align="center"><div id="main-header">Edit Celebrity Details!</div></div>

        <!--James add your html code here!-->
        <hr>
        <br>
        <div align="center">
            <form method="post" class="form" action='<?= BASE_URL . "/celebrity/update/" . $id ?>'>
                <table cellspacing="0" cellpadding="3">

                    <tr>
                        <td style="text-align: right; width: 100px">First Name: </td>
                        <td><input name="first_name" type="text" size="25" value="<?php echo $fname ?>" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Last Name: </td>
                        <td><input name="last_name" type="text" size="25" value="<?php echo $lname ?> "required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Gender: </td>
                        <td><input name="gender" type="text" size="10" value="<?php echo $gen ?>" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Age: </td>
                        <td><input name="age" type="number" size="5" value="<?php echo $age ?>" required /></td>
                    </tr>
                    <td style="text-align: right; width: 100px">Web Presence: </td>
                    <td><input name="web_presence" type="text" size="100" value="<?php echo $web ?>" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Most Active: </td>
                        <td><input name="most_active" type="text" size="100" value="<?php echo $act ?> "required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Frequency: </td>
                        <td><input name="frequency" type="text" size="100" value="<?php echo $freq ?>" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Description: </td>
                        <td><input name="description" type="text" size="100" value="<?php echo $desc ?>" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Occupation: </td>
                        <td><input name="occupation" type="text" size="50" value="<?php echo $occ ?>" required /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right">Nationality: </td>
                        <td><input name="nationality" type="text" size="50" value="<?php echo $nat ?>" required /></td>
                    </tr>


                </table>
                <br>
                <div align="center">
                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                    <input class="button" type="submit" value="Update" />
                </div>
            </form>
            <br>
            <a href="<?= BASE_URL ?>/celebrity/detail/<?= $id ?>"><button class="button">Cancel</button></a>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }
}
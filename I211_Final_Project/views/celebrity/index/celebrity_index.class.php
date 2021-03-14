<?php
/**
 * Author: James Myers
 * Date: 4/19/2020
 * File: celebrity_index.class.php
 * Description: This CelebrityIndex class provides the table that shows all of the inventory.
 */

class CelebrityIndex extends CelebrityIndexView {
    public function display($celebs) {
        //display page header
        parent::displayHeader("CI Inventory Page");
        $login_status = '';
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION['login_status'])) {
            $login_status = $_SESSION['login_status'];
        }
        $username = '';
        session_status();
        if(isset($_SESSION['register'])) {
            $username = $_SESSION['register'];
        }
        ?>

        <div align="center" style="padding-left: 215px;"><div id="main-header">Research Data Inventory!</div></div>
        <hr>
        <br>
<div class="inv">
        <!--James add your code here!
        You only need to show the data $celeb_id, $first_name, $last_name, $gender, $age,
        $web_presence, $most_active, and $frequency in this table! Not the others in the
        celebrity model.-->
        <div class="grid-container">
            <?php
            if ($celebs === 0) {
                echo "No celebrity was found.<br><br><br><br><br>";
            } else {
                if ($username == "admin" || $username == "Admin") {
                    ?>
                    <button class="button" onclick="window.open('<?= BASE_URL ?>/celebrity/add','_self')">Add</button>
                    <?php
                }
                ?>

            <p style="text-align: center">Here you can filter our inventory by:</p>
            <form action="<?= BASE_URL ?>/celebrity/filter/" method="post">
                <input type="checkbox" name="value1" value="female">Female
                <input type="checkbox" name="value2" value="male">Male
                <input type="checkbox" name="value3" value="instagram">Instagram
                <input type="checkbox" name="value4" value="youtube">YouTube
                <input type="checkbox" name="value5" value="facebook">Facebook
                <input type="checkbox" name="value6" value="twitter">Twitter
                &nbsp &nbsp &nbsp<input type="submit" class="button" value="Submit">
            </form>
            <br>
                <table>
                <tr>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Web Presence</th>
                    <th>Most Active</th>
                    <th>Frequency</th>
                </tr>
                <?php

                //display books in a grid; six books per row
                foreach ($celebs as $i => $celeb) {
                    $id = $celeb->getCelebId();
                    $fName = $celeb->getFirstName();
                    $lName = $celeb->getLastName();
                    $gender = $celeb ->getGender();
                    $age = $celeb ->getAge();
                    $web_presence = $celeb-> getWebPresence();
                    $most_active = $celeb->getMostActive();
                    $frequency = $celeb->getFrequency();
                    ?>
                        <tr>
                            <td><a href="<?= BASE_URL ?>/celebrity/detail/<?= $id ?>"><?php echo "$fName " . "$lName" ?></a></td>
                            <td><?php echo "$gender" ?></td>
                            <td><?php echo "$age" ?></td>
                            <td><?php echo "$web_presence" ?></td>
                            <td><?php echo "$most_active" ?></td>
                            <td><?php echo "$frequency" ?></td>
                        </tr>
                    <?php
                }
                echo "</table>";
            }
        ?>
        </div>
        </div>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    }
}
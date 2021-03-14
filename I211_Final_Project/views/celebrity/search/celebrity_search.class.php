<?php
/**
 * Author: Zach Gregory
 * Date: 4/19/2020
 * File: celebrity_search.class.php
 * Description: This CelebritySearch class provides the table that shows all of the inventory based
 * on the search terms.
 */

class CelebritySearch extends CelebrityIndexView {
    public function display($terms, $celebrities) {
        //display page header
        parent::displayHeader("CI Search Results Page");
        $login_status = '';
        if(isset($_SESSION['login_status'])) {
            $login_status = $_SESSION['login_status'];
        }
        $username = '';
        session_status();
        if(isset($_SESSION['register'])) {
            $username = $_SESSION['register'];
        }
        ?>

        <div align="center" style="padding-left: 215px;"><div id="main-header"> Search Results for <i><?= $terms ?></i></div></div>
        <hr>
        <br><br><br>
        <div class="inv">
        <!--Zach add your code here!-->
        <?php
        if ($celebrities === 0) {
            echo "No Celebrity was found.<br><br><br><br><br>";
        } else {
            ?>
            <table align="center">
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
            foreach ($celebrities as $i => $celeb) {
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
        <br><br>
        <div align="center">
            <a href="<?= BASE_URL ?>/celebrity/index" style="text-align: center;">Go to full celebrity list</a>
        </div>
        <br><br><br>

        <?php
        //display page footer
        parent::displayFooter();
    }
}
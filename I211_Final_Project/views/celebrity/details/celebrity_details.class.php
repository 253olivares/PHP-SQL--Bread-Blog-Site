<?php
/**
 * Author: "Julie Tadrous"
 * Date: 5/1/2020
 * File: celebrity_details.class.php
 * Description: This CelebrityDetails class provides the table that shows all of info for a specific celebrity.
 */

class CelebrityDetails extends IndexView {
    public function display($celebs, $person) {
    //display page header
    parent::displayHeader("CI Details Page");
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
        $num = $celebs->getCelebId();
        $fname = $celebs->getFirstName();
        $lname = $celebs->getLastName();
        $gen = $celebs->getGender();
        $age = $celebs->getAge();
        $web = $celebs->getWebPresence();
        $most= $celebs->getMostActive();
        $freq = $celebs->getFrequency();
        $des = $celebs->getDescription();
        $occ = $celebs->getOccupation();
        $nat = $celebs->getNationality();
    ?>

        <div align="center"><div id="main-header">Celebrity Details!</div></div>
        <hr>
        <br>
        <div class="inv">
        <div style="display: flex;">
            <div style="width: 35%; position: relative;">
                <img src='<?= BASE_URL ?>/www/img/celebrities/<?= $num . ".jpg" ?>' style="width: 350px; border: 5px solid black; height: 350px"/>
                <br><br><br>
                <?php
                if ($username == "admin" || $username == "Admin") {
                    ?>
                    <div>
                        <a href="<?= BASE_URL ?>/celebrity/edit/<?= $num ?>"><button class="button">Edit</button></a>
                        <br><br>
                        <button class="button" onclick=" var r = confirm('Are you sure you want to delete this celebrity?');
                            if(r == true){window.open('<?= BASE_URL ?>/celebrity/delete/<?= $num ?>','_self')}">Delete</button>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div style="width: 60%; position: relative;">
                <table>
                    <tr>
                        <th>Name</th>
                        <td><?php echo $fname . " " . $lname ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td><?php echo $gen ?></td>
                    </tr>
                    <tr>
                        <th>Age</th>
                        <td><?php echo $age ?></td>
                    </tr>
                    <tr>
                        <th>Web Presence</th>
                        <td><?php echo $web ?></td>
                    </tr>
                    <tr>
                        <th>Most Active</th>
                        <td><?php echo $most ?></td>
                    </tr>
                    <tr>
                        <th>Frequency</th>
                        <td><?php echo $freq ?></td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td><?php echo $des ?></td>
                    </tr>
                    <tr>
                        <th>Occupation</th>
                        <td><?php echo $occ ?></td>
                    </tr>
                    <tr>
                        <th>Nationality</th>
                        <td><?php echo $nat ?></td>
                    </tr>
                </table>
                <br>
                <table>
                    <tr>
                        <th>Personality Dimension</th>
                        <th>Frequency (# of posts)</th>
                        <th>Personality Ranking</th>
                    </tr>
                    <tr>
                        <td>Agreeableness</td>
                        <td><?php echo $person['Agreeableness']. "%" ?></td>
                        <td><?php
                            if ($person['Secondary'] == "Agreeableness") {
                                echo "Secondary";
                            } else if ($person['Primary'] == "Agreeableness") {
                                echo "Primary";
                            }?>
                        </td>
                    </tr>
                    <tr>
                        <td>Conscientiousness</td>
                        <td><?php echo $person['Conscientiousness']. "%" ?></td>
                        <td><?php
                            if ($person['Secondary'] == "Conscientiousness") {
                                echo "Secondary";
                            } else if ($person['Primary'] == "Conscientiousness") {
                                echo "Primary";
                            }?>
                        </td>
                    </tr>
                    <tr>
                        <td>Neuroticism</td>
                        <td><?php echo $person['Neuroticism']. "%" ?></td>
                        <td><?php
                            if ($person['Secondary'] == "Neuroticism") {
                                echo "Secondary";
                            } else if ($person['Primary'] == "Neuroticism") {
                                echo "Primary";
                            }?>
                        </td>
                    </tr>
                    <tr>
                        <td>Openness</td>
                        <td><?php echo $person['Openness']. "%"   ?></td>
                        <td><?php
                            if ($person['Secondary'] == "Openness") {
                                echo "Secondary";
                            } else if ($person['Primary'] == "Openness") {
                                echo "Primary";
                            }?>
                        </td>
                    </tr>
                    <tr>
                        <td>Extroversion</td>
                        <td><?php echo $person['Extraversion']  ?></td>
                        <td><?php echo $person['Ranking']  ?></td>
                    </tr>
                </table>
            </div>
        </div>
        </div>


    <?php
    //display page footer
    parent::displayFooter();
    }
}
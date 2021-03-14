<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/30/2020
 * File: compare_detail.class.php
 * Description: This CompareDetail class provides the tables/images that show the specific info for the
 * celebrities selected.
 */

class CompareDetail extends IndexView{
    public function display($id) {
    //display page header
    parent::displayHeader("CI Compare Page");
    ?>
        <div align="center"><div id="main-header">Compare Celebrities!</div></div>
        <hr>
        <br>
        <div class="inv">
<div style="display: flex;">
        <?php
        foreach ($id as $i => $value) {
            $num = $value->getCelebId();
            $fname = $value->getFirstName();
            $lname = $value->getLastName();
            $gen = $value->getGender();
            $age = $value->getAge();
            $des = $value->getDescription();
            $occ = $value->getOccupation();
            $nat = $value->getNationality();
            $person = $value->getPersonality();
        ?>

<div style="width: 45%; position: relative; padding: 20px;">
        <img src='<?= BASE_URL ?>/www/img/celebrities/<?= $num . ".jpg"?>' style="width: 250px; border: 5px solid black; height: 250px"/>
            <br>
            <br>
        <table>
            <tr>
                <th>Name</th>
                <td><?php echo "$fname " . "$lname" ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo "$gen" ?></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><?php echo "$age" ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?php echo "$des" ?></td>
            </tr>
            <tr>
                <th>Occupation</th>
                <td><?php echo "$occ" ?></td>
            </tr>
            <tr>
                <th>Nationality</th>
                <td><?php echo "$nat" ?></td>
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
                <td><?php echo $person['Openness'] . "%"  ?></td>
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
           <!-- <br>
            <hr>
            <br>-->
        <?php
        }
        ?>
</div>
    </div>
        <?php
        //display page footer
        parent::displayFooter();
    }
}
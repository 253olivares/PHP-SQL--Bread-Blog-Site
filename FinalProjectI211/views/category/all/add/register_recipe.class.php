<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: Category_index.class.php
 * Description: the user controller
 *
 */

class Register extends AllNav
{
    public function display($register){
        parent::displayHeader("Baker's Central Registration Confirmation Page");
        ?>

        <div style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">
            <h1><?php echo $register ?></h1>
        </div>
        <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/all/index','_self')">
            <p>Go To Catalog</p>
        </div>

    <?php
        parent::displayFooter();
    }
}
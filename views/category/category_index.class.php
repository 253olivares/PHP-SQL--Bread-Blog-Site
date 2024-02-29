<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: Category_index.class.php
 * Description: the user controller
 *
 */


class CategoryIndex extends NavExtension
{
    public function display()
    {
        parent::displayHeader('Bakers Center Category Page');
        ?>
        <!--                <div id="navigation" style="background-color: red">-->
        <!---->
        <!--                </div>-->
        <div style="width: 50%; margin: auto;text-align: center ">
            <h1> Please choose a catalog to browse!</h1>
        </div>
        <div style="margin-top: 8%; margin-left: 5%; margin-right: 5%; width: 90%;">
            <div style="width: 100%; display: inline-flex;">
                <div class="boxes" style="float: left; " onclick="window.open('<?= BASE_URL ?>/cake/index','_self')">
                    <img src="<?= BASE_URL ?>/www/img/cake/cake.jpg">
                    <div class="cover">
                        <h1>Cakes</h1>
                    </div>
                </div>
                <div class="boxes" id="cookie" style="float: right"
                     onclick="window.open('<?= BASE_URL ?>/cookie/index','_self')">
                    <img src="<?= BASE_URL ?>/www/img/cookie/cookie.jpg">
                    <div class="cover">
                        <h1>Cookies</h1>
                    </div>
                </div>
            </div>
            <div style="width: 100%; display: inline-flex; margin-top: 10%">
                <div class="boxes" style="float: left" onclick="window.open('<?= BASE_URL ?>/bread/index','_self')">
                    <img src="<?= BASE_URL ?>/www/img/bread/bread.jpg">
                    <div class="cover">
                        <h1>Breads</h1>
                    </div>
                </div>
                <div class="boxes" style="float: right" onclick="window.open('<?= BASE_URL ?>/all/index','_self')">
                    <img src="<?= BASE_URL ?>/www/img/all.png">
                    <div class="cover">
                        <h1>All</h1>
                    </div>
                </div>
            </div>
        </div>
        <?php
        parent::displayFooter();

    }

}
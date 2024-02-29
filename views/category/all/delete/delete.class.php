<?php


class Delete extends AllNav
{
    public function display(){
        parent::displayHeader("Delete Confirmation");
        ?>
            <h1 style=" width: 50%; margin: auto; text-align: center;margin-top: 25%;">Your recipe has been successfully deleted.</h1>
        <div class="Back2Catalog" onclick="window.open('<?= BASE_URL ?>/all/index','_self')">
            <p>Go To Catalog</p>
        </div>
        <?php
        parent::displayFooter();
    }
}
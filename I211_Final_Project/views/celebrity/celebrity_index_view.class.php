<?php
/**
 * Author: Zach Gregory
 * Date: 4/19/2020
 * File: celebrity_index_view.class.php
 * Description: This CelebrityIndexView class provides the search bar form box.
 */

class CelebrityIndexView extends IndexView {
    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>

        <!--Zach add your searchbar code here!-->
        <script>
            var media = 'celebrity';
        </script>
        <div id="searchbar" style="margin-right: 20px; margin-top: 20px; border: 2px #2d33a1 solid;">
            <form method="get" action="<?= BASE_URL ?>/celebrity/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search celebrities" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input id="button" type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>

        <?php
    }

    public static function displayFooter() {
        parent::displayFooter();
    }
}
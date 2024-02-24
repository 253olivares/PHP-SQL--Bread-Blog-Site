<?php
/**
 * Author: "Carlos Banuelos"
 * Date: 4/28/2020
 * File: bread_nav.class.php
 * Description:
 */

class BreadNav extends NavExtension {

    public static function displayHeader($title)
    {
        parent::displayHeader($title); // TODO: Change the autogenerated stub
        ?>
        <script>
            //the media type
            var media = "bread";

        </script>
        <?php
    }

    public static function displayFooter()
    {
        parent::displayFooter(); // TODO: Change the autogenerated stub
    }
}
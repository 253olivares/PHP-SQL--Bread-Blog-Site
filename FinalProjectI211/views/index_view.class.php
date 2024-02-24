<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: Category_index.class.php
 * Description: the user controller
 *
 */

class IndexView {

    static public function displayHeader($page_title){
        ?>

        <!DOCTYPE html>
        <html>
        <head>
            <title><?php echo $page_title ?></title>
            <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
            <link rel='shortcut icon' href='<?= BASE_URL ?>/www/img/icon.png' type='image/x-icon' />
            <link type="text/css" rel="stylesheet" href="<?= BASE_URL ?>/www/css/fontawesome/css/all.css">
            <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/app.css'/>
            <script>
                //create the JavaScript variable for the base url
                var base_url = "<?= BASE_URL ?>";
            </script>
        </head>
            <body>
                <div id="page-container">
                    <div id="content-wrap">
                    <div id="header" style="z-index: 2;">
                        <div id="inner-header">
                            <div id="logo-container" style="width: 40%;float: left;">
                                <img id="logoImage1" onclick="window.open('<?= BASE_URL ?>/index.php','_self')" src="<?= BASE_URL ?>/www/img/logo/logo2.png">
                                <h1 id="Title"><span style="color: #9E6240;">Ba</span><span style="color: white;">ker's Central</span></h1>
                                <img id="logoImage2" src="<?= BASE_URL ?>/www/img/icon.png">
                            </div>


        <?php
    }

    public static function displayFooter(){
        ?>
              <script type="text/javascript" src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
                    </div>
                    <div id="footer">
                        <div id="inner-footer">
                            <div id="social_media">
                                <span  class="Socials">
                                    <i id="Facebook" class="fab fa-facebook-square"></i>
                                    <i id="Instagram" class="fab fa-instagram"></i>
                                    <i id="Twitter" class="fab fa-twitter-square"></i>
                                    <i id="Snapchat" class="fab fa-snapchat-square"></i>
                                 </span>
                            </div>
                            <div id="copyright">
                                <h1>&copy; OOP Bakers Central. All Rights Reserved.</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </html>
        <?php
    }
}
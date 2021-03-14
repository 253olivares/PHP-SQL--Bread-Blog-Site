<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: compare_controller.class.php
 * Description: This is the main controller for the compare object. It defines all of the basic
 * functions used for comparing celebrities. Connected to the compare page / views.
 */

class CompareController {
    //put your code here

    //make celebrity_model variable and __construct() function first
    private $compare_model;

    public function __construct() {
        $this->compare_model = CompareModel::getCompareModel();
    }

    public function index() {
        $compare = $this->compare_model->list_names();

        if(!is_array($compare)) {
            $this->error($compare);
            return;
        }

        $view = new CompareIndex();
        $view->display($compare);
    }

    public function detail() {
/*        if(!isset($_POST['Celebrities_1']) || !isset($_POST['Celebrities_2'])) {
            echo "We don't have anything";
        }*/

        // display all celebrity data
        $compare = $this->compare_model->post_compare();
        if(gettype($compare) == "string") {
            $this->error($compare);
            return;
        }

        if(!$compare) {
            //display an error
            $message = "There was a problem displaying the celebrities.";
            $this->error($message);
            return;
        }

        $view = new CompareDetail();
        $view->display($compare);
    }

    public function error($message) {
        //create an object of the Error class
        $error = new CompareError();

        //display the error page
        $error->display($message);
    }
}
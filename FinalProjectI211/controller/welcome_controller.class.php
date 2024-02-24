<?php
/*
 * Author: Carlos Banuelos
 * Date: 4/20/2020
 * File: welcome_controller.class.php
 * Description: this is the default controller loaded by the dispatcher when we start up the webpage since we dont specify one
 * 
 */

class WelcomeController {
    //here we are calling the class called welcome index that we will find in the view directory.
    public function index() {
        //creates an instance of the welcome index class
        $view = new WelcomeIndex();

        //calls the display method from the welcome index class
        $view->display();
    }
}

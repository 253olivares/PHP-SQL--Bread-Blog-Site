<?php
/*
 * Author: Carlos Banuelos
 * Date: 4/20/2020
 * File: category_controller.class.php
 * Description: this is to display the page in which people can see the different recipe types we have and select them
 *
 */


class CategoryController
{
    public function index() {
        //creates an instance of the category index class
        $view = new CategoryIndex();

        //calls the display method from the category index class
        $view->display();
    }

}
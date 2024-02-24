<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: all_controller.class.php
 * Description: this is the controller to display all our recipes
 *
 */

class PostDataExceptions extends Exception
{
    public function getInfo(){
         return "We did not receive any input data! Please make sure you are filling out all the information in to make this works.";
    }

}
<?php

/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: all_controller.class.php
 * Description: this is the controller to display all our recipes
 *
 */
class DatabaseException extends Exception
{
    public function getInfo(){
        return "We seem to of ran into an issue with executing the sql string! Please contact administration to get this resolved.";
    }
}
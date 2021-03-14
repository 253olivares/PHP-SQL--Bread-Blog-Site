<?php
/**
 * Author: "Julie Tadrous"
 * Date: 5/2/2020
 * File: post_data_exceptions.class.php
 * Description: This file hands try throw catch exceptions.
 */

class PostDataExceptions extends Exception {
    public function getError() {
        return "There was an empty field. We could not receive the data.";
    }
}
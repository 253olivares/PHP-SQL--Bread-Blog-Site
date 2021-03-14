<?php
/**
 * Author: "Julie Tadrous"
 * Date: 5/2/2020
 * File: query_false_exceptions.class.php
 * Description:
 */

class QueryFalseExceptions extends Exception {
    public function getInfo() {
        return "There was an issue connecting to the database.";
    }
}
<?php
/**
 * Author: "Julie Tadrous"
 * Date: 5/2/2020
 * File: numeric_value_exceptions.class.php
 * Description:
 */

class NumericValueExceptions extends Exception {
    public function __construct($type, $exp) {
        parent::__construct("Data type error: <br> Expected: $exp Received: $type");
    }
}
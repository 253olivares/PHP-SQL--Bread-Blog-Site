<?php
/**
 * Author: "Julie Tadrous"
 * Date: 5/2/2020
 * File: email_symbol_exceptions.class.php
 * Description:
 */

class EmailSymbolExceptions extends Exception {
    public function getSymbol() {
        return "There must be an @ symbol within your email address. Try again.";
    }
}
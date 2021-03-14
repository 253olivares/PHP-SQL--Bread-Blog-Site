<?php

/*
 * Author: Julie Tadrous
 * Date: April 19, 2020
 * File: database.class.php
 * Description: Description: the Database class sets the database details.
 * 
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'register' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'clout_intelligence',
        'tblCeleb' => 'celebrity',
        'tblCelebDim' => 'celebritydimension',
        'tblFav' => 'favorites',
        'tblPersonDim' => 'personalitydimension',
        'tblUser' => 'users'
    );
    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct() {
        $this->objDBConnection = @new mysqli(
                $this->param['host'], $this->param['register'], $this->param['password'], $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            include 'error.php';
            exit();
        }
    }

    //static method to ensure there is just one Database instance
    static public function getInstance() {
        if (self::$_instance == NULL) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table that stores celebrities
    public function getCelebTable() {
        return $this->param['tblCeleb'];
    }

    //returns the name of the table that stores celebrity dimensions
    public function getCelebDimTable() {
        return $this->param['tblCelebDim'];
    }

    //returns the name of the table that stores personality dimensions
    public function getPersonDimTable() {
        return $this->param['tblPersonDim'];
    }

    //returns the name of the table storing favorites
    public function getFavTable() {
        return $this->param['tblFav'];
    }

    //returns the name of the table storing personality dimensions
    public function getCDTable() {
        return $this->param['tblPersonDim'];
    }

    //returns the name of the table storing users
    public function getUsersTable() {
        return $this->param['tblUser'];
    }
}

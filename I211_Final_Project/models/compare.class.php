<?php
/**
 * Author: Zach Gregory
 * Date: 4/19/2020
 * File: compare.class.php
 * Description: This is the main class used to create new compare objects.
 */

class Compare {
    //private data members
    private $celeb_id, $first_name, $last_name, $gender, $age, $description, $occupation, $nationality;
    private $personality;

    public function __construct($celeb_id, $first_name, $last_name, $gender, $age, $description, $occupation, $nationality) {
        $this->celeb_id = $celeb_id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->gender = $gender;
        $this->age = $age;
        $this->description = $description;
        $this->occupation = $occupation;
        $this->nationality = $nationality;
    }

    public function getCelebId() {
        return $this->celeb_id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getAge() {
        return $this->age;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getOccupation() {
        return $this->occupation;
    }

    public function getNationality() {
        return $this->nationality;
    }

    public function getPersonality() {
        return $this-> personality;
    }

    public function setPersonality($p) {
        $this-> personality = $p;
    }

}
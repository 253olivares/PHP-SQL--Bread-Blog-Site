<?php
/**
 * Author: James Myers
 * Date: 4/19/2020
 * File: celebrity.class.php
 * Description: This is the main class used to create new celebrity objects.
 */

class Celebrity {
    //private data members
    private $celeb_id, $first_name, $last_name, $gender, $age, $web_presence, $most_active,
    $frequency, $description, $occupation, $nationality;

    //the constructor
    public function __construct($celeb_id, $first_name, $last_name, $gender, $age, $web_presence, $most_active, $frequency, $description, $occupation, $nationality) {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->gender = $gender;
        $this->age = $age;
        $this->web_presence = $web_presence;
        $this->most_active = $most_active;
        $this->frequency = $frequency;
        $this->description = $description;
        $this->occupation = $occupation;
        $this->nationality = $nationality;
    }

    //getters
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

    public function getWebPresence() {
        return $this->web_presence;
    }

    public function getMostActive() {
        return $this->most_active;
    }

    public function getFrequency() {
        return $this->frequency;
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

    public function getName() {
        return $this->first_name . " " . $this->last_name;
    }

    //set celebrity id
    public function setCelebId($celeb_id) {
        $this->celeb_id = $celeb_id;
    }
}
<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: compare_model.class.php
 * Description: This is the compare model in the MVC pattern that retrieves all of the celebrity
 * data from the database based on the two celebrities chosen.
 */

class CompareModel {
    //private data variables
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblCeleb;
    private $tblCelebDim;
    private $tblPersonDim;

    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this ->tblCeleb = $this ->db ->getCelebTable();
        $this ->tblPersonDim = $this ->db ->getPersonDimTable();

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        if (!isset($_SESSION['celebritydimension'])) {
            $dimension = $this->db->getCelebDimTable();
            $_SESSION['celebritydimension']=$dimension;
        }
    }

    public static function getCompareModel(){
        if(self::$_instance == NULL){
            self::$_instance = new CompareModel();
        }
        return self::$_instance;
    }

    public function list_names() {
        try {
            $sql = "SELECT * FROM " . $this->tblCeleb;

            //execute the query
            $query = $this->dbConnection->query($sql);
            $peoples = array();
            if (!$query || $query->num_rows == 0) {
                throw new QueryFalseExceptions();
            }

            while ($obj = $query->fetch_object()) {
                $people = new Compare($obj->celeb_id, $obj->first_name, $obj->last_name, $obj->gender, $obj->age,
                    $obj->description, $obj->occupation, $obj->nationality);

                // $people->setCelebId($obj->celeb_id);
                $peoples[] = $people;
            }

            return $peoples;
        } catch (QueryFalseExceptions $e) {
            $message = $e->getInfo();
            return $message;
        }
    }

    public function post_compare(){
        try {
            if (!filter_has_var(INPUT_POST, 'Celebrities_1') ||
                !filter_has_var(INPUT_POST, 'Celebrities_2')) {
                //return false;
                throw new PostDataExceptions();
            }

            $celeb1 = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'Celebrities_1', FILTER_SANITIZE_STRING)));
            $celeb2 = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'Celebrities_2', FILTER_SANITIZE_STRING)));

            $celeb_comp = array();

            //retrieve personal information
            $sql = "SELECT * FROM " . $this->tblCeleb .
                " WHERE " . $this->tblCeleb . ".celeb_id='$celeb1'; ";
            $sql .= "SELECT * FROM " . $this->tblCeleb .
                " WHERE " . $this->tblCeleb . ".celeb_id='$celeb2';";


            if ($this->dbConnection->multi_query($sql)) {
                do {
                    if ($res = $this->dbConnection->store_result()) {
                        while ($obj = $res->fetch_object()) {
                            //var_dump($row);
                            $person = new Compare($obj->celeb_id, $obj->first_name, $obj->last_name, $obj->gender, $obj->age,
                                $obj->description, $obj->occupation, $obj->nationality);
                            $celeb_comp[$obj->celeb_id] = $person;
                        }
                        $res->free_result();
                    }

                } while ($this->dbConnection->more_results() && $this->dbConnection->next_result());
            }

            //determine personality array
            $celebPersons = []; //create an array for celebrity personalities

            $sql = "SELECT celeb_id, frequency, name FROM celebritydimension, personalitydimension WHERE 
				celebritydimension.dim_id = personalitydimension.dim_id AND celeb_id = $celeb1 ORDER BY frequency DESC;";

            $sql .= "SELECT celeb_id, frequency, name FROM celebritydimension, personalitydimension WHERE 
				celebritydimension.dim_id = personalitydimension.dim_id AND celeb_id = $celeb2 ORDER BY frequency DESC;";

            //execute the query
            if ($this->dbConnection->multi_query($sql)) {
                do {
                    if ($res = $this->dbConnection->store_result()) {
                        $celeb_id = '';
                        while ($obj = $res->fetch_object()) {
                            $celebPersons[$obj->name] = $obj->frequency;
                            $celeb_id = $obj->celeb_id;
                        }

                        if (!empty($celebPersons)) {
                            //Determine primary and secondary dimension
                            $dimensions = array_keys($celebPersons);

                            if ($dimensions[0] == "Extraversion") {
                                array_shift($dimensions);
                            }
                            $celebPersons['Primary'] = $dimensions[0];
                            $celebPersons['Secondary'] = $dimensions[1];
                        }
                        if ($celeb_id != '') {
                            $celeb_comp[$celeb_id]->setPersonality($celebPersons);
                        }

                        $res->free_result();
                    }
                    //var_dump($celebPersons);

                } while ($this->dbConnection->more_results() && $this->dbConnection->next_result());
            }
            //if the personality dimension information is not available; set the value of each dimension as "N/A"
            foreach ([$celeb1, $celeb2] as $celeb) {
                if (empty($celeb_comp[$celeb]->getPersonality())) {
                    $celebPersons = [
                        "Extraversion" => "N/A",
                        "Agreeableness" => "N/A",
                        "Conscientiousness" => "N/A",
                        "Neuroticism" => "N/A",
                        "Openness" => "N/A",
                        "Primary" => "N/A",
                        "Secondary" => "N/A",
                        "Ranking" => "N/A"
                    ]; //create an array for celebrity personalities

                    $celeb_comp[$celeb]->setPersonality($celebPersons);
                }
            }

            //Determine ranking on extraversion
            $sql = "SELECT celeb_id from celebritydimension where dim_id=1 ORDER BY frequency DESC";
            $query = $this->dbConnection->query($sql);
            $ranking = 0;
            while ($row = $query->fetch_assoc()) {
                $ranking++;
                foreach ([$celeb1, $celeb2] as $celeb) {
                    if ($row['celeb_id'] == $celeb) {
                        $celebPersons = $celeb_comp[$celeb]->getPersonality();
                        $celebPersons['Ranking'] = $ranking;
                        $celeb_comp[$celeb]->setPersonality($celebPersons);
                    }
                }
            }

            //var_dump($celeb_comp);
            //exit;

            return $celeb_comp;
        } catch (PostDataExceptions $e) {
            $message = $e->getError();
            return $message;
        }
    }
}
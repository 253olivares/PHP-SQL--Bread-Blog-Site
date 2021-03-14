<?php
/**
 * Author: James Myers
 * Date: 4/19/2020
 * File: celebrity_model.class.php
 * Description: This is the celebrity model in the MVC pattern that retrieves all of the celebrity
 * data from the database.
 */

class CelebrityModel {
    //James add your code here!

    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblCeleb;
    private $tblCelebDim;

    private function __construct() {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this ->tblCeleb = $this ->db ->getCelebTable();

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }

        if (!isset($_SESSION['celebritydimension'])) {
            $dimension = $this->db->getCelebDimTable();
            $_SESSION['celebritydimension'] =$dimension;
        }
    }

    public static function getCelebrityModel(){
        if(self::$_instance == NULL){
            self::$_instance = new CelebrityModel();
        }
        return self::$_instance;
    }

    public function list_celeb(){
        try {
            $sql = "SELECT * FROM " . $this->tblCeleb;

            //execute the query
            $conn = $this->dbConnection;
            $query = @$conn->query($sql);

            if (!$query || $query->num_rows == 0) {
                throw new QueryFalseExceptions();
            }

            $celebs = array();

            while ($obj = $query->fetch_object()) {
                $celeb = new Celebrity(NULL, $obj->first_name, $obj->last_name, $obj->gender, $obj->age, $obj->web_presence, $obj->most_active, $obj->frequency, $obj->description, $obj->occupation, $obj->nationality);

                $celeb->setCelebId($obj->celeb_id);

                $celebs[] = $celeb;
            }

            return $celebs;

        } catch (QueryFalseExceptions $e){
            $message = $e->getInfo();
            return $message;
        }
    }

    public function view_celeb($id) {
        try {
            $sql = "SELECT * FROM " . $this->tblCeleb . " WHERE celeb_id=".$id;

            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query || $query->num_rows == 0) {
                throw new QueryFalseExceptions();
            }

            if ($query && $query->num_rows > 0) {
                $obj = $query->fetch_object();

                $celeb = new Celebrity(NULL,$obj->first_name,$obj->last_name,$obj->gender,$obj->age,$obj->web_presence,$obj->most_active,$obj->frequency,$obj->description,$obj->occupation,$obj->nationality);

                $celeb->setCelebId($obj->celeb_id);

                return $celeb;
            }
            //return false;
        } catch (QueryFalseExceptions $e) {
            $message = $e->getInfo();
            return $message;
        }
    }

    public function get_personality($id) {
        try {
            $sql = "SELECT frequency, name FROM celebritydimension, personalitydimension WHERE 
				celebritydimension.dim_id = personalitydimension.dim_id AND celeb_id = $id ORDER BY frequency DESC;";

            //execute the query
            $query = $this->dbConnection->query($sql);

            $celebPersons = array(); //create an array for celebrity personalities
            if ($query && $query->num_rows > 0) {
                //loop through all rows
                while ($query_row = $query->fetch_assoc()) {
                    $celebPersons[$query_row["name"]] = $query_row["frequency"];
                }
            }

            if (empty($celebPersons)) {
                return false;
            }

            //Determine primary and secondary dimension
            $dimensions = array_keys($celebPersons);
            if ($dimensions[0] == "Extraversion") {
                array_shift($dimensions);
            }
            $celebPersons['Primary'] = $dimensions[0];
            $celebPersons['Secondary'] = $dimensions[1];

            //Determine ranking on extraversion
            $sql = "SELECT celeb_id from celebritydimension where dim_id=1 ORDER BY frequency DESC";

            $query = $this->dbConnection->query($sql);

            if (!$query || $query->num_rows == 0) {
                throw new QueryFalseExceptions();
            }

            $ranking = 0;
            while ($row = $query->fetch_assoc()) {
                $ranking++;
                //$ranking[] =[$row['celeb_id']=>$row['frequency']] ;
                if ($row['celeb_id'] == $id) {
                    break;
                }
            }
            $celebPersons['Ranking'] = $ranking;
            //var_dump($celebPersons); exit;
            return $celebPersons;

        } catch (QueryFalseExceptions $e){
            $message = $e->getInfo();
            return $message;
        }
    }

    public function add_celeb() {
        try {
            //if the script did not received post data, display an error message and then terminate the script immediately
            if (!filter_has_var(INPUT_POST, 'first_name') ||
                !filter_has_var(INPUT_POST, 'last_name') ||
                !filter_has_var(INPUT_POST, 'gender') ||
                !filter_has_var(INPUT_POST, 'age') ||
                !filter_has_var(INPUT_POST, 'web_presence') ||
                !filter_has_var(INPUT_POST, 'most_active') ||
                !filter_has_var(INPUT_POST, 'frequency') ||
                !filter_has_var(INPUT_POST, 'occupation') ||
                !filter_has_var(INPUT_POST, 'nationality') ||
                !filter_has_var(INPUT_POST, 'description')) {

                //return false;
                throw new PostDataExceptions();
            }

            //retrieve data for the new celeb; data are sanitized and escaped for security.
            $first_name = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING)));
            $last_name = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING)));
            $gender = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'gender', FILTER_DEFAULT));
            $age = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING)));
            $most_active = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'most_active', FILTER_SANITIZE_STRING)));
            $web_presence = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'web_presence', FILTER_SANITIZE_STRING)));
            $frequency = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'frequency', FILTER_SANITIZE_STRING)));
            $occupation = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'occupation', FILTER_SANITIZE_STRING)));
            $nationality = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'nationality', FILTER_SANITIZE_STRING)));
            $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

            if (!is_numeric($age)) {
                throw new NumericValueExceptions(gettype($age), "number");
            }

            //$query = "SELECT * FROM " . $this->tblCeleb . " WHERE last_name = '$last_name'";
            //query string for update
            $sql = "INSERT INTO " . $this->tblCeleb .
                " VALUES (NULL,'$first_name', '$last_name','$gender', '$age','$web_presence', '$most_active',  '$frequency', "
                . "'$description' , '$occupation', '$nationality') ";

            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new QueryFalseExceptions();
            }

            return $query;

        } catch (NumericValueExceptions $e) {
            $message = $e->getMessage();
            return $message;
        } catch (PostDataExceptions $e) {
            $message = $e->getError();
            return $message;
        } catch (QueryFalseExceptions $e) {
            $message = $e->getInfo();
            return $message;
        }
    }

    public function search_celeb($terms) {
        try {
            $terms = explode(" ", $terms); //explode multiple terms into an array
            //select statement for AND search

            $sql = "SELECT * FROM " . $this->tblCeleb . " WHERE ";

            foreach ($terms as $term) {
                $sql .= "first_name LIKE '%" . $term . "%' OR last_name LIKE '%" . $term . "%' OR ";
            }

            $sql = rtrim($sql, " OR ");
            //$sql .= ")";

            //execute the query
            $query = $this->dbConnection->query($sql);

            //if the search failed or there was no celebrity found
            if (!$query || $query->num_rows == 0) {
                throw new QueryFalseExceptions();
            }

            //search succeeded, and found at least 1 celebrity found.
            //create an array to store all the returned celebrity
            $celebs = array();

            //loop through all rows in the returned record-sets
            while ($obj = $query->fetch_object()) {
                $celeb = new Celebrity(NULL, $obj->first_name, $obj->last_name, $obj->gender, $obj->age, $obj->web_presence, $obj->most_active, $obj->frequency, $obj->description, $obj->occupation, $obj->nationality);

                $celeb->setCelebId($obj->celeb_id);

                $celebs[] = $celeb;
            }
            return $celebs;

        } catch (QueryFalseExceptions $e){
            $message = $e->getInfo();
            return $message;
        }
    }

    public function delete_celeb($id) {
        try {
            //For my SQL Statement, I created a new variable called $sql to store the delete statement. This deletes
            //a row of data from the celebrity table in the database based on the $celeb_id variable.
            $sql = "DELETE FROM " . $this->tblCeleb . " WHERE celeb_id=" . $id;

            $query = $this->dbConnection->query($sql);
            if (!$query) {
                throw new QueryFalseExceptions();
            }
            return $query;

        } catch (QueryFalseExceptions $e) {
            $message = $e->getInfo();
            return $message;
        }
    }

    //the update_movie method updates an existing movie in the database. Details of the movie are posted in a form. Return true if succeed; false otherwise.
    public function update_celeb($id) {
        try {
            //if the script did not received post data, display an error message and then terminate the script immediately
            if (!filter_has_var(INPUT_POST, 'first_name') ||
                !filter_has_var(INPUT_POST, 'last_name') ||
                !filter_has_var(INPUT_POST, 'gender') ||
                !filter_has_var(INPUT_POST, 'age') ||
                !filter_has_var(INPUT_POST, 'web_presence') ||
                !filter_has_var(INPUT_POST, 'most_active') ||
                !filter_has_var(INPUT_POST, 'frequency') ||
                !filter_has_var(INPUT_POST, 'occupation') ||
                !filter_has_var(INPUT_POST, 'nationality') ||
                !filter_has_var(INPUT_POST, 'description')) {

                //return false;
                throw new PostDataExceptions();
            }

            //retrieve data for the new celeb; data are sanitized and escaped for security.
            $first_name = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING)));
            $last_name = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING)));
            $gender = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'gender', FILTER_DEFAULT));
            $age = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING)));
            $most_active = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'most_active', FILTER_SANITIZE_STRING)));
            $web_presence = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'web_presence', FILTER_SANITIZE_STRING)));
            $frequency = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'frequency', FILTER_SANITIZE_STRING)));
            $occupation = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'occupation', FILTER_SANITIZE_STRING)));
            $nationality = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'nationality', FILTER_SANITIZE_STRING)));
            $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

            if (!is_numeric($age)) {
                throw new NumericValueExceptions(gettype($age), "number");
            }

            //query string for update
            $sql = "UPDATE " . $this->tblCeleb .
                " SET first_name='$first_name', last_name='$last_name', gender='$gender', age='$age', "
                . "web_presence='$web_presence', most_active='$most_active', frequency='$frequency', "
                . "description='$description', occupation='$occupation', nationality='$nationality' WHERE celeb_id='$id'";

            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new QueryFalseExceptions();
            }
            return $query;

        } catch (NumericValueExceptions $e) {
            $message = $e->getMessage();
            return $message;
        } catch (PostDataExceptions $e) {
            $message = $e->getError();
            return $message;
        } catch (QueryFalseExceptions $e) {
            $message = $e->getInfo();
            return $message;
        }
    }

    public function filter_celeb(){
        try {
            $value1 = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, "value1", FILTER_SANITIZE_STRING)));
            $value2 = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, "value2", FILTER_SANITIZE_STRING)));
            $value3 = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, "value3", FILTER_SANITIZE_STRING)));
            $value4 = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, "value4", FILTER_SANITIZE_STRING)));
            $value5 = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, "value5", FILTER_SANITIZE_STRING)));
            $value6 = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, "value6", FILTER_SANITIZE_STRING)));

            $array1 = [$value1, $value2, $value3, $value4, $value5, $value6];
            $sql = "SELECT * FROM " . $this->tblCeleb . " WHERE ";

            foreach ($array1 as $values) {
                if ($values != '') {
                    $sql .= "gender LIKE '$values' OR web_presence LIKE '%$values%' OR ";
                }
            }

            if ($array1 == ['', '', '', '', '', '']) {
                //$sql = "SELECT * FROM " . $this->tblCeleb;
                return 0;
            }

            $sql = rtrim($sql, "OR ");
            $query = $this->dbConnection->query($sql);

            if (!$query || $query->num_rows == 0) {
                throw new QueryFalseExceptions();
            }

            $celebs = array();

            while ($obj = $query->fetch_object()) {
                $celeb = new Celebrity(NULL, $obj->first_name, $obj->last_name, $obj->gender, $obj->age, $obj->web_presence, $obj->most_active, $obj->frequency, $obj->description, $obj->occupation, $obj->nationality);

                $celeb->setCelebId($obj->celeb_id);
                $celebs[] = $celeb;
            }

            return $celebs;

        } catch (QueryFalseExceptions $e) {
            $message = $e->getInfo();
            return $message;
        }
    }
}
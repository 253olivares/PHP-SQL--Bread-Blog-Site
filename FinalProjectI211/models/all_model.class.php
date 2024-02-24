<?php

/*
 * Author: Justin Rice
 * Date: 4/20/2020
 * File: all_model.class.php
 * Description: this is the model class to connect with the database
 */

class AllModel
{
    //sets attributes to connect to database
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblRecipes;

    //construct that sets values
    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblRecipes = $this->db->getRecipeTable();

        foreach ($_POST as $key => $value) {
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        foreach ($_GET as $key => $value) {
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }


    }

    //creates one instance of all model
    public static function getAllModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new AllModel();
        }
        return self::$_instance;
    }

    //function that lists all recipies
    public function listAllRecipes()
    {
        //our try here check to make sure our sql works

        try {

        $sql = "SELECT * FROM " . $this->tblRecipes;

        $query = $this->dbConnection->query($sql);

        if (!$query || $query->num_rows == 0){
            throw new DatabaseException();
        }


        $recipes = array();
        while ($obj = $query->fetch_object()) {
            $recipe = new All(stripslashes($obj->Author_id), NULL, stripslashes($obj->Category), stripslashes($obj->Name), stripslashes($obj->Publish_date), stripslashes($obj->Difficulty), stripslashes($obj->Description), stripslashes($obj->Ingredients), stripslashes($obj->Steps), stripslashes($obj->Image));

            //set the id for the recipe
            $recipe->setId($obj->id);

            //add the recipe into the array
            $recipes[] = $recipe;

        }
        return $recipes;
        }catch (DatabaseException $e){
            $message = $e->getInfo();
            return $message;
        }
    }

    public function view_recipe($id)
    {
//        $sql = "SELECT * FROM " . $this->tblrecipe . "," . $this->tblrecipeRating .
//            " WHERE " . $this->tblrecipe . ".rating=" . $this->tblrecipeRating . ".rating_id" .
//            " AND " . $this->tblrecipe . ".id='$id'";
//        $sql = "SELECT * FROM submissions,users WHERE Submission_id = $id  AND submissions.id=users.id";

        $sql = " SELECT * FROM " . $this->tblRecipes . ",users WHERE " . $this->tblRecipes . ".id=" . $id . " AND Author_id = user_id";
        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = $query->fetch_object();

            //create a recipe object
            $recipe = new All(stripslashes($obj->Author_id), stripslashes($obj->Username), stripslashes($obj->Category), stripslashes($obj->Name), stripslashes($obj->Publish_date), stripslashes($obj->Difficulty), stripslashes($obj->Description), stripslashes($obj->Ingredients), stripslashes($obj->Steps), stripslashes($obj->Image));

            //set the id for the recipe
            $recipe->setId($obj->id);

            return $recipe;
        }

        return false;
    }

    public function deleteRecipe($id)
    {
        //deletes database entry based on id given
        $sql = "DELETE FROM " . $this->tblRecipes . " WHERE id=" . $id;


        return $this->dbConnection->query($sql);


    }

    //function to search recipes
    public function searchRecipe($terms)
    {
        $terms = explode(" ", $terms); //explode multiple terms into an array
        //select statement for AND serach

        $sql = "SELECT * FROM " . $this->tblRecipes . " WHERE " . $this->tblRecipes . ".id=" . $this->tblRecipes . ".id AND (1";

        foreach ($terms as $term) {
            $sql .= " AND Name LIKE '%" . $term . "%'";
        }

        $sql .= ")";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // the search failed, return false.
        if (!$query)
            return false;

        //search succeeded, but no recipe was found.
        if ($query->num_rows == 0)
            return 0;

        //search succeeded, and found at least 1 recipe found.
        //create an array to store all the returned recipes
        $recipes = array();

        //loop through all rows in the returned recordsets
        while ($obj = $query->fetch_object()) {
            $recipe = new All(stripslashes($obj->Author_id), NULL, stripslashes($obj->Category), stripslashes($obj->Name), stripslashes($obj->Publish_date), stripslashes($obj->Difficulty), stripslashes($obj->Description), stripslashes($obj->Ingredients), stripslashes($obj->Steps), stripslashes($obj->Image));

            //set the id for the recipe
            $recipe->setId($obj->id);

            //add the recipe into the array
            $recipes[] = $recipe;
        }
        return $recipes;
    }

    public function update_recipe($id)
    {
        try {

            if (!filter_has_var(INPUT_POST, 'Name') ||
                !filter_has_var(INPUT_POST, 'Category') ||
                !filter_has_var(INPUT_POST, 'Difficulty') ||
                !filter_has_var(INPUT_POST, 'Ingredients') ||
                !filter_has_var(INPUT_POST, 'Image') ||
                !filter_has_var(INPUT_POST, 'Steps') ||
                !filter_has_var(INPUT_POST, 'Description')) {

                throw new PostDataExceptions();
            }

            $conn = $this->dbConnection;
            //retrieve data for the new recipe; data are sanitized and escaped for security.
            $category = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Category', FILTER_SANITIZE_STRING)));
            $name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING)));
            $difficulty = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Difficulty', FILTER_SANITIZE_STRING)));
            $description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Description', FILTER_SANITIZE_STRING)));
            $ingredients = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Ingredients', FILTER_SANITIZE_STRING)));
            $steps = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Steps', FILTER_SANITIZE_STRING)));
            $image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Image', FILTER_SANITIZE_STRING)));

            //query string for update
            $sql = "UPDATE " . $this->tblRecipes .
                " SET Name='$name', Category='$category', Difficulty='$difficulty', Ingredients='$ingredients', "
                . "Image='$image', Description='$description', Steps='$steps' WHERE id='$id'";

            //execute the query
            return $this->dbConnection->query($sql);
        }catch(PostDataExceptions $e){
            $message = $e->getInfo();
            return $message;
        }
    }

    //function that adds recipes
    public function addRecipe()
    {
        try {

            //grabs db connections
            //this if statement checks to see if this post exists before running any of this method to keep people from inserting
            //blank data and from accessing registration page
            if (isset($_POST['Name'])) {

                $conn = $this->dbConnection;

                //grabs post informations

                $userID = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'UsersId', FILTER_SANITIZE_STRING)));
                $category = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Category', FILTER_SANITIZE_STRING)));
                $name = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Name', FILTER_SANITIZE_STRING)));
                $publish_date = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Publish_date', FILTER_SANITIZE_STRING)));
                $difficulty = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Difficulty', FILTER_SANITIZE_STRING)));
                $description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Description', FILTER_SANITIZE_STRING)));
                $ingredients = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Ingredients', FILTER_SANITIZE_STRING)));
                $steps = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Steps', FILTER_SANITIZE_STRING)));
                $image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'Image', FILTER_SANITIZE_STRING)));


                //compares information grabbed from the post and compares the information to the data
                $query = "SELECT * FROM ". $this->tblRecipes . " WHERE Name = '$name'";
                if ($result = mysqli_query($conn, $query)) {
                    if (mysqli_num_rows($result) > 0) {
                        $register = "false";
                        return $register;
                    } else {
                        $_SESSION['register_status'] = 1;
                        //insert statement. The id field is an auto field.
                        $sql = "INSERT INTO " . $this->tblRecipes .  " VALUES (NULL, '$userID ', '$category','$name','$publish_date', '$difficulty ', '$description','$ingredients','$steps','$image')";

                        //execut the insert query
                        $query = @$conn->query($sql);
                        if (!$query ){
                            throw new DatabaseException();
                        }
                        $conn->close();
                        $register = "Your recipe has been successfully added to the webpage";
                    }
                }
                return $register;
            } else {
                throw new PostDataExceptions;
            }
        } catch (PostDataExceptions $e) {
            $message = $e->getInfo();
            return $message;
        } catch (DatabaseException $e){
            $message = $e ->getInfo();
            return $message;
        }
    }

}
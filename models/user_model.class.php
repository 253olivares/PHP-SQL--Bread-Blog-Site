<?php

/*
 * Author: Justin Rice
 * Date: 4/20/2020
 * File: user_model.class.php
 * Description: this is the model class that connects to the database and grabs user
 *
 */
require_once 'application/database.class.php';

class UserModel
{
    private $db;
    private $dbConnection;

    public function __construct(){
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
    }

    public function add_user(){
        try {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['register_status'] = 1;

        if (!filter_has_var(INPUT_POST, 'username') ||
            !filter_has_var(INPUT_POST, 'password') ||
            !filter_has_var(INPUT_POST, 'email') ||
            !filter_has_var(INPUT_POST, 'firstname') ||
            !filter_has_var(INPUT_POST, 'lastname')) {

            throw new PostDataExceptions();
        }

        //grabs db connections
        $conn = $this->dbConnection;

        //grabs post informations
        $username = ucfirst($conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING))));
        $password = ucfirst($conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING))));
        $email = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
        $firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
        $lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
        $fullname = $firstname . " " . $lastname;
        //compares information grabbed from the post and compares the information to the data
        $query = "SELECT * FROM users WHERE Username = '$username'";

        if ($result = mysqli_query($conn, $query)) {
            if (mysqli_num_rows($result) > 0) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                $message = "An account with the user name already exists in the database";
             } else {
                $_SESSION['register_status'] = 2;
                //insert statement. The id field is an auto field.
                $sql = "INSERT INTO users VALUES (NULL, '$username','$fullname', '$email', '$password', 'User')";

                //execute the insert query
                $query = @$conn->query($sql);

                if(!$query) {
                    throw new DatabaseException();
                }
                //close connection

                $conn->close();
                $message = "Your account has been successfully implemented into the database. Try to sign in to view your profile. ";

            }
        }
        return $message;
        }catch(PostDataExceptions $e){
            $message = $e->getInfo();
            return $message;
        }catch (DatabaseException $e){
            $message = $e->getInfo();
            return $message;
        }
    }

    public function verify_user()
    {
        try {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['login_status'] = 0;

        //connect to database and sets username and passweord
        $conn = $this->dbConnection;
        $username = "";
        $password = "";

        if (!isset($_POST['username'])){
            throw new PostDataExceptions();

        }
        if (!isset($_POST['password'])){
            throw new PostDataExceptions();
        }
        $username = $conn->real_escape_string(trim($_POST['username']));
        $password = $conn->real_escape_string(trim($_POST['password']));
        //checks and compares sql for username and passwords that match
        $sql = "SELECT * FROM users WHERE Username='$username' AND Password='$password'";

        //execute the query
        $query = @$conn->query($sql);
        if(!$query){
            throw new DatabaseException();
        }
        //fetch results
        if ($query->num_rows) {
            //It is a valid user. Need to store the user in session variables.
            $row = $query->fetch_assoc();
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['usersName'] = $row['Full_name'];
            $_SESSION['usersEmail'] = $row['Email'];
            $_SESSION['role'] = $row['Role'];
            $_SESSION['login'] = ucfirst($username);
            $_SESSION['password'] = ucfirst($password);
            $_SESSION['login_status'] = 1;
            $message = "You have successfully logged in. To view your profile click on the profiles tab. ";
        }else{
            $message = "Login information is incorrect! Please Try again.";
        }
        //close the connection
        $conn->close();
        return $message;
        }catch(PostDataExceptions $e){
            $message = $e->getInfo();
            return $message;
        }catch(DatabaseException $e){
            $message = $e->getInfo();
            return $message;
        }
    }

    public function update_profile($id){
        try{
            if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!filter_has_var(INPUT_POST, 'username') ||
            !filter_has_var(INPUT_POST, 'password') ||
            !filter_has_var(INPUT_POST, 'email') ||
            !filter_has_var(INPUT_POST, 'fullname')) {

            throw new PostDataExceptions();
        }

        //grabs db connections
        $conn = $this->dbConnection;

        //grabs post informations
        $username = ucfirst($conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING))));
        $password = ucfirst($conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING))));
        $email = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
        $fullname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING)));

        $query = "SELECT * FROM users WHERE Username = '$username'";
            if(!$query){
                throw new DatabaseException();
            }
        if ($result = mysqli_query($conn, $query)) {
            if (mysqli_num_rows($result) > 0) {
                //insert statement. The id field is an auto field.
                $sql = "UPDATE users SET Password = '$password', Full_name = '$fullname', Email = '$email' WHERE user_id ='$id'";

                //execute the query
                $query = @$conn->query($sql);
                if(!$query){
                    throw new DatabaseException();
                }
                //close the connection
                $conn->close();

                $message = "Profile has been updated!";
                $_SESSION['usersName'] = $fullname;
                $_SESSION['usersEmail'] = $email;
                $_SESSION['password'] = $password;

            } else {
                //insert statement. The id field is an auto field.
                $sql = "UPDATE users SET Password = '$password', Username = '$username', Full_name = '$fullname', Email = '$email' WHERE user_id ='$id'";

                //execute the query
                $query = @$conn->query($sql);
                if(!$query){
                    throw new DatabaseException();
                }
                //close the connection
                $conn->close();
                $message = "Profile has been updated!";
                $_SESSION['usersName'] = $fullname;
                $_SESSION['usersEmail'] = $email;
                $_SESSION['login'] =  $username;
                $_SESSION['password'] = $password;
            }
        }
        return $message;
        }catch (PostDataExceptions $e){
            $message = $e->getInfo();
            return $message;
        }catch (DatabaseException $e){
            $message = $e->getInfo();
            return $message;
        }
    }
    //function logout that clears cookie
    public function logout()
    {
        session_start();
        if (isset($_SESSION['login_status'])) {
            session_destroy();
        }
    }

}
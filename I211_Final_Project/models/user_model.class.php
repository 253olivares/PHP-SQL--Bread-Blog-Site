<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: user_model.class.php
 * Description: This is the user model in the MVC pattern that retrieves all of the user
 * data from the database.
 */
require_once 'application/database.class.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//created a new class called UserModel using the keyword 'class'
class UserModel {
    //created two private variables using the keyword private
    private $db; // database
    private $dbConnection; // database connection

    public function __construct() {
        $this ->db = Database::getInstance();
        $this ->dbConnection = $this ->db ->getConnection();
    }

    public function addUser(){
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_status();
            }

            $_SESSION['register_status'] = 1;

            //retrieve user inputs from the form
            if (!filter_has_var(INPUT_POST, 'fname') ||
                !filter_has_var(INPUT_POST, 'lname') ||
                !filter_has_var(INPUT_POST, 'username') ||
                !filter_has_var(INPUT_POST, 'email') ||
                !filter_has_var(INPUT_POST, 'password')) {

                throw new PostDataExceptions();
            }

            $conn = $this->dbConnection;

            $firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING)));
            $lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING)));
            $username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
            $email = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING)));
            $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));

            $evaluate = stripos($email, '@');

            if(!$evaluate) {
                throw new EmailSymbolExceptions();
            }

            $query = "SELECT * FROM users WHERE username = '$username'";
            if ($result = mysqli_query($conn, $query)) {
                if (mysqli_num_rows($result) > 0) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_status();
                    }

                    $_SESSION['register_status'] = 1;

                } else {
                    $_SESSION['register_status'] = 2;
                    $sql = "INSERT INTO users VALUES (NULL,'$firstname', '$lastname', '$username', '$password', '$email', '2' )";
                    //execute the query
                    $query = @$conn->query($sql);

                    //handle error
                    if (!$query) {
                        /*$errno = $conn->errno;
                        $errmsg = $conn->error;
                        echo "Insertion failed with: ($errno) $errmsg<br/>\n";*/
                        $conn->close();
                        throw new QueryFalseExceptions();
                        //exit;
                    }

                    $conn->close();
                }
            }

            return;
        } catch (PostDataExceptions $e) {
            $message = $e->getError();
            return $message;
        } catch (QueryFalseExceptions $e) {
            $message = $e->getInfo();
            return $message;
        } catch (EmailSymbolExceptions $e) {
            $message = $e->getSymbol();
            return $message;
        }
    }

    public function verifyUser(){
        try {
            if (session_status() == PHP_SESSION_NONE) {
                session_status();
            }

            $_SESSION['login_status'] = 2;

            $username = "";
            $password = "";
            $conn = $this->dbConnection;
            if (filter_has_var(INPUT_POST, 'username') || filter_has_var(INPUT_POST, 'password')) {
                $username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
                $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));
            }

            //validate user name and password against a record in the users table in the database. If they are valid, create session variables.
            $sql = "SELECT * FROM users WHERE username='$username' AND password = '$password'";

            $query = @$conn->query($sql);

            if (!$query) {
                throw new QueryFalseExceptions();
            }

            if ($query->num_rows) {
                $row = $query->fetch_assoc();
                $_SESSION['register'] = $username;
                $_SESSION['name'] = $row['first_name'] . ' ' . $row['last_name'];

                $_SESSION['login_status'] = 1;
            }

            $conn->close();
            return;
        }  catch (QueryFalseExceptions $e) {
            $message = $e->getInfo();
            return $message;
        }
    }

    public function logout(){
        $_SESSION = array();
        setcookie(session_name(), '', time()-10);
        session_destroy();
    }

    public function resetPassword(){
        try {

            $conn = $this->dbConnection;
            $username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));

            $password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));

            $sql = "UPDATE users SET password = '$password' WHERE username = '$username'";

            //execute the query
            $query = @$conn->query($sql);
            if (!$query) {
                throw new QueryFalseExceptions();
            }
            $conn->close();
        }  catch (QueryFalseExceptions $e) {
            $message = $e->getInfo();
            return $message;
        }
    }
}
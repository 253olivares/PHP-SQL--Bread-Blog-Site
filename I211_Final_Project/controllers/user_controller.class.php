<?php
/**
 * Author: "Julie Tadrous"
 * Date: 4/19/2020
 * File: user_controller.class.php
 * Description: This is the main controller for the user objects. It defines all of the basic
 * functions used for a user. Connected to the login page / views.
 */

//I created a new php class called UserController using the 'class' keyword. This controller is a file that contain a set of
//methods to handle different actions that are run through our application.
class UserController {
    //Then, I created one variable $user_model and made it have a private scope by using the keyword 'private'.
    private $user_model;

    //I created a constructor for this class as well. This allows a new User Model to be initialized whenever this class is used.
    //__construct is a common method.
    public function __construct() {
        $this->user_model = new UserModel();
    }

    //error – display the custom error page
    public function error($message) {
        //These lines use the GET method to check if the $message is already set. If it is, this retrieves the value within.
        /*if(isset($_GET['message'])) {
            $message = $_GET['message'];
        }

        $message = "We are sorry, there was a problem.";*/
        //By creating a new variable $view, I was able to initialize a new User Error object and run it's display function.
        $view = new UserError();
        $view->display($message);
    }

    //index – display the registration form; default action
    public function index() {
        //By creating a new variable $view, I was able to initialize a new Index object and run it's display function.
        $view = new UserIndex();
        $view->display();
    }

    //logout – log a user out of the system
    public function logout() {
        $log = $this->user_model->logout();

        //By creating a new variable $view, I was able to initialize a new Logout object and run it's display function.
        $view = new Logout();
        $view->display($log);
    }

    //reset – display the password reset form
    public function reset() {
        //By creating a new variable $view, I was able to initialize a new Reset object and run it's display function.
        $view = new Reset();
        $view->display();
    }

    //do_reset – reset the password by updating a database record
    public function do_reset() {
        $result = $this->user_model->resetPassword();
        if(gettype($result) == "string") {
            $this->error($result);
            return;
        }
        //By creating a new variable $view, I was able to initialize a new ResetConfirm object and run it's display function.
        $view = new ResetConfirm();
        $view->display($result);
    }

    //register – register the user by creating a user account and storing the data in the database
    public function register() {
        $register = $this->user_model->addUser();
        if(gettype($register) == "string") {
            $this->error($register);
            return;
        }

        //By creating a new variable $view, I was able to initialize a new Register object and run it's display function.
        $view = new Register();
        $view->display($register);
    }

    //new – display the register form
    public function newUser() {
        //By creating a new variable $view, I was able to initialize a new Login object and run it's display function.
        $view = new NewUser();
        $view->display();
    }

    //verify – verify username and password against a database record
    public function verify() {
        $verifyuser = $this->user_model->verifyUser();

        if(gettype($verifyuser) == "string") {
            $this->error($verifyuser);
            return;
        }

        //By creating a new variable $view, I was able to initialize a new VerifyUser object and run it's display function.
        $view = new VerifyUser();
        $view->display($verifyuser);
    }
}
<?php
/*
 * Author: Carlos Banuelos
 * Date: 4/20/2020
 * File: user_controller.class.php
 * Description: the user controller
 *
 */

class UserController
{
    //sets variables to be used
    private $user_model;

    public function __construct(){
        //creates an instance of the user model class
        $this->user_model = new UserModel();
    }

    public function login() {
        //creates an instance of the login class
        $view = new Login();

        //calls on the display method from the login class and displays the html in the class
        $view->display();
    }

    public function verify(){
        //runs the verify_user method from the user model class
        $verifys = $this->user_model->verify_user();
        //checks with the database to see if the log in information is correct
        if(!$verifys){
            $message = "We seem to be having difficulty with verifying you're information!";
            $this->error($message);
            return;
        }
        //creates new instance of the Verify Class
        $view = new Verify();

        //calls upon the display method from the Verify class and displays the HTML in the class
        $view->display($verifys);
    }

    public function register() {

//        $output = $this->user_model->add_user();

        //creates an instance of the Account Creation class
        $view = new AccountCreation();

        //calls upon the display method from the Account Creation class and displays the HTML in the class
        $view->display();
    }

    public function create(){

        $output = $this->user_model->add_user();

        $view = new VerifyCreation();

        $view->display($output);
    }

    public function profile() {
        //creates an instance of the Account class
        $view = new Account();

        //calls upon the display method from the Account class and displays the HTML in the class
        $view->display();
    }

    public function logout(){
        //runs the logout method from the user model class
        $logout = $this->user_model->logout();

        if ($logout === false) {
            //handle error
            $message = "An error has occurred logging out the server.";
            $this->error($message);
            return;
        }
        //creates new instance of the Logout class
        $view = new Logout();

        //calls upon the display method from the Logout class and displays the HTML in the class
        $view->display($logout);

    }
    public function error($message){
        //creates an instance of the error user class
        $error = new ErrorUser();

        //display the error page
        $error->display($message);
    }

    public function edit(){
        $view = new UserEdit();

        $view->display();
    }

    public function update($id){
        $update_profile = $this->user_model->update_profile($id);

        if(!$update_profile){
            $message = "There was a problem updating your account";
            $this->error($message);
            return;
        }

        $view = new Account();

        $view->display($update_profile);
    }
    public function __call($name, $arguments)
    {
        //$message = "Route does not exist.";
        // Note: value of $name is case sensitive.
        $message = "Calling method '$name' caused errors. Route does not exist.";

        //displays error message
        $this->error($message);
        return;
    }
}
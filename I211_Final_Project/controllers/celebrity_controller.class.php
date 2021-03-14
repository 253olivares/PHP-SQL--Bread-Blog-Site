<?php
/**
 * Author: James Myers
 * Date: 4/19/2020
 * File: celebrity_controller.class.php
 * Description: This is the main controller for the celebrity objects. It defines all of the basic
 * functions used for a celebrity. Connected to the inventory page / views.
 */

class CelebrityController {
    //James add your code here!
    //make celebrity_model variable and __construct() function first
    private $celebrity_model;

    public function __construct() {
        $this ->celebrity_model = CelebrityModel::getCelebrityModel();

    }

    //index action that displays all of the research data in a table
    public function index() {
        // display all celebrity data
        $celebs = $this->celebrity_model->list_celeb();

        if(!is_array($celebs)) {
            $this->error($celebs);
            return;
        }

        if (!$celebs) {
            //display an error
            $message = "There was a problem displaying the celebrities.";
            $this->error($message);
            return;
        }

        $view = new CelebrityIndex();
        $view->display($celebs);
    }

    public function detail($id) {
        $celeb = $this->celebrity_model->view_celeb($id);
        if(!is_object($celeb)) {
            $this->error($celeb);
            return;
        }

        $celebPersonality = $this->celebrity_model->get_personality($id);
        //var_dump(gettype($celebPersonality));
        //var_dump($celeb);

        //create a view object and call the display method to display the details. For example:
        $view = new CelebrityDetails();
        $view->display($celeb, $celebPersonality);
    }

    public function edit($id) {
        //retrieve the specific movie
        $celeb = $this->celebrity_model->view_celeb($id);

        if(!is_object($celeb)) {
            $this->error($celeb);
            return;
        }

        if (!$celeb) {
            //display an error
            $message = "There was a problem displaying the celebrity id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new CelebrityEdit();
        $view->display($celeb);
    }

    //update a celebrity in the database
    public function update($id) {
        //update the celebrity
        $update = $this->celebrity_model->update_celeb($id);
        if(gettype($update) == "string") {
            $this->error($update);
            return;
        }

        if (!$update) {
            //handle errors
            $message = "There was a problem updating the celebrity id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $this->detail($id);
    }

    public function search() {
        //retrieve query terms from search form
        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all celebs
        if ($query_terms == "") {
            $this->index();
            return;
        }

        //search the database for matching celebs
        $celebs = $this->celebrity_model->search_celeb($query_terms);

        if(!is_array($celebs)) {
            $this->error($celebs);
            return;
        }

        if (!$celebs) {
            //handle error
            $message = "An error has occurred.";
            $this->error($message);
            return;
        }

        //display matched movies
        $search = new CelebritySearch();
        $search->display($query_terms, $celebs);
    }

    public function error($message) {
        //create an object of the Error class
        $error = new CelebrityError();

        //display the error page
        $error->display($message);
    }

    public function add() {
        //display matched movies
        $view = new CelebrityAdd();
        $view->display();
    }

    public function register() {
        $sent = $this->celebrity_model->add_celeb();
        if(gettype($sent) == "string") {
            $this->error($sent);
            return;
        }

        if($sent) {
            $this->index();
        }
    }

    public function delete($id) {
        $del = $this->celebrity_model->delete_celeb($id);

        if(gettype($del) == "string") {
            $this->error($del);
            return;
        }

        if (!$del) {
            //handle error
            $message = "An error has occurred with the deletion.";
            $this->error($message);
            return;
        }

        $this->index();
    }

    public function filter() {
        // display all celebrity data
        $celebs = $this->celebrity_model->filter_celeb();

        if(gettype($celebs) == "string") {
            $this->error($celebs);
            return;
        }

        if($celebs == 0) {
            $this->index();
            return;
        }

        if (!$celebs) {
            //display an error
            $message = "There was a problem displaying the filtered celebrities.";
            $this->error($message);
            return;
        }

        $view = new CelebrityFilter();
        $view->display($celebs);
    }

    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $cel = $this->celebrity_model->search_celeb($query_terms);

        //retrieve all celebrities and store them in an array
        $cels = array();
        if ($cel) {
            foreach ($cel as $c) {
                $cels[] = $c->getName();
            }
        }
        echo json_encode($cels);
    }
}
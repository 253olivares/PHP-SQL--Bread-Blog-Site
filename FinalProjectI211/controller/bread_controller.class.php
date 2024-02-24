<?php
/**
 * Author: "Carlos Banuelos"
 * Date: 4/28/2020
 * File: bread_controller.class.php
 * Description:
 */

class BreadController
{
    private $bread_model;

    public function __construct()
    {
        //create an instance of the all model class
        $this->bread_model = BreadModel::getBreadModel();
    }

    public function index()
    {
        //calls the list all recipes method to display all the recipes we have in the database
        $recipes = $this->bread_model->listBreadRecipes();

        //if there is an error, displays error message
        if (!$recipes) {
            //display an error
            $message = "There was a problem communicating with the all model";
            $this->error($message);
            return;
        }
        //if there is an error, displays error message
        if (!is_array($recipes)){
            $this->error($recipes);
            return;
        }
        //creates instance of the all index class
        $view = new BreadIndex();

        //calls upon the display method and displays the recipes fowund
        $view->display($recipes);

    }

    public function edit($id){
        //retrieve the specific recipe
        $recipe = $this->bread_model->view_recipe($id);

        if (!$recipe) {
            //display an error
            $message = "There was a problem displaying the recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new BreadEdit();
        $view->display($recipe);
    }

    public function update($id) {
        //update the recipe
        $update = $this->bread_model->update_recipe($id);

        if (!$update) {
            //handle errors
            $message = "There was a problem updating the recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }
        if (gettype ($update) == 'string'){
            $this->error($update);
            return;
        }

        //display the updateed recipe details
        $confirm = "The recipe was successfully updated.";
        $recipe = $this->bread_model->view_recipe($id);

        $view = new BreadRecipeDetail();
        $view->display($recipe , $confirm);
    }

    public function add()
    {
        //creates an instance of the add recipe class
        $view = new BreadAddRecipe();

        //calls upon the display method from the add recipe class
        $view->display();
    }

    public function register()
    {
        $register = $this->bread_model->addRecipe();
        //makes a new instance of the Register class
        if (!$register) {
            $message = "An error has occurred with adding the bread recipe.";
            $this->error($message);
            return;
        } else {
            $view = new BreadRegister();
            $view->display($register);
        }
        //calls upon the display method from the Register class and displays the HTML in the class
    }

    public function delete($id){
        $delete = $this->bread_model->deleteRecipe($id);

        if(!$delete){
            $message = "An error has occurred with deleting the bread recipe.";
            $this->error($message);
            return;
        }
        $view = new BreadDelete();
        $view->display($delete);
    }

    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $recipes = $this->bread_model->searchRecipe($query_terms);

        //retrieve all recipe names and store them in an array
        $names = array();
        if ($recipes) {
            foreach ($recipes as $recipe) {
                $names[] = $recipe->getName();
            }
        }

        echo json_encode($names);
    }

    public function detail($id) {
        //retrieve the specific recipe
        $recipe = $this->bread_model->view_recipe($id);

        if (!$recipe) {
            //display an error
            $message = "There was a problem displaying the bread recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display recipe details
        $view = new BreadRecipeDetail();
        $view->display($recipe);
    }

    public function search()
    {
        //retrieve query terms from search form

        $query_terms = trim($_GET['query-terms']);

        //if search term is empty, list all recipes
        if ($query_terms == "") {
            $this->index();
        }

        //search the database for matching recipes
        $recipes = $this->bread_model->searchRecipe($query_terms);
        if ($recipes === false) {
            //handle error
            $message = "An error has occurred searching for the recipes.";
            $this->error($message);
            return;
        }

        //creates new instance of the recipe search class
        $search = new BreadRecipeSearch();

        //calls upon the display method and displays all relevant search terms
        $search->display($query_terms, $recipes);
    }

    public function error($message)
    {
        //creates new instance of the all error class
        $error = new BreadError();

        //display the error page
        $error->display($message);
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
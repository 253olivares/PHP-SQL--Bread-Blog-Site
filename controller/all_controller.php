<?php
/*
 * Author: Miguel Olivares
 * Date: 4/20/2020
 * File: all_controller.class.php
 * Description: this is the controller to display all our recipes
 *
 */


class AllController
{
    private $all_model;

    public function __construct()
    {
        //create an instance of the all model class
        $this->all_model = AllModel::getAllModel();
    }

    public function index()
    {
        //calls the list all recipes method to display all the recipes we have in the database
        $recipes = $this->all_model->listAllRecipes();
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
        $view = new AllIndex();

        //calls upon the display method and displays the recipes found
        $view->display($recipes);
    }

    public function edit($id){
        //retrieve the specific recipe
        $recipe = $this->all_model->view_recipe($id);

        if (!$recipe) {
            //display an error
            $message = "There was a problem displaying the recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new AllEdit();
        $view->display($recipe);
    }

    public function update($id) {
        //update the recipe
        $update = $this->all_model->update_recipe($id);

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
        $recipe = $this->all_model->view_recipe($id);

        $view = new RecipeDetail();
        $view->display($recipe , $confirm);
    }

    public function add()
    {
        //creates an instance of the add recipe class
        $view = new AddRecipe();

        //calls upon the display method from the add recipe class
        $view->display();
    }

    public function register()
    {
        $register = $this->all_model->addRecipe();
        //makes a new instance of the Register class
        if (!$register) {
            $message = "An error has occurred with adding the recipe.";
            $this->error($message);
            return;
        } else {
            $view = new Register;
            $view->display($register);
        }
        //calls upon the display method from the Register class and displays the HTML in the class
    }
    public function delete($id){
        $delete = $this->all_model->deleteRecipe($id);

        if(!$delete){
            $message = "An error has occurred with deleting the recipe.";
            $this->error($message);
            return;
        }
        $view = new Delete;
        $view->display($delete);
    }
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $recipes = $this->all_model->searchRecipe($query_terms);

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
        $recipe = $this->all_model->view_recipe($id);

        if (!$recipe) {
            //display an error
            $message = "There was a problem displaying the recipe id='" . $id . "'.";
            $this->error($message);
            return;
        }

        //display recipe details
        $view = new RecipeDetail();
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
        $recipes = $this->all_model->searchRecipe($query_terms);
        if ($recipes === false) {
            //handle error
            $message = "An error has occurred searching for the recipes.";
            $this->error($message);
            return;
        }
        //creates new instance of the recipe search class
        $search = new RecipeSearch();

        //calls upon the display method and displays all relevant search terms
        $search->display($query_terms, $recipes);
    }

    public function error($message)
    {
        //creates new instance of the all error class
        $error = new AllError();

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
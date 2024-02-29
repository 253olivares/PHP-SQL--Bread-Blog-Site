<?php
/*
 * Author: Miguel Olivares
 * Date: 4/28/2020
 * File: cake.class.php
 * Description: this is the controller to display all our data in the database that is related to cake category
 *
 */

class Cake
{
    //private properties of All objects
    private $id, $Author_id, $Author, $Category, $Name, $Publish_date, $Difficulty, $Description, $Ingredients, $Steps, $Image;

    //initialize all properties
    public function __construct($Author_id, $Author, $Category, $Name, $Publish_date, $Difficulty, $Description, $Ingredients, $Steps, $Image)
    {
        $this->Author_id = $Author_id;
        $this->Author = $Author;
        $this->Name = $Name;
        $this->Publish_date = $Publish_date;
        $this->Category = $Category;
        $this->Difficulty = $Difficulty;
        $this->Description = $Description;
        $this->Ingredients = $Ingredients;
        $this->Steps = $Steps;
        $this->Image = $Image;

    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->Author_id;
    }
    public function getAuthor(){
        return$this->Author;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @return mixed
     */
    public function getPublishDate()
    {
        return $this->Publish_date;
    }

    /**
     * @return mixed
     */
    public function getCategory(){
        return $this->Category;
    }

    public function getDifficulty()
    {
        return $this->Difficulty;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->Ingredients;
    }

    /**
     * @return mixed
     */
    public function getSteps()
    {
        return $this->Steps;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->Image;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
<?php

/* selected product class */

class Products implements JsonSerializable{

    public $id;
    public $name;
    public $description;
    public $price;
    public $image;
    

    public function __construct($id, $name, $description, $price, $image)
    {
        $this-> id = $id;
        $this-> name = $name;
        $this-> description = $description;
        $this-> price = $price;      
        $this-> image = $image;
    }

    public function jsonSerialize() {
        
        $productArray = [
            "id" => $this -> id,
            "name"  => $this -> name,
            "description" => $this -> description,
            "price" => $this -> price,
            "image" => $this -> image,
        ];

        return $productArray;

    }

    public function getId(){
        return $this-> id;
    }

    public function setId($id){
        $this->id = $id;

        return $this;
    } 

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;

        return $this;
    } 

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;

        return $this;
    }
    
    public function getPrice(){
        return $this-> price;
    }

    public function setPrice($price){
        $this->price = $price;

        return $this;
    } 
    
    public function getImage(){
        return $this->image;
    }

    public function setImage($image){
        $this->image = $image;

        return $this;
    } 

}

?>
<?php
/* class for the shopping cart */
class Cart implements JsonSerializable{

    public $productId;
    public $productName;
    public $productPrice;

    public function __construct($productName, $productPrice,$productId)
    {
        $this-> productName = $productName;
        $this-> productPrice = $productPrice;
        $this -> productId = $productId;
    }

    public function jsonSerialize() {
        
        $assocArray = [
            "productId" => $this -> productId, 
            "productName"  => $this -> productName,
            "productPrice" => $this -> productPrice,
        ];

        return $assocArray;

    }


    public function getProductName(){
        return $this->productName;
    }

    public function setProductName($productName){
        $this->productName = $productName;

        return $this;
    } 
    
    public function getProductPrice(){
        return $this-> productPrice;
    }

    public function setProductPrice($productPrice){
        $this->productPrice = $productPrice;

        return $this;
    } 

}

?>
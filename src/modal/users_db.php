<?php
    /* Signed In User class */
    class User implements JsonSerializable{

        public $signedIn; // will be either true or false
        public $user_email;
        public $username;
        public $user_password;
        public $user_cart; // when user adds to cart item will be added

        public function __construct($signedIn, $user_email, $user_password, $username, $user_cart)
        {   
            $this-> signedIn = $signedIn;
            $this-> user_email = $user_email;
            $this-> user_password = $user_password;
            $this-> username = $username;
            $this-> user_cart = $user_cart;
        }

        public function jsonSerialize() {
        
            $user_Array = [
                "signedIn" => $this-> signedIn,
                "user_Email" => $this-> user_email,
                "user_Password" => $this-> user_password,
                "username" => $this-> username,
                "user_Cart" => $this-> user_cart
            ];

            return $user_Array;
        }

        /* getters and setters */

        public function getsignedIn(){
            return $this->signedIn;
        }

        public function setsignedIn($signedIn){
            $this->signedIn = $signedIn;

            return $this;
        }  

        public function getUser_Email(){
            return $this->user_email;
        }

        public function setUserEmail($user_Email){
            $this->user_email = $user_Email;

            return $this;
        }  
        
        public function getUserPassword(){
            return $this->user_password;
        }

        public function setUserPassword($user_Password){
            $this->user_password = $user_Password;

            return $this;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setRate($username){
            $this->$username = $username;

            return $this;
        }

        public function getUserCart(){
            return $this->user_cart;
        }

        public function setUserCart($user_Cart){
            $this->user_cart = $user_Cart;
        }
            
    }
?>
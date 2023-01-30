<?php

    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../modal/db.php';
    
    // require selected product model
    require __DIR__ . '/../modal/products.php';

    require __DIR__ . '/../modal/cart_info.php';

if (isset($_POST["cart"])) {

    $productName = $_POST["product-name"];
    $productPrice = $_POST["product-price"];
    $productId = $_POST["product_id"];

    $sql = "INSERT INTO cart (product_name, cart_total, product_id) VALUES ( :productName, :productPrice, :productId)";

    try{
        /* db object */
        $database = new Database();
    
        /* connect to DB */
        $conn = $database->connect();
        
        /* prepared statement */
        $stmt = $conn->prepare($sql);
        
        /* binding parameters */
        $stmt->bindParam(':productName', $productName);
        $stmt->bindParam(':productPrice', $productPrice);
        $stmt->bindParam(':productId', $productId);

         /* exucute prepared statement */
        $result = $stmt->execute();
        
        $database = null;
        header("location: ../pages/checkout.html");

    }
    catch (PDOException $e){
        $error = array(
            "message" => $e->getMessage()
        );
        print_r($error);
        echo $productName;
        header("location: ../pages/view_product.html");
    }
}

?>
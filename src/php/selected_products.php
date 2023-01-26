<?php
    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../modal/db.php';
    
    // require selected product model
    require __DIR__ . '/../modal/products.php';

    if (isset($_POST["view"])) {

        $selectedID = $_POST["selectedProductID"];

        $sql = "SELECT * FROM products WHERE product_id = '$selectedID'"; // SQL with parameters

        try{
            // Get DB Object
            $database = new Database();
            
            // connect to DB
            $conn = $database->connect();
            
            // query
            $stmt = $conn->query($sql);
            $products = $stmt->fetchAll(PDO::FETCH_OBJ);
            $database = null;

            // loop through to find the original info
            foreach ($products as $product => $value) {
                $productID = $value -> product_id;
                $productName = $value -> product_name;
                $productDesc = $value -> product_desc;
                $productPrice = $value -> product_price;
                $productPicture = $value -> product_pic;
            }

            if($selectedID == $productID){
                /* new selected product */
                $selectedProduct = new Products($productID, $productName, $productDesc, $productPrice,  $productPicture);

                $json = json_encode($selectedProduct);
                $file = file_put_contents("selectedProduct.json", $json);
                /* if all is correct then user will be taken to home page */
                header("location:../pages/view_product.html");
            }
            else{
                echo "error";
            }

        }
        catch(PDOException $e){
            $error = array(
              "message" => $e->getMessage()  
            );
            /* if all is incorrect user will be taken back to sign in page */
            header("location: /index.html");
        }

    }
?>
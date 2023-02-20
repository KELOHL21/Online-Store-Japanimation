<?php
   session_start();

   // require auto load
   require __DIR__ . '/../../vendor/autoload.php';

   require __DIR__ . '/../modal/db.php';

   require __DIR__ . '/../modal/users_db.php';

   if (isset($_POST['submit'])) {

      if (empty(trim($_POST["username"]))) {
         $username = "";
         $error = "display name error";
       } else {
         $username = $_POST["username"];
         $error = "";
       }
 
       if (empty(trim($_POST["password"]))) {
           $password= "";
           $error = "password error";
       } else {
           $password = $_POST["password"];
           $error = "";
       }

       $sql = "SELECT * FROM users WHERE username = '$username'"; // SQL with parameters


       try{
         // Get DB Object
         $database = new Database();
         
         // connect to DB
         $conn = $database->connect();
         
         // query
         $stmt = $conn->query($sql);
         $userInfo = $stmt->fetchAll(PDO::FETCH_OBJ);
         $database = null;
   
         // loop through to find the original info
         foreach ($users as $user => $value) {
           $verified_username = $value -> username;
           $verified_password = $value -> user_password;
           $verified_email = $value -> user_email;
         }
   
         /* ensure the original matches with the inputs */
         if ($username == $verified_username && $password == $verified_password) {
           /* create new signed in user */
           $signedInUser = new User(TRUE, $verified_email, $verified_password, $verified_username, 0);
   
           /* temporary measure is to store info in json file until the get request based of inputs is working */
   
           /* create json folder, so frontend can access necessary info */
           $json = json_encode($signedInUser);
           $file = file_put_contents("signed_in_user.json", $json);
           /* if all is correct then user will be taken to home page */
           header("location:/src/pages/home.html");
         }
         else{
           /* inputs dont match */
           echo "user not found";
           header("location:/index.html");
   
         }
       }
       catch(PDOException $e){
         $error = array(
           "message" => $e->getMessage()  
         );
         /* if all is incorrect user will be taken back to sign in page */
         header("location:/src/pages/signup.html");
       }
   
     }

?>
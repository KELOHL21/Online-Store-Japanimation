<?php
    // require auto load
    require __DIR__ . '/../../vendor/autoload.php';

    // require db connection file
    require __DIR__ . '/../modal/db.php';

   if (isset($_POST["submit2"])) {

        /* backend form validation for extra security */

        /* check that there is no blank value */
        if (empty(trim($_POST["name"]))) {
            $name = "";
            $error = "name error";
        }else{
            $name = $_POST["name"];
            $error = "";
        }

        if (empty(trim($_POST["username"]))) {
            $username = "";
            $error = "username error";
        } else {
            $username = $_POST["username"];
            $error = "";
        }

        if (empty(trim($_POST["email"]))) {
            $userEmail = "";
            $error = "email error";
        } else {
            $userEmail = $_POST["email"];
            $error = "";
        }
        
        if (empty(trim($_POST["password"]))) {
            $userPassword= "";
            $error = "password error";
        } else {
            $userPassword = $_POST["password"];
            $error = "";
        }

        if (empty(trim($_POST["confirm_password"]))) {
            $usercPassword= "";
            $error = "confirm_password error";
        } else {
            $usercPassword = $_POST["confirm_password"];
            $error = "";
        }

        /* "sanitize" data */
        MD5($userPassword);
        htmlentities($name && $username && $userEmail);
        filter_var($userEmail, FILTER_SANITIZE_EMAIL);


        $sql = "INSERT INTO users(name, username,email, password) VALUES (:name, :username, :userEmail, :userPassword);";
    
        try{

            /* DB object */
            $database = new Database();
            
            /* connect to DB */
            $conn = $database->connect();
                
            /* prepared statement */
            $stmt = $conn->prepare($sql);
                
            /* binding parameters */
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':userEmail', $userEmail);
            $stmt->bindParam(':userPassword', $userPassword);

            /* exucute prepared statement */
            $result = $stmt->execute();
            
            $database = null;
            /* when data is saved, take user to sign in page to sign user in */
            header("location:/src/pages/login.html");
         }
        catch (PDOException $e){
            $error = array(
                "message" => $e->getMessage()
            );
            header("location:/src/pages/signup.html");
         }
   }

?>


// require __DIR__ . '/../modal/db.php';;

// session_start();

// error_reporting(0);

// if (isset($_SESSION['username'])) {
//     header("Location: index.php");
// }

// if (isset($_POST['submit'])) {
// 	$email = $_POST['email'];
// 	$password = md5($_POST['password']);

// 	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
// 	$result = mysqli_query($conn, $sql);
// 	if ($result->num_rows > 0) {
// 		$row = mysqli_fetch_assoc($result);
// 		$_SESSION['username'] = $row['username'];
// 		header("Location: index.html");
// 	} else {
<!-- // 		echo "<script>alert('Woops! Email or Password is Wrong.')</script>"; -->
// 	}
// }

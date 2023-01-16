<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Selective\BasePath\BasePathMiddleware;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../src/modal/db.php';

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true);

    // ALL PRODUCTS
    $app->get('/animemerch', function (Request $request, Response $response, $args) {
      $sql= "SELECT * FROM products";
      try{
      // Connectin to object
      $database = new Database();
      // Connecting to database
      $con = $database->connect();
      // Queries
      $stmt = $con->query($sql);
      // Product object/variable
      $product = $stmt->fetchAll(PDO::FETCH_OBJ);
      // Clearing database object
      $database = null;
      // Response 
      $response->getBody()->write(json_encode($product));
      return $response 
          ->withHeader('content-type', 'application/json')
          ->withStatus(200);
  }
  catch(PDOException $e){
      $error = array(
          'message' => $e->getMessage()
      );
      $response->getBody()->write(json_encode($error));
      return $response 
          ->withHeader('content-type', 'application/json')
          ->withStatus(500);
  }
});

// HOODIES
$app->get('/animemerch/hoodies', function (Request $request, Response $response, $args) {
  $sql= "SELECT * FROM products WHERE category_id = 1 && status= 1";
  try{
  // Connectin to object
  $database = new Database();
  // Connecting to database
  $con = $database->connect();
  // Queries
  $stmt = $con->query($sql);
  // Product object/variable
  $product = $stmt->fetchAll(PDO::FETCH_OBJ);
  // Clearing database object
  $database = null;
  // Response 
  $response->getBody()->write(json_encode($product));
  return $response 
      ->withHeader('content-type', 'application/json')
      ->withStatus(200);
}
catch(PDOException $e){
  $error = array(
      'message' => $e->getMessage()
  );
  $response->getBody()->write(json_encode($error));
  return $response 
      ->withHeader('content-type', 'application/json')
      ->withStatus(500);
}
});

//T-SHIRTS
$app->get('/animemerch/t-shirts', function (Request $request, Response $response, $args) {
  $sql=  "SELECT * FROM products WHERE category_id = 2 && status= 1";
  try{
  // Connectin to object
  $database = new Database();
  // Connecting to database
  $con = $database->connect();
  // Queries
  $stmt = $con->query($sql);
  // Product object/variable
  $product = $stmt->fetchAll(PDO::FETCH_OBJ);
  // Clearing database object
  $database = null;
  // Response 
  $response->getBody()->write(json_encode($product));
  return $response 
      ->withHeader('content-type', 'application/json')
      ->withStatus(200);
}
catch(PDOException $e){
  $error = array(
      'message' => $e->getMessage()
  );
  $response->getBody()->write(json_encode($error));
  return $response 
      ->withHeader('content-type', 'application/json')
      ->withStatus(500);
}
});

// ACCESSORIES
  $app->get('/animemerch/accessories', function (Request $request, Response $response, $args) {
  $sql=  "SELECT * FROM products WHERE category_id = 3 && status= 1";
  try{
  // Connectin to object
  $database = new Database();
  // Connecting to database
  $con = $database->connect();
  // Queries
  $stmt = $con->query($sql);
  // Product object/variable
  $product = $stmt->fetchAll(PDO::FETCH_OBJ);
  // Clearing database object
  $database = null;
  // Response 
  $response->getBody()->write(json_encode($product));
  return $response 
      ->withHeader('content-type', 'application/json')
      ->withStatus(200);
}
catch(PDOException $e){
  $error = array(
      'message' => $e->getMessage()
  );
  $response->getBody()->write(json_encode($error));
  return $response 
      ->withHeader('content-type', 'application/json')
      ->withStatus(500);
}
});

// COMING SOON
  $app->get('/animemerch/upcoming', function (Request $request, Response $response, $args) {
  $sql=  "SELECT * FROM products WHERE  category_id = 6 && status= 0";
  try{
  // Connectin to object
  $database = new Database();
  // Connecting to database
  $con = $database->connect();
  // Queries
  $stmt = $con->query($sql);
  // Product object/variable
  $product = $stmt->fetchAll(PDO::FETCH_OBJ);
  // Clearing database object
  $database = null;
  // Response 
  $response->getBody()->write(json_encode($product));
  return $response 
      ->withHeader('content-type', 'application/json')
      ->withStatus(200);
}
catch(PDOException $e){
  $error = array(
      'message' => $e->getMessage()
  );
  $response->getBody()->write(json_encode($error));
  return $response 
      ->withHeader('content-type', 'application/json')
      ->withStatus(500);
}
});

$app->run();
?>
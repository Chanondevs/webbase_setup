<?php

use AltoRouter as Router;

require __DIR__.'/vendor/autoload.php';

/** 
 * ตัวอย่างการใช้งาน Router
 */
$router = new Router();

$router->map( "GET", "/", function() {
  echo "หน้าแรก";
});

$router->map("GET", "/home", function () {
  require_once __DIR__ . "/page/home.php";
});

$router->map("GET", "/test/jwt", function () {
  require_once __DIR__ . "/test/testjwt.php";
});

$router->map("GET", "/test/api", function () {
  require_once __DIR__ . "/test/testapi.php";
});

$router->map("GET", "/api/v1/jwt", function () {
  require_once __DIR__ . "/test/testapi.php";
});

$router->map("GET", '/home', function () {
    require __DIR__ . "/page/home.php";
});

$match = $router->match();
if( is_array($match) && is_callable( $match['target'] ) ) {
  call_user_func_array( $match['target'], $match['params'] );
} else {
  echo "ไม่พบหน้าที่ต้องการ";
}

?>
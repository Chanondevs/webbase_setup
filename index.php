<?php

use AltoRouter as Router;

require_once realpath(__DIR__ . '/vendor/autoload.php');

/** 
 * ตัวอย่างการใช้งาน Router
 */
$router = new Router();

$router->map("GET", '/home', function () {
    require __DIR__ . "/page/home.php";
});

$match = $router->match();
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    echo "ไม่พบหน้าที่ต้องการ";
}

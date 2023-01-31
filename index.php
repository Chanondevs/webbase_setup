<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    use AltoRouter as Router;
    use db\connect;
    require_once 'connect/connect.php';
    require_once __DIR__ . '/vendor/autoload.php';

    /** 
     * ตัวอย่างการใช้งาน Router
     */
    $router = new Router();
    $router->map("GET", "/home", function () {
        echo "home";
    });
    

    /** 
     * ตัวอย่างการใช้งาน connect
    */
    $con = new connect();
    $stmt = $con->connect()->prepare("SELECT * FROM user");
    $stmt->execute();
    $row = $stmt->fetchAll();
    echo "<pre>";
    print_r($row);
    ?>
</body>

</html>
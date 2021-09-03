<?php
include_once('_acess.php');
$page = dirname(__FILE__);
$url = explode('/',$_SERVER['SCRIPT_NAME']);
$page = explode('.',end($url));
$page = $page[0];
$access = Access::hasAccess($page);
echo '<pre>';
echo var_dump($access); 
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
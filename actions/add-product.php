<?php
require_once 'init.php';
require_once '../dataBase/conectDatabase.php';

$desc = trim($_POST['desc']);
$quantity = trim($_POST['quantity']);
$value = floatval(str_replace(',', '.', trim($_POST['value'])));
$userId = $_SESSION['id'];

if(!isLogged()){
    redirect('../index.php');
}

try{
    $query = "INSERT INTO `PRODUCTS` (`PROD_DESC`, `PROD_QUANTITY`, `PROD_VALUE`, `PROD_USER_ID`) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$desc, $quantity, $value, $userId]);

    $_SESSION['message']['success'] = 'Produto adicionado com sucesso!';
    redirect('../views/dashboard.php');
}catch(PDOException $e){
    echo $e;
    exit();
}
?>
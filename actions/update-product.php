<?php
require_once 'init.php';
require_once '../dataBase/conectDatabase.php';
loggedToAcess();

$prodId = $_POST['prodId'];
$desc = $_POST['desc'];
$quantity = $_POST['quantity'];
$value = floatval(str_replace(',', '.', trim($_POST['value'])));

try{
    $query = "SELECT * FROM `PRODUCTS` WHERE (`PROD_ID` = ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$prodId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo $e;
    exit();
}

if($product['PROD_USER_ID'] != $_SESSION['id']){
    redirect('../index.php');
}else{
    try{
        $query = "UPDATE `PRODUCTS` SET `PROD_DESC` = ?, `PROD_QUANTITY` = ?, `PROD_VALUE` = ? WHERE `PROD_ID` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$desc, $quantity, $value, $prodId]);

        $_SESSION['message']['success'] = 'Produto Atualizado com sucesso!';
        redirect('../views/dashboard.php');
    }catch(PDOException $e){
        echo $e;
        exit();
    }
}
?>
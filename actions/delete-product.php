<?php
require_once 'init.php';
require_once '../dataBase/conectDatabase.php';
loggedToAcess();

$prodId = $_GET['product'];

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
        $query = "DELETE FROM `PRODUCTS` WHERE `PROD_ID` = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$prodId]);

        $_SESSION['message']['success'] = 'Produto excluído com sucesso!';
        redirect('../views/dashboard.php');
    }catch(PDOException $e){
        echo $e;
        exit();
    }
}
?>
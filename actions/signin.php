<?php
require_once 'init.php';
require_once '../dataBase/conectDatabase.php';

$email = trim($_POST['email']);
$passwd = sha1($_POST['passwd']);

try{
$query = "SELECT * FROM `USERS` WHERE (`USER_EMAIL` = ? AND `USER_PASSWORD` = ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$email, $passwd]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo $e;
    exit();
}

if(!$userData){
    $_SESSION['message']['error'] = 'E-mail ou senha incorretos!';
    redirect('../views/signin-page.php'); 
    exit();
}else if($passwd != $userData['USER_PASSWORD']){
    $_SESSION['message']['error'] = 'E-mail ou senha incorretos!';
    redirect('../views/signin-page.php'); 
    exit();
}

$_SESSION['user'] = $userData['USER_NAME'];
$_SESSION['id'] = $userData['USER_ID'];
redirect('../views/dashboard.php'); 
?>
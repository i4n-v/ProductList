<?php
require_once 'init.php';
require_once '../dataBase/conectDatabase.php';

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$passwd = sha1($_POST['passwd']);
$confirmPw = sha1($_POST['confirm-passwd']);

try{
$query = "SELECT `USER_EMAIL` FROM `USERS` WHERE `USER_EMAIL` = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$email]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo $e;
    exit();
}

if($passwd != $confirmPw){
    $_SESSION['message']['error'] = 'As senhas não coincidem!';
    redirect('../views/signup-page.php'); 
    exit();
}else if(strlen($passwd) < 8){
    $_SESSION['message']['error'] = 'A senha precisa conter pelo menos 8 caracteres!'; 
    redirect('../views/signup-page.php');
    exit();
}else if(isset($userData['USER_EMAIL']) && $userData['USER_EMAIL'] == $email){
    $_SESSION['message']['error'] = 'E-mail já cadastrado no sistema!';
    redirect('../views/signup-page.php');
    exit();
}else if(strpos($email, '@') == false){
    $_SESSION['message']['error'] = 'E-mail inválido!';
    redirect('../views/signup-page.php');
    exit();
}

try{
$query = "INSERT INTO `USERS` (`USER_NAME`, `USER_EMAIL`, `USER_PASSWORD`) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$name, $email, $passwd]);

$_SESSION['message']['success'] = 'Usuário cadastrado com sucesso!';
redirect('../views/signup-page.php');
}catch(PDOException $e){
    echo $e;
    exit();
}
?>
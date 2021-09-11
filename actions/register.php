<?php
session_start();
require_once '../dataBase/conectDatabase.php';

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$passwd = sha1($_POST['passwd']);
$confirmPw = sha1($_POST['confirm-passwd']);

try{
$query = "SELECT `USER_EMAIL` FROM `USERS` WHERE `USER_EMAIL` = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$email]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo $e;
}

if($passwd != $confirmPw){
    $_SESSION['message']['error'] = 'As senhas não coincidem!';
    header('location: ../views/register-page.php'); 
    exit();
}else if(strlen($passwd) < 8){
    $_SESSION['message']['error'] = 'A senha precisa conter pelo menos 8 caracteres!'; 
    header('location: ../views/register-page.php');
    exit();
}else if(isset($result['USER_EMAIL']) && $result['USER_EMAIL'] == $email){
    $_SESSION['message']['error'] = 'E-mail já cadastrado no sistema!';
    header('location: ../views/register-page.php');
    exit();
}else if(strpos($email, '@') == false){
    $_SESSION['message']['error'] = 'E-mail inválido!';
    header('location: ../views/register-page.php');
    exit();
}

try{
$query = "INSERT INTO `USERS` (`USER_NAME`, `USER_EMAIL`, `USER_PASSWORD`) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($query);
$stmt->execute([$name, $email, $passwd]);

$_SESSION['message']['success'] = 'Usuário cadastrado com sucesso!';
header('location: ../views/register-page.php');
}catch(PDOException $e){
    echo $e;
}
?>
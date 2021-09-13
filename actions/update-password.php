<?php
require_once 'init.php';
require_once '../dataBase/conectDatabase.php';
loggedToAcess();

$currentPasswd = sha1($_POST['current-passwd']);
$newPasswd = sha1($_POST['new-passwd']);
$confirmPw = sha1($_POST['confirm-passwd']);

try{
    $query = "SELECT `USER_PASSWORD` FROM `USERS` WHERE (`USER_ID` = ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$_SESSION['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}catch(PDOException $e){
    echo $e;
    exit();
}

if($user['USER_PASSWORD'] !== $currentPasswd){
    $_SESSION['message']['error'] = 'A senha atual está incorreta!';
    redirect('../views/password.php');
    exit();
}else if($newPasswd != $confirmPw){
    $_SESSION['message']['error'] = 'As senhas não coincidem!';
    redirect('../views/password.php');
    exit();
}else if($currentPasswd == $newPasswd){
    $_SESSION['message']['error'] = 'A nova senha não pode ser igual a senha atual!';
    redirect('../views/password.php');
    exit();
}

try{
    $query = "UPDATE `USERS` SET `USER_PASSWORD` = ? WHERE `USER_ID` = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$newPasswd, $_SESSION['id']]);

    $_SESSION['message']['success'] = 'Senha atualizada com sucesso!';
    redirect('../views/password.php');
}catch(PDOException $e){
    echo $e;
    exit();
}
?>
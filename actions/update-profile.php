<?php
require_once 'init.php';
require_once '../dataBase/conectDatabase.php';
loggedToAcess();

$name = $_POST['name'];
$email = $_POST['email'];

try{
    $query = "UPDATE `USERS` SET `USER_NAME` = ?, `USER_EMAIL` = ? WHERE `USER_ID` = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $email, $_SESSION['id']]);

    $_SESSION['message']['success'] = 'Dados atualizados com sucesso!';
    $_SESSION['user'] = $name;
    redirect('../views/profile.php');
}catch(PDOException $e){
    echo $e;
    exit();
}
?>
<?php
session_start();

function isLogged(){
  return isset($_SESSION['user']);
}

function loggedToAcess(){
  if(!isLogged()){
    redirect('/index.php');
  }
}

function notLoggedToAcess(){
  if(isLogged()){
    redirect('/index.php');
  }
}

function redirect($url){
  header('location:' . $url);
}

function validateMessage(){
  $GLOBALS['success'] = $_SESSION['message']['success'] ?? null;
  $GLOBALS['error'] = $_SESSION['message']['error'] ?? null;
  unset($_SESSION['message']);
}

function userNameView($name){
  $name = explode(' ', $name);
  $name = [$name[0], $name[1] ?? ''];
  $name = implode(' ', $name);
  return $name;
}

function moneyFormat($value){
  return 'R$ ' . str_replace('.', ',',number_format($value, 2));
}
?>
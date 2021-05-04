<?php
session_start();
$_SESSION['logged'] = False;

function login() {
  if (isset($_POST['login']) && isset($_POST['senha'])) {

    $user = ler($_POST['login']);

    if (empty($user[0])) {
      header('Location: login');
      return;
    }

    $password = password_verify($_POST['senha'], $user[0]->senha);

    if ($password) {
      $_SESSION['logged'] = True;
      $_SESSION['id'] = $user[0]->id;
      $_SESSION['login'] = $user[0]->login;
      $_SESSION['avatar'] = $user[0]->avatar;
      header('Location: home');
      return;
    }
  }
}

if (isset($_POST['salvar'])) {
  login();
}

if (isset($_POST['voltar'])) {
  header('Location: home');
}

if (isset($_POST['btnLogout'])) {
  session_destroy();
  header('Location: login');
}

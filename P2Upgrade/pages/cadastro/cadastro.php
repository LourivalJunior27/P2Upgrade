<?php

/**
 * Essa função foi criada validar imagens e dados que serão inseridos em um novo cadastro
 * e logo após fazer a inserção desses dados no banco.
 */

function cadastro() {
  $avatar = $_FILES['avatar'];

  if ($avatar['name'] !== '') {

    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT, ['cost' => 12]) : '';

    $nameImage = md5($avatar['name'] . rand(0, 9999));
    $tipo = substr($avatar['name'], -4);
    $nomeCompleto = "{$nameImage}{$tipo}";

    $imagem = $avatar['tmp_name'];

    move_uploaded_file($imagem, "./pages/cadastro/img/{$nomeCompleto}");

    $sql = 'insert into usuarios (login, email, senha, avatar)
                        values (:login, :email, :senha, :avatar)';

    $connection = connection();
    $result = $connection->prepare($sql);
    $result->bindValue(':login', $login);
    $result->bindValue(':email', $email);
    $result->bindValue(':senha', $senha);
    $result->bindValue(':avatar', $nomeCompleto);
    $result->execute();
  }
}

if (isset($_POST['salvar'])) {
  cadastro();
  header('Location: login');
}

if (isset($_POST['voltar'])) {
  header('Location: login');
}



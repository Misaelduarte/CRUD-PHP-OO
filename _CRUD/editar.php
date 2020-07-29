<?php
// Chamando PDO
require './config.php';
// Chamando DAO
require './dao/UserDaoMysql.php';
// Instanciando DAO
$userDao = new UserDaoMysql($pdo);
// Variavel com valor false para validação do id
$user = false;
// Pegando o ID no metodo GET para validação do usuario especifico
$id = filter_input(INPUT_GET, 'id');

// Verificação se o ID foi achado
if($id) {
  // Caso ache o id desse usuario, então seleciona e joga para o metodo findById
    $user = $userDao->findById($id);
}

// Verificação caso o user retorne false, nesse caso não foi encontrado o id
if($user === false) {
  // ID não encontrado, voltar ao index
    header("Location: ./index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./assets/images/signup.png">
  <title>Editar usuário</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/signup.css">
</head>
<body class="text-center">
  <!-- Formulario para edição de usuario ja existente, sendo selecionado pelo seu ID -->
<div class="container">
  <form class="form-signin" method="POST" action="./editar_action.php">
    <img class="mb-4" src="./assets/images/signup.png" alt="" width="80" height="80">
    <h1 class="h3 mb-3 font-weight-normal">Usuário</h1>
    <input type="hidden" name="id" value="<?=$user->getId();?>">
    <label for="inputName" class="sr-only">Nome Completo</label>
    <input type="text" id="inputName" name="name" class="form-control" value="<?=$user->getName();?>" autofocus>
    <label for="inputEmail" class="sr-only">Endereço de email</label>
    <input type="email" id="inputEmail" name="email" class="form-control" value="<?=$user->getEmail();?>">
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" name="password" class="form-control" value="<?=$user->getPassword();?>">
    <div class="checkbox mb-3">
    <label for="inputBirthdate" class="sr-only">Data de Nascimento</label>
    <input type="text" id="inputBirthdate" name="birthdate" class="form-control" value="<?=$user->getBirthdate();?>">

      <label>
        <input type="checkbox" name="remember" value="remember-me"> Lembrar de mim
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Editar</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2020-2021</p>
  </form>
</div>

<!-- Utilizando mascara de dados para o campo bithdate, onde se refere a data de nascimento -->
  <script src="https://unpkg.com/imask"></script>
  <script>
    IMask(
        document.getElementById("inputBirthdate"),
        {mask: '00/00/0000'}
    );
  </script>
  <script src="./assets/js/jquery-3.5.1.min.js"></script>
  <script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
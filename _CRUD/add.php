<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="./assets/images/signup.png">
  <title>Signup</title>
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="./assets/css/signup.css">
</head>
<body class="text-center">
  <!-- Esse arquivo tem somente codigo para o client, a ação sera realizada a enviar o form -->
<div class="container">
  <form class="form-signin" method="POST" action="./add_action.php">
    <img class="mb-4" src="./assets/images/signup.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Usuário</h1>
    <label for="inputName" class="sr-only">Nome Completo</label>
    <input type="text" id="inputName" name="name" class="form-control" placeholder="Nome Completo" required autofocus>
    <label for="inputEmail" class="sr-only">Endereço de email</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Seu email" required>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Senha" required>
    <div class="checkbox mb-3">
    <label for="inputBirthdate" class="sr-only">Data de Nascimento</label>
    <input type="text" id="inputBirthdate" name="birthdate" class="form-control" placeholder="Data de Nascimento" required>

      <label>
        <input type="checkbox" name="remember" value="remember-me"> Lembrar de mim
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Adicionar</button>
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
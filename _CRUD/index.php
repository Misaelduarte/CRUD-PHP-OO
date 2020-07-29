<?php
// Iniciando o index com a requisição do pdo
require './config.php';
// Requisição do dao User para poder instancia-lo e usar o pdo
require './dao/UserDaoMysql.php';

// Instanciando o dao User
$userDao = new UserDaoMysql($pdo);
// Criando um array para selecionar todos os usuarios
$list = $userDao->findAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/signup.png">
    <!-- Requisição do min.css para funcionamento da estilização do bootstrap -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <title>CRUD</title>
</head>
<body>

<!-- Iniciando o projeto com o HTML/CSS com auxilio do BOOTSTRAP -->
<!-- Tabela simples para exemplo do nosso CRUD -->

<div class="container row mt-2">
    <div class="col-1 mr-4">
        <a class="btn btn-primary" href="./add.php">Adicionar</a>
    </div>
    <div class="col">
    <table class="table table-dark table-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>SENHA</th>
                <th>DAT. NASC.</th>
                <th>AÇÕES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($list as $user): ?>
                <tr>    
                    <td><?=$user->getId();?></td>
                    <td><?=$user->getName();?></td>
                    <td><?=$user->getEmail();?></td>
                    <td><?=$user->getPassword();?></td>
                    <td><?=$user->getBirthdate();?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="./editar.php?id=<?=$user->getId();?>">Editar</a>
                        <a class="btn btn-danger btn-sm" href="./excluir.php?id=<?=$user->getId();?>" onclick="return confirm('Deseja realmente excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<!-- Requisições do nosso Jquer-3.5.1 e o bundle para funcionamento do bootstraç -->
<script src="./assets/js/jquery-3.5.1.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
// Chamando PDO
require './config.php';
// Chamando DAO
require './dao/UserDaoMysql.php';

// Instanciando DAO
$userDao = new UserDaoMysql($pdo);

// Variaveis de validação dos dados recebidos via POST
$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$birthdate = filter_input(INPUT_POST, 'birthdate');

// Verificando se foram validados
if($id && $name && $email && $password && $birthdate) {
    // Caso SIM, modificar dados do usuario criando um novo e salvando no banco de dados
    $u = new User();
    $u->setId($id);
    $u->setName($name);
    $u->setEmail($email);
    $u->setPassword($password);
    $u->setBirthdate($birthdate);

    // Apos criar usuario novo, mandar para o metodo update, que sera responsavel por atualizar o banco de dados
    $userDao->update( $u );
}

// Apos atualizar os dados vai para o index
header("Location: ./index.php");
exit;
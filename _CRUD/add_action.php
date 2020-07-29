<?php
// Requirindo o config. para conexão ao banco de dados
require './config.php';
// Requirindo o dao para instanciar a class UserDaoMysql
require './dao/UserDaoMysql.php';

$userDao = new UserDaoMysql($pdo);

// Variaveis para validação dos dados que foram inseridos no formulario
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$birthdate = filter_input(INPUT_POST, 'birthdate');

// Verificação para saber se os dados estão chegando com a devida validação
if($name && $email && $password && $birthdate) {
    // Caso esteja tudo validado, agora verificar se o usuario em questão informou um email não existente
    // Caso não exista, sera criado um usuario e adicionado ao banco de dados
    if($userDao->findByEmail($email) === false) {
        // Criando um usuario
        $u = new User();
        $u->setName($name);
        $u->setEmail($email);
        $u->setPassword($password);
        $u->setBirthdate($birthdate);

        // Colocando usuario criado no metodo add, para adiona-lo ao banco de dados
        $userDao->add( $u );
        // Se tudo deu certo voltar ao index
        header("Location: ./index.php");
        exit; 

    } else {
        // Caso ja exista o email voltar para o formulário
        header("Location: ./add.php");
        exit;
    }
} else {
    // Caso algum dado não esteja validado voltar para o formulario
    header("Location: ./add.php");
    exit;
}
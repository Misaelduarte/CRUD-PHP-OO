<?php
// Chamando PDO
require './config.php';
// Chamando DAO
require './dao/UserDaoMysql.php';
// Instanciando DAO
$userDao = new UserDaoMysql($pdo);
// Pegando o ID via GET
$id = filter_input(INPUT_GET, 'id');
// Verificando se o id existe
if($id) {
    // Se existir mandar para o metodo delete, que apagara o usuario do banco de dados
    $userDao->delete($id);
}

// Caso exista o id, apague o usuario e volte ao index, se não existir volte ao index tambem
header("Location: ./index.php");
exit;
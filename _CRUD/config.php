<?php
// Iniciando sessão, podendo ser utilizada caso queira implementar informações ou salvar dados em uma sessão
// Nesse projeto não foi salvo dados na sessão, pois não foi utilizado, mas é uma boa pratica iniciar nesse arquivo
session_start();

// variaveis de conexão - (Altere com os dados do software que estiver utilizando)
$db_name = '';
$db_host = '';
$db_user = '';
$db_pass = '';

// Instanciando PDO para conexão ao banco de dados
$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);
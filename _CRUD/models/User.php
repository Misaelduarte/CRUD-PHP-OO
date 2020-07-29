<?php
// Iniciando model com a class User, que sera modelo para criação do nosso DAO
class User 
{
    // Variaveis para criação de modelo User
    private $id;
    private $name;
    private $email;
    private $password;
    private $birthdate;

    // Criando o que chamamos de ENCAPSULAMENTO, usando get e set
    // Onde o metodo get retorna o valor diretamente, e o set retorna o valor que sera declarado "externamente", nesse caso, em nosso formulario por exemplo
    public function getId() {
       return $this->id;
    }

    public function setId($i) {
        $this->id = trim($i);
    }

    public function getName() {
        return $this->name;
    }

    public function setName($n) {
        $this->name = ucwords(trim($n));
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($e) {
        $this->email = strtolower(trim($e));
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($p) {
        $this->password = trim($p);
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function setBirthdate($b) {
        $this->birthdate = trim($b);
    } 
}

// Criando uma interface para um melhor desenvolvimento do nosso DAO - Não é obrigatório
interface UserDao
{
    public function add(User $u);
    public function findAll();
    public function findByEmail($email);
    public function findById($id);
    public function update(User $u);
    public function delete($id);
}

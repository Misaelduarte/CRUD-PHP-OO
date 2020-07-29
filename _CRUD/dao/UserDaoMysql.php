<?php
// Chamando o modelo de usuario para criação do DAO
require ('./models/User.php');

// Criando class para o DAO e implementando nossa INTERFACE
class UserDaoMysql implements UserDao
{
    // Variaveis do DATA ACCESS OBJECT
    private $pdo;
    private $id;
    private $name;
    private $email;
    private $password;
    private $birthdate;

    // Criando um metodo construct para a utilização do PDO
    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    // Metodo adicionar usuario ao nosso banco de dados
    public function add(User $u) {
        $sql = $this->pdo->prepare('INSERT INTO users (name, email, password, birthdate)
                                                                 VALUES (:name, :email, :password, :birthdate)');
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':password', $u->getPassword());
        $sql->bindValue(':birthdate', $u->getBirthdate());
        $sql->execute();

        $u->setId( $this->pdo->lastInsertId() );
        return $u;
    }

    // Metodo de selecionar todos os usuarios que estão no banco de dados
    public function findAll() {
        $select_users = [];

        $sql = $this->pdo->query('SELECT * FROM users');
        if($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $u = new User();
                $u->setId($item['id']);
                $u->setName($item['name']);
                $u->setEmail($item['email']);
                $u->setPassword($item['password']);
                $u->setBirthdate($item['birthdate']);

                $select_users[] = $u;
            }
        }

        return $select_users;
    }

    // Selecionar o usuario que possui um email especifico para validação do cadastro
    public function findByEmail($email) {
        $sql = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
        $sql->bindValue(':email', $email);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $u = new User();
            $u->setId($data['id']);
            $u->setName($data['name']);
            $u->setEmail($data['email']);
            $u->setPassword($data['password']);
            $u->setBirthdate($data['birthdate']);

            return $u;

        } else {
            return false;
        }
    }

    // Selecionar o usuario que possui um id especifico para validação do cadastro
    public function findById($id) {
        $sql = $this->pdo->prepare('SELECT * FROM users WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
        if($sql->rowCount() > 0) {
            $data = $sql->fetch();
            $u = new User();
            $u->setId($data['id']);
            $u->setName($data['name']);
            $u->setEmail($data['email']);
            $u->setPassword($data['password']);
            $u->setBirthdate($data['birthdate']);

            return $u;

        } else {
            return false;
        }
    }

    // Atualizar dados do usuario que ja estão cadastrados na base de dados
    public function update(User $u) {
        $sql = $this->pdo->prepare('UPDATE users SET name = :name, email = :email,
                                    password = :password, birthdate = :birthdate WHERE id = :id');
            $sql->bindValue(':name', $u->getName());
            $sql->bindValue(':email', $u->getEmail());
            $sql->bindValue(':password', $u->getPassword());
            $sql->bindValue(':birthdate', $u->getBirthdate());
            $sql->bindValue(':id', $u->getId());
            $sql->execute();

            return $u;
    }

    // Deletar usuario a partir do id
    public function delete($id) {
        $sql = $this->pdo->prepare('DELETE FROM users WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
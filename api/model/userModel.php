<?php

class userModel extends Conexao{
    private $conn; 
    private $view;

    public function __construct(){
        $this->conn = $this->conectarBanco();
        $this->view = new view();
    }

    public function create($nome, $email, $senha){
        if($this->validaUsuarioExistente($email)){
            return false;
        }else{
            $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':name', $nome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $senha);
            $stmt->execute();
            return $this->conn->lastInsertId();
        }
    }

    public function update($name, $email, $password, $idUser){
        if ($this->validaUsuarioExistente($email)) {
            return false;
        }else {
            $sql = 'UPDATE users SET name = :name, email = :email, password = :password WHERE idUser = :idUser';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':idUser', $idUser);
            $stmt->execute();
            return $stmt->rowCount();
        }
    }

    public function getById($id){
        $sql = 'SELECT * FROM users WHERE idUser = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    private function validaUsuarioExistente($email){
        $sql = 'SELECT * FROM users WHERE email = :email';
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) > 0){
            return true;
        }else{
            return false;
        }
    }
}
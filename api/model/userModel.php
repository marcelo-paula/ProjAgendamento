<?php

class userModel extends Conexao{
    private $conn; 
    private $view;

    //Construtor da classe userModel que instancia a classe Conexao e a classe view
    public function __construct(){
        $this->conn = $this->conectarBanco();
        $this->view = new view();
    }

    //Função que valida se o usuário já existe no banco de dados
    public function create($nome, $email, $senha){
        if($this->validaUsuarioExistente($email)){
            return false;
        }else{
            $sql = "INSERT INTO users (
                        name, 
                        email, 
                        password) 
                    VALUES (
                        :name, 
                        :email, 
                        :password)";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':name', $nome);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $senha);
            $stmt->execute();
            return $this->conn->lastInsertId();
        }
    }

    //Função para atualizar os dados do usuário
    public function update($name, $email, $password, $idUser){
        if ($this->validaUsuarioExistente($email)) {
            return false;
        }else {
            $sql = "UPDATE users SET 
                        name = :name, 
                        email = :email, 
                        password = :password, 
                        updated_at = NOW() 
                    WHERE idUser = :idUser";

            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->bindValue(':idUser', $idUser);
            return $stmt->execute();
        }
    }

    //Função para deletar um usuário
    public function delete($idUser){
        $sql = "DELETE FROM users 
                     WHERE idUser = :idUser";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idUser', $idUser);
        return $stmt->execute();
    }

    //Função para buscar um usuários
    public function getById($id){
        $sql = "SELECT * 
                  FROM users 
                 WHERE idUser = :id";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //Função para buscar todos os usuários
    public function getAll(){
        $sql = "SELECT * 
                  FROM users";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //Função para validar se o usuário já existe no banco de dados
    private function validaUsuarioExistente($email){
        $sql = "SELECT * 
                  FROM users 
                 WHERE email = :email";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result > 0){
            return true;
        }else{
            return false;
        }
    }
}
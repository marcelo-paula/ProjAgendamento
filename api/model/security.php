<?php

class tokenModel extends Conexao{
    private $conn;

    public function __construct(){
        $this->conn = $this->conectarBanco();
    }

    public function create($idUser){
        $token = md5(uniqid(rand(), true));
        $sql = "INSERT INTO token (
                    token, 
                    idUser,
                    created_exp) 
                VALUES (
                    :token, 
                    :idUser,
                    NOW() + INTERVAL 5 second)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':idUser', $idUser);
        $stmt->execute();
        return $token;
    }

    public function getToken($token){
        $sql = "SELECT * FROM token 
                    WHERE token = :token";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':token', $token);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
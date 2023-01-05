<?php

class companyModel extends Conexao{
    private $conn;
    private $view;

    public function __construct(){
        $this->conn = $this->conectarBanco();
        $this->view = new view();
    }

    public function create($name, $layout, $logo, $idUser){
        $sql = "INSERT INTO company (
                    name, 
                    layout, 
                    logo, 
                    idUser) 
                VALUES (
                    :name, 
                    :layout, 
                    :logo, 
                    :idUser)";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':layout', $layout);
        $stmt->bindValue(':logo', $logo);
        $stmt->bindValue(':idUser', $idUser);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }

    public function update($name, $layout, $logo, $idUser, $idCompany){
        $sql = "UPDATE company SET 
                    name = :name, 
                    layout = :layout, 
                    logo = :logo, 
                    idUser = :idUser, 
                    updated_at = NOW() 
                WHERE idCompany = :idCompany";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':layout', $layout);
        $stmt->bindValue(':logo', $logo);
        $stmt->bindValue(':idUser', $idUser);
        $stmt->bindValue(':idCompany', $idCompany);
        return $stmt->execute();
    }

    public function delete($idCompany){
        $sql = "DELETE FROM company 
                    WHERE idCompany = :idCompany";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idCompany', $idCompany);
        return $stmt->execute();
    }

    public function getById($idCompany){
        $sql = "SELECT * FROM company 
                    WHERE idCompany = :idCompany";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idCompany', $idCompany);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll(){
        $sql = "SELECT * FROM company 
                    WHERE idUser";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
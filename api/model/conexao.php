<?php

class Conexao{
    private $host = 'localhost';
    private $dbname = 'agendamento';
    private $user = 'root';
    private $password = '';

    public function conectarBanco(){
        try{
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->password"
            );
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexao;
        }catch(PDOException $e){
            echo var_dump($e->getMessage());
        }
    }
}
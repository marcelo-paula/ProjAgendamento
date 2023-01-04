<?php

define ('BASE_URL', 'http://localhost/ProjAgendamento/api/');
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = (explode('?', $url))[0];

include 'model/conexao.php';
include 'controller/userController.php';
include 'model/userModel.php';
include 'helper/view.php';

$user = new userController();

switch ($url) {
    //========Requisições de usuario============
    //Requisição para inserir um usuário
    case '/ProjAgendamento/api/user/create':
        $user->create();
    break;

    //Requisição para editar um usuário
    case '/ProjAgendamento/api/user/update':
        echo 'Requisição para editar um usuário';
    break;

    //Requisição para deletar um usuário
    case '/ProjAgendamento/api/user/delete':
        echo 'Requisição para deletar um usuário';
    break;

    //Requisição para listar todos os usuários
    case '/ProjAgendamento/api/usuario/getall':
        echo 'Requisição para listar todos os usuários';
    break;

    //Requisição para listar um usuário
    case '/ProjAgendamento/api/usuario/getbyid':
        echo 'Requisição para listar um usuário';
    break;
    //=========================================
    
    //Página inexistente
    default:
        echo 'Página inexistente';
    break;
}
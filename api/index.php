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
        $user->update();
    break;

    //Requisição para deletar um usuário
    case '/ProjAgendamento/api/user/delete':
        $user->delete();
    break;

    //Requisição para listar todos os usuários
    case '/ProjAgendamento/api/usuario/getall':
        $user->getAll();
    break;

    //Requisição para listar um usuário
    case '/ProjAgendamento/api/usuario/getbyid':
        $user->getById();
    break;
    //=========================================
    
    //Página inexistente
    default:
        echo 'Página inexistente';
    break;
}
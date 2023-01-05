<?php

class view{
    //Função para retornar os dados em formato JSON
    public function api($data = null, $message = null, $status = 200){
        //Definindo o tipo de conteúdo da resposta
        header("HTTP/1.1 " . $status);

        $error = false;

        //Verificando se o status é maior ou igual a 400 para retornar o erro
        if($status >= 400){
            $error = [
                'message' => $message,
                'status' => $status
            ];
        }

        //Definindo o tipo de conteúdo da resposta como JSON e codificando os dados
        $response = array(
            'error' => $error,
            'data' => $data
        );
        
        echo json_encode($response);
    }
}
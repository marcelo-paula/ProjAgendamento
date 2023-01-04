<?php

class view{
    public function api($data = null, $message = null, $status = 200){
        header("HTTP/1.1 " . $status);

        $error = false;

        if($status >= 400){
            $error = [
                'message' => $message,
                'status' => $status
            ];
        }

        $response = array(
            'error' => $error,
            'data' => $data
        );

        echo json_encode($response);
    }
}
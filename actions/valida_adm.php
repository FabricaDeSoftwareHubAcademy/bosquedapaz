<?php
require '../vendor/autoload.php';

include '../app/helpers/login.php';

if(confirmaLogin('1')){
    echo json_encode(['acesso' => TRUE]);
    http_response_code(200);
}else{
    echo json_encode(['acesso' => FALSE]);
    http_response_code(404);
}
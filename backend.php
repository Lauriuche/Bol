Put your HTML text here<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Retorna o conteúdo do arquivo
    if (file_exists('integrantes.txt')) {
        echo file_get_contents('integrantes.txt');
    } else {
        echo '';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados enviados e atualiza o arquivo
    $data = file_get_contents('php://input');
    file_put_contents('integrantes.txt', $data);
    echo "Arquivo atualizado com sucesso!";
}
?>
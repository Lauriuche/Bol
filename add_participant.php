<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $file = 'participantes.txt';

    // Verifica se o nome já existe (ignora maiúsculas/minúsculas)
    $participants = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($participants as $participant) {
        [$existingName] = explode(';', $participant);
        if (strcasecmp(trim($existingName), $name) === 0) {
            echo "Nome já existe!";
            exit;
        }
    }

    // Adiciona ao arquivo
    file_put_contents($file, "$name;$status\n", FILE_APPEND);
    echo "Participante adicionado!";
}

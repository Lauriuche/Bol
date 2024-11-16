<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] - 1; // Corrige índice baseado em lista 1-indexada
    $name = $_POST['name'];
    $status = $_POST['status'];
    $file = 'participantes.txt';

    $participants = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!isset($participants[$id])) {
        echo "Participante não encontrado!";
        exit;
    }

    $participants[$id] = "$name;$status";

    // Salva alterações no arquivo
    file_put_contents($file, implode("\n", $participants) . "\n");
    echo "Participante atualizado!";
}

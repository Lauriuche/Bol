
<?php
// Caminho do arquivo onde os dados serão armazenados
$file = "participants.txt";

// Ação solicitada pelo cliente
$action = $_GET['action'] ?? '';

// Função para carregar participantes do arquivo
function loadParticipants($file) {
    if (!file_exists($file)) {
        return [];
    }
    $data = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return array_map(fn($line) => json_decode($line, true), $data);
}

// Função para salvar participantes no arquivo
function saveParticipants($file, $participants) {
    $data = array_map(fn($participant) => json_encode($participant), $participants);
    file_put_contents($file, implode("\n", $data));
}

// Ação de carregar participantes
if ($action === 'load') {
    $participants = loadParticipants($file);
    echo json_encode($participants);
    exit;
}

// Ação de adicionar um novo participante
if ($action === 'add') {
    $input = json_decode(file_get_contents("php://input"), true);
    $name = trim($input['name'] ?? '');
    $paid = $input['paid'] ?? false;

    if (!$name) {
        echo "Nome inválido!";
        exit;
    }

    $participants = loadParticipants($file);

    // Verifica duplicidade (ignora maiúsculas/minúsculas)
    foreach ($participants as $participant) {
        if (strcasecmp($participant['name'], $name) === 0) {
            echo "Este nome já foi adicionado!";
            exit;
        }
    }

    $participants[] = ['name' => $name, 'paid' => $paid];
    saveParticipants($file, $participants);

    echo "success";
    exit;
}

echo "Ação inválida!";
exit;
?>

<?php
// Recebe os dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$telefone = $_POST['telefone'] ?? '';

// Cria a linha formatada com data e hora
$linha = "Nome: $nome | E-mail: $email | Telefone: $telefone | Data: " . date("d/m/Y H:i:s") . "\n";

// Caminho do arquivo TXT (no mesmo diretório)
$arquivo = "inscricoes.txt";

// Salva os dados no final do arquivo (sem apagar o anterior)
file_put_contents($arquivo, $linha, FILE_APPEND | LOCK_EX);

// Mensagem de confirmação
echo "
  <html lang='pt-BR'>
  <head>
    <meta charset='UTF-8'>
    <title>Confirmação</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background: #f0f8ff;
        text-align: center;
        padding-top: 100px;
      }
      .msg {
        background: #fff;
        display: inline-block;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
      }
      a {
        display: inline-block;
        margin-top: 15px;
        color: #0077cc;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div class='msg'>
      <h2>✅ Inscrição enviada com sucesso!</h2>
      <p>Seus dados foram salvos no sistema.</p>
      <a href='index.html'>Voltar</a>
    </div>
  </body>
  </html>
";
?>
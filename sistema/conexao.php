<?php

$banco = "sistema";
$servidor = "localhost";
$usuario = "root";
$senha = "";

$email_super_adm = "hmuccillo@gmail.com";
$nome_sistema = "Sistema de Cadastro";

date_default_timezone_set('America/Sao_Paulo');

try {
    $pdo = new PDO("mysql:dbname=$banco;host=$servidor", "$usuario", "$senha");
} catch (Exception $e) {
    echo 'Erro ao conectar com o banco de dados! <br><br>' . $e;
}

// Inserir registros iniciais
// Cria um usuário e um administrador padrão

// Consulta Informações
$query = $pdo->query("SELECT * FROM administradores");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

// Insere Informações na tabela administradores
if($total_reg == 0)
$pdo->query("INSERT INTO administradores SET nome ='Super Administrador', email = '$email_super_adm', telefone = '(00)00000-0000', rua = 'Ribeiroles', numero = '221', estado = 'SP' ");

// Consulta Informações
$query = $pdo->query("SELECT * FROM usuarios");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

// Insere Informações na tabela usuários
if($total_reg == 0)
$pdo->query("INSERT INTO usuarios SET nome ='Super Administrador', email = '$email_super_adm', telefone = '(00)00000-0000', rua = 'Ribeiroles', numero = '221', estado = 'SP', senha = '123', nivel='administrador', id_pessoa = '1'");

// Consulta Informações
$query = $pdo->query("SELECT * FROM config");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = count($res);

// Insere Informações na tabela config
if($total_reg == 0) {
$pdo->query("INSERT INTO config SET nome ='email_super_adm', valor ='$email_super_adm'");

$pdo->query("INSERT INTO config SET nome ='nome_sistema', valor ='$nome_sistema'");
}

// Buscar informações do banco
$query = $pdo->query("SELECT * FROM config where nome = 'email_super_adm'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$email_super_adm = $res[0]['valor'];

$query = $pdo->query("SELECT * FROM config where nome = 'nome_sistema'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$nome_sistema = $res[0]['valor'];

?>
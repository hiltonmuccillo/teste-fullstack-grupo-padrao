<?php
require_once("../conexao.php");

// echo $_POST['nome_usu'];

$nome = $_POST['nome_usu'];
$telefone = $_POST['telefone_usu'];
$email = $_POST['email_usu'];
$senha = $_POST['senha_usu'];
$id = $_POST['id_usu'];

$query = $pdo->query("SELECT * FROM usuarios where id = $id");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$email_antigo = $res[0]['email'];
$nivel_usu = $res[0]['nivel'];
$id_pessoa = $res[0]['id_pessoa'];

if($email_antigo != $email) {
    $query = $pdo->query("SELECT * FROM usuarios where email = '$email' ");
    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    if(@count($res) > 0){
        echo 'O email já está cadastrado!';
        exit();
    }
}

$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, telefone = :telefone, senha = :senha where id='$id' ");

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":senha", "$senha");
$query->execute();

if($nivel_usu == 'administrador') {
    $query = $pdo->prepare("UPDATE administradores SET nome = :nome, email = :email where id='$id_pessoa' ");
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->execute();

echo 'Salvo com Sucesso';

?>
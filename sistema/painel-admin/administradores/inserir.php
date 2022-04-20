<?php
require_once("../../conexao.php");

// echo $_POST['nome_usu'];

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
// $senha = $_POST['senha_usu'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$estado = $_POST['estado'];
$id = @$_POST['id'];

$query = $pdo->query("SELECT * FROM administradores where email = '$email' ");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$id_reg = @$res[0]['id'];

if(@count($res) > 0 and $id_reg != $id){
    echo 'O email já está cadastrado!';
    exit();
}

if($id == "" || $id == 0){
    $query = $pdo->prepare("INSERT INTO administradores SET nome = :nome, email = :email, telefone = :telefone, rua = :rua, numero = :numero, estado = :estado");
}else{
    $query = $pdo->prepare("UPDATE administradores SET nome = :nome, email = :email, telefone = :telefone, rua = :rua, numero = :numero, estado = :estado where id = '$id' " );
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":email", "$email");
$query->bindValue(":telefone", "$telefone");
$query->bindValue(":rua", "$rua");
$query->bindValue(":numero", "$numero");
$query->bindValue(":estado", "$estado");
$query->execute();

echo 'Salvo com Sucesso';

?>
<?php
require 'config.php';
$id = filter_input(INPUT_POST,'id');
$nome = filter_input(INPUT_POST,'nome');
$telefone = filter_input(INPUT_POST,'telefone');
//$email = filter_input(INPUT_POST,'email');

if($nome && $telefone){
    $queryEditAvaliador = $conexaoPDO->prepare("UPDATE avaliadores SET nome = :nome, telefone = :telefone WHERE id = :id");
    $queryEditAvaliador->bindValue(':nome', $nome);
    $queryEditAvaliador->bindValue(':telefone', $telefone);
    $queryEditAvaliador->bindValue(':id', $id);
    $queryEditAvaliador->execute();
    header("Location:listarAvaliadores.php");
    exit;
}else{
    header("Location:listarAvaliadores.php");
    exit;
}

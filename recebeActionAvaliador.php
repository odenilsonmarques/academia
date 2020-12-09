<?php
require 'config.php';

$nome = filter_input(INPUT_POST,'nome');
$telefone = filter_input(INPUT_POST,'telefone');
$email = filter_input(INPUT_POST,'email');

if($nome && $telefone){
    //verificando se o email ja existe
    $queryBuscaAvaliador = $conexaoPDO->prepare("SELECT *FROM avaliadores WHERE email = :email");
    $queryBuscaAvaliador->bindValue(':email', $email);
    $queryBuscaAvaliador->execute();
    if($queryBuscaAvaliador->rowCount() === 0){
        $queryAddAvaliador = $conexaoPDO->prepare("INSERT INTO avaliadores(nome,telefone,email) VALUES (:nome, :telefone, :email)");
        $queryAddAvaliador->bindValue(':nome', $nome);
        $queryAddAvaliador->bindValue(':telefone', $telefone);
        $queryAddAvaliador->bindValue(':email', $email);
        $queryAddAvaliador->execute();
        header("Location:listarAvaliadores.php");
        exit;
    }else{
        header("Location:adicionarAvaliador.php");
        exit;
    }
}else{
    header("Location:adicionarAvaliador.php");
    exit;
}




?>
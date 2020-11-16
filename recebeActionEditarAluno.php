<?php
require 'config.php';
$id = filter_input(INPUT_POST,'id');
$nome = filter_input(INPUT_POST,'nome');
$matricula = filter_input(INPUT_POST,'matricula');
$endereco = filter_input(INPUT_POST,'endereco');
$telefone = filter_input(INPUT_POST,'telefone');
//$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$data_nascimento = filter_input(INPUT_POST,'data_nascimento');
$peso = filter_input(INPUT_POST,'peso');
$altura = filter_input(INPUT_POST,'altura');

if($nome && $telefone){
    $queryEditAluno = $conexaoPDO->prepare("UPDATE alunos SET nome = :nome, matricula = :matricula, endereco = :endereco, telefone = :telefone, data_nascimento = :data_nascimento, peso = :peso, altura = :altura WHERE id = :id");
    $queryEditAluno->bindValue(':nome', $nome);
    $queryEditAluno->bindValue(':matricula', $matricula);
    $queryEditAluno->bindValue(':endereco', $endereco);
    $queryEditAluno->bindValue(':telefone', $telefone);
    $queryEditAluno->bindValue(':data_nascimento', $data_nascimento);
    $queryEditAluno->bindValue(':peso', $peso);
    $queryEditAluno->bindValue(':altura', $altura);
    $queryEditAluno->bindValue(':id', $id);
    $queryEditAluno->execute();
    //print_r($queryEditAluno);
    header("Location:listarAlunos.php");
    exit;
}else{
    header("Location:adicionarAluno.php");
    exit;
}
?>
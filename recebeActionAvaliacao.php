<?php
require 'config.php';
$aluno = filter_input(INPUT_POST,'aluno');
$avaliador = filter_input(INPUT_POST,'avaliador');
$data_avaliacao = filter_input(INPUT_POST,'data_avaliacao');

if($data_avaliacao){
    $queryAddAvaliacao = $conexaoPDO->prepare("INSERT INTO avaliacoes(aluno_id, avaliador_id, data_avaliacao) VALUES (:aluno, :avaliador, :data_avaliacao)");
    $queryAddAvaliacao->bindValue(':aluno',$aluno); 
    $queryAddAvaliacao->bindValue(':avaliador',$avaliador);
    $queryAddAvaliacao->bindValue(':data_avaliacao',$data_avaliacao);
    $queryAddAvaliacao->execute();
    header("Location:listarAvaliacoes.php");
    exit;
}else{
    header("Location:adicionarAvaliacao.php");
    exit;
}

?>
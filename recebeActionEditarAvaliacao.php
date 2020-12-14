<?php
require 'config.php';
$id = filter_input(INPUT_POST,'id');
//$avaliador = filter_input(INPUT_POST,'avaliador');
$data_avaliacao = filter_input(INPUT_POST,'data_avaliacao');

if($data_avaliacao){
    $queryEditAvaliacao = $conexaoPDO->prepare("UPDATE avaliacoes SET data_avaliacao = :data_avaliacao WHERE id = :id");
    $queryEditAvaliacao->bindValue(':id',$id);
    $queryEditAvaliacao->bindValue(':data_avaliacao',$data_avaliacao);
    //$queryEditAvaliacao->bindValue(':avaliador',$avaliador);
    $queryEditAvaliacao->execute();
    header("Location:listarAvaliacoes.php");
    exit;
}else{
    header("Location:listarAvaliacoes.php");
    exit;
}
?>


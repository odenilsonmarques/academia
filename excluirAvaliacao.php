<?php
require 'config.php';
$id = filter_input(INPUT_GET,'id');

if($id){
    $queryBuscaAvaliacao = $conexaoPDO ->prepare("DELETE FROM avaliacoes WHERE id = :id");
    $queryBuscaAvaliacao->bindValue(':id',$id);
    $queryBuscaAvaliacao->execute();
    header("Location:listarAvaliacoes.php");
    exit;
}else{
    header("Location:listarAvaliacoes.php");
    exit;
}
?>
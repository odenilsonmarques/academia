<?php
require 'config.php';
$id = filter_input(INPUT_GET,'id');
if($id){
    $queryBuscaAluno = $conexaoPDO->prepare("DELETE FROM alunos WHERE id = :id");
    $queryBuscaAluno->bindValue(':id', $id);
    $queryBuscaAluno->execute();
}
header("Location:listarAlunos.php");
exit;

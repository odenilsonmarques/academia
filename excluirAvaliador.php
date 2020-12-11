<?php
require 'config.php';
$id = filter_input(INPUT_GET,'id');
if($id){
    $queryBuscaAvaliador = $conexaoPDO->prepare("DELETE FROM avaliadores WHERE id = :id");
    $queryBuscaAvaliador->bindValue(':id', $id);
    $queryBuscaAvaliador->execute();
}
header('Location:listarAvaliadores.php');
exit;







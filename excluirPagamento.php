<?php
require 'config.php';
$id = filter_input(INPUT_GET,'id');

if($id){
    $queryBuscaPagamento = $conexaoPDO->prepare("DELETE FROM pagamentos WHERE id = :id");
    $queryBuscaPagamento->bindValue('id', $id);
    $queryBuscaPagamento->execute();
}
header("Location:listarPagamentos.php");
exit;
?>
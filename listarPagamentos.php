<?php
require 'config.php';

$listaPagamentos =  [];

$queryPagamentos = $conexaoPDO->query("SELECT * FROM pagamentos");
if($queryPagamentos->rowCount() > 0){
    $listaPagamentos = $queryPagamentos->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="adicionarPagamento.php">Adicionar pagamento</a>
<table border="1" width="100%">
    <tr>
        <th>ALUNO</th>
        <th>VALOR</th>
        <th>DATA</th>
        <th>STATUS</th>
        <th>AÇÃO</th>
    </tr>
    <?php foreach($listaPagamentos as $pagamentos):?>
        <tr>
            <td><?=$pagamentos['nome'];?></td>
            <td><?=$pagamentos['valor'];?></td>
            <td><?=$pagamentos['data_pagamento'];?></td>
            <td>
                <a href="#">editar</a>
                <a href="#">excluir</a>
            </td>
        </tr>
    <?php endforeach;?>
</tbale>
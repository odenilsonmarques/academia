<?php
require 'config.php';

$listaPagamentos =  [];

$queryPagamentos = $conexaoPDO->query("SELECT alunos.id,alunos.nome,pagamentos.id,pagamentos.valor,pagamentos.data_pagamento FROM pagamentos, alunos WHERE pagamentos.aluno_id = alunos.id");
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
        <th>AÇÃO</th>
    </tr>
    <?php foreach($listaPagamentos as $pagamentos):?>
        <tr>
            <td><?=$pagamentos['nome'];?></td>
            <td><?=$pagamentos['valor'];?></td>
            <td><?=$pagamentos['data_pagamento'];?></td>
            <td>
                <a href="editarPagamento.php?id=<?=$pagamentos['id'];?>">editar</a>
                <a href="excluirPagamento.php?id=<?=$pagamentos['id'];?>" onclick="return confirm('Confirmar Exclusão ?')">excluir</a>
            </td>
        </tr>
    <?php endforeach;?>
</tbale>

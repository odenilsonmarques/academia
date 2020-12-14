<?php
require 'config.php';
$listaAvaliacoes = [];
$queryAvaliacoes = $conexaoPDO->query("SELECT alunos.id,alunos.nome,avaliadores.id,avaliadores.nome_avaliador,avaliacoes.id,avaliacoes.data_avaliacao  
FROM avaliacoes, alunos, avaliadores WHERE avaliacoes.aluno_id = alunos.id AND avaliacoes.avaliador_id = avaliadores.id");
if($queryAvaliacoes->rowCount() > 0){
    $listaAvaliacoes = $queryAvaliacoes->fetchAll(PDO::FETCH_ASSOC);
}
?>
<a href="adicionarAvaliacao.php">adicionar avaliacao</a>
<table border="1" width="100%">
    <tr>
        <th>ALUNO</th>
        <th>AVALIADOR</th>
        <th>DATA</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach ($listaAvaliacoes as $avalicoes) :?>
        <tr>
            <td><?=$avalicoes['nome'];?></td>
            <td><?=$avalicoes['nome_avaliador'];?></td>
            <td><?=$avalicoes['data_avaliacao'];?></td>
            <td>
                <a href="editarAvaliacao.php?id=<?=$avalicoes['id'];?>">Editar</a>
                <a href="excluirAvaliacao.php?id=<?=$avalicoes['id'];?>" onclick = "return confirm('CONFIRMAR EXCLUSÃO')">Excluir</a>
            </td>
        </tr>
    <?php endforeach;?>
</table>


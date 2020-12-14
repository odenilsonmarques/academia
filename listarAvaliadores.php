<?php
require 'config.php';
$listaAvaliadores = [];
$queryAvaliadores = $conexaoPDO->query("SELECT * FROM avaliadores");
    if($queryAvaliadores->rowCount() > 0){
        $listaAvaliadores = $queryAvaliadores->fetchAll(PDO::FETCH_ASSOC);
    }
?>
<a href="adicionarAvaliador.php">cadastrar avaliadores</a>
<table border="1" width="100%">
    <tr>
        <th>NOME</th>
        <th>TELEFONE</th>
        <th>EMAIL</th>
        <th>AÇÃO</th>
    </tr>
    <?php foreach ($listaAvaliadores as $avaliador): ?>
        <tr>
            <td><?=$avaliador['nome_avaliador'];?></td>
            <td><?=$avaliador['telefone'];?></td>
            <td><?=$avaliador['email'];?></td>
            <td>
                <a href="editarAvaliador.php?id=<?=$avaliador['id'];?>">Editar</a>
                <a href="excluirAvaliador.php?id=<?=$avaliador['id'];?>" onclick="return confirm('CONFIRMAR EXCLUSÃO ?')">Excluir</a>
            </td>
        </tr>
    <?php endforeach;?>
</table>


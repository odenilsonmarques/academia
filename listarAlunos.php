<?php
    require 'config.php';
    //de inicio é criado um array vazio, para caso não exista dados
    $listaAlunos = [];
    //consulta para buscar os dados na tabela alunos
    $queryAlunos = $conexaoPDO->query("SELECT * FROM alunos");
    //verificando se a consulta acima retornou algum resultado
    if($queryAlunos->rowCount() > 0){
        //se tever o retorno de algum resultado o array é preenchido com os dados retornados
        $listaAlunos = $queryAlunos->fetchAll(PDO::FETCH_ASSOC);
    }
?>
    
<a href="adicionarAluno.php">cadastrar novo aluno</a>

<table border="1" width="100%">
    <tr>
        <th>NOME</th>
        <th>MATRÍCULA</th>
        <th>TELEFONE</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach ($listaAlunos as $alunos): ?>
    <tr>
        <td><?=$alunos['nome'];?></td>
        <td><?=$alunos['matricula'];?></td>
        <td><?=$alunos['telefone'];?></td>
        <td><?=$alunos['email'];?></td>
        <td>
            <a href="editarAluno.php?id=<?=$alunos['id'];?>">Editar</a>
            <a href="excluirAluno.php?id=<?=$alunos['id'];?>" onclick="return confirm('Confirmar Exclusão ?')">Deletar</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>


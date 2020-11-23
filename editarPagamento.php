<?php
include 'config.php';

$dados = [];
$id = filter_input(INPUT_GET,'id');
if(id){
    $queryBuscaPagamento = $conexaoPDO->prepare("SELECT * FROM pagamentos WHERE id = :id");
    $queryBuscaPagamento->bindValue(':id', $id);
    $queryBuscaPagamento->execute();

    if($queryBuscaPagamento->rowCount() > 0){
        $dados = $queryBuscaPagamento->fetchAll();
    }else{
        header("Location: listarPagamentos.php");
        exit;
    }
}else{
    header("Location: listarPagamentos.php");
    exit;
}

?>
<h1>pagamento</h1>

<form action="recebeActionEditarPagamento.php" method="POST">

    <label>ALUNO</label><br/>
    <select name="aluno">
        <?php
            $listaAlunos = [];
            $queryBuscaAluno = $conexaoPDO->query("SELECT * FROM  alunos");
            if($queryBuscaAluno->rowCount() > 0){
                $listaAlunos = $queryBuscaAluno->fetchAll(PDO::FETCH_ASSOC);
                foreach($listaAlunos as $alunos){ ?>
                    <option value="<?=$alunos['id'];?>"><?=$alunos['nome'];?></option>
                <?php
                }
            }
        ?>
    </select><br/><br/>

    <!--id passado no corpo da pagina para a pagina de recebeEditarpPagamentos-->
   <input type="hidden" name="id" value="<?=$dados['id'];?>"/>

    <label>VALOR</label><br/>
    <input type="text" name="valor" value="<?=$dados['valor'];?>"><br/><br/>

    <label>DATA</label><br/>
    <input type="date" name="data_pagamento" value="<?=$dados['data_pagamento'];?>"><br/><br/>

   <input type="submit" value="confirmar pagamento"> 
</form>
<?php
include 'config.php';
$dados = [];
$id = filter_input(INPUT_GET,'id');
if($id){
    $queryBuscaPagamento = $conexaoPDO->prepare("SELECT * FROM pagamentos WHERE id = :id");
    $queryBuscaPagamento->bindValue(':id', $id);
    $queryBuscaPagamento->execute();
    if($queryBuscaPagamento->rowCount() > 0){
        $dados = $queryBuscaPagamento->fetch();
    }else{
        header("Location: listarPagamentos.php");
        exit;
    }
}else{
    header("Location: listarPagamentos.php");
    exit;
}
?>

<h1>EDIÇÃO ALUNO</h1>
<form action="recebeActionEditarPagamento.php" method="POST">
    <!--id passado no corpo da pagina para a pagina de recebeEditarpPagamentos-->
   <input type="hidden" name="id" value="<?=$dados['id'];?>"/>

    <label>VALOR</label><br/>
    <input type="text" name="valor" value="<?=$dados['valor'];?>"/><br/><br/>

    <label>DATA</label><br/>
    <input type="date" name="data_pagamento" value="<?=$dados['data_pagamento'];?>"/><br/><br/>

   <input type="submit" value="confirmar pagamento"> 
</form>
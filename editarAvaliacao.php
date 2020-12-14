<?php
require 'config.php';
$dados = [];
$id = filter_input(INPUT_GET,'id');
if($id){
    $queryBuscaAvalicao = $conexaoPDO->prepare("SELECT * FROM avaliacoes WHERE id = :id");
    $queryBuscaAvalicao->bindValue(':id', $id);
    $queryBuscaAvalicao->execute();
    if($queryBuscaAvalicao->rowCount() > 0){
        $dados = $queryBuscaAvalicao->fetch();
    }else{
        header("Location: listarAvalicoes.php");
        exit;
    }
}else{
    header("Location: listarAvalicoes.php");
    exit;
}
?>

<h1>EDIÇÃO AVALIACAO</h1>

<form action="recebeActionEditarAvaliacao.php" method="POST">
  
    <label>ALTERAR A DATA DA AVALIAÇÃO</label><br/>
    <input type="date" name="data_avaliacao" value="<?=$dados['data_avaliacao'];?>"><br/><br/>

    <!--id passado no corpo da pagina para a pagina de recebeEditarpPagamentos-->
    <input type="hidden" name="id" value="<?=$dados['id'];?>"/>

    <input type="submit" value="agendar avaliação"> 
</form>
<?php
require 'config.php';
$dados = [];
$id = filter_input(INPUT_GET,'id');
if($id){
    $queryBuscaAvaliador = $conexaoPDO->prepare("SELECT * FROM avaliadores WHERE id = :id");
    $queryBuscaAvaliador->bindValue(':id', $id);
    $queryBuscaAvaliador->execute();
        if($queryBuscaAvaliador->rowCount() > 0){
            $dados = $queryBuscaAvaliador->fetch();
        }else{
            header('Location:listaAvaliadores.php');
            exit;
        }
}else{
    header('Location:listaAvaliadores.php');
    exit;
}
?>
<h1>EDICAO DO AVALIADOR</h1>

<form action="recebeActionEditarAvaliador.php" method="POST">
    <!--id passado no corpo da pagina para a pagina de recebeEditarAlunos-->
    <input type="hidden" name="id" value="<?=$dados['id'];?>"/>

    <label>NOME</label><br/>
    <input type="text" name="nome" value="<?=$dados['nome'];?>"><br/><br/>
   
    <label>TELEFONE</label><br/>
    <input type="text" name="telefone" value="<?=$dados['telefone'];?>"><br/><br/>

    <label>EMAIL</label><br/>
    <input type="text" name="email"  readonly="true"  value="<?=$dados['email'];?>"><br/><br/>

    <input type="submit" value="alterar">
</form>
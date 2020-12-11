<?php
require 'config.php';
$dados = [];
$id = filter_input(INPUT_GET,'id');
if($id){
    //buscando o id acima nessa consulta
    $queryBuscaAluno = $conexaoPDO->prepare("SELECT * FROM alunos WHERE id = :id");
    $queryBuscaAluno->bindValue(':id', $id);
    $queryBuscaAluno->execute();

    if($queryBuscaAluno->rowCount() > 0){
        $dados = $queryBuscaAluno->fetch();
    }else{
        header("Location: listaAlunos.php");
        exit;
    }
}else{
        header("Location: listaAlunos.php");
        exit;
}
?>
<h1>EDICÃO DE ALUNOS</h1>

<form action="recebeActionEditarAluno.php" method="POST">
   <!--id passado no corpo da pagina para a pagina de recebeEditarAlunos-->
   <input type="hidden" name="id" value="<?=$dados['id'];?>"/>

    <label>NOME</label><br/>
    <input type="text" name="nome" value="<?=$dados['nome'];?>"/><br/><br/>

    <label>MATRICULA</label><br/>
    <input type="text" name="matricula" value="<?=$dados['matricula'];?>"/><br/><br/>

    <label>ENDEREÇO</label><br/>
    <input type="text" name="endereco" value="<?=$dados['endereco'];?>"/><br/><br/>

    <label>TELEFONE</label><br/>
    <input type="text" name="telefone" value="<?=$dados['telefone'];?>"/><br/><br/>

    <label>EMAIL</label><br/>
    <input type="text" name="email" readonly="true" value="<?=$dados['email'];?>"/><br/><br/>

    <label>DATA DE NASCIMENTO</label><br/>
    <input type="date" name="data_nascimento" value="<?=$dados['data_nascimento'];?>"/><br/><br/>

    <label>PESO</label><br/>
    <input type="text" name="peso" value="<?=$dados['peso'];?>"/><br/><br/>

    <label>ALTURA</label><br/>
    <input type="text" name="altura" value="<?=$dados['altura'];?>"/><br/><br/>

    <input type="submit" value="salvar alteração">
</form>
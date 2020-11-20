<?php
include 'config.php';
?>
<h1>pagamento</h1>

<form action="recebeActionPagamento.php" method="POST">

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

    <label>VALOR</label><br/>
    <input type="text" name="valor"><br/><br/>

    <label>DATA</label><br/>
    <input type="date" name="data_pagamento"><br/><br/>

   <input type="submit" value="confirmar pagamento"> 
</form>
<?php
include 'config.php';
?>
<h1>AVALIAÇÃO</h1>
<form action="recebeActionAvaliacao.php" method="POST">
    <label>ALUNO</label><br/>
    <select name="aluno">
        <option>SELECIONE O ALUNO</option>
            <?php
                $listaAlunos = [];
                $queryBuscaAluno = $conexaoPDO->query("SELECT * FROM alunos");
                if($queryBuscaAluno->rowCount() > 0){
                    $listaAlunos = $queryBuscaAluno->fetchAll(PDO::FETCH_ASSOC);
                    foreach($listaAlunos as $alunos){ ?>
                        <option value="<?=$alunos['id'];?>"><?=$alunos['nome'];?></option>
                    <?php
                    }
                }
            ?>
    </select><br/><br/>

    <label>AVALIADOR</label><br/>
    <select name="avaliador">
    <option>SELECIONE O AVALIADOR</option>
        <?php
            $listaAvaliador = [];
            $queryBuscaAvaliador = $conexaoPDO->query("SELECT * FROM avaliadores");
            if($queryBuscaAvaliador->rowCount() > 0){
                $listaAvaliador = $queryBuscaAvaliador->fetchAll(PDO::FETCH_ASSOC);
                foreach($listaAvaliador as $avaliador){ ?>
                    <option value="<?=$avaliador['id'];?>"><?=$avaliador['nome_avaliador'];?></option>
                <?php
                }
            }
        ?>
    </select><br/><br/>

    <label>DATA</label><br/>
    <input type="date" name="data_avaliacao"><br/><br/>

   <input type="submit" value="agendar avaliação"> 
</form>
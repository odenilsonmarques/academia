<h1>pagamento</h1>

<form action="recebeActionPagamento.php" method="POST">
    <label>ALUNO</label>
    <select name="nome">
        <?php
            $listaAlunos = [];
            $queryBuscaAluno = $conexaoPDO->prepare("SELECT * FROM alunos");
            if($queryBuscaAluno->rowCount() > 0){
                foreach ($listaAlunos as $alunos){
        ?>
            <option value="<?php echo $alunos['id'];?>" ><?php echo $alunos['nome'];?></option>
        <?php      
            }
        }
        ?>
    </select>
    <label>VALOR</label><br/>
    <input type="text" name="valor"><br/><br/>
   
   <input type="submit" value="confirmar pagamento"> 
</form>
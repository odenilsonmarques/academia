<?php
require 'config.php';
$aluno = filter_input(INPUT_POST,'aluno');
$valor = filter_input(INPUT_POST,'valor');
$data_pagamento = filter_input(INPUT_POST,'data_pagamento');

if($valor && $data_pagamento){
    $queryAddAluno = $conexaoPDO->prepare("INSERT INTO pagamentos(aluno_id,valor,data_pagamento) VALUES (:aluno, :valor, :data_pagamento)");
    $queryAddAluno->bindValue(':aluno',$aluno);
    $queryAddAluno->bindValue(':valor',$valor);
    $queryAddAluno->bindValue(':data_pagamento',$data_pagamento);
    $queryAddAluno->execute();
    header("Location:listarPagamentos.php");
    exit;
}else{
    header("Location:adicionarPagamento.php");
    exit;
}


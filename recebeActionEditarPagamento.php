<?php
require 'config.php';
$id = filter_input(INPUT_POST,'id');
$valor = filter_input(INPUT_POST,'valor');
$data_pagamento = filter_input(INPUT_POST,'data_pagamento');

if($valor && $data_pagamento){
    $queryEditPagamento = $conexaoPDO->prepare("UPDATE pagamentos SET valor = :valor, data_pagamento = :data_pagamento WHERE id = :id");
    $queryEditPagamento->bindValue(':valor',$valor);
    $queryEditPagamento->bindValue(':data_pagamento',$data_pagamento);
    $queryEditPagamento->bindValue(':id',$id);
    $queryEditPagamento->execute();
    header("Location:listarPagamentos.php");
    exit;
}else{
    header("Location:editarPagamento.php");
    exit;
}
?>
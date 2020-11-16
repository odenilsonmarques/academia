<?php
require 'config.php';
$nome = filter_input(INPUT_POST,'nome');
$matricula = filter_input(INPUT_POST,'matricula');
$endereco = filter_input(INPUT_POST,'endereco');
$telefone = filter_input(INPUT_POST,'telefone');
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
$data_nascimento = filter_input(INPUT_POST,'data_nascimento');
$peso = filter_input(INPUT_POST,'peso');
$altura = filter_input(INPUT_POST,'altura');

if($nome && $telefone && $email){
    //vericando se ja existe um email antes de inserir ou novo registro, estou usando o prepare pq é um campo especifco na busca
    $queryBuscaAluno = $conexaoPDO->prepare("SELECT * FROM  alunos WHERE email = :email");
    $queryBuscaAluno->bindValue(':email', $email);
    $queryBuscaAluno->execute();
    if($queryBuscaAluno->rowCount() === 0){
        $queryAddAluno = $conexaoPDO->prepare("INSERT INTO alunos(nome,matricula,endereco,telefone,email,data_nascimento,peso,altura) VALUES (:nome, :matricula, :endereco, :telefone, :email, :data_nascimento, :peso, :altura)");
        $queryAddAluno->bindValue(':nome',$nome);
        $queryAddAluno->bindValue(':matricula',$matricula);
        $queryAddAluno->bindValue(':endereco',$endereco);
        $queryAddAluno->bindValue(':telefone',$telefone);
        $queryAddAluno->bindValue(':email',$email);
        $queryAddAluno->bindValue(':data_nascimento',$data_nascimento);
        $queryAddAluno->bindValue(':peso',$peso);
        $queryAddAluno->bindValue(':altura',$altura);
        $queryAddAluno->execute();
        header("Location:listarAlunos.php");
        exit;
    }else{
        header("Location:adicionarAluno.php");
        exit;
    }
}else{
    header("Location:adicionarAluno.php");
    exit;
}
?>
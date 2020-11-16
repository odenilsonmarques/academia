<?php
try{
     //mysql -> tipo de banco de daddos
    //dbname -> nome do banco
   //host -> onde está minha maquina(127.0.0.1)poder ser (localhost)
    $conexaoPDO = new PDO("mysql:dbname=db_academia_pdo;host=127.0.0.1", "root", "");
  // echo "conetado";
}catch(PDOException $e){
    echo "Erro ao conectar!".$e->getMessage();
}




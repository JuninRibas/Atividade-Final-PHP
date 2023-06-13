<?php 
    include_once "db.php";
    if(conectaBD()){
        echo "Conectado com sucesso!";
        echo insereUsuario("Enzo","enzo@gmail.com","123456");
        echo "<BR><pre>";
        var_dump(recuperaAll());

        echo"</pre>";
    }else{
        echo "Erro ao conectar!";
    }
?>
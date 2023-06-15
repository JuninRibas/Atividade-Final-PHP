<?php 
    function conectaBD(){
        $con=new PDO("mysql:host=localhost;dbname=db","root","aluno");
        return $con;
    }
    function editarUsuario($id, $nome, $email,$senha, $novaData,$telefone){
        try {
        $con = conectaBD();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE usuario SET nome=?, email=?, senha=?, data_nascimento=?, telefone=? WHERE id=?";
        $stm = $con->prepare($sql);
        $stm->bindParam(1, $nome);
        $stm->bindParam(2, $email);
        $stm->bindParam(3, $senha);
        $stm->bindParam(4, $novaData);
        $stm->bindParam(5, $telefone);
        $stm->bindParam(6, $id);
        $stm->execute();
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}

    function insereUsuario($nome,$email,$senha,$data_nascimento,$telefone){
        try{
        $con=conectaBD();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO usuario(nome,email,senha,data_nascimento,telefone) VALUES (?,?,?,?,?)";
        $stm=$con->prepare($sql);
        $stm->bindParam(1,$nome);
        $stm->bindParam(2,$email);
        $stm->bindParam(3,$senha);
        $stm->bindParam(4,$data_nascimento);
        $stm->bindParam(5,$telefone);
        $stm->execute();
        } catch(PDOException $e){
            echo 'ERRO: '.$e->getMessage();
        }
        return $con->lastInsertId();
    }


    function deletarUsuario($id){
        $con=conectaBD();
        $sql="DELETE FROM usuario Where id=?";
        try {
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stm=$con->prepare($sql);
            $stm->bindParam(1,$id);
            $stm->execute();
        } catch (PDOException $e) {
            echo 'ERRO:' .$e->getMessage();
        }
    }

        


        function recuperaUsuarioID($id){
        $con=conectaBD();
        $sql="SELECT * FROM usuario Where id=?";
        $stm=$con->prepare($sql);
        $stm->bindParam(1,$id);
        $stm->execute();
        $result=$stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function recuperaAll(){
        $con=conectaBD();
        $sql="SELECT * FROM usuario";
        $stm=$con->prepare($sql);

        $stm->execute();
        $result=$stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function verificaLoginSenha($email, $senha) {
        $con=conectaBD();
       
        // Consulta SQL para verificar as credenciais
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = ?";
        $stm= $con->prepare($sql);
        $stm->bindParam(1,$email);
        $stm->bindParam(2,$senha);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
       
        // Verifica se a consulta retornou algum resultado
        if (count($result) > 0) {
            // As credenciais são válidas
        
            return true;
        } else {
            // As credenciais são inválidas
        
        
            return false;
        }
    }

?>
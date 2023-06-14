<?php 
    function conectaBD(){
        $con=new PDO("mysql:host=localhost;dbname=db","root","JJeess3344.");
        return $con;
    }
    function atualizaUser($id, $nome, $email){
        try {
        $con = conectaBD();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE user SET nome=?, login=? WHERE id=?";
        $stm = $con->prepare($sql);
        $stm->bindParam(1, $nome);
        $stm->bindParam(2, $email);
        $stm->bindParam(3, $id);
        $stm->execute();
    } catch (PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
}
    function insereUsuario($nome,$email,$senha){
        try{
        $con=conectaBD();
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO usuario(nome,login,senha) VALUES (?,?,?)";
        $stm=$con->prepare($sql);
        $stm->bindParam(1,$nome);
        $stm->bindParam(2,$email);
        $stm->bindParam(3,$senha);
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
    function recuperaUsuario($id){
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
    function verificaLoginSenha($login, $senha){
    $con = conectaBD();
    $sql = "SELECT * FROM user WHERE login = :login AND senha = :senha";
    $stm = $con->prepare($sql);
    $stm->bindParam(':login', $login);
    $stm->bindParam(':senha', $senha);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    // Verificando se a consulta retornou algum resultado
    if (!empty($result)) {
        return true;
    } else {
        return false;
    }
  }
?>
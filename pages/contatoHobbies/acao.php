<?php
    require_once "../../conf/Conexao.php";

    $codigocontato = isset($_POST['codigocontato']) ? $_POST['codigocontato']: 0;
    $codigohobbie = isset($_POST['codigohobbie']) ? $_POST['codigohobbie']: 0;
    $acao = "";
    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    switch($acao){
        case 'excluir': excluir(); break;
        case 'salvar': {
            if (findById($codigocontato,$codigohobbie) == NULL)
                salvar(); 
            else
                editar();
            break;
        }
    }

    function excluir(){  
        $codigocontato = isset($_GET['codigocontato']) ? $_GET['codigocontato']: 0;
        $codigohobbie = isset($_GET['codigohobbie']) ? $_GET['codigohobbie']: 0;

        $dados = formToArray();
        $conexao = Conexao::getInstance();
        $sql = "DELETE FROM contato_hobbie WHERE codigocontato = '$codigocontato' AND codigohobbie = '$codigohobbie';";

        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function editar(){
        $codigocontato = isset($_GET['codigocontato']) ? $_GET['codigocontato']: 4;
        $codigohobbie = isset($_GET['codigohobbie']) ? $_GET['codigohobbie']: 4;
        $dados = formToArray();

        $conexao = Conexao::getInstance();
        $sql = "UPDATE `contato_hobbie` SET `codigocontato` = '".$dados['codigocontato']."', `codigohobbie` = '".$dados['codigohobbie']."' WHERE (`codigocontato` = '".$codigocontato.") and (`codigohobbie` = '".$codigohobbie."');";

        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function salvar(){
        $dados = formToArray();

        var_dump($dados);

        $conexao = Conexao::getInstance();

        $sql = "INSERT INTO contato_hobbie (codigocontato, codigohobbie) VALUES ('".$dados['codigocontato']."','".$dados['codigohobbie']."')";
        
        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function formToArray(){
        $codigocontato = isset($_POST['codigocontato']) ? $_POST['codigocontato']: 0;
        $codigohobbie = isset($_POST['codigohobbie']) ? $_POST['codigohobbie']: 0;


        $dados = array(
            'codigocontato' => $codigocontato,
            'codigohobbie' => $codigohobbie
        );

        return $dados;

    }

    function findById($codigocontato,$codigohobbie){
        $conexao = Conexao::getInstance();
        $conexao = $conexao->query("SELECT*FROM contato_hobbie WHERE codigocontato = $codigocontato AND codigohobbie = $codigohobbie;");
        $result = $conexao->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }

?>
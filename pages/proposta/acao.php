<?php
    require_once "../../conf/Conexao.php";

    // var_dump($_POST);
    //     echo"<br>";
    // var_dump($_GET);
    $acao = "";
    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
        case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
    }

    switch($acao){
        case 'excluir': excluir(); break;
        case 'salvar': {
            $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : 0;
            if ($codigo == 0)
                salvar(); 
            else
                editar();
            break;
        }
    }

    function excluir(){    
        $codigo = isset($_GET['codigo']) ? $_GET['codigo']:0;
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("DELETE FROM proposta WHERE codigo = :codigo");
        $stmt->bindParam('codigo', $codigo, PDO::PARAM_INT);  
        $stmt->execute();
        header("location:index.php");
    }

    function editar(){
        $dados = formToArray();

        $conexao = Conexao::getInstance();

        $sql = "UPDATE proposta SET nome = '".$dados['nome']."', email = '".$dados['email']."', observacoes = '".$dados['observacoes']."', salario = '".$dados['salario']."' WHERE codigo = '".$dados['codigo']."';";

        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function salvar(){
            echo "FUNCTION SALVAR";
        $dados = formToArray();

        var_dump($dados);

        $conexao = Conexao::getInstance();

        $sql = "INSERT INTO proposta (codigo, nome, email,observacoes,salario) VALUES ('".$dados['codigo']."','".$dados['nome']."','".$dados['email']."','".$dados['observacoes']."','".$dados['salario']."')";
        
        $conexao = $conexao->query($sql);

        $loc = isset($_POST['loc']) ? $_POST['loc'] : 'painel';

        if($loc == 'painel'){
            header("location:index.php");
        }else{
            header("location: ../../index.php?aviso=sucesso");
        }
        
    }

    function formToArray(){
        $codigo = isset($_POST['codigo']) ? $_POST['codigo']: 0;
        $nome = isset($_POST['nome']) ? $_POST['nome']: '';
        $email = isset($_POST['email']) ? $_POST['email']: '';
        $observacoes = isset($_POST['observacoes']) ? $_POST['observacoes']: '';
        $salario = isset($_POST['salario']) ? $_POST['salario']: '';


        $dados = array(
            'codigo' => $codigo,
            'nome' => $nome,
            'email' => $email,
            'observacoes' => $observacoes,
            'salario' => $salario
        );

        return $dados;

    }

    function findById($codigo){
        $conexao = Conexao::getInstance();
        $conexao = $conexao->query("SELECT*FROM proposta WHERE codigo = $codigo;");
        $result = $conexao->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }

?>
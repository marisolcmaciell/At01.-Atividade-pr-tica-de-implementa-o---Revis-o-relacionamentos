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
            if ($codigo == 0){
                salvar(); 
            }else{
                editar();
            }
            break;
        }
    }

    function excluir(){    
        $codigo = isset($_GET['codigo']) ? $_GET['codigo']:0;
        $conexao = Conexao::getInstance();
        $stmt = $conexao->prepare("DELETE FROM contatos WHERE codigo = :codigo");
        $stmt->bindParam('codigo', $codigo, PDO::PARAM_INT);  
        $stmt->execute();
        header("location:index.php");
    }

    function editar(){
        echo "FUNCTION EDITAR";
        $dados = formToArray();

        $conexao = Conexao::getInstance();

        $sql = "UPDATE contatos SET nome = '".$dados['nome']."', sobrenome = '".$dados['sobrenome']."', email = '".$dados['email']."', observacoes = '".$dados['observacoes']."', telefone = '".$dados['telefone']."', datanasci = '".$dados['datanasci']."', codigocidade = '".$dados['codigocidade']."', vivo = '".$dados['vivo']."' WHERE codigo = '".$dados['codigo']."';";

        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function salvar(){
            echo "FUNCTION SALVAR";
        $dados = formToArray();

        var_dump($dados);

        $conexao = Conexao::getInstance();

        $sql = "INSERT INTO `contatos` (`codigo`, `nome`, `sobrenome`, `email`, `observacoes`, `telefone`, `datanasci`, `codigocidade`) VALUES ('".$dados['codigo']."', '".$dados['nome']."', '".$dados['sobrenome']."', '".$dados['email']."', '".$dados['observacoes']."', '".$dados['telefone']."', '".$dados['datanasci']."', '".$dados['codigocidade']."');";
        

        
        $conexao = $conexao->query($sql);
        header("location:index.php");
    }

    function formToArray(){
        $codigo = isset($_POST['codigo']) ? $_POST['codigo']: 0;
        $nome = isset($_POST['nome']) ? $_POST['nome']: '';
        $sobrenome = isset($_POST['sobrenome']) ? $_POST['sobrenome']: '';
        $email = isset($_POST['email']) ? $_POST['email']: 0;
        $telefone = isset($_POST['telefone']) ? $_POST['telefone']: '';
        $observacoes = isset($_POST['observacoes']) ? $_POST['observacoes']: '';
        $datanasci = isset($_POST['datanasci']) ? $_POST['datanasci']: 0;
        $codigocidade = isset($_POST['codigocidade']) ? $_POST['codigocidade']: '';


        $dados = array(
            'codigo' => $codigo,
            'nome' => $nome,
            'sobrenome' => $sobrenome,
            'email' => $email,
            'telefone' => $telefone,
            'observacoes' => $observacoes,
            'datanasci' => $datanasci,
            'codigocidade' => $codigocidade
        );

        return $dados;

    }

    function findById($codigo){
        $conexao = Conexao::getInstance();
        $conexao = $conexao->query("SELECT*FROM contatos WHERE codigo = $codigo;");
        $result = $conexao->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }

?>
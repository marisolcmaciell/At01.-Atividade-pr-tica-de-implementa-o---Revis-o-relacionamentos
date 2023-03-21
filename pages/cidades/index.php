<?php
    require_once "../../conf/Conexao.php";

    include 'acao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    $dados = array();
    if ($acao == 'editar'){
        $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';
        $dados = findById($codigo);
        //var_dump($dados);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro de Cidade</title>
        <link rel="stylesheet" href="../../assets/css/estilo.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Abel&family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
        <style>
        </style>
    </head>
    <body>
        <a href="../../index.php">Voltar</a>
        <center><h1 style="color: #295872">Cadastro de Cidade</h1></center>
        
        <div class='row teste'>
            <div class='col-12 '>
                <form action="acao.php" method="post">
                    <div class='row'>
                        <div class='col-4'>
                            <label for="codigo">codigo:</label>
                        
                            <input type="text" class="form-control" id='codigo' name='codigo' value="<?php if ($acao == 'editar') echo $dados['codigo']; else echo '0'; ?>" readonly>
                        </div>
                    
                        <div class='col-4'>
                            <label for="nome">Nome:</label>
                        
                            <input type="text" class="form-control" id='nome' name='nome' value="<?php if ($acao == 'editar') echo $dados['nome'];?>">
                        </div>
                    
                        <div class='col-4'>
                            <label for="estado">Estado:</label>
                        
                            <input type="text" class="form-control" estado='estado' name='estado' value="<?php if ($acao == 'editar') echo $dados['estado'];?>">
                        </div>
                    </div>  
                        <br>
                    <div class='row'>
                        <div class='col-12'>
                            <center><button type='submit' name='acao' class="btn btn-success" id='acao' value='salvar'>Salvar</button></center>
                        </div>
                    </div>       
                </form>
            </div>
        </div> 
        <div class='row'>
            <?php

            ?>
            <br><br>
            <center>
                <div>
                <table class="cidade">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                                $conexao = Conexao::getInstance();
                                $consulta=$conexao->query("SELECT *FROM cidade;");
                                while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                    echo "
                                        <td>{$linha['codigo']}</td>
                                        <td>{$linha['nome']}</td>
                                        <td>{$linha['estado']}</td>
                                        <td><a class='btn btn-warning' href='index.php?acao=editar&codigo={$linha['codigo']}'>Editar</a></td>
                                        <td><a class='btn btn-danger' onClick = 'return excluir();' href='acao.php?acao=excluir&codigo={$linha['codigo']}'.>Excluir</a></td>
                                        </tr>\n
                                    ";
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            </center>
        </div>
    </body>
</html>
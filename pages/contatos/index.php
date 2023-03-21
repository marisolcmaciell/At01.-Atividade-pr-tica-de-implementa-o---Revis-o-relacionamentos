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
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
    </head>
    <body>
        <br>
        <a href="../../index.php">Voltar</a>
        <center><h1 style="color: #295872">Cadastro de Contatos</h1></center>
        
        <div class='row teste'>
            <div class='col-12 '>
                <form action="acao.php" method="post">
                    <div class='row'>
                        <div class='col-4'>
                            <label for="codigo">Código:</label>
                        
                            <input type="text" class="form-control" id='codigo' name='codigo' value="<?php if ($acao == 'editar') echo $dados['codigo']; else echo '0'; ?>" readonly>
                        </div>
                    
                        <div class='col-4'>
                            <label for="nome">Nome:</label>
                        
                            <input type="text" class="form-control" id='nome' name='nome' value="<?php if ($acao == 'editar') echo $dados['nome'];?>">
                        </div>
                    
                        <div class='col-4'>
                            <label for="sobrenome">Sobrenome:</label>
                        
                            <input type="text" class="form-control" id='sobrenome' name='sobrenome' value="<?php if ($acao == 'editar') echo $dados['sobrenome'];?>">
                        </div>
                    </div> 
                    <div class='row'>
                        <div class='col-4'>
                            <label for="email">Email:</label>
                        
                            <input type="text" class="form-control" id='email' name='email' value="<?php if ($acao == 'editar') echo $dados['email'];?>" >
                        </div>
                    
                        <div class='col-4'>
                            <label for="dataNascimento">Data de Nascimento:</label>
                            <input type="date" class="form-control" value="<?php if ($acao == 'editar') echo $dados['datanasci'];?>" name="datanasci" id="datanasci">
                        </div>
                    
                        <div class='col-4'>
                            <label for="telefone">Telefone:</label>
                            
                            <input type="text" class="form-control" id='telefone' name='telefone' value="<?php if ($acao == 'editar') echo $dados['telefone'];?>">
                        </div>
                    </div>  
                    <div class='row'>
                        <div class='col-4'>
                            <label for="estado">Cidade:</label>
                            
                            <!-- <input type="text" class="form-control" estado='estado' name='estado' value="<?php //if ($acao == 'editar') echo $dados['estado'];?>"> -->
                            <select class="form-select" name="codigocidade" id="codigocidade">
                                <?php
                                    $conexao = Conexao::getInstance();
                                    $consulta=$conexao->query("SELECT*FROM cidade;");
                                    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                        if ($linha['codigo'] == $dados['codigocidade']) {
                                            echo "<option value='".$linha['codigo']."' selected>".$linha['nome']."</option>";
                                        }else{
                                            echo "<option value='".$linha['codigo']."'>".$linha['nome']."</option>";
                                        }
                                    }

                                ?>
                            </select> 
                        </div>
                    
                        <div class='col-4'>
                            <label for="observacoes">Observações:</label>
                            <textarea name="observacoes" class="form-control" id="observacoes" cols="30" rows="10"><?php if ($acao == 'editar') echo $dados['observacoes'];?></textarea>
                        </div>
                     
                        <br>
                    <div class='row'>
                        <div class='col-12'>
                            <center><button type='submit' class="btn btn-success" name='acao' id='acao' value='salvar'>Salvar</button></center>
                        </div>
                    </div>       
                </form>
            </div>
        </div> 
        <div class='row'>
            <center>
                <br>
                <br>
               <div>
                <table class="cor">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Telefone</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
                                $conexao = Conexao::getInstance();
                                $consulta=$conexao->query("SELECT *FROM contatos;");
                                while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                    echo "
                                        <td>{$linha['codigo']}</td>
                                        <td>{$linha['nome']} {$linha['sobrenome']}</td>
                                        <td>{$linha['telefone']}</td>
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
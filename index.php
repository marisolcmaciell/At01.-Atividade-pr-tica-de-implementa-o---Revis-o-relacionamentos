<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Currículo</title>
    <link rel="stylesheet" href="assets/css/estilo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@800&display=swap" rel="stylesheet">
    <script src="assets/js/script.js"></script>  
    <?php
        $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : ""; 

        switch ($aviso) {
            case 'sucesso':
                $msg = "Proposta Enviada com Sucesso!";
                alert($msg);
                break;
            default:
                # code...
                break;
        }
        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    ?>
</head>
    <body>
        <nav class="menu">
            <ul>
                <li id="item">Página inicial</li>
                <li><a href='pages/contatos/index.php'>Contatos</a></li>
                <li>Sobre</li>
                <li><a href='pages/cidades/index.php'>Cidades</a></li>
                <li><a href='pages/hobbies/index.php'>Hobbies</a></li>
                <li><a href='pages/contatoHobbies/index.php'>Contato & Hobbies</a></li>
                <li><a href='pages/proposta/index.php'>Propostas</a></li>
            </ul>
        </nav>
        <section>
            <div class="row">
                <div class="col-6">
                    <h1 style="color: #295872">Currículo: Marisol C. Maciel</h1>
                    <p>Sou aluna do IFC - Campus Rio do Sul.</p>
                    <h2 style="color: #357599">Meus Conhecimentos</h2>
                    <ul>
                        <li>Design Gráfico;</li>
                        <li>Bebês;</li>
                        <li>Canva;</li>
                        <li>Delineado;</li>
                        <li>Fazer as unhas.</li>
                    </ul>
                    <h2 style="color: #357599">Experiências Profissionais</h2>
                    <ol>
                        <li>PIPE (Programa de Iniciação ao Primeiro Emprego) - 2019</a></li>
                        <li>Robótica - 2018</li>
                        <li>Oratória JCI - 2018/2019</li>
                        <li>Feira da Matemática - 2018</li>
                        <li>EATDRINK - 2022</li>
                    </ol>
                    <table class="dados">
                        <tr>
                            <th>Projeto</th>
                            <th>Orientador</th>
                            <th>Link</th>
                        </tr>
                        <tr>
                            <td>EATDRINK</td>
                            <td>Fábio Alexandrini</td>
                            <td><a href="http://https://www.canva.com/design/DAFdMUBi1dY/l7nQWDIHCQR229mn3jNFZw/view?utm_content=DAFdMUBi1dY&utm_campaign=designshare&utm_medium=link&utm_source=homepage_design_menu">Projeto EATDRINK</a></td>
                        </tr>
                        <tr>
                            <td>Fanfic do Shawn Mendes</td>
                            <td>Marisol C. Maciel</td>
                            <td><a href="https://www.wattpad.com/story/231330535?utm_source=android&utm_medium=whatsapp&utm_content=story_info&wp_page=story_details_button&wp_uname=fellingpeter&wp_originator=W3VFQM%2FDbv38R8HnLgceowULJy6ZuuaNQpCdGuVTKUVmJvweTtmyJqh%2FfaO44yWMJVd3BIZsdnNASrixkXQm706ZDXrUywGqKNjdG5UhYkRK%2F5dQQsRaA9myQVTnYb%2F1">Fanfic do Shawn Mendes</a></td>
                        </tr>
                        <tr>
                            <td>EATDRINK</td>
                            <td>Fábio Alexandrini</td>
                            <td><a href="http://https://www.canva.com/design/DAFdMUBi1dY/l7nQWDIHCQR229mn3jNFZw/view?utm_content=DAFdMUBi1dY&utm_campaign=designshare&utm_medium=link&utm_source=homepage_design_menu">Projeto EATDRINK</a></td>
                        </tr>
                    </table>
                </div>
                <div class="col-2" id="colfoto">
                    <img class='foto' src="assets/img/marisol.jpg" alt="Foto">
                </div>
                <div class="col-4" id="formcontato">
                    <h2>Entre em contato...</h2>
                    <form action="pages/proposta/acao.php" method="POST">
                        <input type="hidden" name="loc" value="home">
                        <div class="row">
                            <div class="col-4">
                                <label for="nome">Nome:</label>
                            </div>
                            <div class="col-8">
                                <input type="text" id='nome' name='nome'>
                            </div>
                        </div>
                        <div class="row erro" id="erronome"><div class="col-12">O nome deve possuir pelo menos três letras</div></div>
                        <div class="row">
                            <div class="col-4">
                                <label for="email">E-Mail</label>
                            </div>
                            <div class="col-8">
                                <input type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="row erro" id="erroemail"><div class="col-12">E-mail informado incorreto</div></div>
                        <div class="row">
                            <div class="col-4">
                                <label for="salario">Proposta de Salário:</label>
                            </div>
                            <div class="col-8">
                                <input type="number" name="salario">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <label for="obs">Observações:</label>
                            </div>
                            <div class="col-8">
                                <textarea name="observacoes" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" name='acao' id='acao' value='salvar'>Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    
        <footer>
            <div class="row">
                <div class="col-12">
                    <p>Feito por webdesign Marisol@BTS</p>
                </div>
            </div>
        </footer>
    </body>
</html>
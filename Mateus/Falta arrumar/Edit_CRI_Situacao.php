<?php


    //Se o botão de envio for pressionado
    //error_reporting (0);
    if(!empty($_GET['Documento']))
    {

        include_once('config.php');


        $Identidade_Pessoa = $_GET['Documento'];

        $sqlSelect = "SELECT Situacao.*, ca.Nome, ca.Documento FROM situacao
        LEFT JOIN crianca_adolecente ca
        on Situacao.Crianca = ca.Documento WHERE ca.Documento='$Identidade_Pessoa'";


        $result = $conexao->query($sqlSelect);
        //print_r($result);
        //print_r($Identidade_Pessoa);

        if($result->num_rows > 0){
            
            while($user_data = mysqli_fetch_assoc($result)){
                
                $idSituacao                = $user_data['idSituacao'];
                $Nome_Pessoa               = $user_data['Nome'];
                $Identidade_pessoa         = $user_data['Documento'];
                $Vida_antes                = $user_data['Vida_Antes'];
                $Razão_Saida               = $user_data['Razao_Saida'];

                $Situacao_Pessoa       = $user_data['Saida_Forcada'];
                
                $Txt_Alguem_Pessoa         = $user_data['Ajuda'];
                $Txt_Viagem_Pessoa         = $user_data['Acompanhado'];
                $Txt_Entrou_Pessoa         = $user_data['Entrada_Sozinho'];
                $Txt_Retornar_Pessoa       = $user_data['Retorno'];
                $Medo_Pessoa               = $user_data['Medo_Retorno'];
                $Permancer_Pessoa          = $user_data['Permanencia'];
                $Parentes_Origem_Pessoa    = $user_data['Parente_Pais_Origem'];
                $Parentes_Brasil_Pessoa    = $user_data['Parente_Brasil'];
                $Proteção_Indicadores      = $user_data['Protecao_da_Crianca'];
                $Txt_Protecao_Indicadores  = $user_data['Txt_Protecao_Indicadores'];
                $Solicitação_Indicadores   = $user_data['Solicitacao_de_Indicadores'];

                //$Txt_Medo_Pessoa           = $_POST['Txt_Medo_Pessoa'];
                
                //print_r($Txt_Retornar_Pessoa);
            }
            //print_r($Identidade_Pessoa);
        } else{
            header('Location: Sistema.php');
        }


        
    }     

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" type="text/css" Href="estilo.css">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulário</title>
    </head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!--<link rel="stylesheet" href="style.css">-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <body>
    <script src="js/script_Codigo.js"></script>
    <div class="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <img src="DPU.png" class="logo">
                <img src="DPU.png" class="logo2">
    
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="cadastrar_Def.php">Cadastrar Novo Defensor/Interprete</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Formulario2.php">Cadastrar Criança</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Dados.php">Visão dados Defensores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Dados_INT.php">Visão dados interpretes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Dados_CRI.php">Visão dados Crianças</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Sair.php">Finalizar Sessão</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Dados_CRI.php">Voltar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <meta charset="UTF-8">
        <div class="box_CRI_Situacao">
            <form action="saveEdit_CRI_Medidas.php" id="saveEdit_CRI_Medidas" method="post">
                <fieldset>
                    <legend><b>Situação da Criança - Editar</b></legend>
                    <br>
                    <div class="inputBox">
                    <input type="text" name="Nome_Pessoa" id="Nome_Pessoa" class="inputUser" value="<?php echo $Nome_Pessoa ?>" required>
                        <label for="Nome_Pessoa" class="labelInput"><label style="color:#FF0000">*</label> Nome Completo:</label>
                    </div>
                    <br><br>
                    <div class="inputBox" style="margin-top: -23px;">
                        <label for="Identidade_Pessoa" class="labelInputReadonly"><label style="color:#FF0000">*</label> Cédula de identidade:</label>
                        <input type="text" name="Identidade_Pessoa" id="Identidade_Pessoa" class="inputUser" value="<?php echo $Identidade_Pessoa?>" readonly>
                    </div>
                    <br><br>
    
                    <div class="inputBox">
                        <textarea type="text" name="Vida_antes" id="Vida_antes" class="inputUser" required ><?php echo $Vida_antes ?></textarea>
                        <label for="Vida_antes" class="labelInput"><label style="color:#FF0000">*</label> Como era sua vida em seu país de origem, antes de você se separar de sua família ?</label>
                    </div>
                    <br><br>
                    <div class="inputBox">
                        <textarea type="text" name="Razão_Saida" id="Razão_Saida" class="inputUser" required ><?php echo $Razão_Saida ?></textarea>
                        <label for="Razão_Saida" class="labelInput"><label style="color:#FF0000">*</label> Em que momento e por qual razão você deixou seu país e se separou de sua família?</label>
                    </div>
                    <br>
                    <div class="field radiobox">
                        <label>Alguma situacão forcou você a sair do seu país de origem?</label><br>
                        <input type="radio" name="Situacao_Pessoa" id="Situacao_Pessoa_Sim" value="Sim" <?php echo $Situacao_Pessoa != "N/A" ?"checked":"" ?> onclick="Requerido('Txt_Situacao_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Situacao_Pessoa" id="Situacao_Pessoa_Nao" value="Não" <?php echo $Situacao_Pessoa == "N/A" ?"checked":"" ?> onclick="Limpar('Txt_Situacao_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <label type="text" name="Txt_Situacao_Pessoa" id="Txt_Situacao_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" required><?php echo $Situacao_Pessoa ?></label>
                        <?php echo $Situacao_Pessoa != "N/A" ?"<script>Preencher('Situacao_Pessoa')</script>":""  ?>
                    </div>
                    <br>
                    
                    <div class="field radiobox">
                        <label>Alguém o ajudou a chegar até o Brasil?</label><br>
                        <input type="radio" name="Alguem_Pessoa" id="Alguem_Pessoa_Sim" value="Sim" <?php echo $Txt_Alguem_Pessoa != "N/A" ?"checked":"" ?> onclick="Requerido('Txt_Alguem_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Alguem_Pessoa" id="Alguem_Pessoa_Nao" value="Não" <?php echo $Txt_Alguem_Pessoa == "N/A" ?"checked":"" ?> onclick="Limpar('Txt_Alguem_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <label type="text" name="Txt_Alguem_Pessoa" id="Txt_Alguem_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" required><?php echo $Txt_Alguem_Pessoa ?></label>
                        <?php echo $Txt_Alguem_Pessoa != "N/A" ?"<script>Preencher('Txt_Alguem_Pessoa')</script>":""  ?>
                    </div>
                    <br>
                    <div class="field radiobox">
                        <label>Você realizou a viagem acompanhado?</label><br>
                        <input type="radio" name="Viagem_Pessoa" id="Viagem_Pessoa_Sim" value="Sim" <?php echo $Txt_Viagem_Pessoa != "N/A" ?"checked":"" ?> onclick="Requerido('Txt_Viagem_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Viagem_Pessoa" id="Viagem_Pessoa_Nao" value="Não" <?php echo $Txt_Viagem_Pessoa == "N/A" ?"checked":"" ?> onclick="Limpar('Txt_Viagem_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <label type="text" name="Txt_Viagem_Pessoa" id="Txt_Viagem_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ><?php echo $Txt_Viagem_Pessoa ?></label>
                        <?php echo $Txt_Viagem_Pessoa != "N/A" ?"<script>Preencher('Txt_Viagem_Pessoa')</script>":"" ?>          
                    </div>
                    <br>
    
                    <div class="field radiobox">
                        <label>Você entrou no Brasil sozinho?</label><br>
                        <input type="radio" name="Entrou_Pessoa" id="Entrou_Pessoa_Sim" value="Sim" <?php echo $Txt_Entrou_Pessoa == "N/A" ?"checked":"" ?> onclick="Limpar('Txt_Entrou_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Entrou_Pessoa" id="Entrou_Pessoa_Nao" value="Não" <?php echo $Txt_Entrou_Pessoa != "N/A" ?"checked":"" ?> onclick="Requerido('Txt_Entrou_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Entrou_Pessoa" id="Txt_Entrou_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ><?php echo $Txt_Entrou_Pessoa ?></textarea> 
                        <?php echo $Txt_Entrou_Pessoa != "N/A" ?"<script>Preencher('Txt_Entrou_Pessoa')</script>":"" ?>  
                    </div>
                    <br>
    
                    <div class="field radiobox">
                        <label>Você tem intenção de peremanecer no Brasil?</label><br>
                        <input type="radio" name="Permancer_Pessoa" id="Permancer_Pessoa_Sim" value="Sim" <?php echo $Permancer_Pessoa == "Sim" ?"checked":"" ?>><label for="Sim">Sim </label>
                        <input type="radio" name="Permancer_Pessoa" id="Permancer_Pessoa_Nao" value="Não" <?php echo $Permancer_Pessoa == "Não" ?"checked":"" ?>><label for="Não">Não </label>
                     </div>
                    <br>
    
                    <div class="field radiobox">
                        <label>Você deseja retornar ao seu país?</label><br>
                        <input type="radio" name="Retornar_Pessoa" id="Retornar_Pessoa_Sim" value="Sim" <?php echo $Txt_Retornar_Pessoa == "N/A" ?"checked":"" ?> onclick="Limpar('Txt_Retornar_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Retornar_Pessoa" id="Retornar_Pessoa_Nao" value="Não" <?php echo $Txt_Retornar_Pessoa != "N/A" ?"checked":"" ?> onclick="Requerido('Txt_Retornar_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Retornar_Pessoa" id="Txt_Retornar_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ><?php echo $Txt_Retornar_Pessoa ?></textarea>
                        <?php echo $Txt_Retornar_Pessoa != "N/A" ?"<script>Preencher('Txt_Retornar_Pessoa')</script>":"" ?>  
                    </div>
                    <br>
    
                    <div class="field radiobox">
                        <label>Você tem medo de regressar ao seu país de origem?</label><br>
                        <input type="radio" name="Medo_Pessoa" id="Medo_Pessoa_Sim" value="Sim" <?php echo $Medo_Pessoa != "N/A" ?"checked":"" ?> onclick="Requerido('Txt_Medo_Pessoa')"><label for="Sim">Sim </label>
                        <input type="radio" name="Medo_Pessoa" id="Medo_Pessoa_Nao" value="Não" <?php echo $Medo_Pessoa == "N/A" ?"checked":"" ?> onclick="Limpar('Txt_Medo_Pessoa')"><label for="Não">Não </label>
                        <br><br>
                        <textarea type="text" name="Txt_Medo_Pessoa" id="Txt_Medo_Pessoa" style="display:none" placeholder="Digite aqui" class="inputUser" ><?php echo $Medo_Pessoa ?></textarea>
                        <?php echo $Medo_Pessoa != "N/A" ?"<script>Preencher('Medo_Pessoa')</script>":"" ?>  
                    </div>
                    <br>
                    <div class="field radiobox">
                        <label>Tem parentes (irmãos tios, primos e avós) no Brasoç?</label><br>
                        <input type="radio" name="Parentes_Brasil_Pessoa" id="Parentes_Brasil_Pessoa_Sim" value="Sim" <?php echo $Parentes_Brasil_Pessoa == "Sim" ?"checked":"" ?>><label for="Sim">Sim </label>
                        <input type="radio" name="Parentes_Brasil_Pessoa" id="Parentes_Brasil_Pessoa_Nao" value="Não" <?php echo $Parentes_Brasil_Pessoa == "Não" ?"checked":"" ?>><label for="Não">Não </label>
                    </div>
                    </br>
                    <div class="field radiobox">
                        <label>Tem parentes (irmãos tios, primos e avós) no país de origem?</label><br>
                        <input type="radio" name="Parentes_Origem_Pessoa" id="Parentes_Origem_Pessoa_Sim" value="Sim" <?php echo $Parentes_Origem_Pessoa == "Sim" ?"checked":"" ?>><label for="Sim">Sim </label>
                        <input type="radio" name="Parentes_Origem_Pessoa" id="Parentes_Origem_Pessoa_Nao" value="Não" <?php echo $Parentes_Origem_Pessoa == "Não" ?"checked":"" ?>><label for="Não">Não </label>
                    </div>
                    <br><br>
    
                    <div class="field radiobox">            
                    <label>Possíveis necessidades de proteção da criança ou adolescente:</label><br>
                        <input type="radio" name="Proteção_Indicadores" id="Convivencia_Proteção" value="ProteçãoC" <?php echo $Proteção_Indicadores == "ProteçãoC" ?"checked":"" ?> onclick="Limpar('Txt_Proteção_Indicadores')"><label for="Convivencia_Proteção" required>Retorno à convivência familiar, conforme parâmetros de proteção integral e atenção ao interesse superior da criança; </label><br>
                        <input type="radio" name="Proteção_Indicadores" id="Familiar_Proteção" value="ProteçãoF" <?php echo $Proteção_Indicadores == "ProteçãoF" ?"checked":"" ?> onclick="Limpar('Txt_Proteção_Indicadores')"><label for="Familiar_Proteção" required>Medida de proteção por reunião familiar </label><br>
                        <input type="radio" name="Proteção_Indicadores" id="Trafico_Proteção" value="ProteçãoT" <?php echo $Proteção_Indicadores == "ProteçãoT" ?"checked":"" ?> onclick="Limpar('Txt_Proteção_Indicadores')"><label for="Trafico_Proteção" required>Proteção como vítima de tráfico de pessoas; </label><br>
                        <input type="radio" name="Proteção_Indicadores" id="Outro_Proteção" value="ProteçãoO" <?php echo $Proteção_Indicadores == "ProteçãoO" ?"checked":"" ?> onclick="Requerido('Txt_Proteção_Indicadores')"><label for="Outro_Proteção" required>Outra medida de regularização migratória ou proteção como refugiado ou apátrida, conforme a legislação em vigor. Informe: </label><br><br>
                        <input type="text" name="Txt_Proteção_Indicadores" id="Txt_Proteção_Indicadores" style="display:none"  placeholder="Digite aqui" class="inputUser" required></input>
                        <?php echo $Proteção_Indicadores != "ProteçãoO" ?"<script>Limpar('Txt_Proteção_Indicadores')</script>":"" ?> 
                    </div>
                    <br>
                    <div class="field radiobox">  
                        <label for="Solicitação_Indicadores">Solicitação de:</label><br>
                        <input type="radio" name="Solicitação_Indicadores" id="Temporaria_Indicadores" value="RESIDÊNCIA TEMPORÁRIA" <?php echo $Solicitação_Indicadores == "RESIDÊNCIA TEMPORÁRIA" ?"checked":"" ?>><label for="Temporaria_Indicadores"  required >RESIDÊNCIA TEMPORÁRIA </label>
                        <input type="radio" name="Solicitação_Indicadores" id="Refugiu_Indicadores" value="REFÚGIO" <?php echo $Solicitação_Indicadores == "REFÚGIO" ?"checked":"" ?>><label for="Refugiu_Indicadores"  required>REFÚGIO </label>
                        <input type="radio" name="Solicitação_Indicadores" id="Institucionalização_Indicadores" value="INSTITUCIONALIZAÇÃO" <?php echo $Solicitação_Indicadores == "INSTITUCIONALIZAÇÃO" ?"checked":"" ?> ><label for="Institucionalização_Indicadores"  required>INSTITUCIONALIZAÇÃO </label>
                        <input type="radio" name="Solicitação_Indicadores" id="Ingresso_temporario_Indicadores" value="INGRESSO TEMPORARIO" <?php echo $Solicitação_Indicadores == "INGRESSO TEMPORARIO" ?"checked":"" ?>><label for="Ingresso_temporario_Indicadores"  required>INGRESSO TEMPORARIO </label>
                    </div>   
                    <br>
                        <input type="hidden" name="idSituacao" id="idSituacao" Value="<?php echo $idSituacao ?>">
                        <input type="submit" name="update" id="update">
                </div>

    
                </fieldset>
            </form>
    
        </div>
        <script src="js/jquery-3.6.1.min.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

        <script src="js/script_Update_Situacao.js"></script>
    </body>
    </html>
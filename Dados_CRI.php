<?php

    session_start();
    //error_reporting (0);
    include_once('config.php');
    //print_r($_SESSION);
    if((!isset($_SESSION['e-mail_Defensor']) == true) and (!isset($_SESSION['Telefone_Def']) == true)){

        unset($_SESSION['e-mail_Defensor']);
        unset($_SESSION['Telefone_Def']);
        header('Location: Home.php');

    }$logado = $_SESSION['e-mail_Defensor'];

    $sql = "SELECT * FROM criança_adolecente ORDER BY Documento ASC";
    


    $result = $conexao->query($sql);


    //print_r($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet"  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"  crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <title>Dados Internos</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            text-align: center;
            color: white;
        }  

        .table-bg{
            background-color: rgba(0,0,0,0.3)
            border-radius: 15px 15px 0 0;
        }

        button{
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
        }
        button:hover{
            background-color: dodgerblue;
        }
        
    </style>
    </head>
    <body>
            <nav class="p-3 mb-2 bg-dark text-white">
                <nav class="p-3 mb-2 bg-info text-white">
                    <div class="container-fluid">
                    <img src="SIS-DPU.png" title>
                    <img src="DPU.png" title>
                    <a href="Sair.php">Finalizar Sessão</a>
                    </div>
                </nav>
            </nav>
            
            <div class= "m-5 text-white table-bg">
                <div class= "table-responsive">
                    <table class="table" id="table" name="criança_adolecente">
                        <thead>
                            <tr>

                            <!---Parte 1 da listagem -->
                            <th scope="col">Documento</th>
                            <th scope="col">Nome_Pessoa</th>
                            <th scope="col">Nascimento_Pessoa</th>
                            <th scope="col">gênero_pessoa</th>
                            <th scope="col">Nacionalidade_Pessoa</th>
                            <th scope="col">País_Cid_Pessoa</th>
                            <th scope="col">Escolaridade_Pessoa</th>
                            <th scope="col">Endereco_Antigo_Pessoa</th>
                            <th scope="col">Endereco_Atual_Pessoa</th>
                            <th scope="col">Telefone_Pessoa</th>
                            <th scope="col">e_mail_Pessoa</th>
                            <th scope="col">Passaporte_Pessoa</th>
                            <th scope="col">certidão</th>
                            <th scope="col">Data_de_Cadastro</th>
                            <th scope="col">Text_Residencia_Mae_Pessoa</th>
                            <th scope="col">Text_Residencia_Pai_Pessoa</th>
                            <th scope="col">Status_Criança</th>
                            <th scope="col">Outros Dados</th>
                            <th scope="col">Editar</th>
                            <!---Parte 2 da listagem -->

                            </tr>
                        </thead> 
                        <tbody>

                            <?php
                                while($user_data = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                    echo "<td>" .$user_data['Documento']."</td>";
                                    echo "<td>" .$user_data['Nome']."</td>";
                                    echo "<td>" .$user_data['Data_de_Nascimento']."</td>";
                                    echo "<td>" .$user_data['Genero']."</td>";
                                    echo "<td>" .$user_data['Nacionalidade']."</td>";
                                    echo "<td>" .$user_data['Local_Nasc']."</td>";
                                    echo "<td>" .$user_data['Escolaridade']."</td>";
                                    echo "<td>" .$user_data['Endereço_origem']."</td>";
                                    echo "<td>" .$user_data['Endereço_atual']."</td>";
                                    echo "<td>" .$user_data['Telefone_criança']."</td>";
                                    echo "<td>" .$user_data['Email_Crianca']."</td>";
                                    echo "<td>" .$user_data['Passaporte']."</td>";
                                    echo "<td>" .$user_data['Certidão_de_Nascimento']."</td>";
                                    echo "<td>" .$user_data['Data_de_Cadastro']."</td>";
                                    echo "<td>" .$user_data['Residencia_mae']."</td>";
                                    echo "<td>" .$user_data['Residencia_pai']."</td>";
                                    echo "<td>" .$user_data['Status_Criança']."</td>";
                                    echo "<td>
                                        <a onclick='editardados()' class='btn btn-sm btn btn-primary' href='Edit_CRI_Entrada.php?Documento=$user_data[Documento]'>Entrada
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-view-list' viewBox='0 0 16 16'>
                                                <path d='M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z'/>
                                            </svg>
                                        </a>
                                        <a onclick='editardados()' class='btn btn-sm btn btn-primary' href='Edit_CRI_Situacao.php?Documento=$user_data[Documento]'>SITUAÇÃO
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-view-list' viewBox='0 0 16 16'>
                                                <path d='M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z'/>
                                            </svg>
                                        </a>
                                        <a onclick='editardados()' class='btn btn-sm btn btn-primary' href='Edit_CRI_Medidas.php?Documento=$user_data[Documento]'>MEDIDAS PROTETIVAS
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-view-list' viewBox='0 0 16 16'>
                                                <path d='M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z'/>
                                            </svg>
                                        </a>
                                        <a onclick='editardados()' class='btn btn-sm btn btn-primary' href='Edit_CRI_Avaliacao.php?Documento=$user_data[Documento]'>AVALIAÇÃO PRELIMINAR
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-view-list' viewBox='0 0 16 16'>
                                                <path d='M3 4.5h10a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1H3zM1 2a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 2zm0 12a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13A.5.5 0 0 1 1 14z'/>
                                            </svg>
                                        </a>
                                    </td>";
                                    echo "<td>
                                        <a onclick='editardados()' class='btn btn-sm btn btn-primary' href='Edit_CRI.php?Documento=$user_data[Documento]'>  
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                            </svg>
                                        </a>
                                        <a onclick='alterarestado()' class='btn btn-sm btn btn-danger' href='Delete_CRI.php?Documento=$user_data[Documento]'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                                <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
                                                <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
                                            </svg>
                                        </a>
    
                                    </td>";
                                }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
                
            
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
        <script>
            function alterarestado() {
                alert("Estado do Intérprete(a) 0");
            }
            function editardados() {
                alert("Sendo encaminhado para o local de edição dos dados");
            }
            
            $(document).ready( function () {

                $('#table thead tr')
                    .clone(true)
                    .addClass('filters')
                    .appendTo('#table thead');

                $('#table').DataTable({
                    orderCellsTop: true,
                    fixedHeader: true,
                    initComplete: function () {
                        var api = this.api();
            
                        // For each column
                        api
                            .columns()
                            .eq(0)
                            .each(function (colIdx) {
                                // Set the header cell to contain the input element
                                var cell = $('.filters th').eq(
                                    $(api.column(colIdx).header()).index()
                                );
                                var title = $(cell).text();
                                $(cell).html('<input type="text" autocomplete="off" placeholder="' + title + '" />');
            
                                // On every keypress in this input
                                $(
                                    'input',
                                    $('.filters th').eq($(api.column(colIdx).header()).index())
                                )
                                    .off('keyup change')
                                    .on('change', function (e) {
                                        // Get the search value
                                        $(this).attr('title', $(this).val());
                                        var regexr = '({search})'; //$(this).parents('th').find('select').val();
            
                                        var cursorPosition = this.selectionStart;
                                        // Search the column for that value
                                        api
                                            .column(colIdx)
                                            .search(
                                                this.value != ''
                                                    ? regexr.replace('{search}', '(((' + this.value + ')))')
                                                    : '',
                                                this.value != '',
                                                this.value == ''
                                            )
                                            .draw();
                                    })
                                    .on('keyup', function (e) {
                                        e.stopPropagation();
            
                                        $(this).trigger('change');
                                        $(this)
                                            .focus()[0]
                                            .setSelectionRange(cursorPosition, cursorPosition);
                                    });
                            });
                        },
                });
                
            } );
        </script>
    </head>
    </html> 

    <script>
			function Preencher(el) {
				var display = document.getElementsByName(el).style.display;
				if(display == "none")
					document.getElementsByName(el).style.display = 'block';
			}
            function Sumir(el){
                var display = document.getElementsByName(el).style.display;
				if(display != "none")
					document.getElementsByName(el).style.display = 'none';
            }	
	</script>

<!--
    Index.php para criação do CRUD usado na NAC20 da disciplina SecDevOps
    Duvidas podem ser enviadas para <profhelder.pereira@fiap.com.br>

    Esta app foi adaptada do exemplo contido no artigo abaixo: 
    https://www.tutorialrepublic.com/php-tutorial/php-mysql-crud-application.php

    A estrutura foi criada com base nas seguintes tags:

     * unstable-0.1: Versão de testes SEM conexão com o banco para a primeira parte da NAC;
     * stable-0.1:   Versão COM as linhas de conexão com o banco configuradas, será necessário que o MySQL esteja operante para testes;
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">PHP/MySQL using Containers</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add Data</a>
                    </div>
                    <?php
                    // Adicionando arquivo de config com as info. de conexao com o MySQL:
                    require_once 'config.php';
                    
                    // A versão completa pode ser obtida fazendo o pull da tag "rc-1.0.0"
                    // Para isso execute:
                    //
                    // "git fetch --all --tags --prune"
                    // "git checkout tags/rc-1.0.0 -b <nome-da-nova-branch>
                    //
                    // Remova a linha de comentário abaixo para testar a comunicação com o Banco:

                    $sql = "SELECT * FROM students";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Self Description</th>";
                                        echo "<th>RM</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>" . $row['registration'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Fechando a conexão com o banco:
                    mysqli_close($link);

                    // Remova a linha de comentário abaixo para testar a comunicação com o Banco:
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
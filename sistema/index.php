<?php 
require_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="images/logo-icone.ico" rel="shortcut icon" type="image/x-icon">
    <link href="style/login.css" rel="stylesheet">    
    <title><?php echo $nome_sistema ?></title>
</head>

<body>
    <div class="main">
        <div class="container">
            <center>
                <div class="middle">
                    <div id="login">                        
                        <form action="autenticar.php" method="post">
                            <fieldset class="clearfix">
                                <p><span class="fa fa-user"></span>
                                    <input type="text" name="usuario" Placeholder="Insira seu e-mail" required>
                                </p> <!-- JS because of IE support; better: placeholder="Username" -->
                                <p><span class="fa fa-lock"></span>
                                    <input type="password" name="senha" Placeholder="Insira sua senha" required>
                                </p>
                                <!-- JS because of IE support; better: placeholder="Password" -->
                                <div>                                    
                                    <span style="text-align:right;  display: inline-block;">
                                    <input class="btn btn-success text-center" type="submit" value="Entrar"></span>
                                </div>
                            </fieldset>
                            <div class="clearfix"></div>
                        </form>
                        <div class="clearfix"></div>
                    </div> <!-- end login -->
                    <div class="logo">
                        <img src="images/logo.png" alt="Grupo Padrão">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </center>
        </div>
    </div>
</body>
</html>
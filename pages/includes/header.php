<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>css/style.css">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>fontawesome-free-6.1.1-web/css/all.css">
    <title>REDE JP</title>
</head>
<body>
<base base="<?php echo INCLUDE_PATH; ?>" />
<header>
    <div class="center">
        <div class="logo"><a href="<?php echo INCLUDE_PATH; ?>">REDE JP</a></div>

        <nav>
            <ul>
                <form action="" method="POST">
                    <?php \Controller\HomeController::alertControleLogin(); ?>
                    <li>
                        <label for="">E-Mail:</label>
                        <input type="email" name="email" placeholder="Digite Seu email.."/>
                    </li>
                    <li>
                        <label for="">Senha:</label>
                        <input type="password" name="senha" placeholder="Digite sua senha..."/>
                    </li>
                    <li><input style="cursor:pointer;" type="submit" name="acao_logar_membro" value="Logar"/></li>
                </form>
            </ul>
        </nav>
    </div><!--center-->
</header>
    

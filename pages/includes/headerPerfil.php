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
<header class="perfil-header">
    <div class="center">
        <div class="logo"><a href="<?php echo INCLUDE_PATH; ?>">REDE JP</a></div>

        <nav>
            <ul>
                <?php
                    $solicitacoes = new \Controller\SolicitacoesController;
                    $solicitacoes = $solicitacoes->contarSolicitacoesPendentes()
                ?>
                <li><a href="solicitacoes"> Solicitações(<?php echo $solicitacoes ?>)</a></li>
                <li><a href="comunidade"> Comunidade</a></li>
                <li><a href="?sair_membro"><i class="fa-solid fa-right-from-bracket"></i> Sair</a></li>
            </ul>
        </nav>
    </div><!--center-->
</header><!--perfil-header-->
    
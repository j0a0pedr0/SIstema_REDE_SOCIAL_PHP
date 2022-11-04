<?php 

    include('config.php');
    include('./classes/Site.php'); 
    include('./classes/MySql.php');
    SITE::updateUsuarioOnline(); 
    SITE::contador(); 

    $homeController = new \Controller\HomeController;
    $perfilController = new \Controller\PerfilController;
    $comunidadeController = new \Controller\ComunidadeController;
    $solicitacoesController = new \Controller\SolicitacoesController;
    
    Router::get('/', function() use ($homeController){
       $homeController->index(array('nome'=>'JoãoPedro'));
    });
    Router::get('/me',function() use ($perfilController){
        $perfilController->index();
    });
    Router::get('?/?',function($par) {
    });
    Router::get('/comunidade',function() use ($comunidadeController){
        $comunidadeController->index();
    });
    Router::get('/solicitacoes',function() use ($solicitacoesController){
        $solicitacoesController->index();
    });
    /*
    Router::get('login',function(){
        echo 'login';
    });*/
    



?>
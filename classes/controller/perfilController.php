<?php 

    namespace Controller;

    class PerfilController
    {
        private $perfilModel,$perfilView;

        public function __construct()
        {
            $this->perfilModel = new \Models\PerfilModel;
            $this->perfilView = new \Views\mainViews;
        }
        public function index(){
            if(!isset($_SESSION['login_membro'])){
                \Painel::redirect(INCLUDE_PATH);
                die();
            }
            if(isset($_GET['sair_membro'])){
                session_unset();
                session_destroy();
                \Painel::redirect(INCLUDE_PATH);
                die();
            }
            if(isset($_POST['enviar_post'])){
                $this->perfilModel->postFeed($_POST['mensagem_post']);
            }
            $this->perfilView::render('me.php',[],'pages/includes/headerPerfil.php');
            
        }
    }


?>
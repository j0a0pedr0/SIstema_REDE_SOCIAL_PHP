<?php

    namespace Controller;

    class ComunidadeController
    {
        private $comunidadeModel,$comunidadeView;

        public function __construct()
        {
            $this->comunidadeModel = new \Models\ComunidadeModel;
            $this->comunidadeView = new \Views\mainViews;
        }

        public function index(){
            if(isset($_GET['sair_membro'])){
                session_unset();
                session_destroy();
                \Painel::redirect(INCLUDE_PATH);
                die();
            }

            if(isset($_GET['addFriend'])){
                $idAmigo = $_GET['addFriend'];
                if($this->comunidadeModel->amigoPendente($idAmigo) == false){
                    $this->comunidadeModel->pedidoAmizade($idAmigo);
                    echo '<script>alert("Solicitação enviada com sucesso!!!")</script>';
                }
                \Painel::redirect(INCLUDE_PATH.'comunidade');
            }

            $this->comunidadeView->render('comunidade.php',['controller'=>$this],'pages/includes/headerPerfil.php');
        }

        public static function listarMembrosComunidade(){
            $retorno =  \Models\ComunidadeModel::listarMembros();
            return $retorno;
        }
        public  function amigoPendenteController($idAmigo){
            return $this->comunidadeModel->amigoPendente($idAmigo);
        }
        public function isAmigoController($idAmigo){
            return $this->comunidadeModel->isAmigo($idAmigo);
        }

    }
?>
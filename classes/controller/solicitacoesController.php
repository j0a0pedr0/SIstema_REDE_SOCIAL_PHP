<?php 

    namespace Controller;

    class SolicitacoesController
    {
        private $solicitacoesModel,$solicitacoesView;

        public function __construct()
        {
            $this->solicitacoesModel = new \Models\SolicitacoesModel;
            $this->solicitacoesView = new \Views\mainViews;
        }

        public function index(){
            if(isset($_GET['aceitar'])){
                $this->solicitacoesModel->aceitarSolicitacao($_GET['aceitar']);
            }else if(isset($_GET['rejeitar'])){
                $this->solicitacoesModel->rejeitarSolicitacao($_GET['rejeitar']);
            }
            $this->solicitacoesView::render('solicitacoes.php',['controller'=>$this],'pages/includes/headerPerfil.php');
        }

        public function listarSolicitacoes(){
            return $this->solicitacoesModel->getSolicitacoesPendentes($_SESSION['Id_membro']);
        }
        public function contarSolicitacoesPendentes(){
            return count($this->listarSolicitacoes());
        }
    }
?>
<?php

    namespace Controller;
    use \views\mainViews;
    Class HomeController
    {
        private $homeModel,$homeView;
        static $retorno;
        static $retornoLogin;

        public function __construct(){
           $this->homeModel = new \Models\HomeModel;
            $this->homeView = new \Views\mainViews;

        }
        
        public function index($data){
            
            if(isset($_SESSION['login_membro'])){
                \Painel::redirect(INCLUDE_PATH.'me');
            }

            if(isset($_POST['acao_cadastrar_membro'])){
                SELF::$retorno = $this->homeModel->cadastrarMembro($_POST,$_FILES);
            }
            if(isset($_POST['acao_logar_membro'])){
                SELF::$retornoLogin = $this->homeModel->logarMembro($_POST);
            }    

            \Views\mainViews::render('home.php',$data);
        }

        public static function alertControle(){
            if(isset($_POST['acao_cadastrar_membro'])){
                if(HomeController::$retorno['tipo'] == '1'){
                    \Painel::alert('erro','Preencha os campos vázios');
                }else if(HomeController::$retorno['tipo'] == '2'){
                    \Painel::alert('erro','Imagem Inválida (SELECIONE DO TIPO: JPEG - JPG - PNJ');
                }else if(HomeController::$retorno['tipo'] == '3'){
                    \Painel::alert('erro','Problema no sistema, Por favor reporte ao suporte!');
                }else if(HomeController::$retorno['status'] == 'true'){
                    \Painel::alert('sucesso','Usuário cadastrado com sucesso!!!');
                }else if(HomeController::$retorno['tipo'] == '4'){
                    \Painel::alert('erro','Já existe um Usuário cadastrado com esse email!!!');
                }else if(HomeController::$retorno['tipo'] == '5'){
                    \Painel::alert('erro','O E-mail Inserido é inválido!!!');
                }
            }
        }

        public static function alertControleLogin(){
            if(isset($_POST['acao_logar_membro'])){
                if(SELF::$retornoLogin == false){
                    \Painel::alert('erro','Senha ou Login estão Incorretos!!!','margin-top:90px;z-index:8;');
                }else{
                    
                }
            }
        }
    }


?>
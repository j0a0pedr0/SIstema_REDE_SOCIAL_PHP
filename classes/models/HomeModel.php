<?php

    namespace Models;

use Painel;

    Class HomeModel extends Painel
    {
        public static function uploadArquivo($file){
            $arquivoFile = explode('.',$file['name']);
            $nomeImagem = uniqid().'.'.$arquivoFile[1];
            if(move_uploaded_file($file['tmp_name'],INCLUDE_PATH_UPLOAD.'/'.$nomeImagem)){
                return $nomeImagem;
            }else{
                return false;
            }

        }

        public function cadastrarMembro($dadosUsuario,$imagemPerfil){
            $nome = $dadosUsuario['nome'];
            $email = $dadosUsuario['email'];
            $senha = $dadosUsuario['senha'];
            $imagemPerfil = $imagemPerfil['imagem'];
            $retorno = [];
            $retorno['status'] = 'true';
            $retorno['tipo'] = '';

            $verificaEmailValidate = filter_var($email,FILTER_VALIDATE_EMAIL);
            if($verificaEmailValidate == false){
                $retorno['tipo'] = '5';
                $retorno['status'] = 'false';
                return $retorno;
                die();
            }else{
                $verificaEmail = \Mysql::conectar()->prepare("SELECT email FROM `tb_redesocial.membros` WHERE email=?");
                $verificaEmail->execute(array($email));
                if($verificaEmail->rowCount() > 0){
                    $retorno['tipo'] = '4';
                    $retorno['status'] = 'false';
                    return $retorno;
                    die();
                }
            }
            if($nome == '' || $email == '' || $senha == ''){
                $retorno['tipo'] = '1';
                $retorno['status'] = 'false';
                return $retorno;
                die();
            }
            if(Painel::imagemValida($imagemPerfil) == false){
                $retorno['tipo'] = '2';
                $retorno['status'] = 'false';
                return $retorno;
                die();
            }
            if($retorno['status'] == 'true'){
                $imagemPerfilValida = SELF::uploadArquivo($imagemPerfil);
                $sql = \Mysql::conectar()->prepare("INSERT INTO `tb_redesocial.membros` VALUES (null,?,?,?,?)");
                $sql->execute(array($nome,$email,$senha,$imagemPerfilValida));
            }
            return $retorno;
        }

        public function logarMembro($dadosMembro){
            $email = $dadosMembro['email'];
            $senha = $dadosMembro['senha'];
            $retorno = [];
            $retorno['status'] = 'true';
            $retorno['tipo'] = '';
            $sql = \Mysql::conectar()->prepare("SELECT * FROM `tb_redesocial.membros` WHERE email=? AND senha=?");
            $sql->execute(array($email,$senha));
            if($sql->rowCount() == 1){
                $membroInfo = $sql->fetch();
                $_SESSION['nome_membro'] = $membroInfo['nome'];
                $_SESSION['imagem_membro'] = $membroInfo['imagem'];
                $_SESSION['Id_membro'] = $membroInfo['id'];
                $_SESSION['login_membro'] = $membroInfo['email'];
                \Painel::redirect(INCLUDE_PATH.'me');
                return true;
                die();
            }else{
                return false;
                die();
            }
        }

    }


?>
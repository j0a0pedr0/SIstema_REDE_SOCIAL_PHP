<?php

    namespace Models;

    class PerfilModel
    {
        public function postFeed($dados){
            $mensagem = strip_tags($dados);
            if($mensagem == ''){
                echo '<script>alert("Sua mensagem não pode ser vázia");</script>';
            }else{
                $sql = \Mysql::conectar()->prepare("INSERT INTO `tb_redesocial.feed` VALUES (null,?,?)");
                $sql->execute(array($_SESSION['Id_membro'],$mensagem));
                echo '<script>alert("Mensagem postada com sucesso!!!");</script>';
            }
        }

        public static function listarPosts(){
            $sql = \Mysql::conectar()->prepare("SELECT * FROM `tb_redesocial.feed` ORDER BY id DESC");
            $sql->execute();
            return $sql->fetchAll();
        }
    }
?>
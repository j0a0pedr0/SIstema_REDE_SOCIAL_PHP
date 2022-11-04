<?php

    namespace Models;

    class ComunidadeModel
    {
        public static function listarMembros(){
            $sql = \Mysql::conectar()->prepare("SELECT * FROM `tb_redesocial.membros`");
            $sql->execute();
            return $sql->fetchAll();
        }

        public function pedidoAmizade($idAmigo){
            $idAmigoNew = $idAmigo;
            $idUsuario = $_SESSION['Id_membro'];
            $sql = \Mysql::conectar()->prepare("INSERT INTO `tb_redesocial.solicitacoes` VALUES (null,?,?,0)");
            $sql->execute(array($idAmigoNew,$idUsuario));
        }

        public function amigoPendente($idAmigo){
            $idAmigoNew = $idAmigo;
            $idUsuario = $_SESSION['Id_membro'];
            $sql = \Mysql::conectar()->prepare("SELECT * FROM `tb_redesocial.solicitacoes` WHERE (id_from=? AND id_to=? AND status=0) OR (id_from=? AND id_to=? AND status=0)");
            $sql->execute(array($idAmigoNew,$idUsuario,$idUsuario,$idAmigoNew));
            if($sql->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }
        public function isAmigo($idAmigo){
            $sql = \Mysql::conectar()->prepare("SELECT * FROM `tb_redesocial.solicitacoes` WHERE (id_from = ? AND id_to =? AND status = 1) OR (id_from = ? AND id_to =? AND status = 1)");
            $sql->execute(array($_SESSION['Id_membro'],$idAmigo,$idAmigo,$_SESSION['Id_membro']));
            if($sql->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }
    }
?>
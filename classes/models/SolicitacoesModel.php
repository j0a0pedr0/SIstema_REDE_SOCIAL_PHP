<?php

    namespace Models;

    class SolicitacoesModel
    {
        public function getSolicitacoesPendentes($id_user){
            $sql = \Mysql::conectar()->prepare("SELECT * FROM `tb_redesocial.solicitacoes` WHERE id_from=? AND status=0");
            $sql->execute(array($id_user));
            return $sql->fetchAll();
        }

        public function aceitarSolicitacao($id_toSolicitacao){
            $id_toSolicitacao = (int)$_GET['aceitar'];
            $sql = \Mysql::conectar()->prepare("UPDATE `tb_redesocial.solicitacoes` SET status=1 WHERE id_to=? AND id_from =?");
            $sql->execute(array($id_toSolicitacao,$_SESSION['Id_membro']));
        }

        public function rejeitarSolicitacao($id_toSolicitacao){
            $id_toSolicitacao = (int)$_GET['rejeitar'];
            $sql = \Mysql::conectar()->prepare("DELETE FROM `tb_redesocial.solicitacoes` WHERE id_to=? AND id_from =?");
            $sql->execute(array($id_toSolicitacao,$_SESSION['Id_membro']));
        }
    }
?>
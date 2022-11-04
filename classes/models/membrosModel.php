<?php

    namespace Models;

    class membrosModel
    {
        public static function membrosGetListById($id){
            $sql = \Mysql::conectar()->prepare("SELECT * FROM `tb_redesocial.membros` WHERE id=?");
            $sql->execute(array($id));
            return $sql->fetch();
        }

        public static function listarAmigos(){
            $sql = \Mysql::Conectar()->prepare("SELECT * FROM `tb_redesocial.solicitacoes` WHERE (id_to=? AND status=1) OR (id_from=? AND status=1)");
            $sql->execute(array($_SESSION['Id_membro'],$_SESSION['Id_membro']));
            $sql = $sql->fetchAll();
            $arr = [];
            $idMembro = $_SESSION['Id_membro'];
            foreach($sql as $membros){
                if($membros['id_from'] == $idMembro){
                    $arr[] = $membros['id_to'];
                }else{
                    $arr[] = $membros['id_from'];
                }
            }
            return $arr;
        }
    }
?>
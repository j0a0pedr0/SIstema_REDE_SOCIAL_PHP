<section class="solicitacoes">
    <div class="center">
        <div class="w100" style="text-align: center;"><h2 class="title-h2">Solicitações Pendentes</h2></div>
        <table class="w100">
        <?php
            $solicitacoes = $arr['controller']->listarSolicitacoes();
            foreach($solicitacoes as $key => $value){
                $membros =  \Models\membrosModel::membrosGetListById($value['id_to']);
        ?>
                <tr>
                    <td>
                        <div class="img-membro-solicitacao" style="background-image:url('pages/uploads/<?php echo $membros['imagem'] ?>')"></div>
                        <p><?php echo $membros['nome']; ?></p>
                    </td>
                    <td>
                        <div class="w100" style="text-align:center;"><a href="<?php echo INCLUDE_PATH; ?>solicitacoes?aceitar=<?php echo $value['id_to'] ?>" class="aceitar">Aceitar</a></div>
                        <div class="w100" style="text-align:center;"><a href="<?php echo INCLUDE_PATH; ?>solicitacoes?rejeitar=<?php echo $value['id_to'] ?>" class="rejeitar" >Rejeitar</a></div>
                    </td>
                </tr>
        <?php } ?>

        </table>
    </div>
</section>

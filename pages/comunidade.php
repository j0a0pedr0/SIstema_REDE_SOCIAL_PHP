<section class="comunidade">
    <div class="center">
        <div class="w100" style="text-align: center;"><h2 class="title-h2">Comunidade</h2></div>
        <div class="listagem-comunidade w100">
            <?php foreach(\Controller\ComunidadeController::listarMembrosComunidade() as $key => $value){
                    if($value['id'] == $_SESSION['Id_membro'])
                        continue
                ?>
                
                <div class="membro-listagem">
                    <div class="w100"><div class="img-membro-comunidade" style="background-image:url('pages/uploads/<?php echo $value['imagem']; ?>')"></div></div>
                    <p><i class="fa fa-user"></i> <?php echo $value['nome'] ?></p>
                    <br>
                    <?php 
                        if($arr['controller']->isAmigoController($value['id'])){
                    ?>
                        <div class="w100" style="text-align:center;"><a href="javascript:void(0)" style="padding:5px 8px;color:white;background-color:green;text-align:center;">Amigo(a)</a></div>
                    <?php }else if($arr['controller']->amigoPendenteController($value['id']) == false){ ?>
                        <div class="w100" style="text-align:center;"><a href="<?php echo INCLUDE_PATH; ?>comunidade?addFriend=<?php echo $value['id']; ?>">Adicionar como amigo+</a></div>
                    <?php }else{ ?>
                        <div class="w100" style="opacity:0.5;cursor:inherit;"><a href="javascript:void(0);" style="background-color:gray;color:black;">Solicitação Pendente</a></div>
                    <?php } ?>
                </div><!--membro-listagem-->
            <?php } ?>
        </div><!--listagem-comunidade-->
    </div><!--center-->
</section><!--comunidade-->
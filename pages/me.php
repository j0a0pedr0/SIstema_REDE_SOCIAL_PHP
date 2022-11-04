
<div class="center">
    <section class="perfil">
        <div class="container-wrap-perfil w100">
            <div class="container-perfil">
                <div class="container-perfil-scrol">
                    <h3 class="title-h2">Bem-Vindo :<?php echo $_SESSION['nome_membro']; ?></h3>
                    <div  style="background-image: url('pages/uploads/<?php echo $_SESSION['imagem_membro'] ?>');" class="img-membro"></div>
                    <div class="lista-amizades">
                        <?php $amigos = \Models\membrosModel::listarAmigos(); ?>
                        <h4 class="title-h2"><i class="fa-solid fa-users"></i> Lista de Amigos(<?php echo count($amigos); ?>)</h4>
                        <div class="lista-amigos-wrap">
                            <?php foreach($amigos as $key => $value){ 
                                $amigoSingle = \Models\membrosModel::membrosGetListById($value);
                                ?>
                                <div class="lista-amigos-single w33">
                                    <div class="amigo-single-image">
                                        <div class="amigo-image" style="background-image:url('pages/uploads/<?php echo $amigoSingle['imagem'] ?>')"></div>
                                        <p><?php echo substr($amigoSingle['nome'],0,15); ?></p>
                                    </div>
                                </div><!--lista-amigos-single-->
                            <?php } ?>
                            
                        </div><!--lista-amigos-wrap-->
                    </div><!--lista-amizades-->
                </div><!--container-perfil-scrol-->
            </div><!--container-perfil-->
        </div><!--container-wrap-perfil-->
    </section><!--perfil-->

    <section class="feed">
        <div class="container">
            <h3 class="title-h2">O que está pensando agora?</h3>
            <form method="POST">
                <textarea name="mensagem_post" placeholder="Sua mensagem..."></textarea>
                <input type="submit" name="enviar_post" value="Enviar"/>
            </form>
            <?php foreach(\Models\PerfilModel::listarPosts() as $key => $value){ 
                    $membro = \Models\membrosModel::membrosGetListById($value['membro_id']);
                ?>
                <div class="post-single-user">
                    <div class="img-user-post">
                        <div class="img-autor-post" style="background-image:url('pages/uploads/<?php echo $membro['imagem']; ?>')"></div>
                    </div><!--img-user-post-->
                    <div class="autor-post">
                        <h4 class="w100"><?php echo $membro['nome']; ?></h4>
                        <p class="w100"><?php echo $value['post']; ?></p>
                    </div><!--autor-post-->
                </div><!--post-single-user-->
            <?php } ?>
        </div>
    </section><!--feed-->

</div><!--center-->
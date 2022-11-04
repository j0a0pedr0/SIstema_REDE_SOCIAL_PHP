<div class="box-login w100">

    <form action="" method="POST" enctype="multipart/form-data">
        <?php \Controller\HomeController::alertControle(); ?>
        <h2>Efetuar Cadastro</h2>
        <div class="form-group">
            <label for="">Nome:</label>
            <input type="text" name="nome" placeholder="Digite Seu Nome">
        </div><!--form-group-->
        <div class="form-group">
            <label for="">E-Mail</label>
            <input type="text" name="email" placeholder="Digite Seu E-Mail..."/>
        </div><!--form-group-->
        <div class="form-group">
            <label for="">Senha:</label>
            <input type="password" name="senha" placeholder="Digite Seu Senha..."/>
        </div><!--form-group-->

        <div class="form-group">
            <label for="">Escolha sua foto de Perfil:</label>
            <input type="file" name="imagem"/>
        </div><!--form-group-->
        
        <div class="form-group">
            <input type="submit" name="acao_cadastrar_membro" value="Cadastrar">
        </div><!--form-group-->
    </form>
</div><!--box-login-->
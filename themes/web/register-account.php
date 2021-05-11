<?php $v->insert("_theme"); ?>
<div class="box">
    <article class="box_article_content">
        <div class="box_article_content_container">
            <header>
                <h1>Cadastre-se</h1>
            </header>
            <form action="<?= url("/cadastrar") ?>" class="box_article_content_container_form" method="POST" enctype="multipart/form-data">
                <div class="ajax_response"><?= flash(); ?></div>
                <?= csrf_input(); ?>
                <input type="text" name="first_name"  placeholder="Digite seu primeiro nome">
                <input type="text" name="last_name"  placeholder="Digite seu nome do meio">
                <input type="email" name="mail"  placeholder="Informe um Email">
                <input type="password" name="password"  placeholder="Informe uma Senha">
                <button class="form_btn icon-checkmark recovery">
                    Cadastrar
                </button>
            </form>
            <p>Já tem uma conta? <a title="Fazer login!" href="<?= url("/"); ?>">Fazer login!</a></p>
        </div>
    </article>
</div>


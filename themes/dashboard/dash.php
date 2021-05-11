<?php $v->layout("_theme"); ?>
<section class="imagem_section_content">
    <header class="server_content">
        <h1 class="icon-home">Jogo - sorteio</h1>
    </header>
    <?php if (empty($prize_draw)) : ?>
        <div class="prize-draw-group">
            <article class="prize-draw--article group">
                <header class="prize-draw--article-heade">
                    <h1>Cadastrar um usuários</h1>
                    <span class="icon-ticket"></span>
                </header>
                <a href="<?= url("/app/register-user") ?>" class="btn btn-blue icon-checkmark">Cadastrar Grupo</a>
            </article>
        </div>
        <div class="prize-draw-user">
            <article class="prize-draw--article">
                <header class="prize-draw--article-heade">
                    <h1>Cadastrar um usuários</h1>
                    <span class="icon-address-book"></span>
                </header>
                <a href="<?= url("/app/register-user") ?>" class="btn btn-blue icon-checkmark">Cadastrar usuários</a>
            </article>
        </div>
        <div class="prize-draw-user">
            <article class="prize-draw--article">
                <header class="prize-draw--article-heade">
                    <h1>Comprar produtos</h1>
                    <span class="icon-address-book"></span>
                </header>
                <button class="btn btn-blue icon-checkmark">Cadastrar usuários</button>
            </article>
        </div>
    <?php endif; ?>


    <table class="table_server" style="text-align: center">
        <tr>
            <th style="text-align: center" class="icon-location">Id</th>
            <th style="text-align: center" class="icon-hour-glass">Valor da nota</th>
            <th style="text-align: center" class="icon-hour-glass">total de notas disponíveis</th>
        </tr>
        <?php if (!empty($withdraw)) : ?>
            <?php foreach ($withdraw as $note) : ?>
                <tr>
                    <td class="color-setup-mg"><?= $note->id ?></td>
                    <td class="color-setup-mg"><?= $note->value ?></td>
                    <td class="color-setup-mg"><?= $note->total_note ?></td>
                </tr>
            <?php endforeach; ?>

        <?php endif ?>


    </table>
</section>
</div>

</body>

</html>
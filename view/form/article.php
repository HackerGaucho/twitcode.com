<section class="hide" id="formArticle">
    <form method="post" action="<?php print SITE_URL;?>/articles">
        <label for="message">
            <a href="javascript:showFormMessage();"><?php __('Mensagem');?></a>
        </label>
        /
        <label for="articleMessage"><?php __('Título');?></label><br>
        <input type="text" name="message" id="articleMessage"><br>
        <label for="article"><?php __('Artigo');?></label><br>
        <textarea rows="9" name="article" id="article"></textarea><br>
        <button type="submit"><?php __('Enviar');?></button>
    </form>
</section>

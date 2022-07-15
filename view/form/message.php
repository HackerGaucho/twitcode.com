<section id="formMessage">
    <form method="post" action="<?php print SITE_URL;?>/messages">
        <label for="message"><?php __('Mensagem');?></label>
        /
        <label for="articleMessage">
            <a href="javascript:showFormArticle();"><?php __('Artigo');?></a>
        </label>
        <br>
        <textarea rows="3" name="message" id="message"></textarea><br>
        <button type="submit"><?php __('Enviar');?></button>
    </form>
</section>

<form method="post" action="article" class="hide" id="formArticle">
    <label for="message">
        <a href="javascript:void();" onclick="showFormMessage();"><?php __('Mensagem');?></a>
    </label>
    /
    <label for="article"><?php __('Artigo');?></label><br>
    <textarea cols="50" rows="9" name="article" id="article"></textarea><br>
    <button type="submit"><?php __('Enviar');?></button>
</form>

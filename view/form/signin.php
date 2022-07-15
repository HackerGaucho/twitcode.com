<section id="formSignin">
    <form action="<?php print SITE_URL;?>/signin" method="post">
        <h2>
            <?php __('Entrar');?>
        </h2>
        <label for="email">
            <?php __('Email');?>
        </label><br>
        <input type="email" name="email" id="email" minlength="6" maxlength="64" required="required"><br>
        <label for="password">
            <?php __("Senha");?>
        </label><br>
        <input type="password" name="password" id="password" minlength="8" maxlength="256" required="required"><br>
        <button type="submit">
            <?php __('Entrar');?>
        </button>
    </form>
    <p>
        <a href="javascript:showFormSignup();"><?php __('Criar conta');?></a>
    </p>
</section>

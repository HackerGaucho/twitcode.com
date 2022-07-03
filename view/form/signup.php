<form action="<?php print SITE_URL;?>/signup" method="post">
    <h2>
        <?php __('Criar conta');?>
    </h2>
    <label for="name">
        <?php __('Nome');?>
    </label><br>
    <input type="text" name="name" id="name"><br>
    <label for="email">
        <?php __('Email');?>
    </label><br>
    <input type="email" name="email" id="email"><br>
    <label for="password">
        <?php __("Senha");?>
    </label><br>
    <input type="password" name="password" id="password"><br>
    <button type="submit">
        <?php __('Criar conta');?>
    </button>
</form>

<?php
$title=__('Erro', false);
view('inc/header', ['title'=>$title]);
?>
<div class="container">
    <main class="feed">
        <h1><?php __('Erro');?>
        </h1>
        <?php
        function errorMsg($errorCode)
        {
            $msg=null;
            switch ($errorCode) {
                case 'invalidArticle':
                    $msg=__('Artigo inválido', false);
                    break;
                case 'invalidEmail':
                    $msg=__('Email inválido', false);
                    break;
                case 'invalidMessage':
                    $msg=__('Mensagem inválida', false);
                    break;
                case 'invalidName':
                    $msg=__('Nome inválido', false);
                    break;
                case 'invalidPassword':
                    $msg=__('Senha inválida', false);
                    break;
                default:
                    $msg=__('Erro desconhecido', false);
                    break;
            }
            return $msg;
        }
        if (is_array($error)) {
            if (count($error)>1) {
                print '<ul>';
                foreach ($error as $errorCode) {
                    print '<li>';
                    print errorMsg($errorCode);
                    print '</li>';
                }
                print '</ul>';
            } else {
                print '<p>';
                print errorMsg($error[0]);
                print '</p>';
            }
        }
        ?>
        <p>
            <a href="javascript:history.back(-1);">
                <?php __("Voltar");?>
            </a>
        </p>
    </main>
</div>

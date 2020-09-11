<?php ob_start(); ?>

    <div id="page-connection">
        <section class="content">
           <div class="connection">PAGE DE CONNEXION</div>
           <a href="presence">Entrer</a>
        </section>
    </div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

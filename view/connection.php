<?php ob_start(); ?>

    <div id="page-connection">
        <section class="content">
           <div class="connection">PAGE DE CONECTION</div>
           <a href="presence">Next</a>
        </section>
    </div>
    
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

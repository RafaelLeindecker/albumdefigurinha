<?php 
require_once('inc/header.php'); 
require_once('inc/usuario.php');
?>  

<div class="container">

    <div class="starter-template">
    	<?php if($usuario->usuarioLogado()): ?>
    	<p class="pull-right"><?php echo $_SESSION['usuario_name'] . " " . $_SESSION['usuario_surname']; ?><br><small>(<?php echo $_SESSION['usuario_email']; ?>)</small></p>
    	<?php endif; ?>
        <h1>Bem vindo ao Álbum da Copa</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
    </div>

</div><!-- /.container -->

<?php require_once('inc/footer.php'); ?>

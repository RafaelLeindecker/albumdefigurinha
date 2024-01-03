<?php 
require_once('inc/header.php'); 
require_once('inc/usuario.php');
require_once('inc/album.php');
if($usuario->usuarioLogado()):
?>  
<div class="container">
    <div class="starter-template">        
        <p class="pull-right"><?php echo $_SESSION['usuario_name'] . " " . $_SESSION['usuario_surname']; ?><br><small>(<?php echo $_SESSION['usuario_email']; ?>)</small></p>
        <h1>Meu álbum</h1>

        <div id="album">

        	<div id="time1" class="time">
        		
        		<div class="figurinha pull-left">
        			<?php 
        			$album = new Album();
        			$colecao=$album->obterColecao(9);	
        			foreach ($colecao as $item){
        				
						print('<img src='.$item->getUrl().'/>');
        				print('<div class="titulo">'.$item->getLabel().'</div>');			
					}
        			        			
        			?>
        		</div><!-- .figurinha -->


        		<div class="clearfix"></div>
        	</div><!-- .time -->

        	<div id="time2" class="time">
        		
        		<div class="figurinha pull-left">
        			<img src="http://www.placehold.it/200x250" />
        			<div class="titulo">nome do jogador</div>
        		</div><!-- .figurinha -->

        		<div class="clearfix"></div>
        	</div><!-- .time -->

        </div>

    </div>
</div><!-- /.container -->
<?php 
else: 
	require_once('inc/login_fail.php');
endif; //login check 

require_once('inc/footer.php'); 
?>

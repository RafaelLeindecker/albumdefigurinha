<?php 
/**
 *  Album usuário (view)
 *
 *  @todo Listar albuns por time
 *
 */
require_once('inc/header.php'); 
require_once('inc/usuario.php');
require_once('inc/album.php');

if($usuario->usuarioLogado()):
?>  
<div class="container" style="margin-top: 50px;">
    <div class="starter-template">        
        <p class="pull-right"><?php echo $_SESSION['usuario_name'] . " " . $_SESSION['usuario_surname']; ?><br><small>(<?php echo $_SESSION['usuario_email']; ?>)</small></p>
        <h1>Meu álbum</h1>

        <div id="album">
            <?php                 
                $album = new Album();
                $colecao = $album->obterColecaoTime( $usuario->getID(), 1 );

                if ($colecao):
                    foreach ($colecao as $item):
            ?>
        	<div id="<?php echo $item['time_nome'] ?>" class="time"> 
            <?php 
                        echo "<h3>" . $item['time_nome'] . "</h3>"; 
                        
                        $indice = 0;
                        $figurinhas=$item['figurinhas'];
                			 
                		foreach ($figurinhas as $figurinha):
            ?>
                <div id="figurinha<?php echo $indice; ?>" class="figurinha pull-left" style="margin-right:10px">
                    <img src="<?php echo 'img/' . $figurinha['img_url']; ?>" width="200" height="300" />
                    <div class="titulo"><?php echo $figurinha['label']; ?></div>
                </div><!-- .figurinha -->                
            <?php
                            $indice++;
                        endforeach;                                         
                ?>      			
                <div class="clearfix"></div>
            <?php 
                    endforeach;
                else:
            ?>
            <h3>
                Você ainda não tem nenhuma figurinha no seu Álbum.<br>
                <small>Que tal começar respondendo uma <a href="#">pergunta</a>?</small>
            </h3>



            <?php endif; ?>

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

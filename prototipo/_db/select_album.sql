select figurinha.id, img_url, posicao, id_time from album 
inner join figurinha on album.id_figurinha = figurinha.id
where album.id_usuario=9;
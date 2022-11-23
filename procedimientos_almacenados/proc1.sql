CREATE OR REPLACE FUNCTION

proc_artistas(nombre_artista varchar(100))

RETURNS BOOLEAN AS $$

BEGIN
    insert into usuarios(nombre_usuario, contrasena, tipo) values('hola', '123456', 'artista');
    RETURN TRUE;

END
$$ language plpgsql
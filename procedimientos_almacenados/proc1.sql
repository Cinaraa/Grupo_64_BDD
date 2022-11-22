CREATE OR REPLACE FUNCTION

proc_artistas(nombre_artista varchar(100))

RETURNS BOOLEAN AS $$

DECLARE
contrasena str;


BEGIN

    PERFORM setseed(65);

    SELECT REPLACE(nombre_artista, ' ', '_')
    SELECT LOWER(nombre_artista)

    IF nombre_artista IN (SELECT nombre_usuario FROM usuarios) THEN
        RETURN FALSE;
    END IF;

    SELECT into contrasena
    floor(random()*999999-100000+1)+100000;

    -- obtenido desde: https://donnierock.com/2020/12/02/sql-server-generar-un-numero-aleatorio-entre-dos-valores/
    insert into usuarios(nombre_usuario, contrasena, tipo) values('hola', '123456', 'artista')
    insert into usuarios (nombre_usuario, contrasena, tipo) values(nombre_artista, contrasena, 'artista');
    
    RETURN TRUE;

END
$$ language plpgsql
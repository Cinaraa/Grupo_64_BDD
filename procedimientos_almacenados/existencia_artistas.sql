CREATE OR REPLACE FUNCTION

proc_artistas ()

RETURNS BOOLEAN AS $$

DECLARE
contrasena str;
artista RECORD;

BEGIN

    PERFORM setseed(1);

    FOR artista IN (SELECT * FROM artistas)

    LOOP

        SELECT LOWER(REPLACE(artista.nombre_artista, ' ', '_'))
        IF artista.nombre_artista IN (SELECT nombre_usuario FROM usuarios) THEN
            RETURN FALSE;
        END IF;

        SELECT into contrasena
        floor(rand()*999999-100000+1)+100000;

        -- obtenido desde: https://donnierock.com/2020/12/02/sql-server-generar-un-numero-aleatorio-entre-dos-valores/

        insert into usuarios (username, contrasena, tipo) values(artistas.nombre_artista, contrasena, 'artista');
    
    END LOOP;
    RETURN TRUE;

END
$$ language plpgsql
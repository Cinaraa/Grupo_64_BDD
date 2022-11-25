CREATE OR REPLACE FUNCTION

existencia_artistas()

RETURNS BOOLEAN AS $$

DECLARE
contrasena varchar(15);
artista RECORD;
nombre varchar(100);

BEGIN

    FOR artista IN (SELECT * FROM grupo65e3.artistas)

    LOOP

        -- SELECT INTO nombre (REPLACE(artista.nombre_artista, ' ', '_')) FROM artista;
        IF artista.nombre_artista IN (SELECT nombre_usuario FROM grupo65e3.usuarios) THEN
            RETURN FALSE;
        END IF;

        SELECT into contrasena
        floor(random()*999999-100000+1)+100000;

        -- obtenido desde: https://donnierock.com/2020/12/02/sql-server-generar-un-numero-aleatorio-entre-dos-valores/
        insert into grupo65e3.usuarios(nombre_usuario, contrasena, tipo) values(artista.nombre_artista, contrasena, 'artista');
    
    END LOOP;
    RETURN TRUE;

END
$$ language plpgsql
CREATE OR REPLACE FUNCTION

existencia_productora ()

RETURNS BOOLEAN AS $$

DECLARE
contrasena int;
productoras RECORD;
nombre_prod str;

BEGIN

    PERFORM setseed(1);

    FOR productora IN (SELECT * FROM productoras)

    LOOP

        SELECT LOWER(REPLACE(productora.nombreproductora, ' - ','_'))
        SELECT LOWER(REPLACE(productora.nombreproductora, '. ',' '))
        SELECT LOWER(REPLACE(productora.nombreproductora, ' .',' '))
        SELECT LOWER(REPLACE(productora.nombreproductora, ' ','_'))

        IF productora.nombre_productora IN (SELECT nombre_usuario FROM usuarios) THEN
            RETURN FALSE;
        END IF;

        SELECT into nombre_prod
        CONCAT(productora.nombreproductora, '_', productora.pais);


        SELECT into contrasena
        floor(rand()*(999999-100000+1))+100000;

        -- obtenido desde: https://donnierock.com/2020/12/02/sql-server-generar-un-numero-aleatorio-entre-dos-valores/
        insert into usuarios (nombre_usuario, contrasena, tipo) values(productora.nombre_productora, contrasena, 'productora');

    END LOOP;
    RETURN TRUE;

END
$$ language plpgsql

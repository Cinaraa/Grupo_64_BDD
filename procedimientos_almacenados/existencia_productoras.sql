-- usuarios(id, username, contrasena, tipo)

CREATE OR REPLACE FUNCTION

-- le entregamos el codigo de la compañía
existencia_productora ()

-- devuelve false si no creo el usuario y true de lo contrario
RETURNS BOOLEAN AS $$

DECLARE
contrasena int;
productoras RECORD;

BEGIN

    PERFORM setseed(1);

    FOR productora IN (SELECT * FROM productoras)

    LOOP
        -- verificamos que no exista
        IF compania.codigo_compania IN (SELECT username FROM usuarios) THEN
            RETURN FALSE;
        END IF;

        -- creamos una contraseña aleatoria de 4 dígitos
        SELECT into contrasena
        floor(random()*(9999-1000+1))+1000;

        -- insertamos la tupla en la tabla
        insert into usuarios (username, contrasena, tipo) values(compania.codigo_compania, contrasena, 'compania aerea');
    
    END LOOP;
    RETURN TRUE;

END
$$ language plpgsql
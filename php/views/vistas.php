<?php
    // Mostrar tabla datos.
    function mostrar_tabla_resultado($tabla_filtrada) {
        echo ('<p>N&uacute;mero de filas = ' . count($tabla_filtrada) . '</p>');
            
        // Imprimimos la cabecera de la tabla
        echo ('<table><tr><th>LOCAL</th><th>MARCADOR</th><th>VISITANTE</th><th>TEMPORADA</th></tr>');
        
        // Recorremos el resultado y se imprime.
        foreach ($tabla_filtrada as $partido) {
            
            echo ('<tr>');
            echo('<td>' . $partido['equipo_local'] . '</td>');
            echo('<td>' . $partido['puntos_local'] . ' - ' . $partido['puntos_visitante'] . '</td>');       
            echo('<td>' . $partido['equipo_visitante'] . '</td>');
            echo('<td>' . $partido['temporada'] . '</td>');
            echo ('</tr>'); 
        };

        // Imprimimos el cierre de la tabla.
        echo('</table>');
    };


    // Función para mostrar el select desplegable.
    function mostrarSelect($items, $id, $seleccionado) {                          
        
        // Si hemos obtenido resultados de la consulta a la BBDD continuamos.
        if ($items != null) {
            // Comprobamos que select estamos llenando para mostrar mensajes personalizados.
            if ($id === 'equipo_local') {
                $text = 'un equipo local';
            } elseif ($id ==='equipo_visitante') {
                $text = 'un equipo visitante';
            } elseif ($id ==='temporada') {
                $text = 'una temporada';
            } elseif ($id ==='conferencia') {
                $text = 'una conferencia';
            } elseif ($id ==='division') {
                $text = 'una division';
            };

            
            // Creamos el Select
            echo('<select name="'. $id .'" id="'. $id .'" required>');

            // Elegimos que opción aparece por defecto selecionada.
            if($seleccionado === 'Por_defecto') {
                echo('<option value="Por_defecto" hidden selected>Selecciona ' . $text . '</option>');
            };                                                    
                                    
            // Recorremos el resultado y se imprimen las opciones (comprobamos si establecemos alguna por defecto).
            foreach ($items as $item) {
                if ($seleccionado ===  $item['data']) {
                    echo('<option value="' . $item['data'] . '" selected>' . $item['data'] . '</option>'); 
                } else {
                    echo('<option value="' . $item['data'] . '">' . $item['data'] . '</option>'); 
                };                              
            };     

            echo('</select>');
        } else {
            echo('<p class="warning">No se han podido cargar los datos. Revise la conexi&oacute;n</p>');               
        };
    };

    // Función para mostrar un registro.
    function mostrarReg($reg) {                          
        
        // Si hemos obtenido resultados de la consulta a la BBDD continuamos.
        if ($reg != null) {

            echo('<table>');
            foreach($reg as $key => $dato){
                echo('<tr>');
                echo('<td  class="grey">' . $key . '</td>');
                echo('<td>' . $dato . '</td>');                        
                echo('</tr>');
            };
            echo('</table>');

        } else {
            echo('<p class="warning">No se han podido cargar los datos. Revise la conexi&oacute;n</p>');               
        };;
    };

    

    // Mostrar todos los equipos.
    function mostrar_todos_equipos($tabla_filtrada) {
        echo ('<p>N&uacute;mero de filas = ' . count($tabla_filtrada) . '</p>');
            
        // Imprimimos la cabecera de la tabla
        echo ('<table><tr><th>NOMBRE</th><th>CIUDAD</th><th>CONFERENCIA</th><th>DIVISION</th><th>BORRAR</th></tr>');
        
        // Recorremos el resultado y se imprime.
        foreach ($tabla_filtrada as $equipo) {            
            echo ('<tr>');
            
            foreach ($equipo as $valor) {       
                
                echo('<td>');
                echo('<a href="./mostrarDB.php?nombre=' . $equipo['Nombre'] . '" class="link-table">');
                echo('<div class="celda">');
                echo($valor);
                echo('</a>');
                echo('</div>');
                echo('</td>');               
            };
            
            // Mostrar botón borrar
            echo('<td class="red"><a href="./borrar.php?nombre=' . $equipo['Nombre'] . '" class="link-table red">X</a></td>');

            echo ('</tr>');         
        };

        // Imprimimos el cierre de la tabla.
        echo('</table>');
    };
?>
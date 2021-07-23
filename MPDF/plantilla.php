<?php

function getPlantilla($armas){

    $plantilla = '<body>

                       
                        <br>
                        <table border="1">
                            <caption>Datos Generales</caption>
                            <head>
                                <tr width="100%">
                                <th width="%">Nombre</th>
                                <th width="%">Año</th>
                                <th width="%">Stock</th>
                                <th width="%">Fabricante</th>
                                <th width="%">Pais</th>
                                <th width="%">Descripción</th>
                                <th width="%">Disponibilidad de accesorio</th>
                                <th width="%">Autor de registro</th>                                
                                </tr>
                            </head>
                            <body>';

                            foreach ($armas as $armas){

                            $plantilla .=  
                            '<tr width="" >
                                <td width="20%">'.$armas["nombre_arma"].'</td>
                                <td width="20%">'.$armas["anio"].'</td>
                                <td width="20%">'.$armas["stock"].'</td>
                                <td width="20%">'.$armas["nombre_fabricante"].'</td>
                                <td width="20%">'.$armas["pais"].'</td>
                                <td width="20%">'.$armas["descripcion"].'</td>
                                <td width="20%">'.$armas["descripcion_accesorio"].'</td>
                                <td width="20%">'.$armas["nombre"].'</td>
                            </tr>';

                            }
                            $plantilla .= '        
                            </body>
                        </table>
                    </body>';
return $plantilla;

}
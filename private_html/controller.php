<?php

/* 
 * Copyright (C) 2014 Pascual Muñoz <pascual@lacuevadelgrillo.com>
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */

class controller {
    

   function capturar_evento() {
       echo "<br>controller->capturar_evento()";
        $vista = '';
        if ($_GET) {
            if (array_key_exists($vista, $_GET)) {
                $vista = $_GET['vista'];
            }
        }
        return $vista;
    }


    function identificar_modelo($vista) {
        echo "<br>controller->identificar_modelo():";
        $modelo = '';

        switch ($vista) {
            case 'vista_1':
                $modelo = 'ModeloUno';
                break;
            case 'vista_2':
                $modelo = 'ModeloDos';
                break;
            default:
                break;
        }
        return $modelo;
    }

    function invocar_modelo($modelo) {
        echo "<br>controller->invocar_modelo()";
        if ($modelo) {
            require_once 'models.php';
            $data = new $modelo(); //enum hardcoded
            settype($data, 'array');
            return $data;
        }
    }

    function enviar_data() {
        echo "<br>enviar_data():";
        $vista = $this->capturar_evento();
        
        if($vista){
            echo "vista encontrada";
            $modelo = $this->identificar_modelo($vista);
            if($modelo){
                $data = $this->invocar_modelo($modelo);
                if($data){
                    require_once 'view.php';
                    render_data($vista, $data);
                }
            }
        }
    }
    
}
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

/**
 * Description of clienteCRUD
 *
 * @author Pascual Muñoz <pascual@lacuevadelgrillo.com>
 */


require_once 'DBAbstractModel.php';

class cliente extends DBAbstractModel {

    //tabla cliente , los nombres de las variabes están harcodeados
        public $id_cliente;
        public $dni;
        public $nombre;
        public $apellidos;
        public $direccion;
        public $observaciones;
        public $fecha_creacion;
        public $telefono;
        public $telefono_movil;
        public $email;
  
        private $password; 
   

    
//INTERFAZ C R U D
       

        
    public function get($dni = '') {    
        if( $dni != ''){
            
            #IMPORTANTE: SI NO RESETEAMOS EL ARRAY SE VAN ALMACENTANDO 
            #CONSECUTIVAMENTE LAS RESPUESTAS 
            unset($this->rows);
            
            $this->query = "SELECT "
            . "`id_cliente`, `dni`, `nombre`, `apellidos`, `direccion`,"
            . " `observaciones`, `fecha_creacion`, `telefono`, `telefono_movil`,"
            . " `email`, `password` FROM cliente WHERE dni ='"
            . $dni . "'";
            
            $this->get_results_from_query();
       
            if ( count($this->rows) == 1){
                foreach ($this->rows[0] as $key => $value){
                  $this->$key = $value; //nombres de variables variables mola.
           
                } 
               return TRUE;
            }
            
         }  
         else{
               echo "ERROR GRAVE : no se carga cliente con : " . $this->query;
               return FALSE;
         }
           echo "CONSULTA: " . $this->query;
    }

    public function set($DatosCliente=array()) {
       //cargamos las propiedades
        foreach ($DatosCliente as $key => $value) {
            $this->$key = $value;
        }
                    

        $this->query = "INSERT INTO cliente
                (dni, nombre, apellidos, direccion, observaciones,
                 telefono, telefono_movil, email, password) 
                 VALUES ( 
                  '$this->dni', '$this->nombre', '$this->apellidos',
                  '$this->direccion',
                  '$this->observaciones', '$this->telefono',
                  '$this->telefono_movil', '$this->email', '$this->password')  
                ";

        $this->execute_single_query();
     

        
        
    }

    
    public function edit($data = array()) {
        foreach ($data as $key => $value) {
              $this->$key = $value;
            
            $this->query = " UPDATE cliente 
                             SET dni='$this->dni',
                                 nombre='$this->nombre',
                                 apellidos='$this->apellidos',
                                 direccion='$this->direccion',
                                 observaciones='$this->observaciones',
                                 telefono='$this->telefono',
                                 telefono_movil='$this->telefono_movil',
                                 email='$this->email',
                                 password='$this->password'
                              WHERE id_cliente = '$this->id_cliente'
                           ";
        }
         $this->execute_single_query();
    }
    
    public function Delete($dni_cliente_a_borrar = '') {
        
       
       $this->query = "DELETE from cliente "
               . "WHERE dni = '$dni_cliente_a_borrar'";
       $this->execute_single_query();
        
    }

  

    
    /* FIN INTERFAZ CRUD*/
    
    function __toString() {
        
     
            print '<fieldset>';
                    print '<legend>Datos del cliente.</legend>';
                    print '<br>';	
      
                    echo "ID: " . $this->id_cliente . "<br>";
                    echo "DNI: " . $this->dni . "<br>";
                    echo "Nombre: " . $this->nombre . "<br>";
                    echo "Apellidos: " . $this->apellidos . "<br>";
                    echo "Dirección: " . $this->direccion. "<br>";
                    echo "Observaciones: " . $this->observaciones. "<br>";

                    echo "Fecha de Creación: " . $this->fecha_creacion. "<br>";
                    echo "Telefono: " . $this->telefono .  "<br>";
                    echo "Teléfono Movil: " .  $this->telefono_movil . "<br>";
                    echo "Emilio: " . $this->email . "<br>";

                    print '<br>';
             print '</fieldset>';	

                   
            
           
                return "<br>";
        
    }





  
    //TODO :GENERALIZAR ESTA FUNCION QUE SE SALE. checkNULLABLES(data, tabla);
    
    
    public function checkNullables( $d = array())
    {
      $faltancampos = FALSE; //check
 
        unset($this->rows); 
        $this->query = "SELECT COLUMN_NAME, IS_NULLABLE 
                        FROM information_schema.COLUMNS 
                        WHERE table_name = 'cliente'";
        $this->get_results_from_query();
        
        //por cada campo en la tabla cliente...
        foreach ($this->rows as $res) {
            //que no pueda ser NULL
            if($res["IS_NULLABLE"] == 'NO'){
                //y que no exista en el array ...
               if (!array_key_exists( $res["COLUMN_NAME"], $d)){
                   print_r("<br> ERROR EN DATOS PARA CARGAR EN CLIENTE"
                         . ": falta " . $res["COLUMN_NAME"]);
                   //Avisamos de que algun campo falta
                   $faltancampos = TRUE;
               }
            }   
        }
            
        
        return $faltancampos;
    }
    
    function __destruct() {
        unset($this);
    }
    
}



/*
 * ANEXO CREATE TABLE CLIENTE 
 * 
 * cliente	"CREATE TABLE `cliente` (
  `id_cliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `apellidos` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `observaciones` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `telefono` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `telefono_movil` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `password` varchar(30) COLLATE latin1_spanish_ci DEFAULT NULL COMMENT
  'plain password',
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `dni` (`dni`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 
  COLLATE=latin1_spanish_ci 
  COMMENT='Datos de facturación y dirección de los clientes'"

 */
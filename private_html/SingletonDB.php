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
 *
 * @author Pascual Muñoz <pascual@lacuevadelgrillo.com>
 */

abstract class GLOBALES {
 
    public static $DB_HOST = "localhost";
    public static $DB_USER = "lacuevad_testing";
    public static $DB_PASSWD = "capullo100";
    public static $DB_NAME = "lacuevad_testing";
}

 class SingletonDB  {
   
    protected static $_instanciaUnica; //puntero a la instancia de la clase.
    protected $_conn; //objeto conexión genérico php.
     
      //Retorna una única instancia de la clase.
      public static function getSingleton()
      {
          /* Al ser una función estática se se accede directamente a 
         * la dirección de memoria que contiene el puntero a la única 
         * instancia de la clase con el operador de desreferencia 
         * BaseDatosSingleton::getSingleton, si al hacer la primera peticion 
         * no existe, se crea una con "new self"
         */
    
        return (self::$_instanciaUnica ) ? self::$_instanciaUnica :
                                           self::$_instanciaUnica = new self;
    }

    public  function getConn()
    {
        return $this->_conn;
    }
    
    function __construct() {
        echo "conectando<br>";
        $this->_conn = new mysqli(  GLOBALES::$DB_HOST,
                                    GLOBALES::$DB_USER,
                                    GLOBALES::$DB_PASSWD,
                                    GLOBALES::$DB_NAME);
                                                       
        if ($this->_conn->connect_errno) {
            echo "Fallo al contenctar a MySQL: (" 
            . $this->_conn->connect_errno . ") " 
            . $this->_conn->connect_error;
        }
    }

    /*function __destruct() {
       $this->_conn->close();
    }*/
}
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
 * Description of DBAbstractModel
 *
 * @author Pascual Muñoz <pascual@lacuevadelgrillo.com>
 */

require_once 'SingletonDB.php';

abstract class DBAbstractModel {
    
    private $_conn;
    protected $query;
    protected $rows = array(); //almacena resultados de las consultas se
                               //resetea con unset($array);


    abstract protected function get();
    abstract protected function set();
    abstract protected function edit();
    abstract protected function delete();

    private function open_connection()
    {
        //singleton aquí.
        $this->_conn = SingletonDB::getSingleton()->getConn();   
    }
    private function close_connection()
    {
        $this->conn->close;
    }
    
    //insert , delete , update
    protected function execute_single_query()
    {
        echo "<br>execute_single_query() : " . $this->query;
        
        $this->open_connection();
        $this->_conn->query($this->query);
          
        $this->close_connection();
    } 
   //select
    protected function get_results_from_query()
    {
        echo "<br>get_results_from_query():" . $this->query;
        $this->open_connection();
       $result = $this->_conn->query($this->query);
        
        while($this->rows[] = $result->fetch_assoc()){}
        
        $result->close();
        
        $this->close_connection();
        array_pop($this->rows);
      
    }
    
}
    

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
 * Description of FormularioCliente
 *
 * @author Pascual Muñoz <pascual@lacuevadelgrillo.com>
 */


class FormularioCliente
{
	var $style;
	function FormularioCliente($style)
	{
		$this->style = $style;
	}

	function __toString()
	{
		return
		'	
		
		</script>
		
		<div class="'.$this->style.'">
			<FORM id="form_nuevo_cliente" name="form_nuevo_cliente" action="inserta_cliente.php" method="POST">
				<fieldset>
					<legend>Introduzca sus datos para darse de alta como cliente:</legend>
					
					<div>
						Nombre: <input name="nombre" type="text" id="nombre" size="60">
						Apellidos: <input name="apellidos" type="text" id="apellidos" size="50">
					</div>
					<div>
						Direccion: <input name="direccion" type="text" id="direccion" size="50">
					</div>
					<div>	
						Tel�fono Movil: <input name="telefono_movil" type="text" id="telefono_movil" size="50">
						Telefono: <input name="telefono" type="text" id="telefono" size="9">
					</div>
                                        


					<div>
						Introduzca la Contrase�a: <input name="password1" type="password" id="password1" size="11">
						Repita la Contrase�a: <input name="password2" type="password" id="password2" size="11">
					
					</div>
						
					Dni/Nif: <input name="dni" type="text" id="dni" size="10">
					
					<p><input type="submit" onclick="CheckPassword()" name="Submit" value="Enviarrr"/></p>
			
				</fieldset>
			</FORM>
		</div>
		';
	}
}

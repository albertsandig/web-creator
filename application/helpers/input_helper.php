<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_type'))
{	

	/*
		in controller
		
		$this->load->helper('input');
		
	*/
  
	function get_type($array_object,$name ,$input_value = 0, $show = true)
    {
		$types = $array_object;
		if($show) {
			$select = '<select name="'.$name.'" class="form-control" required>';
			foreach($types as $type){
                $is_selected = ($input_value == $type->id) ? 'selected' : '' ;
                $select = $select . '<option '.$is_selected.' value="'.$type->id.'">'.$type->name.'</option>';       
			}
			$select .= '</select>';			
			
			return $select;
		} else{
			
			if($input_value == 0 )
				return false;
				
			foreach($types AS $type){
				if($type->id == $input_value)
					return true;
			}
			
			return false;
		}
	}
}

if ( ! function_exists('set_active'))
{	
	function set_active($name,$value)
    {
        $select = '<select name="'.$name.'" class="form-control" required>';
        $selected = ($value == 1) ? "selected" : "";
        $select .= '<option value="1" '.$selected.' class="text-green" >ACTIVE</option>';
        $selected = ($value == 0) ? "selected" : "";
        $select .= '<option value="0" '.$selected.' class="text-red">INACTIVE</option>';
        $select .= '</select>';
        
        return $select;
	}
}

if ( ! function_exists('set_input_value'))
{	
	function set_input_value($object, $key, $false_value = '')
    {
        return property_exists($object,$key) ? $object->{$key} : $false_value;
	}
}


if ( ! function_exists('set_radio_value'))
{	
	function set_radio_value($val1,$val2)
    {
        return $val1 == $val2 ? 'checked' : '';
	}
}
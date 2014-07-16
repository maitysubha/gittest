<?php


class Error extends Model{


	function logerror($values){

		$this->db->insert('RT_Error', $values);
	}

}
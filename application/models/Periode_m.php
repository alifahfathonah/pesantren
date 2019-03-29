<?php defined('BASEPATH') || exit('No direct script allowed');

class Periode_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'periode';
		$this->data['primary_key'] = 'id_periode';
	}
}


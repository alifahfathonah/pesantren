<?php defined('BASEPATH') || exit('No direct script allowed');

class Informasi_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'informasi';
		$this->data['primary_key'] = 'id_informasi';
	}
}


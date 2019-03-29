<?php defined('BASEPATH') || exit('No direct script allowed');

class Cabang_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'cabang';
		$this->data['primary_key'] = 'id_cabang';
	}
}


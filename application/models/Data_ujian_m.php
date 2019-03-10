<?php defined('BASEPATH') || exit('No direct script allowed');

class Data_ujian_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'data_ujian';
		$this->data['primary_key'] = 'id_data';
	}
}


<?php defined('BASEPATH') || exit('No direct script allowed');

class Hasil_ujian_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'hasil_ujian';
		$this->data['primary_key'] = 'id_hasil';
	}
}


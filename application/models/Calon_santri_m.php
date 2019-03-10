<?php defined('BASEPATH') || exit('No direct script allowed');

class Calon_santri_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'calon_santri';
		$this->data['primary_key'] = 'id_calon';
	}
}


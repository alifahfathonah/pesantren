<?php

/**
 * 
 */
class Admin extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	    $this->lang->load('main', 'english');
	    $this->module = 'admin';
	}

	public function index($value='')
	{
		$this->data['title'] = 'Dashboard';
		$this->data['content'] = 'home';
		$this->template($this->data, $this->module);
	}

	public function daftar_ulang($value='')
	{
		$this->data['title'] = 'Data Admin';
		$this->data['content'] = 'data_daftarulang';
		$this->template($this->data, $this->module);
	}

	public function tambah_peserta()
	{
		$this->data['title'] = 'Tambah Peserta';
		$this->data['content']= 'tambah_peserta';
		$this->template($this->data,$this->module);
	}

	public function edit_peserta($value='')
	{
		$this->data['title'] = 'Edit Peserta';
		$this->data['content']= 'edit_peserta';
		$this->template($this->data,$this->module);
	}

}
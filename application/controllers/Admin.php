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
	    $this->load->model('Periode_m');
	}

	public function index($value='')
	{
		$this->data['title'] = 'Dashboard';
		$this->data['content'] = 'home';
		$this->template($this->data, $this->module);
	}

	public function data_calon($value='')
	{
		$this->load->model('Calon_santri_m');
		$this->data['data']		= $this->Calon_santri_m->get();	
		$this->data['title'] = 'Data Admin';
		$this->data['content'] = 'data_daftarulang';
		$this->template($this->data, $this->module);
	}

	public function detail_calon()
	{
		$this->data['title'] = 'Tambah Peserta';
		$this->data['content']= 'tambah_peserta';
		$this->template($this->data,$this->module);
	}

	public function informasi($value='')
	{
		$this->load->model('Informasi_m');
		$this->data['data']		= $this->Informasi_m->get();
		$this->data['title'] = 'Edit Peserta';
		$this->data['content']= 'informasi';
		$this->template($this->data,$this->module);
	}


	public function tambah_informasi($value='')
	{
		$this->load->model('Informasi_m');

		if ($this->POST('simpan')) {
			$this->Informasi_m->insert([
				'judul'		=> $this->POST('judul'),
				'isi'	=> $this->POST('isi'),
				'date'	=> date("Y-m-d"),
			]);

			redirect('admin/informasi','refresh');
			exit;
		}
		$this->data['title'] = 'Data Informasi';
		$this->data['content']= 'tambah_informasi';
		$this->template($this->data,$this->module);
	}

	public function periode($value='')
	{
		$this->load->model('Periode_m');
		$this->load->library('tanggal');
		$this->data['data']		= $this->Periode_m->get();
		$this->data['title'] = 'Edit Peserta';
		$this->data['content']= 'periode';
		$this->template($this->data,$this->module);
	}

	public function tambah_periode($value='')
	{
		$this->load->model('Periode_m');

		if ($this->POST('simpan')) {
			$this->Periode_m->insert([
				'nama'		=> $this->POST('nama'),
				'deskripsi'	=> $this->POST('deskripsi'),
				'tanggal_buka'	=> $this->POST('start'),
				'tanggal_tutup'	=> $this->POST('end')
			]);

			redirect('admin/periode','refresh');
			exit;
		}
		$this->data['title'] = 'Edit Peserta';
		$this->data['content']= 'tambah_periode';
		$this->template($this->data,$this->module);
	}

	
}
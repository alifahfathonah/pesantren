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
	    $this->data['username'] = $this->session->userdata('username');
	    $this->data['id_pengguna'] = $this->session->userdata('id_pengguna');
	    $this->data['role'] = $this->session->userdata('role');
	    $this->data['nama'] = $this->session->userdata('nama');

		if (!isset($this->data['username'] , $this->data['role']))
		{
			redirect('login');
			exit;
		}
	    $this->load->model('Periode_m');
	}

	public function index($value='')
	{
		$this->load->model('Calon_santri_m');
		$this->data['data']		= $this->Calon_santri_m->get();	
		$this->data['title'] = 'Dashboard';
		$this->data['content'] = 'data_daftarulang';
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
		$this->load->model('Calon_santri_m');
		$id = $this->uri->segment(3);
		$this->check_allowance(!isset($id));
		$this->data['data']		= $this->Calon_santri_m->get_row(['id_calon' => $id]);
		$this->data['title'] = 'Tambah Peserta';
		$this->data['content']= 'detail_calon';
		$this->template($this->data,$this->module);
	}

	public function informasi($value='')
	{
		$this->load->model('Informasi_m');
		if ($this->GET('aksi') == 'hapus') {
			$this->Informasi_m->delete($this->GET('id'));
			redirect('admin/informasi');
			exit;
		}
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

	public function edit_informasi($value='')
	{
		$this->load->model('Informasi_m');
		$id = $this->uri->segment(3);
		$this->check_allowance(!isset($id));
		if ($this->POST('simpan')) {
			$this->Informasi_m->update( $id , [
				'judul'		=> $this->POST('judul'),
				'isi'	=> $this->POST('isi'),
				// 'date'	=> date("Y-m-d"),
			]);

			redirect('admin/informasi','refresh');
			exit;
		}
		$this->data['data']		= $this->Informasi_m->get_row(['id_informasi' => $id]);
		$this->data['title'] = 'Data Informasi';
		$this->data['content']= 'edit_informasi';
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
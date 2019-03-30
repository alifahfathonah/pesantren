<?php

/**
 * 
 */
	class User extends MY_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
		    $this->module = 'user';
		    $this->data['id_pengguna'] = 1;
		}

		public function index($value='')
		{
			$this->load->library('tanggal');
			$this->load->model('Informasi_m');
			$this->data['data']	= $this->Informasi_m->get();
			$this->data['title'] = 'informasi';
			$this->data['content']= 'informasi';
			$this->template($this->data,$this->module);
		}

		public function pendaftaran($value='')
		{
			$this->load->model(['Pengguna_m' , 'Calon_santri_m' , 'Periode_m']);
			$this->data['data']		= $this->Calon_santri_m->get(['id_pengguna' => $this->data['id_pengguna']]);
			$this->data['title'] = 'Data Admin';
			$this->data['content'] = 'pendaftaran';
			$this->template($this->data, $this->module);
		}

		public function edit_daftar($value='')
		{
			$this->load->model(['Pengguna_m' , 'Calon_santri_m' , 'Periode_m']);
			$id = $this->uri->segment(3);
			$this->check_allowance(!isset($id));
			if ($this->POST('daftar')) {
				$this->Calon_santri_m->update($id , [
					'nama_santri'	=> $this->POST('nama'),
					'tempat_lahir' => $this->POST('tempat_lahir'),
					'tanggal_lahir'	=> $this->POST('tanggal_lahir'),
					'jenis_kelamin'	=> $this->POST('jenis_kelamin')
				]);
				redirect('user/pendaftaran','refresh');
				exit;
			}
			$this->data['data']		= $this->Calon_santri_m->get_row(['id_calon' => $id]);
			$this->data['title'] = 'Data Admin';
			$this->data['content'] = 'edit_daftar';
			$this->template($this->data, $this->module);
		}

		public function daftar($value='')
		{
			$this->load->model(['Pengguna_m' , 'Calon_santri_m' , 'Periode_m']);
			if ($this->POST('daftar')) {
				$periode = $this->Periode_m->get();
				$now = strtotime(date("Y-m-d"));
				$period = [];
				foreach ($periode as $value) {
					$start = strtotime($value->tanggal_buka);
					$end = strtotime($value->tanggal_tutup);
					if ($now >= $start && $now <= $end) {
						$period = $value;
					}

				}
				if (empty($period)) {
					//messages
				}
				$this->Calon_santri_m->insert([
					'id_periode' => $period->id_periode,
					'nama_santri'	=> $this->POST('nama'),
					'tempat_lahir' => $this->POST('tempat_lahir'),
					'tanggal_lahir'	=> $this->POST('tanggal_lahir'),
					'id_pengguna'	=> $this->data['id_pengguna'],
					'jenis_kelamin'	=> $this->POST('jenis_kelamin')
				]);

				redirect('user/pendaftaran','refresh');
				exit;
			}
			$this->data['title'] = 'Data Admin';
			$this->data['content'] = 'tambah_daftar';
			$this->template($this->data, $this->module);
		}

		public function profile()
		{
			$this->data['title'] = 'Tambah Peserta';
			$this->data['content']= 'profile';
			$this->template($this->data,$this->module);
		}

		public function informasi($value='')
		{
			$this->load->library('tanggal');
			$this->load->model('Informasi_m');
			$this->data['data']	= $this->Informasi_m->get();
			$this->data['title'] = 'informasi';
			$this->data['content']= 'informasi';
			$this->template($this->data,$this->module);
		}

		public function detail_informasi($value='')
		{
			$this->load->library('tanggal');
			$this->load->model('Informasi_m');
			$id= $this->uri->segment(3);
			$this->check_allowance(!isset($id));
			$this->data['data']	= $this->Informasi_m->get_row(['id_informasi' => $id]);
			$this->data['title'] = 'informasi';
			$this->data['content']= 'detail_informasi';
			$this->template($this->data,$this->module);
		}



		public function hasil_ujian($value='')
		{
			$this->data['title'] = 'Data Admin';
			$this->data['content'] = 'hasil_ujian';
			$this->template($this->data, $this->module);
		}

		public function daftar_ulang()
		{
			$this->data['title'] = 'Tambah Peserta';
			$this->data['content']= 'daftar_ulang';
			$this->template($this->data,$this->module);
		}

		public function jurusan($value='')
		{
			$this->data['title'] = 'Edit Peserta';
			$this->data['content']= 'jurusan';
			$this->template($this->data,$this->module);
		}
	}
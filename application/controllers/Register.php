<?php

class Register extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pengguna_m');
		$this->load->model('Calon_santri_m');
	}

	public function index()
	{
		if ($this->POST('register')) {
			if ($this->POST('password') != $this->POST('repassword')) {
				$this->flashmsg('Password anda tidak sama','warning');
				redirect('register');
				exit;
			}
			if ($this->Pengguna_m->get_row(['username'=> $this->POST('username')])) {
				$this->flashmsg('Username anda sudah digunakan','warning');
				redirect('register');
				exit;
			}
			$this->data['login'] = [
				'username' => $this->POST('username'),
				'nama'		=> $this->POST('nama'),
				'tempat_lahir'	=> $this->POST('tempat_lahir'),
				'tanggal_lahir'	=> $this->POST('tanggal_lahir'),
				'jenis_kelamin'	=> $this->POST('jenis_kelamin'),
				'alamat'	=> $this->POST('alamat'),
				'kontak'	=> $this->POST('kontak'),
				'password'	=> md5($this->POST('password')),
				'role'	=> '3',
			];
			$this->data['user'] = [
				'id_pengguna'	=> $this->db->insert_id(),
				// 'nama'		=> $this->POST('nama'),
			];
			$this->Pengguna_m->insert($this->data['login']);
			$this->Calon_santri_m->insert($this->data['user']);
			$this->flashmsg('Silahkan Login Menggunakan Username Password anda dan Lengkapi data diri anda','success');
			redirect('register');
			exit;
		}
		$this->data['title'] = 'Register' . $this->title;
		$this->load->view('register', $this->data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{

	private $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->data['username'] = $this->session->userdata('username');
		if (isset($this->data['username']))
		{
			$this->data['kode'] = $this->session->userdata('kode');
			switch ($this->data['kode'])
			{
				case 1:
					redirect('admin');
					break;
				case 4:
					redirect('user');
					break;
				// default :
				//     redirect('user');
				//     break;
			}
			exit;
		}
	}

	public function index()
	{
		if ($this->POST('login'))
		{
			$this->load->model('login_m');
			// if (!$this->login_m->required_input(['username','password'])) 
			// {
			// 	$this->flashmsg('Data harus lengkap','warning');
			// 	redirect('login');
			// 	exit;
			// }
			
			$this->data = [
				'username'	=> $this->POST('username'),
				'password'	=> md5($this->POST('password'))
			];
            // echo json_encode($this->data);exit;
			$result = $this->login_m->login($this->data['username'], $this->data['password']);

			
			if (!isset($result)) 
			{
				$this->flashmsg('username atau password salah','danger');
			}
			
			redirect('login');
			exit;
		}
		
		$this->data['title'] = 'LOGIN' . $this->title;
		$this->load->view('login', $this->data);
	}
}

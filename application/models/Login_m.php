<?php 

class Login_m extends MY_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']	= 'pengguna';
		$this->data['primary_key']	= 'id_pengguna';	
	}

	public function login($username, $password)
	{
		$user = $this->get_row(['username' => $username, 'password' => $password]);
		
		if ($user)
		{
			$this->session->set_userdata([
				'username'		  => $user->username,
				'nama'	          => $user->nama,
				'role'         => $user->role,
				'id_pengguna'	=> $user->id_pengguna
			]);
		}

		return $user;
	}
}
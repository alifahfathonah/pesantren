<?php 

class Login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		if ($this->POST('login'))
        {
            $this->data = [
                'username'  => $this->POST('username'),
                'password'  => $this->POST('password')
            ];

            $response = json_decode($this->gz->POST('auth', $this->data));
            if ($response->status === 'success')
            {
                $this->session->set_userdata(['token' => $response->data->token]);
                if (isset($response->data->staff_token))
                {
                    $this->session->set_userdata(['staff_token' => $response->data->staff_token]);
                }
                $this->flashmsg($response->message);
                redirect('login');
            }

            $this->flashmsg($response->message, 'danger');
        }

        if ($this->POST('register-submit'))
        {
            $password   = $this->POST('password');
            $rpassword  = $this->POST('rpassword');
            if ($password !== $rpassword)
            {
                $this->flashmsg('Kolom Password harus sama dengan kolom Masukkan kembali password', 'danger');
                redirect('login');
            }

            $this->data = [
                'name'          => $this->POST('nama'),
                'username'      => $this->POST('email'),
                'email'         => $this->POST('email'),
                'password'      => $this->POST('password'),
                'address'       => $this->POST('alamat'),
                'contact'       => $this->POST('kontak'),
                'store_name'    => $this->POST('nama_bisnis')
            ];

            $response = json_decode($this->gz->POST('store', $this->data));

            if ($response->status === 'success')
            {
                $this->flashmsg($response->message);
                redirect('login');
            }

            $this->flashmsg($response->message, 'danger');
        }

        $this->data['title']			= 'Login';
        $this->data['global_title']		= $this->title;
        $this->load->view('login', $this->data);
	}
}
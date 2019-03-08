<?php 

class Register extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('gz');
        $this->load->library('ci_jwt');
	}

	public function index()
	{
		if ($this->POST('login'))
        {   
            if ($this->POST('password') != $this->POST('rpassword')) {
                $this->flashmsg("Password yanga anda masukan tidak sama");
                redirect('login');
                exit;
            }
            $this->data = [
                'name'          => $this->POST('nama'),
                'address'       => $this->POST('alamat'),
                'phone_number'  => $this->POST('kontak'),
                'email'     => $this->POST('email'),
                'username'  => $this->POST('email'),
                'password'  => $this->POST('password'),
                'role_id'   => $this->POST('username'),
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

        $this->data['title']			= 'Login';
        $this->data['global_title']		= $this->title;
        $this->load->view('login', $this->data);
	}
}
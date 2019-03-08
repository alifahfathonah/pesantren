<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends MY_Controller
{
    public function __construct()       
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->POST('daftar')) 
        {
            $password = $this->POST('password');
            $password_lagi = $this->POST('password_lagi');
            if ($password !== $password_lagi)
            {
                $this->flashmsg('Kolom password harus sama dengan kolom password lagi', 'danger');
                redirect('pendaftaran');
            }

            $col_name = ['username', 'password', 'password_lagi', 'nama_lengkap','nama_panggilan','ttl','jenis_kelamin',
            'universitas', 'jurusan', 'semester', 'alamat','telepon','nama_ayah','nama_ibu','pekerjaan_ortu',
            'alamat_ortu','telepon_ortu', 'prestasi','hobi','bakat','ipk','tinggi',
            'berat','riwayat_penyakit','motivasi','pendapat','nama_org_terdekat','telepon_org_terdekat','agama', 'email'
            ];
            $data_peserta = [];
            foreach ($col_name as $col) 
            {
                if (in_array($col, ['password', 'password_lagi']))
                {
                    $data_peserta[$col] = md5($this->POST($col));
                }
                else
                {
                    $data_peserta[$col] = $this->POST($col);
                }
                
            }

            unset($data_peserta['password_lagi']);
            $this->load->model('peserta_m');
            $this->peserta_m->insert($data_peserta);
            $data_file['id_peserta'] = $this->db->insert_id();

            $file_type = ['ktm','khs','foto_seluruh_badan','foto_closeup'];
            $file = [];
            foreach ($file_type as $type) 
            {
                if (isset($_FILES[$type]))
                {
                    $file[$type] = preg_replace('/\s+/', '_', $_FILES[$type]['name']);
                }
            }

            foreach ($file as $type => $name) 
            {
                if (isset($_FILES[$type]))
                {
                    $this->upload_file($name, $type, $type);
                    $data_file[$type] = $name;
                }
            }
            $this->load->model('files_m');
            $this->files_m->insert($data_file);

            $this->flashmsg('Formulir terkirim!');
            redirect('pendaftaran/berhasil');
        }
        $this->data['agama'] = ['Budha','Hindu','Islam','Katolik','Khonghucu','Protestan','Lainnya'];
        $this->data['content'] = 'pendaftaran-form';
        $this->data['title'] = 'Pendaftaran - '.$this->title;
        $this->load->view('pendaftaran-form');
    }
    
    public function berhasil()
    {
        $this->data['content'] = 'pendaftaran-berhasil';
        $this->data['title'] = 'Pendaftaran Berhasil - '.$this->title;
        $this->template($this->data,'daftar');
    }
}

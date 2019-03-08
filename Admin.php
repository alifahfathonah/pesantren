
<?php 

class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->module = 'admin';
        $this->load->library('gz');
        $this->load->library('ci_jwt');
        
        $this->data['token'] = $this->session->userdata('token');
        if (!isset($this->data['token']))
        {
            $this->session->sess_destroy();
            redirect('login');
        }

        $this->data['user']     = $this->ci_jwt->decode($this->data['token']);
        $this->data['store_id'] = $this->data['user']->store->store_id;

        if ($this->data['user']->role_id != 1)
        {
            $this->session->sess_destroy();
            redirect('login');
        }

        $this->lang->load('main', 'english');
        $this->config->load('app');
        $this->data['api_url']  = $this->config->item('API_URL');
        // $this->dump($this->data);
        // exit;
    }

	public function index()
	{
        $this->data['summary']  = $this->gz->common_GET('transaction/summary?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'] . '&type=today', 'transactions');
        
        $this->load->helper('currency');
        $this->load->helper('summary');
        $this->data['current']  = summarize($this->data['summary']->current);
        $this->data['previous'] = summarize($this->data['summary']->previous);
		$this->data['title']	= 'Dashboard';
		$this->data['content']	= 'dashboard';
		$this->template($this->data, $this->module);
	}

    //Product
    public function product()
    {
        if ($this->POST('delete'))
        {
            $data = [
                'store_id'  => $this->data['store_id'],
                'token'     => $this->data['token'],
                'item_id'   => $this->POST('item_id')
            ];
            echo $this->gz->POST('item/delete', $data);
            exit;
        }

        $response = json_decode($this->gz->GET('item?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id']));
        if ($response->status === 'failed')
        {
            $this->data['store'] = [];
            $this->data['items'] = [];
        }
        else
        {
            $this->data['store'] = $response->data->store;
            $this->data['items'] = $response->data->items;
            $this->session->set_userdata(['token' => $response->data->token]);
        }

        $this->load->helper('currency');
        $this->data['title']    = lang('product');
        $this->data['content']  = 'product/product';
        $this->template($this->data, $this->module);
    }

    public function add_product()
    {
        if ($this->POST('submit'))
        {
            // $path = FCPATH . 'assets/temp_files/';
            // $uploaded_photos = $this->POST('uploaded_photos');
            // $base64_string = [];
            // foreach ($uploaded_photos as $photo)
            // {
            //     $fpath  = $path . $photo;
            //     $data   = file_get_contents($fpath);
            //     $base64 = base64_encode($data);
            //     $base64_string []= $base64;
            // }

            $data = [
                'name'          => $this->POST('name'),
                'price'         => $this->POST('price'),
                'category_id'   => $this->POST('category_id'),
                'description'   => $this->POST('description'),
                'unit'          => $this->POST('unit'),
                // 'filenames'     => $uploaded_photos,
                // 'photos'        => $base64_string,
                'token'         => $this->data['token'],
                'store_id'      => $this->data['store_id'],
                'code'          => $this->POST('code')
            ];

            $response = json_decode($this->gz->POST('item', $data));
            if ($response->status === 'failed')
            {
                $this->flashmsg($response->message, 'danger');
            }
            else
            {
                // foreach ($uploaded_photos as $photo)
                // {
                //     @unlink($path . $photo);
                // }
                $this->flashmsg($response->message);
                $this->session->set_userdata(['token' => $response->data->token]);
            }

            redirect('admin/add-product');
        }

        $response = json_decode($this->gz->GET('item-category?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id']));
        if ($response->status === 'failed')
        {
            $this->data['category'] = [];
        }
        else
        {
            $this->data['category'] = $response->data->category;
            $this->session->set_userdata(['token' => $response->data->token]);
        }
        $this->data['title']    = lang('add_product');
        $this->data['content']  = 'product/add_product';
        $this->template($this->data, $this->module);
    }

    public function upload_handler()
    {
        error_reporting(E_ALL | E_STRICT);
        require_once(FCPATH . 'application/libraries/UploadHandler.php');
        $handler = new UploadHandler('photos');
    }

    public function edit_product()
    {
        $this->data['item_id'] = $this->uri->segment(3);
        $this->check_allowance(!isset($this->data['item_id']));
        if ($this->POST('submit'))
        {
            // $path = FCPATH . 'assets/temp_files/';
            // $uploaded_photos = $this->POST('uploaded_photos');
            // $base64_string = [];
            // foreach ($uploaded_photos as $photo)
            // {
            //     $fpath  = $path . $photo;
            //     $data   = file_get_contents($fpath);
            //     $base64 = base64_encode($data);
            //     $base64_string []= $base64;
            // }

            $data = [
                'name'          => $this->POST('name'),
                'price'         => $this->POST('price'),
                'category_id'   => $this->POST('category_id'),
                'description'   => $this->POST('description'),
                'unit'          => $this->POST('unit'),
                // 'filenames'     => $uploaded_photos,
                // 'photos'        => $base64_string,
                'token'         => $this->data['token'],
                'store_id'      => $this->data['store_id'],
                'item_id'       => $this->data['item_id'],
                'code'          => $this->POST('code')
            ];

            $response = json_decode($this->gz->POST('item/update', $data));
            if ($response->status === 'failed')
            {
                $this->flashmsg($response->message, 'danger');
            }
            else
            {
                // foreach ($uploaded_photos as $photo)
                // {
                //     @unlink($path . $photo);
                // }
                $this->flashmsg($response->message);
                $this->session->set_userdata(['token' => $response->data->token]);
            }

            redirect('admin/edit-product/' . $this->data['item_id']); 
        }

        $response = json_decode($this->gz->GET('item/row?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'] . '&item_id=' . $this->data['item_id']));
        if ($response->status === 'failed')
        {
            $this->data['item']     = [];
            $this->data['category'] = [];
            $this->data['images']   = [];
        }
        else
        {
            $this->data['item']     = $response->data->item;
            $this->data['category'] = $response->data->category;
            $this->data['images']   = $response->data->images;
            $this->session->set_userdata(['token' => $response->data->token]);
        }

        $this->data['title']    = lang('edit_product');
        $this->data['content']  = 'product/edit_product';
        $this->template($this->data, $this->module);
    }

    public function category()
    {
        if ($this->POST('delete'))
        {
            $data = [
                'store_id'      => $this->data['store_id'],
                'token'         => $this->data['token'],
                'category_id'   => $this->POST('category_id')
            ];
            echo $this->gz->POST('item-category/delete', $data);
            exit;
        }

        $response = json_decode($this->gz->GET('item-category?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id']));
        if ($response->status === 'failed')
        {
            $this->data['category'] = [];
        }
        else
        {
            $this->data['category'] = $response->data->category;
            $this->session->set_userdata(['token' => $response->data->token]);
        }

        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'category/category';
        $this->template($this->data, $this->module);
    }

    public function add_category()
    {
        if ($this->POST('submit'))
        {
            $data = [
                'name'          => $this->POST('name'),
                'description'   => $this->POST('description'),
                'store_id'      => $this->data['store_id'],
                'token'         => $this->data['token']
            ];

            $response = json_decode($this->gz->POST('item-category', $data));
            if ($response->status === 'failed')
            {
                $this->flashmsg($response->message, 'danger');
            }
            else
            {
                $this->flashmsg($response->message);
                $this->session->set_userdata(['token' => $response->data->token]);
            }

            redirect('admin/add-category');
        }
        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'category/add_category';
        $this->template($this->data, $this->module);
    }

    public function edit_category()
    {
        $this->data['category_id'] = $this->uri->segment(3);
        $this->check_allowance(!isset($this->data['category_id']));

        if ($this->POST('submit'))
        {
            $data = [
                'category_id'   => $this->data['category_id'],
                'name'          => $this->POST('name'),
                'description'   => $this->POST('description'),
                'store_id'      => $this->data['store_id'],
                'token'         => $this->data['token']
            ];

            $response = json_decode($this->gz->POST('item-category/update', $data));
            if ($response->status === 'failed')
            {
                $this->flashmsg($response->message, 'danger');
            }
            else
            {
                $this->flashmsg($response->message);
                $this->session->set_userdata(['token' => $response->data->token]);
            }

            redirect('admin/edit-category/' . $this->data['category_id']);
        }

        $response = json_decode($this->gz->GET('item-category/row?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'] . '&category_id=' . $this->data['category_id']));
        if ($response->status === 'failed')
        {
            $this->data['category'] = [];
        }
        else
        {
            $this->data['category'] = $response->data->category;
            $this->session->set_userdata(['token' => $response->data->token]);
        }
        $this->data['title']    = 'Edit Category';
        $this->data['content']  = 'category/edit_category';
        $this->template($this->data, $this->module);
    }

    public function stock()
    {
        $this->data['stock']    = $this->gz->common_GET('stock?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'stock');

        // echo "<pre>" .json_encode($this->data['stock']) . "</pre>";
        // exit;
        $this->data['title']    = 'Stock';
        $this->data['content']  = 'product/stock';
        $this->template($this->data, $this->module);
    }

    public function add_stock()
    {
        $this->data['outlet']   = $this->gz->common_GET('outlet?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'outlet');
        $this->data['items']    = $this->gz->common_GET('item?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'items');

        if ($this->POST('submit'))
        {
            $this->data['stock'] = [
                'outlet_id'     => $this->POST('outlet_id'),
                'item_id'       => $this->POST('item_id'),
                'stock'         => $this->POST('stock'),
                'actual_price'  => $this->POST('actual_price'),
                'store_id'      => $this->data['store_id'],
                'token'         => $this->data['token']
            ];

            $response = $this->gz->common_POST('stock', $this->data['stock']);
            $this->flashmsg($response->message, $response->status == 'failed' ? 'danger' : 'success');
            redirect('admin/add-stock');
        }

        $this->data['title']    = 'Add Stock';
        $this->data['content']  = 'product/add_stock';
        $this->template($this->data, $this->module);
    }

    public function detail_stock()
    {
        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'product/detail_stock';
        $this->template($this->data, $this->module);
    }

    //Bussiness
    public function outlet()
    {
        if ($this->POST('delete'))
        {
            $data = [
                'store_id'      => $this->data['store_id'],
                'token'         => $this->data['token'],
                'outlet_id'   => $this->POST('outlet_id')
            ];
            echo $this->gz->POST('outlet/delete', $data);
            exit;
        }
        $this->data['outlet']   = $this->gz->common_GET('outlet?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'outlet');
        $this->data['title']    = 'Outlet';
        $this->data['content']  = 'outlet/outlet';
        $this->template($this->data, $this->module);
    }

    public function add_outlet()
    {
        if ($this->POST('submit'))
        {
            // $filename = $_FILES['photo']['name'];
            // $this->upload($filename, 'assets/temp_files/uploads', 'photo', '');
            // $path   = FCPATH . 'assets/temp_files/uploads/' . $filename;
            // $data   = file_get_contents($path);
            // $base64 = base64_encode($data);
            $this->data['outlet'] = [
                'store_id'  => $this->data['store_id'],
                'name'      => $this->POST('name'),
                'address'   => $this->POST('address'),
                'contact'   => $this->POST('contact'),
                'email'     => $this->POST('email'),
                // 'image'     => $base64,
                // 'filename'  => $_FILES['photo']['name'],
                'token'     => $this->data['token']
            ];

            $response = $this->gz->common_POST('outlet', $this->data['outlet']);
            $this->flashmsg($response->message, $response->status == 'failed' ? 'danger' : 'success');
            redirect('admin/add-outlet');
        }
        $this->data['title']    = 'Add Outlet';
        $this->data['content']  = 'outlet/add_outlet';
        $this->template($this->data, $this->module);
    }

    public function edit_outlet()
    {
        $this->data['outlet_id'] = $this->uri->segment(3);
        $this->check_allowance(!isset($this->data['outlet_id']));

        if ($this->POST('submit'))
        {
            $this->data['outlet'] = [
                'store_id'  => $this->data['store_id'],
                'name'      => $this->POST('name'),
                'address'   => $this->POST('address'),
                'contact'   => $this->POST('contact'),
                'email'     => $this->POST('email'),
                'token'     => $this->data['token'],
                'outlet_id' => $this->data['outlet_id']
            ];

            $response = $this->gz->common_POST('outlet/update', $this->data['outlet']);
            $this->flashmsg($response->message, $response->status == 'failed' ? 'danger' : 'success');
            redirect('admin/edit-outlet/' . $this->data['outlet_id']);
        }

        $response = json_decode($this->gz->GET('outlet/row?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'] . '&outlet_id=' . $this->data['outlet_id']));
        if ($response->status === 'failed')
        {
            $this->data['outlet'] = [];
        }
        else
        {
            $this->data['outlet'] = $response->data->outlet;
            $this->session->set_userdata(['token' => $response->data->token]);
        }

        $this->data['title']    = 'Edit Outlet';
        $this->data['content']  = 'outlet/edit_outlet';
        $this->template($this->data, $this->module);
    }

    public function staff()
    {
        if ($this->POST('delete'))
        {
            $data = [
                'store_id'      => $this->data['store_id'],
                'token'         => $this->data['token'],
                'user_id'       => $this->POST('user_id')
            ];
            echo $this->gz->POST('staff/delete', $data);
            exit;
        }
        $this->data['store']    = $this->gz->common_GET('staff?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'store');
        $this->data['title']    = 'Staff';
        $this->data['content']  = 'staff/staff';
        $this->template($this->data, $this->module);
    }

    public function add_staff()
    {
        if ($this->POST('submit'))
        {
            // $filename = $_FILES['photo']['name'];
            // $this->upload($filename, 'assets/temp_files/uploads', 'photo', '');
            // $path   = FCPATH . 'assets/temp_files/uploads/' . $filename;
            // $data   = file_get_contents($path);
            // $base64 = base64_encode($data);
            $this->data['staff'] = [
                'username'          => $this->POST('username'),
                'password'          => $this->POST('password'),
                'email'             => $this->POST('email'),
                'name'              => $this->POST('name'),
                'address'           => $this->POST('address'),
                'phone_number'      => $this->POST('phone_number'),
                'outlet_id'         => $this->POST('outlet_id'),
                'cashier_password'  => $this->POST('cashier_password'),
                // 'image'             => $base64,
                // 'filename'          => $_FILES['photo']['name'],
                'store_id'          => $this->data['store_id'],
                'token'             => $this->data['token']
            ];
            $response = $this->gz->common_POST('staff', $this->data['staff']);
            $this->flashmsg($response->message, $response->status == 'failed' ? 'danger' : 'success');
            redirect('admin/add-staff');
        }

        $this->data['outlet']   = $this->gz->common_GET('outlet?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'outlet');
        $this->data['title']    = 'Add Staff';
        $this->data['content']  = 'staff/add_staff';
        $this->template($this->data, $this->module);
    }

    public function edit_staff()
    {
        $this->data['staff_id'] = $this->uri->segment(3);
        $this->check_allowance(!isset($this->data['staff_id']));

        if ($this->POST('submit'))
        {
            $this->data['staff'] = [
                'username'          => $this->POST('username'),
                'email'             => $this->POST('email'),
                'name'              => $this->POST('name'),
                'address'           => $this->POST('address'),
                'phone_number'      => $this->POST('phone_number'),
                'outlet_id'         => $this->POST('outlet_id'),
                'store_id'          => $this->data['store_id'],
                'token'             => $this->data['token'],
                'staff_id'          => $this->data['staff_id']
            ];
            $response = $this->gz->common_POST('staff/update', $this->data['staff']);
            $this->flashmsg($response->message, $response->status == 'failed' ? 'danger' : 'success');
            redirect('admin/edit-staff/' . $this->data['staff_id']);
        }

        $response = json_decode($this->gz->GET('staff/row?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'] . '&staff_id=' . $this->data['staff_id']));
        if ($response->status === 'failed')
        {
            $this->data['staff'] = [];
        }
        else
        {
            $this->data['staff'] = $response->data->staff;
            $this->session->set_userdata(['token' => $response->data->token]);
        }

        $this->data['outlet']   = $this->gz->common_GET('outlet?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'outlet');
        $this->data['title']    = 'Edit Staff';
        $this->data['content']  = 'staff/edit_staff';
        $this->template($this->data, $this->module);
    }

    public function pre_order()
    {
        $this->data['pre_order']    = $this->gz->common_GET('transaction/pre-order?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'transactions');
        $this->load->helper('currency');
        $this->data['title']        = 'Pre-Order';
        $this->data['content']      = 'product/preorder';
        $this->template($this->data, $this->module);
    }

    //setting
    public function profile()
    {
        if ($this->POST('change_password'))
        {
            $currentPassword = $this->POST('current_password');
            $newPassword = $this->POST('new_password');
            $newRpassword = $this->POST('new_rpassword');

            $this->data['data'] = [
                'username'  => $this->data['user']->username,
                'password'  => $currentPassword,
                'user_id'   => $this->data['user']->user_id,
                'token'     => $this->data['token'],
                'store_id'  => $this->data['store_id']
            ];

            $response = json_decode($this->gz->POST('auth', $this->data['data']));
            if ($response->status === 'failed')
            {
                $this->flashmsg('Wrong current password', 'danger');
                redirect('admin/profile');
            }

            if ($newPassword !== $newRpassword)
            {
                $this->flashmsg('Password must be equal to Re-type Password', 'danger');
                redirect('admin/profile');
            }

            $this->data['response'] = $this->gz->common_POST('user/update-password', $this->data['data']);
            if ($this->data['response']->status === 'failed')
            {
                $this->flashmsg('Password gagal diubah', 'danger');
                redirect('admin/profile');
            }

            $this->flashmsg('Password berhasil diubah');
            redirect('admin/profile');
        }

        if ($this->POST('change_profile'))
        {
            $this->data['data'] = [
                'token'         => $this->data['token'],
                'store_id'      => $this->data['store_id'],
                'user_id'       => $this->data['user']->user_id,
                'name'          => $this->POST('name'),
                'phone_number'  => $this->POST('phone_number'),
                'address'       => $this->POST('address'),
                'email'         => $this->POST('email')
            ];

            $this->data['response'] = $this->gz->common_POST('user/update', $this->data['data']);
            if ($this->data['response']->status === 'failed')
            {
                $this->flashmsg('Profil gagal diubah', 'danger');
                redirect('admin/profile');
            }

            $this->flashmsg('Profil berhasil diubah');
            redirect('admin/profile');
        }

        if ($this->POST('change_store'))
        {
            $this->data['data'] = [
                'token'         => $this->data['token'],
                'store_id'      => $this->data['store_id'],
                'name'          => $this->POST('name'),
                'description'   => $this->POST('description'),
                'address'       => $this->POST('address'),
                'contact'       => $this->POST('contact'),
                'email'         => $this->POST('email')
            ];

            $this->data['response'] = $this->gz->common_POST('store/update-info', $this->data['data']);
            if ($this->data['response']->status === 'failed')
            {
                $this->flashmsg('Info toko gagal diubah', 'danger');
                redirect('admin/profile');
            }

            $this->flashmsg('Info toko berhasil diubah');
            redirect('admin/profile');
        }

        $this->data['data'] = [
            'token'     => $this->data['token'],
            'store_id'  => $this->data['store_id']
        ];
        $this->data['response'] = $this->gz->common_POST('store/get-profile', $this->data['data']);
        $this->data['title']    = 'Profile';
        $this->data['content']  = 'profile';
        $this->template($this->data, $this->module);
    }

    public function pajak()
    {
        if ($this->POST('submit'))
        {
            $this->data['store'] = [
                'tax'       => $this->POST('tax'),
                'store_id'  => $this->data['store_id'],
                'token'     => $this->data['token']
            ];

            $response = $this->gz->common_POST('store/change-tax', $this->data['store']);
            $this->flashmsg($response->message, $response->status == 'failed' ? 'danger' : 'success');
            redirect('admin/pajak');
        }
        $this->data['store']    = $this->gz->common_GET('store?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'store');
        $this->data['title']    = 'Pajak';
        $this->data['content']  = 'pajak';
        $this->template($this->data, $this->module);
    }    

    //Laporan
    //
    public function report()
    {
        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'report/report';
        $this->template($this->data, $this->module);
    }

    public function report_summary()
    {
        $this->load->helper('summary');
        if ($this->POST('view_report'))
        {
            
            exit;
        }

        $this->data['outlet']   = $this->gz->common_GET('outlet?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'], 'outlet');
        $this->data['summary']  = $this->gz->common_GET('transaction/summary?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id'] . '&type=today', 'transactions');

        $this->data['current']  = summarize($this->data['summary']->current);
        $this->data['previous'] = summarize($this->data['summary']->previous);

        $this->load->helper('currency');
        $this->data['title']    = 'Laporan Penjualan Ringkas';
        $this->data['content']  = 'report/report_summary';
        $this->template($this->data, $this->module);
    }

    public function report_transaction()
    {
        if ($this->POST('change_payment_status'))
        {
            $this->data['transaction'] = [
                'transaction_id'    => $this->POST('transaction_id'),
                'payment_status'    => $this->POST('payment_status'),
                'store_id'          => $this->data['store_id'],
                'token'             => $this->data['token']
            ];

            echo $this->gz->POST('transaction/change-payment-status', $this->data['transaction']);
            exit;
        }

        $response = json_decode($this->gz->GET('transaction?token=' . $this->data['token'] . '&store_id=' . $this->data['store_id']));
        if ($response->status === 'failed')
        {
            $this->data['transactions'] = [];
            $this->data['store']        = [];
        }
        else
        {
            $this->data['transactions'] = $response->data->transactions;
            $this->data['store']        = $response->data->store;
            $this->session->set_userdata(['token' => $response->data->token]);
        }
        $this->load->helper('currency');
        $this->data['title']    = 'Transaction Report';
        $this->data['content']  = 'report/report_transaction';
        $this->template($this->data, $this->module);
    }

    public function daily_report()
    {
        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'report/daily_report';
        $this->template($this->data, $this->module);
    }

    public function report_product()
    {
        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'report/report_product';
        $this->template($this->data, $this->module);
    }   

    public function report_outlet()
    {
        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'report/report_outlet';
        $this->template($this->data, $this->module);
    }

    public function report_category()
    {
        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'report/report_category';
        $this->template($this->data, $this->module);
    }

    public function report_stock()
    {
        $this->data['title']    = 'Dashboard';
        $this->data['content']  = 'report/report_stock';
        $this->template($this->data, $this->module);
    }
}
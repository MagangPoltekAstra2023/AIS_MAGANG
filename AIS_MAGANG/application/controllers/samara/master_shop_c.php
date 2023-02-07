<?php

class master_shop_c extends CI_Controller {

    private $layout = '/template/head';
    private $back_to_manage = 'samara/master_shop_c/index/';

    public function __construct() {
        parent::__construct();
        $this->load->model('samara/master_shop_m');
    }

    function index($msg = NULL, $id_dept = NULL) {
        $this->role_module_m->authorization('9');
        if ($msg == 1) {
            $msg = "<div class = 'alert alert-info'><button type = 'button' class = 'close' data-dismiss = 'alert'>×</button><strong>Creating success </strong> The data is successfully created </div >";
        } elseif ($msg == 2) {
            $msg = "<div class = 'alert alert-info'><button type = 'button' class = 'close' data-dismiss = 'alert'>×</button><strong>Updating success </strong> The data is successfully updated </div >";
        } elseif ($msg == 3) {
            $msg = "<div class = 'alert alert-info'><button type = 'button' class = 'close' data-dismiss = 'alert'>×</button><strong>Deleted success </strong> The data is successfully deleted </div >";
        } elseif ($msg == 12) {
            $msg = "<div class = 'alert alert-danger'><button type = 'button' class = 'close' data-dismiss = 'alert'>×</button><strong>Executing error !</strong> Something error with parameter </div >";
        } else {
            $msg = "";
        }
        
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['title'] = 'Manage Shop';
        $data['msg'] = $msg;
        $data['data'] = $this->master_shop_m->get_shop();
        $data['content'] = 'samara/shop/manage_shop_v';
        $this->load->view($this->layout, $data);
    }

    function create_shop() {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['title'] = 'Create New Shop';
        $data['content'] = 'samara/shop/create_shop_v';

        $this->load->view($this->layout, $data);
    }

    function save_shop() {
        // $this->form_validation->set_rules('NPK', 'NPK', 'required|min_length[4]|max_length[6]|callback_check_id|trim');

        $session = $this->session->all_userdata();

        if ($this->form_validation->run() == FALSE) {
            $this->create_shop();
        } else {
            $data = array(
                'INT_PLANT_ID' => $this->input->post('INT_PLANT_ID'),
                'CHR_SHOP_NAME' => $this->input->post('CHR_MACHINE_NAME'),
                'CHR_SHOP_DESC' => $this->input->post('CHR_SHOP_DESC'),
                'CHR_CREATED_BY' => $session['USERNAME'],
                'DAT_CREATED_AT' => date('Y-m-d H:i:s'),
                'INT_FLG_DEL' => 0
            );
            $this->master_shop_m->save($data);
            redirect($this->back_to_manage . $msg = 1);
        }
    }

    function edit_shop($id) {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['title'] = 'Edit Shop';
        $data['content'] = 'samara/shop/edit_shop_v';

        $data['data'] = $this->master_shop_m->get_shop_by_id($id);

        $this->load->view($this->layout, $data);
    }

    function update_shop() {
        $id = $this->input->post('INT_ID');
        $session = $this->session->all_userdata();

        //$this->form_validation->set_rules('CHR_shop_DESC', 'shop Desc', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_shop($id);
        } else {
            $data = array(
                'INT_PLANT_ID' => $this->input->post('INT_PLANT_ID'),
                'CHR_SHOP_NAME' => $this->input->post('CHR_MACHINE_NAME'),
                'CHR_SHOP_DESC' => $this->input->post('CHR_SHOP_DESC'),
                'CHR_MODIFIED_BY' => $session['USERNAME'],
                'DATE_MODIFIED_AT' => date('Y-m-d H:i:s')
            );
            $this->master_shop_m->update($data, $id);
            redirect($this->back_to_manage . $msg = 2);
        }
    }

    function delete_shop($id) {
        $this->role_module_m->authorization('9');
        $this->master_shop_m->delete($id);
        redirect($this->back_to_manage . $msg = 3);
    }
    
    function enable_shop($id) {
        $this->role_module_m->authorization('9');
        $this->master_shop_m->enable($id);
        redirect($this->back_to_manage . $msg = 2);
    }

}

?>

<?php

class master_line_c extends CI_Controller {

    private $layout = '/template/head';
    private $back_to_manage = 'samara/master_line_c/index/';

    public function __construct() {
        parent::__construct();
        $this->load->model('samara/master_line_m');
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

        $data['title'] = 'Manage Line';
        $data['msg'] = $msg;
        $data['data'] = $this->master_line_m->get_line();
        $data['shop'] = $this->master_shop_m->get_shop();
        $data['content'] = 'samara/line/manage_line_v';
        $this->load->view($this->layout, $data);
    }

    function create_line() {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['data_shop'] = $this->master_shop_m->get_shop();

        $data['title'] = 'Create New Line';
        $data['content'] = 'samara/line/create_line_v';

        $this->load->view($this->layout, $data);
    }

    function save_line() {
        // $this->form_validation->set_rules('NPK', 'NPK', 'required|min_length[4]|max_length[6]|callback_check_id|trim');
        $this->form_validation->set_rules('CHR_LINE_DESC', 'Line Desc', 'required');

        $session = $this->session->all_userdata();

        if ($this->form_validation->run() == FALSE) {
            $this->create_line();
        } else {
            $data = array(
                'INT_SHOP_ID' => $this->input->post('INT_SHOP_ID'),
                'CHR_LINE_NAME' => $this->input->post('CHR_LINE_NAME'),
                'CHR_LINE_DESC' => $this->input->post('CHR_LINE_DESC'),
                'CHR_CREATED_BY' => $session['USERNAME'],
                'DAT_CREATED_AT' => date('Y-m-d H:i:s'),
                'INT_FLG_DEL' => 0
            );
            $this->master_line_m->save($data);
            redirect($this->back_to_manage . $msg = 1);
        }
    }

    function edit_line($id) {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['data_shop'] = $this->master_shop_m->get_shop();

        $data['title'] = 'Edit Machine';
        $data['content'] = 'samara/line/edit_line_v';

        $data['data'] = $this->master_line_m->get_line_by_id($id);

        $this->load->view($this->layout, $data);
    }

    function update_line() {
        $id = $this->input->post('INT_ID');
        $session = $this->session->all_userdata();

        $this->form_validation->set_rules('CHR_LINE_DESC', 'Line Desc', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_line($id);
        } else {
            $data = array(
                'INT_SHOP_ID' => $this->input->post('INT_SHOP_ID'),
                'CHR_LINE_NAME' => $this->input->post('CHR_LINE_NAME'),
                'CHR_LINE_DESC' => $this->input->post('CHR_LINE_DESC'),
                'CHR_MODIFIED_BY' => $session['USERNAME'],
                'DAT_MODIFIED_AT' => date('Y-m-d H:i:s')
            );
            $this->master_line_m->update($data, $id);
            redirect($this->back_to_manage . $msg = 2);
        }
    }

    function delete_line($id) {
        $this->role_module_m->authorization('9');
        $this->master_line_m->delete($id);
        redirect($this->back_to_manage . $msg = 3);
    }
    
    function enable_line($id) {
        $this->role_module_m->authorization('9');
        $this->master_line_m->enable($id);
        redirect($this->back_to_manage . $msg = 2);
    }

}

?>

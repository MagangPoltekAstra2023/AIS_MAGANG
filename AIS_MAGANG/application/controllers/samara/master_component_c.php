<?php

class master_component_c extends CI_Controller {

    private $layout = '/template/head';
    private $back_to_manage = 'samara/master_component_c/index/';

    public function __construct() {
        parent::__construct();
        $this->load->model('samara/master_component_m');
        $this->load->model('samara/master_line_m');
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

        $data['title'] = 'Manage Component';
        $data['msg'] = $msg;
        $data['data'] = $this->master_component_m->get_component();
        $data['line'] = $this->master_line_m->get_line();
        $data['content'] = 'samara/component/manage_component_v';
        $this->load->view($this->layout, $data);
    }

    function create_component() {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['data_line'] = $this->master_line_m->get_line();

        $data['title'] = 'Create New Component';
        $data['content'] = 'samara/component/create_component_v';

        $this->load->view($this->layout, $data);
    }

    function save_component() {
        //$this->form_validation->set_rules('CHR_component_CODE', 'component Code', 'required|min_length[4]|max_length[6]|trim');
        $this->form_validation->set_rules('CHR_COMPONENT_DESC', 'Component Desc', 'required');

        $session = $this->session->all_userdata();

        if ($this->form_validation->run() == FALSE) {
            $this->create_component();
        } else {
            $data = array(
                'INT_LINE_ID' => $this->input->post('INT_LINE_ID'),
                'CHR_COMPONENT_NAME' => $this->input->post('CHR_COMPONENT_NAME'),
                'CHR_COMPONENT_DESC' => $this->input->post('CHR_COMPONENT_DESC'),
                'CHR_CREATED_BY' => $session['USERNAME'],
                'DAT_CREATED_AT' => date('Y-m-d H:i:s'),
                'INT_FLG_DEL' => 0
            );
            $this->master_component_m->save($data);
            redirect($this->back_to_manage . $msg = 1);
        }
    }

    function edit_component($id) {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['data_line'] = $this->master_line_m->get_line();

        $data['title'] = 'Edit Component';
        $data['content'] = 'samara/component/edit_component_v';

        $data['data'] = $this->master_component_m->get_component_by_id($id);

        $this->load->view($this->layout, $data);
    }

    function update_component() {
        $id = $this->input->post('INT_ID');
        $session = $this->session->all_userdata();

       $this->form_validation->set_rules('CHR_COMPONENT_DESC', 'Component Desc', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_component($id);
        } else {
            $data = array(
                'INT_LINE_ID' => $this->input->post('INT_LINE_ID'),
                'CHR_COMPONENT_NAME' => $this->input->post('CHR_COMPONENT_NAME'),
                'CHR_COMPONENT_DESC' => $this->input->post('CHR_COMPONENT_DESC'),
                'CHR_MODIFIED_BY' => $session['USERNAME'],
                'DAT_MODIFIED_AT' => date('Y-m-d H:i:s')
            );
            $this->master_component_m->update($data, $id);
            redirect($this->back_to_manage . $msg = 2);
        }
    }

    function delete_component($id) {
        $this->role_module_m->authorization('9');
        $this->master_component_m->delete($id);
        redirect($this->back_to_manage . $msg = 3);
    }
    
    function enable_component($id) {
        $this->role_module_m->authorization('9');
        $this->master_component_m->enable($id);
        redirect($this->back_to_manage . $msg = 2);
    }

}

?>

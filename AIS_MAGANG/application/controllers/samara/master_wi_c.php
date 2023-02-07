<?php

class master_wi_c extends CI_Controller {

    private $layout = '/template/head';
    private $back_to_manage = 'samara/master_wi_c/index/';

    public function __construct() {
        parent::__construct();
        $this->load->model('samara/master_wi_m');
        $this->load->model('samara/master_spare_parts_m');
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

        $data['title'] = 'Manage WI';
        $data['msg'] = $msg;
        $data['data'] = $this->master_wi_m->get_wi();
        $data['spare_parts'] = $this->master_spare_parts_m->get_spare_parts();
        $data['content'] = 'samara/wi/manage_wi_v';
        $this->load->view($this->layout, $data);
    }

    function create_wi() {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['data_spare_parts'] = $this->master_spare_parts_m->get_spare_parts();

        $data['title'] = 'Create New WI';
        $data['content'] = 'samara/wi/create_wi_v';

        $this->load->view($this->layout, $data);
    }

    function save_wi() {
        // $this->form_validation->set_rules('NPK', 'NPK', 'required|min_length[4]|max_length[6]|callback_check_id|trim');
        $this->form_validation->set_rules('CHR_WI_GROUP', 'CHR_WI_GROUP', 'required|max_length[15]|trim');

        $session = $this->session->all_userdata();

        if ($this->form_validation->run() == FALSE) {
            $this->create_wi();
        } else {
            $data = array(
                'CHR_WI_GROUP' => strtoupper($this->input->post('CHR_WI_GROUP')),
                'CHR_WI_CODE' => strtoupper($this->input->post('CHR_WI_CODE')),
                'CHR_WI_NAME' => $this->input->post('CHR_WI_NAME'),
                'CHR_WI_TYPE' => strtoupper($this->input->post('CHR_WI_TYPE')),
                'CHR_TYPE' => strtoupper($this->input->post('CHR_TYPE')),
                'INT_ID_PART' => $this->input->post('INT_ID_PART'),
                'CHR_FILE_WI' => $this->input->post('CHR_FILE_WI'),
                'CHR_CREATED_BY' => $session['USERNAME'],
                'DATE_CREATED_AT' => date('Y-m-d H:i:s'),
                'INT_FLG_DEL' => 0
            );
            $this->master_wi_m->save($data);
            redirect($this->back_to_manage . $msg = 1);
        }
    }

    function edit_wi($id) {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['data_spare_parts'] = $this->master_spare_parts_m->get_spare_parts();

        $data['title'] = 'Edit WI';
        $data['content'] = 'samara/wi/edit_wi_v';

        $data['data'] = $this->master_wi_m->get_wi_by_id($id);

        $this->load->view($this->layout, $data);
    }

    function update_wi() {
        $id = $this->input->post('INT_ID');
        $session = $this->session->all_userdata();

        $this->form_validation->set_rules('CHR_WI_GROUP', 'CHR_WI_GROUP', 'required|max_length[15]|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_machine($id);
        } else {
            $data = array(
                'CHR_WI_GROUP' => strtoupper($this->input->post('CHR_WI_GROUP')),
                'CHR_WI_CODE' => strtoupper($this->input->post('CHR_WI_CODE')),
                'CHR_WI_NAME' => $this->input->post('CHR_WI_NAME'),
                'CHR_WI_TYPE' => strtoupper($this->input->post('CHR_WI_TYPE')),
                'CHR_TYPE' => strtoupper($this->input->post('CHR_TYPE')),
                'INT_ID_PART' => $this->input->post('INT_ID_PART'),
                'CHR_FILE_WI' => $this->input->post('CHR_FILE_WI'),
                'CHR_MODIFIED_BY' => $session['USERNAME'],
                'DATE_MODIFIED_AT' => date('Y-m-d H:i:s')
            );
            $this->master_wi_m->update($data, $id);
            redirect($this->back_to_manage . $msg = 2);
        }
    }

    function delete_wi($id) {
        $this->role_module_m->authorization('9');
        $this->master_wie_m->delete($id);
        redirect($this->back_to_manage . $msg = 3);
    }
    
    function enable_wi($id) {
        $this->role_module_m->authorization('9');
        $this->master_wie_m->enable($id);
        redirect($this->back_to_manage . $msg = 2);
    }

}

?>

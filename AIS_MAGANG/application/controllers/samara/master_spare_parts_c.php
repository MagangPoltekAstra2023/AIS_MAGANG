<?php

class master_spare_parts_c extends CI_Controller {

    private $layout = '/template/head';
    private $back_to_manage = 'samara/master_spare_parts_c/index/';

    public function __construct() {
        parent::__construct();
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

        $data['title'] = 'Manage Spare Parts';
        $data['msg'] = $msg;
        $data['data'] = $this->master_spare_parts_m->get_spare_parts();
        $data['content'] = 'samara/spare_parts/manage_spare_parts_v';
        $this->load->view($this->layout, $data);
    }

    function create_spare_parts() {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['title'] = 'Create New Spare Parts';
        $data['content'] = 'samara/spare_parts/create_spare_parts_v';

        $this->load->view($this->layout, $data);
    }

    function save_spare_parts() {
        // $this->form_validation->set_rules('NPK', 'NPK', 'required|min_length[4]|max_length[6]|callback_check_id|trim');
        $this->form_validation->set_rules('CHR_PART_NO', 'CHR_PART_NO', 'required|max_length[15]|trim');

        $session = $this->session->all_userdata();

        if ($this->form_validation->run() == FALSE) {
            $this->create_spare_parts();
        } else {
            $data = array(
                'CHR_PART_NO' => strtoupper($this->input->post('CHR_PART_NO')),
                'CHR_SPARE_PART_NAME' => strtoupper($this->input->post('CHR_SPARE_PART_NAME')),
                'CHR_COMPONENT' => strtoupper($this->input->post('CHR_COMPONENT')),
                'CHR_MODEL' => strtoupper($this->input->post('CHR_MODEL')),
                'CHR_BACK_NO' => strtoupper($this->input->post('CHR_BACK_NO')),
                'CHR_TYPE' => strtoupper($this->input->post('CHR_TYPE')),
                'CHR_SPESIFICATION' => strtoupper($this->input->post('CHR_SPESIFICATION')),
                'CHR_CREATED_BY' => $session['USERNAME'],
                'DATE_CREATED_AT' => date('Y-m-d H:i:s'),
                'INT_FLG_DEL' => 0
            );
            $this->master_spare_parts_m->save($data);
            redirect($this->back_to_manage . $msg = 1);
        }
    }

    function edit_spare_parts($id) {
        $this->role_module_m->authorization('9');
        $data['app'] = $this->role_module_m->get_app();
        $data['module'] = $this->role_module_m->get_module();
        $data['function'] = $this->role_module_m->get_function();
        $data['sidebar'] = $this->role_module_m->side_bar(28);
        $data['news'] = $this->news_m->get_news();

        $data['title'] = 'Edit Spare Parts';
        $data['content'] = 'samara/spare_parts/edit_spare_parts_v';

        $data['data'] = $this->master_spare_parts_m->get_spare_parts_by_id($id);

        $this->load->view($this->layout, $data);
    }

    function update_spare_parts() {
        $id = $this->input->post('INT_ID');
        $session = $this->session->all_userdata();

        $this->form_validation->set_rules('CHR_PART_NO', 'CHR_PART_NO', 'required|max_length[15]|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->edit_machine($id);
        } else {
            $data = array(
                'CHR_PART_NO' => strtoupper($this->input->post('CHR_PART_NO')),
                'CHR_SPARE_PART_NAME' => strtoupper($this->input->post('CHR_SPARE_PART_NAME')),
                'CHR_COMPONENT' => strtoupper($this->input->post('CHR_COMPONENT')),
                'CHR_MODEL' => strtoupper($this->input->post('CHR_MODEL')),
                'CHR_BACK_NO' => strtoupper($this->input->post('CHR_BACK_NO')),
                'CHR_TYPE' => strtoupper($this->input->post('CHR_TYPE')),
                'CHR_SPESIFICATION' => strtoupper($this->input->post('CHR_SPESIFICATION')),
                'CHR_MODIFIED_BY' => $session['USERNAME'],
                'DATE_MODIFIED_AT' => date('Y-m-d H:i:s')
            );
            $this->master_spare_parts_m->update($data, $id);
            redirect($this->back_to_manage . $msg = 2);
        }
    }

    function delete_spare_parts($id) {
        $this->role_module_m->authorization('9');
        $this->master_spare_partse_m->delete($id);
        redirect($this->back_to_manage . $msg = 3);
    }
    
    function enable_spare_parts($id) {
        $this->role_module_m->authorization('9');
        $this->master_spare_partse_m->enable($id);
        redirect($this->back_to_manage . $msg = 2);
    }

}

?>

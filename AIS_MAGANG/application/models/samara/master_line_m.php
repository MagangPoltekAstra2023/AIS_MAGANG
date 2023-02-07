<?php

class master_line_m extends CI_Model {

    private $table = 'TM_LINE';

    function get_line() {
        $samaradb = $this->load->database("samara", TRUE);
        $query = $samaradb->query("SELECT INT_ID, INT_SHOP_ID, CHR_LINE_NAME, CHR_LINE_DESC, INT_FLG_DEL FROM TM_LINE WHERE INT_FLG_DEL <> '1'");
        return $query->result();
    }
    
    function get_line_by_id($id) {
        $samaradb = $this->load->database("samara", TRUE);
        $query = $samaradb->query("SELECT INT_ID, INT_SHOP_ID, CHR_LINE_NAME, CHR_LINE_DESC, INT_FLG_DEL FROM TM_LINE WHERE INT_ID = '$id' AND INT_FLG_DEL <> '1'");
        return $query->row();
    }

    function save($data) {
        $samaradb = $this->load->database("samara", TRUE);
        $samaradb->insert($this->table, $data);
    }
    
    function update($data, $id) {
        $samaradb = $this->load->database("samara", TRUE);
        $samaradb->where('INT_ID', $id);
        $samaradb->update($this->table, $data);
    }

    function delete($id) {
        $samaradb = $this->load->database("samara", TRUE);
        $data = array('INT_FLG_DEL' => '1');
        $samaradb->where('INT_ID', $id);
        $samaradb->update($this->table, $data);
    }
    
    function enable($id) {
        $samaradb = $this->load->database("samara", TRUE);
        $data = array('INT_FLG_DEL' => '0');
        $samaradb->where('INT_ID', $id);
        $samaradb->update($this->table, $data);
    }

}

?>

<?php

class master_wi_m extends CI_Model {

    private $table = 'TM_WI';

    function get_wi() {
        $samaradb = $this->load->database("samara", TRUE);
        $query = $samaradb->query("SELECT INT_ID, CHR_WI_GROUP, CHR_WI_CODE, CHR_WI_NAME, CHR_WI_TYPE, CHR_TYPE, INT_ID_PART, CHR_FILE_WI, INT_FLG_DEL FROM TM_WI WHERE INT_FLG_DEL = '0'");
        return $query->result();
    }
    
    function get_wi_by_id($id) {
        $samaradb = $this->load->database("samara", TRUE);
        $query = $samaradb->query("SELECT INT_ID, CHR_WI_GROUP, CHR_WI_CODE, CHR_WI_NAME, CHR_WI_TYPE, CHR_TYPE, INT_ID_PART, CHR_FILE_WI, INT_FLG_DEL FROM TM_WI WHERE INT_ID = '$id' AND INT_FLG_DEL <> '1'");
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

<?php

class master_spare_parts_m extends CI_Model {

    private $table = 'TM_SPARE_PARTS';

    function get_spare_parts() {
        $samaradb = $this->load->database("samara", TRUE);
        $query = $samaradb->query("SELECT INT_ID, CHR_PART_NO, CHR_SPARE_PART_NAME, CHR_COMPONENT, CHR_MODEL, CHR_BACK_NO, CHR_TYPE, CHR_SPESIFICATION, INT_FLG_DEL FROM TM_SPARE_PARTS WHERE INT_FLG_DEL = '0'");
        return $query->result();
    }
    
    function get_spare_parts_by_id($id) {
        $samaradb = $this->load->database("samara", TRUE);
        $query = $samaradb->query("SELECT INT_ID, CHR_PART_NO, CHR_SPARE_PART_NAME, CHR_COMPONENT, CHR_MODEL, CHR_BACK_NO, CHR_TYPE, CHR_SPESIFICATION, INT_FLG_DEL FROM TM_SPARE_PARTS WHERE INT_ID = '$id' AND INT_FLG_DEL <> '1'");
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
        $aortadb = $this->load->database("samara", TRUE);
        $data = array('INT_FLG_DEL' => '1');
        $aortadb->where('INT_ID', $id);
        $aortadb->update($this->table, $data);
    }
    
    function enable($id) {
        $samaradb = $this->load->database("samara", TRUE);
        $data = array('INT_FLG_DEL' => '0');
        $samaradb->where('INT_ID', $id);
        $samaradb->update($this->table, $data);
    }

}

?>

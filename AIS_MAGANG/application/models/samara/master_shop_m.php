<?php

class master_shop_m extends CI_Model {

    private $table = 'TM_SHOP';

    function get_shop() {
        $samaradb = $this->load->database("samara", TRUE);
        $query = $samaradb->query("SELECT INT_ID, INT_PLANT_ID, CHR_SHOP_NAME, CHR_SHOP_DESC FROM TM_SHOP");
        return $query->result();
    }
    
    function get_shop_by_id($id) {
        $samaradb = $this->load->database("samara", TRUE);
        $query = $samaradb->query("SELECT INT_ID, INT_PLANT_ID, CHR_SHOP_NAME, CHR_SHOP_DESC FROM TM_SHOP WHERE INT_ID = '$id' AND INT_FLG_DEL <> '1'");
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

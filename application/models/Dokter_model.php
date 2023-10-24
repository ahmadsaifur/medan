<?php

class Dokter_model extends CI_Model
{

    function fetch_data($table, $where = null)
    {
        $this->db->select('* ');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        $this->db->order_by('id asc');
        return $this->db->get();
    }
}

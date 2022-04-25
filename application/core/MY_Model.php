<?php

class MY_Model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function create($table = '', $object = array(), $last_insert = FALSE) {
        if ($table != '' && !empty($object)) {
            $inserted = $this->db->insert($table, $object);
            if ($inserted) {
                if ($last_insert == TRUE) {
                    return $this->db->insert_id();
                } else {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    function delete($table = '', $params = array()) {
        if ($table != '') {
            return $this->db->delete($table, $params);
        }
        return FALSE;
    }

    //fonction lister
    function read($table = '', $colRetour, $params = array(), $join = array(), $order = array(), $nblimit = array(), $groupBy = array()) {
        if ($colRetour != '') {
            $query = $this->db->select($colRetour);
        }
        if (!empty($params)) {
            $query = $this->db->where($params);
        }
        if (!empty($join)) {
            foreach ($join as $t_join => $pivot) {
                $query = $this->db->join($t_join, $table . "." . $pivot . " = " . $t_join . "." . $pivot, 'left');
            }
        }
        if (!empty($order)) {
            $query = $this->db->order_by(key($order), current($order));
        }
        if (!empty($groupeBy)) {
            $query = $this->db->group_by($groupeBy);
        }
        if (!empty($nblimit)) {
            $query = $this->db->limit($nblimit[0], $nblimit[1]);
        }
        $query = $this->db->get($table);
		
        if ($query->num_rows() > 0) {
            $result = $query->result();
            return $result;
        }
        return false;
    }

    //fonction modification
    function update($table = '', $object = array(), $params = array()) {
        $query = $this->db->where($params);
        $query = $this->db->update($table, $object);
        return $query;
    }

}

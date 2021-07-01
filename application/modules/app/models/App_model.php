<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App_model extends CI_Model
{
    public function readArea()
    {
        return $this->db->query("SELECT * FROM tbl_area")->result_array();
    }
    public function readParkir()
    {
        return $this->db->query("SELECT `id_parkir`, `plat`,`tanggal`,`waktu_masuk`, TIMEDIFF(CURRENT_TIME,`waktu_masuk`) as `durasi`, HOUR(TIMEDIFF(CURRENT_TIME,`waktu_masuk`)) as `jam` FROM `tbl_parkir`")->result_array();
    }
    public function createParkir($data)
    {
        $this->db->insert('tbl_parkir', $data);
    }
    public function updateParkir($id, $data)
    {
        $this->db->where('id_parkir', $id);
        $this->db->update('tbl_parkir', $data);
    }
    public function deleteParkir($id)
    {
        $this->db->where('id_parkir', $id);
        $this->db->delete('tbl_parkir');
    }
    public function updateArea($id, $data)
    {
        $this->db->where('id_area', $id);
        $this->db->update('tbl_area', $data);
    }
}

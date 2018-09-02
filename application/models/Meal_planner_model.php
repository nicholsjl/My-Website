<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meal_planner_model extends CI_Model {
	private $table = 'meal_planner_meals';

	public function __construct() {
        parent::__construct();
    }

	public function select_all() {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->order_by('name');
		$query = $this->db->get();
		return $query->result();
	}

	public function select($id) {
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}

	public function insert($data) {
        $this->db->insert($this->table, $data);
		return $this->db->insert_id();
    }

	public function update($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id) {
		$this->db->limit(1);
		$this->db->where('id', $id);
		$this->db->delete($this->table);
		return $this->db->affected_rows() > 0;
	}
}
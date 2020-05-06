<?php
class Shop_model extends CI_Model{
	public function get_categories(){
		$query = $this->db->get('categories');
		return $query->result();
	}
	public function get_products($category_id){
		$this->db->where('id',$category_id);
		$query1 = $this->db->get('categories');
		$category = $query1->row(0)->category_name;
		$query2 = $this->db->get($category);
		return $query2->result();
	}
	public function get_category($category_id){
		$this->db->where('id',$category_id);
		$query = $this->db->get('categories');
		return $query->row(1)->category_name;
	}
}
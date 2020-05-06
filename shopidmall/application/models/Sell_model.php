<?php
class Sell_model extends CI_Model{
	public function add_item($item_pic){
		$user_id = $this->session->userdata('id');
		$post_data = $this->input->post();
		$data = [
			'user_id' => $user_id,
			'name' => $post_data['name'],
			'price' => $post_data['price'],
			'contact' => $post_data['contact'],
			'description' => $post_data['description'],
			'stocks' => $post_data['stocks'],
			'item_pic' => $item_pic
		];
		$table = $post_data['category'];
		$insert = $this->db->insert($table,$data);
		return $insert;
	}
	public function edit_item($item_pic,$item_id){
		$user_id = $this->session->userdata('id');
		$post_data = $this->input->post();
		$data = [
			'user_id' => $user_id,
			'name' => $post_data['name'],
			'price' => $post_data['price'],
			'contact' => $post_data['contact'],
			'description' => $post_data['description'],
			'item_pic' => $item_pic
		];
		$table = $post_data['category'];
		$this->db->where('id',$item_id);
		$insert = $this->db->update($table,$data);
		return $insert;
	}
	public function get_products($category_id){
		$this->db->where('id',$category_id);
		$query = $this->db->get('categories');
		$category = $query->row(1)->category_name;
		if($category == "vehicle parts"){
			$query = $this->db->get('vehicle_parts');
		}else{
			$query = $this->db->get($category);
		}
		$data['products'] =  $query->result();
		$data['category'] = $category;
		return $data;
	}
	
	
}
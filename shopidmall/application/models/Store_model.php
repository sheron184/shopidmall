<?php
class Store_model extends CI_Model{
	public function new_store(){
		$post_data =  $this->input->post();
		$data = [
			'store_name'  => $post_data['store_name'],
			'address'     => $post_data['address'],
			'description' => $post_data['description'],
			'website'     => $post_data['web_site'],
			'city_state'  => $post_data['city_state'],
			'zip_pstcode' => $post_data['postcode_zip'],
			'selling_location'  => $post_data['selling_location'],
			'shipping_location' => $post_data['shipping_location'],
			'currency' => $post_data['currency'],
			'user_id'  => $this->session->userdata('id')
		];
		$insert = $this->db->insert('stores',$data);
		return $insert;
	}
	public function get_store(){
		$user_id = $this->session->userdata('id');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('stores');
		return $query->result();
	}
	public function get_items($categories){
		$user_id = $this->session->userdata('id');
		$arr = [];

		foreach ($categories as $category) {
			//var_dump($category->category_name);die();
			$this->db->where('user_id',$user_id);
			//$this->db->from($category);
	        $query = $this->db->get($category->category_name);
	        array_push($arr,$query->result());
		}
		return $arr;
	}
}
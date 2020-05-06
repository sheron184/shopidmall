<?php
class Admin_model extends CI_Model{
	public function add_category($category_pic){
		$post_data = $this->input->post();
		$data = [
			'user_id' => $this->session->userdata('id'),
			'category_pic' => $category_pic,
			'category_name' => $post_data['category_name']
		];
		$insert = $this->db->insert('categories',$data);
		return $insert;
	}
	public function get_categories(){
		$query = $this->db->get('categories');
		return $query->result();
	}
	public function get_carts(){
		$user_id = $this->session->userdata('id');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('cart');
		return $query->result();
	}
	public function get_views($categories){
		$arr = [];
		//$categories = ['electronics','fashion','sports','vehicle_parts'];
		foreach ($categories as $category) {
			$this->db->select("*");
	        $this->db->from($category);
	        $query = $this->db->get();
	        array_push($arr,$query->result());
		}
		return $arr;
	}
	public function get_most_viewed($views,$categories){
		/*
		$arr = [];
		for ($i=0; $i <count($items_ids) ; $i++) { 
			$this->db->where('id',$items_ids[$i]);
			$query = $this->db->get($item_categories[$i]);
			array_push($arr, $query->result());
		}
		return $arr;
		*/
		$arr = [];
		for ($i=0; $i <count($views) ; $i++) { 
			for ($j=0; $j <count($categories) ; $j++) { 
				$this->db->where('views',$views[$i]);
				$query = $this->db->get($categories[$j]);
				if(!empty($query->result())){
					array_push($arr,$query->result());
				}
			}
		}
		return $arr;
	}
	public function search_items($categories){
		$found_items = [];
		//var_dump($found_items);die();
		$text = $this->input->post('search_query');
		$keywords =  preg_split("/[\s,]+/", $text);
		foreach ($categories as $category) {
			for ($i=0; $i <count($keywords) ; $i++) { 
				$this->db->where('name',$keywords[$i]);
				$query = $this->db->get($category);
				if(!empty($query->result())){
					array_push($found_items, $query->result());
				}
			}
		}
		//var_dump(count($found_items));die();
		return $found_items;
	} 
}
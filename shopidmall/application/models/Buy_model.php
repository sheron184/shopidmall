<?php
class Buy_model extends CI_Model{
	public function add_to_wishlist($item_id,$category,$item_user_id){
		$data = [
			'category'  => $category,
			'item_id'   => $item_id,
			'item_user_id'=> $item_user_id,
			'user_id' => $this->session->userdata('id')
		];
		$insert = $this->db->insert('wishlist',$data);
		return $insert;
	}
	public function get_item_user_id($item_id,$category){
		$this->db->where('id',$item_id);
		$query = $this->db->get($category);
		return $query->row(5)->user_id;
	}
	public function get_wishlist_items_ids($user_id){
		//var_dump($user_id);die();
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('wishlist');
		return $query->result();
	}
	public function get_items($items_ids,$items_categories){
		$ids_len = count($items_ids);
		$categories_len = count($items_categories);
		$all_items = [];
		for ($i=0; $i < $ids_len ; $i++) { 
			$this->db->where('id',$items_ids[$i]);
			//$this->db->where('category',$items_categories[$i]);
			$query = $this->db->get($items_categories[$i]);
			array_push($all_items,$query->result());
		}
		//var_dump($all_items);die();
		return $all_items;

		//var_dump($categories_len);die();
	}
	public function get_item($items_id,$category){
		$this->db->where('id',$items_id);
		$query = $this->db->get($category);
		return $query->result();
	}
	public function get_views($item_id,$category){
		$this->db->where('id',$item_id);
		$query = $this->db->get($category);
		return $query->row(7)->views;
	}
	public function level_up($item_id,$category,$new_views){
		$data = [
			'views' => $new_views
		];
		$this->db->where('id',$item_id);
		$update = $this->db->update($category,$data);
		return $update;
	}
	
}
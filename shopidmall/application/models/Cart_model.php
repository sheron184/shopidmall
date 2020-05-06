<?php 
class Cart_model extends CI_Model{
	public function add_to_cart($item_id,$category){
		$data = [
			'user_id' => $this->session->userdata('id'),
			'item_id' => $item_id,
			'category'=> $category
		];
		$insert = $this->db->insert('cart',$data);
		return $insert;
	}
	public function get_items($items_ids,$items_categories){
		$ids_len = count($items_ids);
		$categories_len = count($items_categories);
		$all_items = [];
		for ($i=0; $i < $ids_len ; $i++) { 
			$this->db->where('id',$items_ids[$i]);
			//$this->db->where('category',$items_categories[$i]);
			$query = $this->db->get($items_categories[$i]);
			array_push($all_items,$query->result() );
		}
		//var_dump($all_items);die();
		return $all_items;
	}
	public function get_cart_items($user_id){
		//var_dump($user_id);die();
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('cart');
		return $query->result();
	}
	public function delete($id){
		$this->db->where('id',$id);
		$delete = $this->db->delete('cart');
		return $delete;
	}
	public function get_all(){
		$this->db->select("*");
        $this->db->from('cart');
        $query = $this->db->get();
        return $query->result();
	}
}
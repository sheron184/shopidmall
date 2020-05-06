<?php 
class Pay_model extends CI_Model{
	public function add_one_item_payment($item_id){
		$data = [
			'amount' 	=> $this->input->post('amount'),
			'user_id' 	=> $this->session->userdata('id'),
			'items_ids' => $item_id,
			'date' 		=> date("Y/m/d")
		];
		$insert = $this->db->insert('payments',$data);
		return $this->db->insert_id();
	}
	public function delete_one_item_payment($payment_id){
		$this->db->where('id',$payment_id);
		$delete = $this->db->delete('payments');
		return $delete;
	}
	public function add_cart_payment(){
		$post_data = $this->input->post();
		$items_ids = [];
		for ($i=0; $i <$post_data['items_length'] ; $i++) { 
			array_push($items_ids, $post_data['item_id'][$i]);
		}
		$ids = json_encode($items_ids);
		$items_categories = [];
		for ($i=0; $i <$post_data['items_length'] ; $i++) { 
			array_push($items_categories, $post_data['item_category'][$i]);
		}
		$categories = json_encode($items_categories);
		$data = [
			'amount' 	=> $post_data['amount'],
			'user_id' 	=> $this->session->userdata('id'),
			'items_ids' => $ids,
			'date' 		=> date("Y/m/d"),
			'items_categories' => $categories
		];
		$insert = $this->db->insert('payments',$data);
		return $this->db->insert_id();
	}
}
<?php 
class Cart extends CI_Controller{
	public function index(){
		if($this->session->userdata('logged_in')){
			$this->load->model('cart_model');
			$cart_items = $this->cart_model->get_cart_items($this->session->userdata('id'));
			$this->load->model('admin_model');	
			$data['categories'] = $this->admin_model->get_categories();
			$carts = $this->admin_model->get_carts();
			$my_carts = count($carts);
			$data['cart_items']= $my_carts;
			//var_dump($my_carts);die();
			$items_ids = [];
			for ($i=0; $i < count($cart_items); $i++) { 
				array_push($items_ids, $cart_items[$i]->item_id);
			}
			$items_categories = [];
			for ($i=0; $i < count($cart_items); $i++) { 
				array_push($items_categories, $cart_items[$i]->category);
			}
			$data['cart_data'] = $this->cart_model->get_all();
			$data['carts_it'] = $this->cart_model->get_items($items_ids,$items_categories);
			$data['items_len'] = count($data['carts_it']);
			$data['view'] = 'template_parts/cart';
			$this->load->view('main_view',$data);
		}else{
			redirect('users');
		}
		
	}
	public function add_to_cart($item_id,$categroy){
		if($this->session->userdata('logged_in')){
			$this->load->model('cart_model');
			$add_to_cart = $this->cart_model->add_to_cart($item_id,$categroy);
			if($add_to_cart){
				$this->session->set_flashdata('add_to_cart','Item successfully added to cart');
				redirect('shop');
			}
		}else{
			redirect('users');
		}
	}
	public function delete_cart_item($id){
		$this->load->model('cart_model');

		$delete = $this->cart_model->delete($id);
		if ($delete) {
			$this->session->set_flashdata('delete','Item successfully removed from cart');
			redirect('cart');
		}
	}
}
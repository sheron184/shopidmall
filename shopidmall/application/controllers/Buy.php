<?php
class Buy extends CI_Controller{
	public function index(){
		if($this->session->userdata('logged_in')){
			$this->load->model('buy_model');
			$this->load->model('admin_model');
			$carts = $this->admin_model->get_carts();
			$my_carts = count($carts);
			$data['cart_items']= $my_carts;
			//$this->load->library('encryption');
			$user_id = $this->session->userdata('id');
			//var_dump($user_id);die();
			$items =$this->buy_model->get_wishlist_items_ids($user_id);

			//var_dump(($items));die();
			$items_ids = [];
			for ($i=0; $i < count($items); $i++) { 
				array_push($items_ids, $items[$i]->item_id);
			}
			$items_categories = [];
			for ($i=0; $i < count($items); $i++) { 
				array_push($items_categories, $items[$i]->category);
			}
			//print_r($items_categories);die();

			$data['categories'] = $this->admin_model->get_categories();
			$data['items_categories'] = $items_categories;
			$data['wishlist_items'] = $this->buy_model->get_items($items_ids,$items_categories);
			$data['items_len'] = count($data['wishlist_items']);
			$data['view'] = 'template_parts/wishlist';
			$this->load->view('main_view',$data);
		}else{
			redirect('users');
		}
		
	}

	public function wishlist($item_id,$category){
		if($this->session->userdata('logged_in')){
			$this->load->model('admin_model');
			$data['categories'] = $this->admin_model->get_categories();
			$this->load->model('buy_model');
			$item_user_id = $this->buy_model->get_item_user_id($item_id,$category);
			//var_dump($item_user_id);die();
			$add_to_wishlist = $this->buy_model->add_to_wishlist($item_id,$category,$item_user_id);
			if($add_to_wishlist){
				$this->session->set_flashdata('add_to_wishlist','Item has been added to wishlist');
				//redirect('buy');
			}
		}else{
			redirect('users');
		}
		
	}
	public function view_item($item_id,$category){
		$this->load->model('admin_model');
		//$this->load->model('admin_model');
		$data['categories'] = $this->admin_model->get_categories();
		$carts = $this->admin_model->get_carts();
		$my_carts = count($carts);
		$data['cart_items']= $my_carts;
		$this->load->model('buy_model');
		$data['item'] = $this->buy_model->get_item($item_id,$category);
		//var_dump($data['item']);die();
		$data['view'] = 'template_parts/view_item';
		$this->load->view('main_view',$data);
		
	}
	public function add_most_view($item_id,$category){
		$this->load->model('buy_model');
		$views = $this->buy_model->get_views($item_id,$category);
		$new_views = $views+1;
		$level_up = $this->buy_model->level_up($item_id,$category,$new_views);
		if($level_up){
			redirect('buy/view_item/'.$item_id."/".$category."");
		}
		//var_dump($new_views);die();

	}
	public function stripe($amount){
        $data['amount'] = $amount;
        $data['view'] = 'stripe/index';
        $this->load->view('main_view',$data);
        //$this->load->view('stripe/stripe_view');
    }
    
}
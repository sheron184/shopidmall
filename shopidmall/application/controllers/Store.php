<?php
class Store extends CI_Controller{
	public function index(){
		if($this->session->userdata('logged_in')){
			$this->load->model('admin_model');
			$carts = $this->admin_model->get_carts();
			//$this->load->model('admin_model');
			$data['categories'] = $this->admin_model->get_categories();
			$my_carts = count($carts);
			$data['cart_items']= $my_carts;
			$this->load->model('store_model');
			$this->load->model('admin_model');
			$store_details = $this->store_model->get_store();
			$categories = $this->admin_model->get_categories();
			$data['items'] = $this->store_model->get_items($categories);
			$data['items_len'] = count($data['items']);
			//var_dump($data['items'][1][0]->name);die();
			$data['store'] = $store_details[0];
			$data['view'] = 'sell/store';
			$this->load->view('main_view',$data);
		}else{
			redirect('users');
		}
		
	}
	public function create_store(){
		$this->load->model('admin_model');
		//$this->load->model('admin_model');
		$data['categories'] = $this->admin_model->get_categories();
		$carts = $this->admin_model->get_carts();
		$my_carts = count($carts);
		$data['cart_items']= $my_carts;
		$data['view'] = 'sell/create_store';
		$this->load->view('main_view',$data);
	}
	public function new_store(){
		$this->load->model('Store_model');
		$new_store = $this->Store_model->new_store();
		if($new_store){
			$this->session->set_flashdata('new_store','Your store has been created');
			redirect('store');
		}
	}
	public function test_email(){
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => 'sheronjude4@gmail.com',
			'smtp_pass' => 'dragon0770209128prince$("password").hide();',
			'mailtype' => 'html',
			'charset'=> 'iso-8859-1'

		);

		$this->load->library('email',$config); // Note: no $config param needed
		$this->email->from('sheronjude4@gmail.com', 'sheronjude4@gmail.com');
		$this->email->to('achinimalsha66@gmail.com');
		$this->email->subject('Test email from CI and Gmail');
		$this->email->message('This is a test.');
		$this->email->send();
	}
	
}
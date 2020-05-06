<?php
class Dashboard extends CI_Controller{
	public function index(){
		if($this->session->userdata('logged_in')){
			$this->load->model('admin_model');
			//$this->load->model('admin_model');
			$data['categories'] = $this->admin_model->get_categories();
			$carts = $this->admin_model->get_carts();
			$my_carts = count($carts);
			$data['cart_items']= $my_carts;
			$data['view'] = 'template_parts/dashboard';
			$this->load->view('main_view',$data);
		}else{
			redirect('users');
		}
		
	}
}





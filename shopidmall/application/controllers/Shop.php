<?php 
class Shop extends CI_Controller{
	public function index(){
		$this->load->model('admin_model');
		$this->load->model('shop_model');

		$data['categories'] = $this->shop_model->get_categories();
		$carts = $this->admin_model->get_carts();
		$my_carts = count($carts);
		$data['cart_items']= $my_carts;
		redirect('shop/shop_category'."/".$data['categories'][0]->id. "");
		$GLOBALS['cart_items'] = $my_carts;
		//$data['view'] = 'template_parts/shop';
		//$this->load->view('main_view',$data);
	}
	public function shop_category($category_id){
		$this->load->model('admin_model');
		//$this->load->model('admin_model');
		$data['categories'] = $this->admin_model->get_categories();
		$this->load->model('shop_model');
		$carts = $this->admin_model->get_carts();
		$my_carts = count($carts);
		$data['cart_items']= $my_carts;
		$data['categories'] = $this->shop_model->get_categories();
		$data['products'] = $this->shop_model->get_products($category_id);
		$data['category'] = $this->shop_model->get_category($category_id);
		$data['category_products'] = 'template_parts/shop_category';
		$data['view'] = 'template_parts/shop';
		$this->load->view('main_view',$data);

		//$data = array('success' => true, 'data'=> $products);
	}	
}
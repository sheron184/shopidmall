<?php
class Main extends CI_Controller{
	public function index(){
		$data['config'] = $this->load->config('config');
		$this->load->model('admin_model');
		$carts = $this->admin_model->get_carts();
		$my_carts = count($carts);
		$data['cart_items']= $my_carts;
		$data['categories'] = $this->admin_model->get_categories();
		
		//$config['categories'] = $data['categories'];
		//var_dump($data['cart_items']);die();
		$categories = [];
		for ($n=0; $n <count($data['categories']); $n++) { 
			array_push($categories,$data['categories'][$n]->category_name);	
		}
		//var_dump($categories);die();
		$all_items = $this->admin_model->get_views($categories);
		$arr_ids = [];
		$arr_views = [];
		$len = count($all_items);
		
		//var_dump($len1);die();
		for ($i=0; $i < $len; $i++) { 
			for ($j=0; $j < count($all_items[$i]) ; $j++) { 
				array_push($arr_ids,$all_items[$i][$j]->id);
				array_push($arr_views,$all_items[$i][$j]->views);
			}
			//var_dump($all_items[$i][$i]->id);die();
			//$id = $all_items[0][$i]->id;	
		}
		asort($arr_views);
		$arr_views = array_reverse($arr_views);
		$results = array_slice($arr_views,0,4);
		//var_dump($result);die();
		$indexes = [];
		for ($n=0; $n < count($arr_views); $n++) { 
			if($arr_views[$n] == $results[0]){
				array_push($indexes, $n);
			}elseif($arr_views[$n] == $results[1]){
				array_push($indexes, $n);
			}elseif($arr_views[$n] == $results[2]){
				array_push($indexes, $n);
			}elseif($arr_views[$n] == $results[3]){
				array_push($indexes, $n);
			}
		}
		$items_ids = [];
		foreach ($indexes as $index) {
			array_push($items_ids, $arr_ids[$index]);
		}
		$item_categories = [];
		foreach ($indexes as $index) {
			array_push($item_categories, $categories[$index]);
		}
		$data['most_viewed_items'] = $this->admin_model->get_most_viewed($results,$categories);
		//var_dump($data['most_viewed_items'][3][0]->name);die();
		$data['view'] = 'template_parts/home';
        $this->load->view('main_view',$data);
	}
	public function view_category($category_id){
		//$my_category = urldecode($category);
		$this->load->model('admin_model');
		$carts = $this->admin_model->get_carts();
		$my_carts = count($carts);
		$data['cart_items']= $my_carts;
		//var_dump($my_category);die();
		$this->load->model('sell_model');
		$get_pro = $this->sell_model->get_products($category_id);
		$data['products'] = $get_pro['products'];
		$data['category'] = $get_pro['category'];
		$data['view'] = 'template_parts/view_category';
		$this->load->view('main_view',$data);
	}
	public function search(){
		$this->load->model('admin_model');
		$carts = $this->admin_model->get_carts();
		$my_carts = count($carts);
		$data['cart_items']= $my_carts;
		$data['categories'] = $this->admin_model->get_categories();
		$categories = [];
		for ($n=0; $n <count($data['categories']); $n++) { 
			array_push($categories,$data['categories'][$n]->category_name);	
		}
		$data['search_items'] = $this->admin_model->search_items($categories);
		$data['len'] = count($data['search_items']);
		$data['keyword'] = $this->input->post('search_query');
		//var_dump($data['search_items'][1][0]->name);die();
		$data['view'] = 'template_parts/search_results';
		$this->load->view('main_view',$data);

	}
}
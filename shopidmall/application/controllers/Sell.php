<?php 
class Sell extends CI_Controller{
	public function index(){
        if($this->session->userdata('logged_in')){
            $this->load->model('admin_model');
            //$this->load->model('admin_model');
            $data['categories'] = $this->admin_model->get_categories();
            $carts = $this->admin_model->get_carts();
            $my_carts = count($carts);
            $data['cart_items']= $my_carts;
            $data['view'] = 'sell/sell_view';
            $this->load->view('main_view',$data);
        }else{
            redirect('users');
        }
        

	}
	public function create_sell(){
        $this->load->model('admin_model');
        //$this->load->model('admin_model');
        $data['categories'] = $this->admin_model->get_categories();
        $carts = $this->admin_model->get_carts();
        $my_carts = count($carts);
        $data['cart_items']= $my_carts;
		$data['view'] = 'sell/sell_form';
		$this->load->view('main_view',$data);
	}
	/*
	public function add_item(){
		if($this->session->userdata('logged_in')){
			$this->load->model('sell_model');

				$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 10024;
                $config['max_height']           = 7608;
                $this->load->library('upload', $config);
                $this->load->model('sell_model');
                //$this->user_model->upload_propic($pro_pic);
                if ( ! $this->upload->do_upload('item_pic')){
                    redirect('sell/create_sell');     
                }
                else{
                    $file_data = $this->upload->data();
                    $item_pic = $file_data['file_name'];
                    $this->sell_model->upload_propic($item_pic); 
                    redirect('home/my_profile');    
                }

			$add_item = $this->sell_model->add_item();
			if($add_item){
				$this->session->set_flashdata('add_item','Your Ad has been successfully posted');
				redirect('sell');
			}
		}else{
			$this->session->set_flashdata('not_logged','You  have to login first');
			redirect('Sell/create_sell');
		}
	}
	*/
	public function do_upload(){
				$post_data = $this->input->post();
				//var_dump($post_data['hidden_category']);die();
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 10024;
                $config['max_height']           = 7608;
                $this->load->library('upload', $config);
                $this->load->model('sell_model');               
                $file_data = $this->upload->data();
                $item_pic = $file_data['file_name'];
                $this->sell_model->add_item($item_pic); 
                redirect('store');    
                
    }
    public function do_upload_edit($item_id){
                $post_data = $this->input->post();
                //var_dump($post_data['hidden_category']);die();
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1000;
                $config['max_width']            = 10024;
                $config['max_height']           = 7608;
                $this->load->library('upload', $config);
                $this->load->model('sell_model');
                //$this->user_model->upload_propic($pro_pic);
                if ( ! $this->upload->do_upload('item_pic')){
                    redirect('sell/store');     
                }
                else{
                    $file_data = $this->upload->data();
                    $item_pic = $file_data['file_name'];
                    $this->sell_model->edit_item($item_pic,$item_id); 
                    redirect('store');    
                }
    }
        
}
<?php 
class Admin extends CI_Controller{
	public function index(){
		$data['view'] = 'admin/admin_view';
		$data['admin_login'] = 'admin/admin_login';
		$data['sidebar'] = 'template_parts/side-bar'; 
		$this->load->view('admin',$data);
	}
	public function add_category(){
		$data['sidebar'] = 'template_parts/side-bar';
		$data['view'] = 'admin/admin_add_categories';
		$this->load->view('admin',$data);
	}
	public function create_category(){
		$post_data = $this->input->post();
		//var_dump($post_data['hidden_category']);die();
        $config['upload_path']          = './uploads/categories';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 10024;
        $config['max_height']           = 7608;
        $this->load->library('upload', $config);
        $this->load->model('admin_model');
        //$this->user_model->upload_propic($pro_pic);
        if ( ! $this->upload->do_upload('category_pic')){
            redirect('admin/add_category');     
        }
        else{
            $file_data = $this->upload->data();
            $category_pic = $file_data['file_name'];
            $this->admin_model->add_category($category_pic);
            $this->session->set_flashdata('category_add','Your category successfully added'); 
            redirect('admin');    
        }
	}
}
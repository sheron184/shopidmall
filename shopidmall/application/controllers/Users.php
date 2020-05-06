<?php
class Users extends CI_Controller{
	public function index(){
		$this->load->model('admin_model');	
		$data['categories'] = $this->admin_model->get_categories();
		$data['view'] = 'template_parts/login_view';
        $this->load->view('main_view',$data);
	}
	public function register(){
		$this->load->model('user_model');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
        $this->form_validation->set_rules('email','Email','trim|required|min_length[5]'); 
        if($this->form_validation->run()==FALSE){
        	$data = array(
        		'errors' => validation_errors()
        	);
        	$this->session->set_flashdata($data);
        	redirect('users');
        }else{
        	$reg_user = $this->user_model->register();
        }
		if($reg_user){
			$this->session->set_flashdata('register','You have successfully registered');
			redirect('main');
		}else{
			$this->session->set_flashdata('not_register','Something is wrong');
			redirect('users');
		}
	}
	public function login(){
		$this->form_validation->set_rules('username','Username','trim|required|min_length[3]');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
        if($this->form_validation->run()==FALSE){
            $data = array(
                'errors' => validation_errors()
            );
            $this->session->set_flashdata($data);
            redirect('users');     
        }else{
        	$this->load->model('user_model');
			$login_user = $this->user_model->login();
        }
		

		if($login_user){
			//var_dump($login_user[0]);die();
			$this->load->model('admin_model');
			$carts = $this->admin_model->get_carts();
			$howmany_carts = count($carts);
			//var_dump($howmany_carts);die();
			if ($user_data[4] == true) {
				$user_type = 'Super User';
			}else{
				$user_type = 'Normal User';
			}
			$data = [
				'username' => $login_user[0]->username,
				'id'       => $login_user[0]->id,
				'email'    => $login_user[0]->email,
				'admin'    => $login_user[0]->admin,
				'carts'    => $howmany_carts,
				'logged_in'=> true
			];
			$this->session->set_userdata($data);
			$this->session->set_flashdata('login','You have successfully logged in');
			redirect('/');
		}else{
			$this->session->set_flashdata('not_logged','Invalid username or password');
			redirect('users');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}		
}
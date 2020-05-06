<?php
class Pay extends CI_Controller{
	public function pay_view($new_payment_id){
		$data['new_payment_id'] = $new_payment_id;
		$this->load->view('template_parts/pay',$data);
	}
	public function add_one_item_payment($item_id){
        if($this->session->userdata('logged_in')){
            $this->load->model('pay_model');
            $new_payment_id = $this->pay_model->add_one_item_payment($item_id);
            redirect('pay/pay_view'. "/" .$new_payment_id. "");
        }else{
            redirect('users');
        }
    	
    	
    }
    public function delete_one_item_payment($payment_id){
    	$this->load->model('pay_model');
    	if($this->pay_model->delete_one_item_payment($payment_id)){
    		redirect('shop');
    	}
    }
    public function add_cart_payment(){
    	$this->load->model('pay_model');
    	$cart_payment_id = $this->pay_model->add_cart_payment();
    	redirect('pay/pay_view'. "/" .$cart_payment_id. "");
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
class Stripe extends CI_Controller {
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index($amount){
        $data['amount'] = $amount;
        $data['view'] = 'stripe/stripe_view';
        $this->load->view('main_view',$data);
        //$this->load->view('stripe/stripe_view');
    }
        
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function payment(){
      require_once('application/libraries/stripe-php/init.php');
     
      $stripeSecret = 'sk_test_j5k0976GOLSOtiRzbDLpKqat00og5iM3cY';
 
      \Stripe\Stripe::setApiKey($stripeSecret);
      
        $stripe = \Stripe\Charge::create ([
                "amount" => $this->input->post('amount'),
                "currency" => "usd",
                "source" => $this->input->post('tokenId'),
                "description" => "Test payment from tutsmake.com."
        ]);
       // after successfull payment, you can store payment related information into your database
        $data = array('success' => true, 'data'=> $stripe);
        //echo json_encode($data);
        if($data){
            redirect('buy/add_payment');
        }
    }
}
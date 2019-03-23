<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		session_start();
		//$_SESSION['user']['merchat_id'] = 1;
		$this->load->model('Bankcard_Model');
		$ret['data'] = $this->Bankcard_Model->get_card_details($this->session->userdata('mechat_id'));
		//print_r($ret);
		//die();
		$this->load->helper('url');
		$this->load->view('payment/payment_main', $ret);
	}
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		// Your own constructor code
	}
	
	function addnewcard()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('payment/addnewcard');
	}

	function addpaymentcard()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$data['country'] = $this->input->post('country');
		$data['bank_name'] = $this->input->post('bank_name');
		$data['account_type'] = $this->input->post('account_type');
		$data['bank_bsb'] = $this->input->post('bank_bsb');
		$data['bank_account'] = $this->input->post('bank_account');
		$data['bank_account1'] = $this->input->post('bank_account1');
		$data['card_holder'] = $this->input->post('card_holder');
		$data['card_desc'] = $this->input->post('card_desc');
		
		//$data['data']['cardnumber'] = floatval($this->input->post('cardnumber'));
		//$_SESSION['user']['merchat_id'] = 1;
		$this->load->model('Bankcard_Model');
		$ret['data'] = $this->Bankcard_Model->insert_new_card($this->session->userdata('mechat_id'), $data);	

		$this->load->model('Bankcard_Model');
		$ret['data'] = $this->Bankcard_Model->get_card_details($this->session->userdata('mechat_id'));
		$this->load->view('payment/payment_main', $ret);
		
		//$this->load->view('payment/addedpaymentcard',$data);
	}	
	
	function delete()
	{
		//$_SESSION['user']['merchat_id'] = 1;
		$this->load->helper('url');
		$this->load->helper('form');
		$data['data']['id'] = intval($this->input->get('id'));
		//$data['data']['bsb'] = $this->input->post('cardbsb');
		//Here we need update database, however, the logic is not clear yet.
		$this->load->model('Bankcard_Model');
		$ret['data'] = $this->Bankcard_Model->delete_card($this->session->userdata('mechat_id'), $data['data']['id']);		
		

		
		$this->load->model('Bankcard_Model');
		$ret['data'] = $this->Bankcard_Model->get_card_details($this->session->userdata('mechat_id'));		
	
		$this->load->view('payment/payment_main',$ret);
	}	

	function update()
	{
		//$_SESSION['user']['merchat_id'] = 1;
		$this->load->helper('url');
		$this->load->helper('form');
		$data['data']['id'] = intval($this->input->get('id'));

		$this->load->model('Bankcard_Model');
		$ret['data'] = $this->Bankcard_Model->get_card_details($this->session->userdata('mechat_id'), $data['data']['id']);
		$this->load->view('payment/updatecard', $ret);
	
		//$this->load->view('payment/addedpaymentcard',$data);
	}	
	
	function updateSubmitted()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$data['country'] = $this->input->post('country');
		$data['bank_name'] = $this->input->post('bank_name');
		$data['account_type'] = $this->input->post('account_type');
		$data['bank_bsb'] = $this->input->post('bank_bsb');
		$data['bank_account'] = $this->input->post('bank_account');
		$data['bank_account1'] = $this->input->post('bank_account1');
		$data['card_holder'] = $this->input->post('card_holder');
		$data['card_desc'] = $this->input->post('card_desc');
	
		//$data['data']['cardnumber'] = floatval($this->input->post('cardnumber'));
		//$_SESSION['user']['merchat_id'] = 1;
		$this->load->model('Bankcard_Model');
		$ret['data'] = $this->Bankcard_Model->update_card($this->session->userdata('mechat_id'), $data);
	
		$this->load->model('Bankcard_Model');
		$ret['data'] = $this->Bankcard_Model->get_card_details($this->session->userdata('mechat_id'));
		$this->load->view('payment/payment_main', $ret);
	
		//$this->load->view('payment/addedpaymentcard',$data);
	}	
	
	
}
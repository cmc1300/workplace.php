<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
		//$_SESSION['user']['merchat_id']= '1';
		//$this->session->set_userdata('mechat_id', '1');
		$this->load->model('Transaction_Model');
		
		//echo $this->session->userdata('mechat_id'); 
		//die();
		$ret['data'] = $this->Transaction_Model->get_transaction($this->session->userdata('mechat_id') );
		//print_r($ret);
		$this->load->helper('url');
		$this->load->view('transaction_main', $ret);
	}
	

	public function admin()
	{
		//$_SESSION['user']['merchat_id']= '1';
		//$this->session->set_userdata('mechat_id', '1');
		$this->load->model('Transaction_Model');
	
		//echo $this->session->userdata('mechat_id');
		//die();
		$ret['data'] = $this->Transaction_Model->get_transactionAll();
		//print_r($ret);
		$this->load->helper('url');
		$this->load->view('transaction_main', $ret);
	}
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		
		
		// Your own constructor code
		//$this->session->set_userdata('mechat_id', '1');
	}	

	public function dashboard()
	{
		//$_SESSION['user']['merchat_id']= '1';
		$this->load->model('Transaction_Model');
		//echo $this->session->userdata('mechat_id');
		//die();
		$ret['data'] = $this->Transaction_Model->get_transaction($this->session->userdata('mechat_id'));
		//print_r($ret);
		$this->load->helper('url');
		$this->load->view('dashboard', $ret);
	}
	
}
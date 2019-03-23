<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Withdraw extends CI_Controller {

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
		
		$this->session->set_userdata('mechat_id', '1');
		//$_SESSION['user']['merchat_id'] = 1;
		$this->load->model('Withdraw_Model');
		//$ret['data'] = $this->Withdraw_Model->get_withdraw_details($_SESSION['user']['merchat_id']);
		$ret['data'] = $this->Withdraw_Model->get_withdraw_details($this->session->userdata('mechat_id'));
		//print_r($ret);
		//die();
		$this->load->helper('url');
		$this->load->view('withdraw_main', $ret);
	}
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		
		
		//$this->session->set_userdata('mechat_id', '1');
		// Your own constructor code
	}
	
	function addnewcard()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('add_new_card');
	}

	function addpaymentcard()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$data['data']['cardnumber'] = floatval($this->input->post('cardnumber'));
		$data['data']['bsb'] = $this->input->post('cardbsb');
		//Here we need update database, however, the logic is not clear yet.
		
		
		$this->load->view('addedpaymentcard',$data);
	}	
	
	
	
	public function withdraw_form()
	{
		//$_SESSION['user']['merchat_id'] = 1;
		$this->load->model('Withdraw_Model');
		$ret['data'] = $this->Withdraw_Model->get_withdraw_details($this->session->userdata('mechat_id'));
		
		
		$this->load->model('Bankcard_Model');
		$ret['card'] = $this->Bankcard_Model->get_card_details($this->session->userdata('mechat_id'));
		
		//$data['available_amount']
		//print_r($ret);
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('withdraw_form', $ret);
	}
	
	function withdraw_action()
	{
		//$_SESSION['user']['merchat_id'] = 1;
		$data['data']['amount'] = floatval($this->input->post('amount'));
		$data['data']['toperson'] = $this->input->post('toperson');
		$this->load->helper('url');
		/*
		 In order for this to work you will need to
		change the method on your form.
		(Since you do not specify a method in your form,
				it will default to the *get* method -- and CodeIgniter
				destroys the $_GET variable unless you change its
				default settings.)
	
		The *action* your form needs to have is
		index.php/form/search/
		*/
		//Operate on your search data here.
		//One possible way to do this:
		//$this-load-model('search_model');
		//$results_from_search = $this->search->find_data($term);
		// Make sure your model properly escapes incoming data.
		$this->load->model('Withdraw_Model');
		$data['data']['left'] = $this->Withdraw_Model->withdraw($this->session->userdata('mechat_id'),$data['data']);
	
	
		$this->load->view('withdrawed_form', $data);
	}

	
	public function withdraw_history()
	{
		//$_SESSION['user']['merchat_id'] = 1;
		$this->load->model('Withdraw_Model');
		$ret['data'] = $this->Withdraw_Model->get_history($this->session->userdata('mechat_id'));
	
		//$data['available_amount']
		//print_r($ret);
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('withdraw_history', $ret);
	}	
	
	
	public function withdraw_all_history()
	{

		$this->load->model('Withdraw_Model');
		$ret['data'] = $this->Withdraw_Model->get_all_history();
	
		//$data['available_amount']
		//print_r($ret);
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->view('withdraw_all_history', $ret);
	}

	
	public function export_part_to_csv()
	{
		//print_r($this->input->post('index'));
		
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->model('Withdraw_Model');
		$ret = $this->Withdraw_Model->get_all_history_csv($this->input->post('index'));
		$report = $this->dbutil->csv_from_result($ret);
		//write_file('output.csv',$report);
		//$this->load->view('export_to_csv', array('csv'=> $report));
		force_download('result.csv', $report);

	}	
	
	public function export_to_csv()
	{
		/*
		$this->load->helper('csv');
		$this->load->model('Withdraw_Model');
		$ret = $this->Withdraw_Model->get_all_history();		
		$num = $ret->num_fields();
		$var =array();
		$i=1;
		$fname="";
		while($i <= $num){
			$test = $i;
			$value = $this->input->post($test);
		
			if($value != ''){
				$fname= $fname." ".$value;
				array_push($var, $value);
		
			}
			$i++;
		}
		
		$fname = trim($fname);
		
		$fname=str_replace(' ', ',', $fname);
		
		$this->db->select($fname);
		$quer = $this->db->get('<tablename>');
		
		query_to_csv($quer,TRUE,'Products_'.date('dMy').'.csv');
		*/
		
		$this->load->dbutil();
		$this->load->helper('file');
		$this->load->helper('download');
		$this->load->model('Withdraw_Model');
		$ret = $this->Withdraw_Model->get_all_history_csv();
		$report = $this->dbutil->csv_from_result($ret);
		//write_file('output.csv',$report);
		//$this->load->view('export_to_csv', array('csv'=> $report));	
		force_download('result.csv', $report);
		
		/*
		$this->load->dbutil();
		$delimiter = ";";
		$newline = "\r\n";
		$this->load->model('Withdraw_Model');
		$ret = $this->Withdraw_Model->get_all_history();
	
		$this->load->helper('url');
		//$this->load->helper('form');
		$this->load->view('export_to_csv', array('csv'=> $this->dbutil->csv_from_result($ret, $delimiter, $newline)));
			*/
	}	
	
}
<?php

class Withdraw_Model extends CI_Model {

	//var $title   = '';
	//var $content = '';
	//var $date    = '';

	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		
	}

	public function get_withdraw_details($me_id)
	{
		//$query = $this->db->get('tp_transaction_t', 1);
		
		//$array = array('name !=' => $name, 'id <' => $id, 'date >' => $date);
		//$query = $this->db->get_where('tp_transaction_t', array('id' => 0));
		//$array = array('merchat_id =' => $me_id, 'wechat_id =' => $we_id);
		
		
		if(!isset($me_id) || !is_string($me_id) ){
			//echo is_string($me_id);
			return array();
		}
		$array = array('merchat_id =' => $me_id);
		$query = $this->db->get_where('tp_withdraw_t', $array);
		return $query->result();
	}
	
	public function withdraw($me_id, $data)
	{
		//$array = array('merchat_id =' => $me_id, 'wechat_id =' => $we_id);
		$amount = $data['amount'];
		$info = explode(" ", $data['toperson']);
		//echo $bank;

		$bank = '';
		$account = '';
		$bsb = '';
		foreach($info as $item){
			$tmp = explode(":", $item);
			if($tmp[0] == 'Bank')  $bank = $tmp[1];
			if($tmp[0] == 'Account') $account = $tmp[1];
			if($tmp[0] == 'BSB') $bsb = $tmp[1];
		}
		//echo $data['toperson'];
		//echo $bsb, $account, $bank;
		//die();		
		
		if(!isset($me_id) || !is_string($me_id) ){
			return 0;
		}
		$array = array('merchat_id =' => $me_id);
		$this->db->select('available_amount, withdrawed_amount');
		$query = $this->db->get_where('tp_withdraw_t', $array);
		//print_r($query->result());
		//die();
		$ret = $query->result();
		$amount_new_availabe = $ret[0]->available_amount - $amount;
		$amount_new_withdrawed = $ret[0]->withdrawed_amount + $amount;
		
		
		//$array = array('merchat_id =' => $me_id, 'wechat_id =' => $we_id);
		if(!isset($amount) || !is_numeric($amount) ){
			return 0;
		}
		
		$array = array('merchat_id =' => $me_id);
		$this->db->where($array);
		$this->db->update('tp_withdraw_t', array('available_amount'=>$amount_new_availabe, 
				'withdrawed_amount'=>$amount_new_withdrawed));
		
		
		
		$array = array('merchat_id =' => $me_id);
		//$this->db->where($array);
		$this->db->insert('tp_withdraw_history_t', array('merchat_id'=>$me_id, 'amount'=>$amount,
				'bank_name'=>$bank, 'bank_account'=>$account, 'bank_bsb'=>$bsb));
		
		return $amount_new_availabe;
	}

	
	public function get_history($me_id)
	{
		//$query = $this->db->get('tp_transaction_t', 1);
	
		//$array = array('name !=' => $name, 'id <' => $id, 'date >' => $date);
		//$query = $this->db->get_where('tp_transaction_t', array('id' => 0));
		//$array = array('id <' => 2);
		if(!is_string($this->session->userdata('mechat_id')) )
		{
			return array();
			//$this->session->set_userdata('mechat_id', 99);
		}	
		$array = array('merchat_id =' => $this->session->userdata('mechat_id'));
		$query = $this->db->get_where('tp_withdraw_history_t', $array);
		return $query->result();
	}

	public function get_all_history()
	{
		//$query = $this->db->get('tp_transaction_t', 1);
	
		//$array = array('name !=' => $name, 'id <' => $id, 'date >' => $date);
		//$query = $this->db->get_where('tp_transaction_t', array('id' => 0));
		//$array = array('id <' => 2);

		$this->db->from('tp_withdraw_history_t');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->result();
	}

	
	public function get_all_history_csv($index)
	{
		//$query = $this->db->get('tp_transaction_t', 1);
	
		//$array = array('name !=' => $name, 'id <' => $id, 'date >' => $date);
		//$query = $this->db->get_where('tp_transaction_t', array('id' => 0));
		//$array = array('id <' => 2);
		if(!isset($index) || count($index) == 0){
			return 0;
		}
		if(count($index) > 0){
			//print_r(array_values($index));
			//print_r($index);
			//die();
			$this->db->where_in('id', $index );
		}
		$this->db->select('amount, bank_account,bank_bsb');
		$this->db->from('tp_withdraw_history_t');
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query;
	}	
	/*
	function insert_entry()
	{
		$this->title   = $_POST['title']; // please read the below note
		$this->content = $_POST['content'];
		$this->date    = time();

		$this->db->insert('entries', $this);
	}

	function update_entry()
	{
		$this->title   = $_POST['title'];
		$this->content = $_POST['content'];
		$this->date    = time();

		$this->db->update('entries', $this, array('id' => $_POST['id']));
	}
	*/

}

?>

<?php

class Bankcard_Model extends CI_Model {

	//var $title   = '';
	//var $content = '';
	//var $date    = '';

	public function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	public function get_card_details($me_id, $id=false)
	{
		//$query = $this->db->get('tp_transaction_t', 1);
		
		//$array = array('name !=' => $name, 'id <' => $id, 'date >' => $date);
		//$query = $this->db->get_where('tp_transaction_t', array('id' => 0));
		//$array = array('merchat_id =' => $me_id, 'wechat_id =' => $we_id);
		if(!$id){
			$array = array('merchat_id =' => $me_id);
		}
		else {
			$array = array('merchat_id =' => $me_id, 'id'=>$id);
		}
		$query = $this->db->get_where('tp_card_info_t', $array);
		return $query->result();
	}
	
	public function insert_new_card($me_id, $data)
	{
		$array = array('merchat_id =' => $me_id);

		
		//$array = array('merchat_id =' => $me_id, 'wechat_id =' => $we_id);
		$array = array('merchat_id =' => $me_id);
		//$this->db->where($array);
		$this->db->insert('tp_card_info_t', array('merchat_id'=>$me_id, 
				'bank_name'=>$data['bank_name'],
				'bank_account'=>$data['bank_account'],
				'bank_bsb'=>$data['bank_bsb'],
				'card_holder'=>$data['card_holder'],
				'card_desc'=>$data['card_desc'],
				'country'=>$data['country']
				));
		
		
	}
	
	
	public function delete_card($me_id, $id)
	{
		$array = array('merchat_id =' => $me_id, 'id'=>$id);
		$this->db->delete('tp_card_info_t', $array);
	}	

	/*
	function insert_entry()
	{
		$this->title   = $_POST['title']; // please read the below note
		$this->content = $_POST['content'];
		$this->date    = time();

		$this->db->insert('entries', $this);
	}
	*/
	public function update_card($me_id, $data)
	{

		$this->db->update('tp_card_info_t', $this, array('merchat_id'=>$me_id, 
				'bank_name'=>$data['bank_name'],
				'bank_account'=>$data['bank_account'],
				'bank_bsb'=>$data['bank_bsb'],
				'card_holder'=>$data['card_holder'],
				'card_desc'=>$data['card_desc'],
				'country'=>$data['country']));
	}
	

}

?>
<?php
class Transaction_Model extends CI_Model {
	
	// var $title = '';
	// var $content = '';
	// var $date = '';
	public function __construct() {
		// Call the Model constructor
		parent::__construct ();
	}
	public function get_transaction($meid) {
		// $query = $this->db->get('tp_transaction_t', 1);
		
		// $array = array('name !=' => $name, 'id <' => $id, 'date >' => $date);
		// $query = $this->db->get_where('tp_transaction_t', array('id' => 0));
		// $array = array('id <' => 2);
		if(!isset($meid) || !is_string($meid) ){
			return array();
		}
		
		$array = array (
				'merchat_id =' => $meid
		);
		$query = $this->db->get_where ( 'tp_transaction_t', $array );
		return $query->result ();
	}
	public function get_transactionAll() {
		$query = $this->db->query ( 'select * from tp_transaction_t' );
		return $query->result ();
	}
	
	/*
	 * function insert_entry() { $this->title = $_POST['title']; // please read the below note $this->content = $_POST['content']; $this->date = time(); $this->db->insert('entries', $this); } function update_entry() { $this->title = $_POST['title']; $this->content = $_POST['content']; $this->date = time(); $this->db->update('entries', $this, array('id' => $_POST['id'])); }
	 */
	public function create() {
		$sql = "INSERT INTO `tp_user_t` (
		`user_id`,
		`merchat_id`,
		`password`,
		`email`,
		`address`,
		`phone`,
		`status`,
		`create_date`,
		`type`
		)
		VALUES
		(
		'" . $_REQUEST ['user_id'] . "',
		'" . $_REQUEST ['merchat_id'] . "',
		'" . $_REQUEST ['password'] . "',
		'" . $_REQUEST ['email'] . "',
		'" . $_REQUEST ['address'] . "',
		'" . $_REQUEST ['phone'] . "',
		'" . $_REQUEST ['status'] . "',
		'" . date ( $format ) . "',
		'" . $_REQUEST ['type'] . "')";
		$result = $this->db->query ( $sql );
		$this->load->view ( 'admin/registry' );
		
		$array = array (
				'merchat_id =' => $this->session->userdata('mechat_id') 
		);
		$query = $this->db->query( 'tp_transaction_t', $array );
		return $query->result ();
	}
}

?>
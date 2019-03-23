<?php

if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Registry extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * http://example.com/index.php/welcome
	 * - or -
	 * http://example.com/index.php/welcome/index
	 * - or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * 
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'form' );
		$this->load->helper ( 'url' );
	}
	

	public function lists() {
		$sql = "select * from `tp_user_t` where status = 1";
		$result = $this->db->query($sql);	
		$data = array();
		$data['data'] =$result;
		$this->load->view ( 'admin/userlist',$data);
	}
	
	public function index() {
		$this->load->view ( 'admin/registry' );
	}
	public function createUser() {
		
		//print_r($_REQUEST);
		//die();
		$password = md5($_REQUEST['password']."|tenpay");
		
		$sql = "INSERT INTO `tp_user_t` (
		`user_id`,
		`merchat_id`,
		`password`,
		`email`,
		`address`,
		`phone`,
		`status`,
		`type`
		)
		VALUES
		(
		'".$_REQUEST['user_id']."',
		'".$_REQUEST['merchat_id']."',
		'".$password."',
		'".$_REQUEST['email']."',
		'".$_REQUEST['address']."',
		'".$_REQUEST['phone']."',1,
		'".$_REQUEST['type']."')";
		$result = $this->db->query($sql);	
		$ret['data'] = $_REQUEST;
		$this->load->view ( 'admin/register_success',$ret );
	}
	
	public function edit($user_id){
		$sql = "select * from `tp_user_t` where id=".$user_id;
		$result = $this->db->query($sql);
		$data = array();
		$data['data'] =$result->result();
		$this->load->view ( 'admin/edit',$data);
	}
	
	public function delete($user_id){
		$sql = "update `tp_user_t` set state = -1 where id=".$user_id;
		$result = $this->db->query($sql);
		redirect("registry/lists");
	}
	
	
}
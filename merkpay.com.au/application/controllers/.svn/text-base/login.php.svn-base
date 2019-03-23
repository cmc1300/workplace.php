<?php
class Login extends CI_Controller {
	
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
		$this->load->library ( 'session' );
	}
	public function login() {
		$this->load->view ( 'login' );
	}
	public function index() {
		$this->load->view ( 'login' );
	}
	public function failed() {
		$data = array ();
		$data ["message"] = "failed";
		$this->load->view ( 'login', $data );
	}
	public function login_process() {
		$login_name = $_REQUEST ['login_name'];
		$password = $_REQUEST ['password'];
		if (isset ( $password ) && isset ( $login_name )) {			
			$sql = "select * from tp_user_t where user_id='" . $login_name . "'";
			$result = $this->db->query ( $sql );
			// var_dump($result->result()[0]->type);
			if (isset ( $result ) ) {
				if ($result->result ()[0]->password == md5 ( $password . "|tenpay" )) {
					// session_start();
					// unset($_SESSION['user']['admin']);
					if ($result->result ()[0]->type == "99") {
						// $_SESSION['user']['admin']="1";
						$this->session->set_userdata ( 'mechat_id', 1 ); // admin's mechat_id is always 1
						$this->session->set_userdata ( 'is_admin', true );
						redirect ( 'registry/lists', 'refresh' );
					} else {
						// $_SESSION['user']['merchat_id']=$result->result()[0]->merchat_id;

						$this->session->set_userdata ( 'mechat_id', $result->result ()[0]->merchat_id );
						$this->session->set_userdata ( 'is_admin', false );
						redirect ( 'dashboard', 'refresh' );
					}
					redirect ( 'dashboard', 'refresh' );
				}
			}
		}
		redirect ( 'login/failed', 'refresh' );
	}
	public function logout() {
		session_start ();
		unset ( $_SESSION ['user'] );
		$data = array ();
		$data ["message"] = "logout";
		$this->load->view ( 'login', $data );
	}
	public function register() {
		$email = $_REQUEST ['email'];
		$username = $_REQUEST ['username'];
		
		if (isset ( $email ) && $email != "") {
			$sql = "select count(1) as count from `tp_user_t` where email='" . $email . "'";
			$result = $this->db->query ( $sql );
			if ($result->result ()[0]->count > 0) {
				$data = array ();
				$data ["message"] = "failed";
				$this->load->view ( 'register', $data );
			} else {
				$ret ['data'] ['email'] = $_REQUEST ['email'];
				$ret ['data'] ['username'] = $_REQUEST ['username'];
				$this->load->view ( 'admin/registry', $ret );
			}
		}
	}
}
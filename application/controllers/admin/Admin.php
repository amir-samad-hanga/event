<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	private $adminSignInFormId 		= 'adminSignin';
	private $adminSignInFormAction 	= 'admin/signin';
	private $adminRegisterFormId 	= 'adminRegister';
	private $adminRegisterFormAction= 'admin/register';

	
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->helper('password');
		$this->load->model('admin/admin_model');
		$this->lang->load(array('form_validation_lang'));
	}
	
	public function index(){
		$data['pageName'] = ADMIN_DASHBOARD_PAGE;
		if(isset($_SESSION['admin_email']) AND !empty($_SESSION['admin_email'])){
			$data['title'] = 'admin dashboard';
			
			$this->load->view('admin/template/header',$data);
			$this->load->view('admin/dashboard',$data);
			$this->load->view('admin/template/footer',$data);			
		} else {
			redirect($uri = 'admin/signin', $method = 'auto', $code = 301);
		}
	}
	
	public function signin(){
		if(isset($_SESSION['admin_email']) AND !empty($_SESSION['admin_email'])){
			redirect($uri = 'admin/dashboard', $method = 'auto', $code = 301);
		}	

		$data['pageName'] = ADMIN_SIGNIN_PAGE;
		$data['title'] = 'Admin Signin Panel | '.SITE_NAME;
		$data['form_id'] = $this->adminSignInFormId;
		$data['action'] = base_url($this->adminSignInFormAction);
		
		if($this->input->post()){
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('username', 'Email', 'required|valid_email');			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/panelHeader',$data);
				$this->load->view('signin',$data);
				$this->load->view('template/panelFooter',$data);
				return;
			} else{	
				$res = $this->admin_model->siginInAdmin();
				$pass = $this->input->post('password',true);
				
				if($res['result']){
					$_SESSION['admin_name'] = $res['data']->name;
					$_SESSION['admin_email'] = $res['data']->email;
					$_SESSION['admin_id'] = $res['data']->id;
					redirect($uri = 'admin/dashboard', $method = 'auto', $code = 301);					
				} else{
					$data['errorMsg'] = $res['msg'];
				} 
			}			
		}
		$this->load->view('template/panelHeader',$data);
		$this->load->view('signin',$data);
		$this->load->view('template/panelFooter',$data);
	}
	
	public function register(){
		if(!isset($_SESSION['admin_email']) || empty($_SESSION['admin_email'])){
			redirect($uri = 'admin/signin', $method = 'auto', $code = 301);
			return;
		}
		$data['pageName'] = ADMIN_REGISTER_PAGE;
		$data['title'] = 'Admin Register Panel | '.SITE_NAME;
		$data['form_id'] = $this->adminRegisterFormId;
		$data['action'] = base_url($this->adminRegisterFormAction);
		
		if($this->input->post()){
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('passwordConfirm', 'Password Confirmation', 'required|matches[password]');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('template/panelHeader',$data);
				$this->load->view('register',$data);
				$this->load->view('template/panelFooter',$data);
				return;
			} else{	
				$data['response'] = $this->admin_model->registerAdmin();
			}			
		}
		$this->load->view('template/panelHeader',$data);
		$this->load->view('register',$data);
		$this->load->view('template/panelFooter',$data);
	}
	
	public function logOutAdmin(){
		unset($_SESSION['admin_name']);
		unset($_SESSION['admin_email']);
		unset($_SESSION['admin_id']);
		redirect($uri = 'admin/dashboard', $method = 'auto', $code = 301);
		/*
		$_SESSION = array();
		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(session_name(), '', time() - 42000,
				$params["path"], $params["domain"],
				$params["secure"], $params["httponly"]
			);
		}
		// Finally, destroy the session.
		session_destroy();
		*/
	}
}	
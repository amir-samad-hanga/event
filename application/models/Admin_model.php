<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model{
	private $_name = 'admin'; // name of the main table 
	
	public function __construct(){
		parent::__construct();
	}
	
	public function siginInAdmin(){
		try{
			$email = $this->input->post('username',true);
			$pass = $this->input->post('password',true);
			
			$where = array('email'=>$email);
			$qry = $this->db->get_where($this->_name,$where);
			if(!$qry || $qry->num_rows() !== 1){
				throw new Exception($this->lang->line('form_validation_invalid_email'));
			}
			$res = $qry->row();

			if (!password_verify($pass, $res->password)) {
				throw new Exception($this->lang->line('form_validation_valid_password'));
			} 
			unset($res->password);
					
			$data = array('result'=>true, 'msg'=>$this->lang->line('form_submit_success'), 'data' => $res);
		} catch(Exception $e){
			$data = array('result'=>false, 'msg'=>$e->getMessage());
		}
		return $data;
	}
	
	public function registerAdmin(){
		try{
			$email = $this->input->post('email',true);
			$pass = $this->input->post('password',true);
			$username = $this->input->post('username',true);
			$hash = password_hash($pass, PASSWORD_BCRYPT);
			
			$data = array('name' => $username, 'email' => $email, 'password' => $hash);
			$where = array('email'=>$email);

			// mysql error with error code 1062 means duplicate entry for email entry (which must be unique). This means the email is already registered so it runs update query
			if(!$this->db->insert($this->_name, $data) AND strpos($this->db->error()['code'], '1062')){
				if(!$this->db->update($this->_name, $data, $where)){
					throw new Exception($this->lang->line('form_submit_failed'));
				}
			}
			$data = array('result' => true, 'msg' => $this->lang->line('form_submit_success'));
		} catch(Exception $e){
			$data = array('result'=>false, 'msg'=>$e->getMessage());
		}
		return $data;		
	}
}
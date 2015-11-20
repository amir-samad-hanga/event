<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index(){
		$data['title'] = 'admin dashboard';
		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/template/footer',$data);
	}

}	
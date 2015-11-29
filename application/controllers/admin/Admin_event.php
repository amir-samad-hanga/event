<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_event extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->model('admin/admin_event_model');
		$this->lang->load(array('form_validation_lang'));
		$this->lang->load(array('db_lang'));
		$this->lang->load(array('custom_lang'));
	}
	
	public function create($en = ''){
		if(!isset($_SESSION['admin_email']) || empty($_SESSION['admin_email'])){
			redirect($uri = 'admin/signin', $method = 'auto', $code = 301);
			return;
		}
		$id = $this->uri->segment(4, 0);
		$data['event'] = $this->admin_event_model->getEventById($id);
		if($data['event'] == false AND $id > 0){
			show_404();
		}
		$data['pageName'] = ADMIN_EVENT_CREATE_PAGE;
		$data['title'] = 'admin dashboard';
		
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/createEvent',$data);
		$this->load->view('admin/template/footer',$data);			
	}
	
	public function saveEvent(){
		$imgName = null;
		$data = array('result'=>false);
		$form = $this->input->post();	
		if($_FILES['eventImg']['size'] > 0){
			$config['upload_path']          = './assets/uploads/event';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['max_size']             = 0;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;
			$config['file_ext_tolower']     = true;
			$config['encrypt_name']     	= true;
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('eventImg'))
			{
				$data['imgError'] = $this->upload->display_errors();
			}
			else
			{
				$imgName = $this->upload->file_name;
			}			
		}
		
		$formRes = $this->admin_event_model->saveEvent($imgName);
	echo json_encode($formRes);
	} 
}	
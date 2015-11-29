<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_event_model extends CI_Model{
	private $_name = 'admin'; // name of the main table 
	private $_eventTable = 'event'; 
	
	public function __construct(){
		parent::__construct();
	}
	
	public function getEventById($id){
		try{
			$where = array('id' => $id);
			$qry = $this->db->get_where($this->_eventTable, $where);
			if($qry->num_rows() != 1){
				throw new Exception();
			} 
			return $qry->row();
		} catch(Exception $e){
			return false;
		}
	}
	
	public function saveEvent($imgName = null){
		$insertId = '';
		try{
			$id = $this->input->post('eventId', true);
			$data = array(
				'title'					=> $this->input->post('title', true),
				'category'				=> $this->input->post('category', true),
				'subcategory'			=> $this->input->post('subcategory', true) ? $this->input->post('subcategory', true) : '',
				'start_date'			=> $this->input->post('start_date', true) ? $this->input->post('start_date', true) : '',
				'end_date'				=> $this->input->post('end_date', true) ? $this->input->post('end_date', true) : '',
				'prize_one_amt'			=> $this->input->post('prize_one_amt', true) ? $this->input->post('prize_one_amt', true) : '',
				'prize_one_detail'		=> $this->input->post('prize_one_detail', true)?$this->input->post('prize_one_detail', true):'',
				'prize_two_amt'			=> $this->input->post('prize_two_amt', true)?$this->input->post('prize_two_amt', true):'',
				'prize_two_detail'		=> $this->input->post('prize_two_detail', true)?$this->input->post('prize_two_detail', true):'',
				'prize_three_amt'		=> $this->input->post('prize_three_amt', true)?$this->input->post('prize_three_amt', true):'',
				'prize_three_detail'	=> $this->input->post('prize_three_detail', true)?$this->input->post('prize_three_detail', true):'',
				'detail'				=> $this->input->post('detail', true)?$this->input->post('detail', true):'',
				'rules'					=> $this->input->post('rules', true)?$this->input->post('rules', true):'',
			);
			
			if($imgName != null){
				$data['image']			= $imgName;
			}
			if(isset($id) || !empty($id)){
				if(!$this->db->insert($this->_eventTable, $data)){
					throw new Exception($this->lang->line('form_submit_failed'));
				}
				$insertId = $this->db->insert_id();
			}else{
				$where = array('id'=>$id);
				$rows = $this->db->get_where($this->_eventTable, $where);
				if($rows->num_rows() != 1){
					throw new Exception($this->lang->line('db_error_invalid_id'));
				} else if (!$this->db->update($this->_eventTable, $data, $where)){
					throw new Exception($this->lang->line('db_error_heading'));
				}
			}
			$res = array('result'=>true, 'msg'=>$this->lang->line('event_updated_success'), 'data' => $insertId);
		} catch(Exception $e){
			$res = array('result'=>false, 'msg'=>$e->getMessage());
		}
		return $res;
	}

}













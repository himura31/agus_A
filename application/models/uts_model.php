<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uts_model extends CI_Model 
	{
		public function _construct()
		{
			parent::_construct();
		}
		public function get_id_level()
		{
			
			$this->db->select('idlevel,namalevel')
			->from('level');
			$res = $this->db->get
		}
	

	
	}
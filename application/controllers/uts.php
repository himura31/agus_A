<?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 class uts extends CI_Controller {

		public function _construct()
		{
			parent::_construct();
		}
		function index()
		{
			$this->load->model('uts_model','usmod');
			$user = $this->usmod->get_id_level();
			$data["user"] = array   (
									'idlevel' => 
									)
		}


?>
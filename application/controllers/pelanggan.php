<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan extends CI_Controller {

		public function index(){


			$data['page'] = "pelanggan/form";
			$this->load->view('main',$data);
		}

		public function submit()

		{
			$this->load->model('pelanggan_model');
			$this->load->helper('autoid');
			$table = 'pelanggan';
			$fields = 'pelangganId';
			$inisial = 'PL';
			$pelanggan = $this->input->post('pelangganId');
			if ($id_pelanggan =='')
			{
				$id_pel = get_id($fields,$table,$inisial);
				$pelanggan = array  (
									'pelangganId'=>$id_pel
									'namaPelanggan'=>$this->input->post('namaPelanggan'),
									'email'=>$this->input->post('email'),
									'telpon'=>$this->input->post('telpon'),
									'alamat'=>$this->input->post('alamat'),
									);
				$pelanggan['pelangganId'] = get_id($fields,$table,$inisial);
				$this->pelanggan_model->add($pelanggan);	 
			}
			else
			{
				$data = array   (
									'namaPelanggan'=>$this->input->post('namaPelanggan'),
									'email'=>$this->input->post('email'),
									'telpon'=>$this->input->post('telpon'),
									'alamat'=>$this->input->post('alamat'),
								);
				$this->pelanggan_model->add($pelanggan);
			}
		}

		public function show_list_pelanggan()
		{
			#code...
			$data['page'] = "pelanggan/list_pelanggan";
			$this->load->model('pelanggan_model');
			$data["pelanggan"] = $this->pelanggan_model->get_pelanggan();
			//$this->load->view('pelanggan/list_pelanggan',$data);

			$this->load->view('main',$data);
		}

		public function hapus_pelanggan()
		{
			$this->load->model('pelanggan_model');
			$id_pelanggan = $this->url->segment(3);
			$this->pelanggan_model->hapus_pelanggan($id_pelanggan);
		}
		public function edit_pelanggan()
		{
			$id_pelanggan = $this->url->segment(3);
			$this->load->model('pelanggan_model');
			$data["data_pelanggan"] = $this->pelanggan_model->get_pelanggan_detail($id_pelanggan);
			$data['page'] = "pelanggan/form";
			$this->load->view('main',$data);
		}


}

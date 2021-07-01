<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('App_model');
		$this->load->library('form_validation');
	}
	public function index()
	{

		$style = $this->load->view('style', '', true);
		$script = $this->load->view('script', '', true);
		$data = [];
		$this->template->load('master_app', 'welcome', compact('style', 'script', 'data'));
	}
	public function parkir()
	{

		$data['style']  = $this->load->view('style', '', true);
		$data['script']  = $this->load->view('script', '', true);
		$data['dataArea'] = $this->App_model->readArea();
		$data['dataParkir'] = $this->App_model->readParkir();
		if (isset($data['dataParkir']['0']['jam'])) {
			$jam = $data['dataParkir']['0']['jam'];
			if ($jam == 0) {
				$bayar = 2000;
				$data['bayar'] =  $bayar;
			} else {
				$bayar = $jam * 2000;
				$data['bayar'] =  $bayar;
			}
		}
		$this->template->load('master_app', 'parkir', $data);
	}
	public function parkirCreate()
	{
		$data['dataArea'] = $this->App_model->readArea();
		$kapasitas = $data['dataArea']['0']['kapasitas'];
		$terpakai = $data['dataArea']['0']['terpakai'];
		$kosong = $data['dataArea']['0']['kosong'];
		$this->form_validation->set_rules('plat', 'plat', 'required');
		if ($this->form_validation->run() == false) {
			$this->parkir();
		} else {
			$str =  $this->input->post('plat');
			$new_str = str_replace(' ', '', $str);
			$data = [
				"id_parkir" => 'NULL',
				"plat" => $new_str,
				"tanggal" => date('Y-m-d'),
				"waktu_masuk" => date('H:i:s'),
				"waktu_keluar" => 'NULL',
				"id_area" => 2,
			];
			if ($terpakai < $kapasitas) {
				$this->App_model->createParkir($data);
				$data = [
					"kosong" => $kosong - 1,
					"terpakai" => $terpakai + 1,
				];
				$this->App_model->updateArea(2, $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kendaraan telah diparkirkan. </div>');
				redirect('app/parkir');
			}
			if ($terpakai >= $kapasitas) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Parkir penuh. </div>');
				redirect('app/parkir');
			}
		}
	}
	public function parkirDelete()
	{
		$data['dataArea'] = $this->App_model->readArea();
		$terpakai = $data['dataArea']['0']['terpakai'];
		$kosong = $data['dataArea']['0']['kosong'];
		$id = $this->input->post('id_parkir');
		$data = [
			"kosong" => $kosong +  1,
			"terpakai" => $terpakai - 1,
		];
		$this->App_model->updateArea(2, $data);
		$this->App_model->deleteParkir($id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Kendaraan telah keluar. </div>');
		redirect('app/parkir');
	}
}

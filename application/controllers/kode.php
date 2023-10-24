<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kode extends CI_Controller {

	function __contruct()
	{
		parent::__contruct();
		$this->load->database();
		$this->load->model('M_kode','kode');
	}

	public function index()
	{
		$data['kode']=$this->M_kode->buat_kode();
		$this->load->view('kode_view',$data);
	}
}

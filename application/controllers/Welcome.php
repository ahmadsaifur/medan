<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Dokter_model', 'dokter');
	}
	public function index()
	{
		$data['title'] = "Gigi Sehat ";
		$data['headmeta'] = " Alkindi  ";
		$data['description'] = "Your Style";
		$data['keywords'] = "keywords";
		$data['subheadtitle'] = "Alkindi Poli Gigi";
		$data['doctor'] = $this->dokter->fetch_data('dokter', ['id_subj' => "drg"])->result();
		$data['data'] =
			[
				'title' => 'Gigi Sehat',
				'headmeta' => 'Alkindi ',
				'subheadtitle' => 'Alkindi Poli Gigi',
			];
		$this->template->load('template', 'templating/home', $data);
	}

	public function about()
	{
		$data['title'] = "Gigi Sehat";
		$data['headmeta'] = " Alkindi  ";
		$data['data'] =
			[
				'title' => 'Gigi Sehat',
				'headmeta' => 'Alkindi '
			];
		$this->template->load('template', 'home/about', $data);
	}
}

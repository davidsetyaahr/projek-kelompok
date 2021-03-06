<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		if($this->session->userdata("status") != "login")
		{
			redirect(base_url()."login");
		}
		else if($this->session->userdata("hak_akses") == "Siswa" || $this->session->userdata("hak_akses") == "Tentor" || $this->session->userdata("hak_akses") == "Orang Tua")
		{
			show_404();
		}
	}

	public function index()
	{
        $menu = array(
            "title" => $this->title,
		);

		$card['title'] = "Laporan <span>> List Laporan</span>";
       	$data["laporan"] = $this->common->getData("*", "laporan_keuangan", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('keuangan/laporan_keuangan/list-laporan', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

	public function input_cicilan()
	{
		$card['title'] = "Laporan <span>> Tambah Cicilan </span>";
		//$data["data"] = $this->common->getData("*", "mapel", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/laporan_keuangan/tambah-laporan');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }
}

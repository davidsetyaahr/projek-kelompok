<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		if($this->session->userdata("status") != "login")
		{
			redirect(base_url()."login");
		}
		else if($this->session->userdata("hak_akses") != "Admin"){
			show_404();
		}
	}

	public function index()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."data-master/group/input-group",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		);
		$card['title'] = "Group <span>> List Group</span>";
		$data["data"] = $this->common->getData("t.kode_tentor, t.nama_tentor, g.*" ,"group_siswa g", ["tentor t", "t.kode_tentor=g.kode_tentor"], "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-master/group/list_group', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
	
	public function input_group()
	{
		$cek = $this->common->getData("kode_group", "group_siswa", "", "", "");
		if(count($cek)==0){
			$kode = "GP001";
		}
		else{
				$getKode = $this->common->getData("kode_group", ["group_siswa",1], "", "", ["kode_group","desc"]);
				$getInt = (int)substr($getKode[0]['kode_group'],2,3) + 1;
				if(strlen($getInt)==1){
					$nol = "00";
			}
			else if(strlen($getInt)==2){
				$nol = "0";
			}
			else if(strlen($getInt)==3){
				$nol = "";
			}
			$kode = "GP".$nol.$getInt;
		}
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."data-master/group",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Group <span>> Input Group</span>";
		$data["data"] = $this->common->getData("kode_tentor, nama_tentor", "tentor", "", "", "");
		$data["kode"] = $kode;
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('data-master/group/input_group', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
	
	public function insert_group()
	{
		$this->common->insert("group_siswa", $this->input->post());
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."data-master/group");
	}
	
	public function edit_group($kode)
	{
		$where = array("kode_group" => $kode);
		$data["data"] = $this->common->getData("*" ,"group_siswa","", $where, "");
		$data["tentor"] = $this->common->getData("*" ,"tentor","", "", ""); 
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."data-master/group",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Group <span>> Edit Group</span>";
        $this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('data-master/group/edit_group', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

	public function update_group(){
		$filter = array("kode_group" => $this->input->post("kode_group"));
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		$this->common->update("group_siswa", $this->input->post(), $filter);
		redirect(base_url()."data-master/group");
	}
}

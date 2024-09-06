<?php
class Cetakkwitansi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_proses');
	}

	function cetak(){
		if($this->session->userdata("sess_ok_paru")){
			$sess_data = $this->session->userdata("sess_ok_paru");
			$data["id"] = $sess_data["id"];
			$data["nama"]=$sess_data["nama"];
			$noregop=$_POST['hidden_noregop'];
			$ex_noregop = explode(",",$noregop);
			$in_noregop=substr(join("','", $ex_noregop),2)."'";
			$data['pasien']=$this->m_proses->get("noregistrasiop,tglregistrasiop,norm,namapasien,jk,tgllahir,unitasal,dokterpengirim,carabayar,notinop,total,penjamin","vw_cetakkwitansitindakanokparu","noregistrasiop IN(".$in_noregop.")")->result();
			$this->load->view("v_cetakkwitansi",$data);
		}
		else{
			redirect("login","refresh");
		}
	}

	function cetak_selesai($noregop){
		if($this->session->userdata("sess_ok_paru")){
			$sess_data = $this->session->userdata("sess_ok_paru");
			$data["id"] = $sess_data["id"];
			$data["nama"]=$sess_data["nama"];
			$data['pasien']=$this->m_proses->get("noregistrasiop,tglregistrasiop,norm,namapasien,jk,tgllahir,unitasal,dokterpengirim,carabayar,notinop,total,penjamin","vw_cetakkwitansitindakanokparu","noregistrasiop ='$noregop'")->result();
			$this->load->view("v_cetakkwitansi",$data);
			
		}
		else{
			redirect("login","refresh");
		}
	}
}
?>
<?php
class Mutupelayanan extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model('m_mutupelayanan');
	}

	public function index(){
		if($this->session->userdata("sess_ok_paru")){
			$sess_data = $this->session->userdata("sess_ok_paru");
			$data["id"] = $sess_data["id"];
			$data["nama"] = $sess_data["nama"];
			$data["rawatinap"] = $this->m_mutupelayanan->getRawatInap();
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_mutupelayanan",$data);
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}

	function isiMutuPelayanan($noregistrasiop){
		if($this->session->userdata("sess_ok_paru")){
			$sess_data = $this->session->userdata("sess_ok_paru");
			$data["id"] = $sess_data["id"];
			$data["nama"] = $sess_data["nama"];
			$data["noregop"] = $noregistrasiop;
			$data["rawatinap"] = $this->m_mutupelayanan->getRawatInap();
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_mutupelayanan",$data);
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}

	function getDetailPemesananOperasi(){
		$noregop=$_POST["noregop"];
		$data=$this->m_mutupelayanan->getDetailPemesananOperasi($noregop)->row();
		echo json_encode($data);
	}

	function getDetailPasien(){
		$norm=$_POST["norm"];
		$data=$this->m_mutupelayanan->getDetailPasien($norm)->row();
		echo json_encode($data);
	}

	function getDetailAsalPasien(){
		$noregistrasi=$_POST["noregistrasi"];
		$data=$this->m_mutupelayanan->getDetailAsalPasien($noregistrasi)->row();
		echo json_encode($data);
	}

	function getMutuPelayanan(){
		$noregop=$_POST["noregop"];
		$data=$this->m_mutupelayanan->getMutuPelayanan($noregop)->row();
		echo json_encode($data);
	}

	function insupMutuPelayanan(){
		$sess_data = $this->session->userdata("sess_ok_paru");
		$id_user = $sess_data["id"];
		date_default_timezone_set("Asia/Jakarta");
		$tgl_user=date("Y-m-d H:i:s");
		$data=$_POST["arr_data"];
		$id=$data["id"];
		if($id!=""){
			$data_update=array(
				"ruangPerawatan"=>$data["ruangperawatan"],
				"terdapatInsiden"=>$data["insidenpasien"],
				"kronologiInsiden"=>$data["kronologiinsiden"],
				"jenisInsiden"=>$data["jenisinsiden"],
				"tindakanSementara"=>$data["tindakansementara"],
				"permasalahanOP"=>$data["permasalahanop"],
				"siteMarking"=>$data["sitemarking"],
				"pemakaianGelangPasien"=>$data["gelangpasien"],
				"kesesuaianIdentitas"=>$data["sesuaiidentitas"],
				"kejadianPasienJatuh"=>$data["pasienjatuh"],
				"tertinggalBendaAsing"=>$data["bendaasing"],
				"dot"=>$data["dot"],
				"discrepancyOP"=>$data["discrepancyop"],
				"reOperasi"=>$data["reoperasi"],
				"tundaOP"=>$data["tundaop"],
				"kelangkapanAsesmen"=>$data["lengkapasesmen"],
				"signOut"=>$data["signout"],
				"idUser"=>$data["iduser"].";".$id_user,
				"tglUser"=>$data["tgluser"].";".$tgl_user
			);
			$data_return=$this->m_mutupelayanan->updateMutuPelayanan($id,$data_update);
		}else{
			$data_insert=array(
				"noRegistrasiOP"=>$data["noregop"],
				"ruangPerawatan"=>$data["ruangperawatan"],
				"terdapatInsiden"=>$data["insidenpasien"],
				"kronologiInsiden"=>$data["kronologiinsiden"],
				"jenisInsiden"=>$data["jenisinsiden"],
				"tindakanSementara"=>$data["tindakansementara"],
				"permasalahanOP"=>$data["permasalahanop"],
				"siteMarking"=>$data["sitemarking"],
				"pemakaianGelangPasien"=>$data["gelangpasien"],
				"kesesuaianIdentitas"=>$data["sesuaiidentitas"],
				"kejadianPasienJatuh"=>$data["pasienjatuh"],
				"tertinggalBendaAsing"=>$data["bendaasing"],
				"dot"=>$data["dot"],
				"discrepancyOP"=>$data["discrepancyop"],
				"reOperasi"=>$data["reoperasi"],
				"tundaOP"=>$data["tundaop"],
				"kelangkapanAsesmen"=>$data["lengkapasesmen"],
				"signOut"=>$data["signout"],
				"idUser"=>";".$id_user,
				"tglUser"=>";".$tgl_user
			);
			$data_return=$this->m_mutupelayanan->insertMutuPelayanan($data_insert);
		}
		echo json_encode($data_return);
	}
}
?>
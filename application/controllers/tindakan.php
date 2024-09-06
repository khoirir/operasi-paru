<?php
class Tindakan extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model('m_tindakan');
		$this->load->model('m_proses');
	}

	function index(){
		if($this->session->userdata("sess_ok_paru")){
			$sess_data = $this->session->userdata("sess_ok_paru");
			$data["id"] = $sess_data["id"];
			$data["nama"] = $sess_data["nama"];
			$data["jenisimplanop"]=$this->m_tindakan->getJenisImplanOP();
			$data["kelastindakanop"]=$this->m_tindakan->getKelasTindakanOP();
			$data["dokter"]=$this->m_tindakan->getDokter();
			$data["jeniskasus"]=$this->m_proses->get("kdKasusDiagnosa,UPPER(kasus) AS kasus","t_kasusdiagnosa","kdKasusDiagnosa!='aselole'");
			$data["jenisdiagnosa"]=$this->m_proses->get("kdJenisDiagnosa,UPPER(jenisDiagnosa) AS jenisDiagnosa","t_jenisdiagnosa","kdJenisDiagnosa!='aselole'");
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_tindakanpasien");
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}
	
	function tindakanPasien($noregop,$jenis=""){
		if($this->session->userdata("sess_ok_paru")){
			$sess_data = $this->session->userdata("sess_ok_paru");
			$data["id"] = $sess_data["id"];
			$data["nama"] = $sess_data["nama"];
			$data["noregop"] = $noregop;
			$data["jenisimplanop"]=$this->m_tindakan->getJenisImplanOP();
			$data["kelastindakanop"]=$this->m_tindakan->getKelasTindakanOP();
			$data["dokter"]=$this->m_tindakan->getDokter();
			$data["jeniskasus"]=$this->m_proses->get("kdKasusDiagnosa,UPPER(kasus) AS kasus","t_kasusdiagnosa","kdKasusDiagnosa!='aselole'");
			$data["jenisdiagnosa"]=$this->m_proses->get("kdJenisDiagnosa,UPPER(jenisDiagnosa) AS jenisDiagnosa","t_jenisdiagnosa","kdJenisDiagnosa!='aselole'");
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_tindakanpasien");
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}

	function getDataOperator(){
		$data=$this->m_tindakan->getDataOperator();
		echo json_encode($data);
	}

	function getPasienTindakan(){
    	$noregop=$_POST["noregop"];
		$get_data=$this->m_tindakan->getPasienTindakan($noregop)->row();
		echo json_encode($get_data);
	}

	function getTindakanOperasi(){
		$noregop=$_POST["noregop"];
		$data=$this->m_tindakan->getTindakanOperasi($noregop)->row();
		echo json_encode($data);
	}

	function getDetailTindakanOperasi(){
		$notinop=$_POST["notinop"];
		$data=$this->m_tindakan->getDetailTindakanOperasi($notinop)->result();
		echo json_encode($data);
	}

	function insupTindakanOperasi(){
		$sess_data = $this->session->userdata("sess_ok_paru");
		$idUser = $sess_data["id"];
		date_default_timezone_set("Asia/Jakarta");
		$tgluser=date("Y-m-d H:i:s");
		$data=$_POST["arr_data"];
		$jenis=$data["jenis"];
		if($jenis=="update"){
			$notindakanop=$data["notindakanop"];
			$data_update=array(
				"tglTindakan"=>$data["tgltindakanop"],
				"totalTarifTindakan"=>$data["totaltarif"],
				"pemakaianImplan"=>$data["pemakaianimplan"],
				"jenisImplan"=>$data["jenisimplan"]!=null?";".implode(";",$data["jenisimplan"]):null,
				"idUser"=>$data["iduser"].";".$idUser,
				"tglUser"=>$data["tgluser"].";".$tgluser
			);
			$data_return=$this->m_tindakan->updateTindakanOperasi($notindakanop,$data_update);
			if($data["tindakanhapus"]!=""){
				$data_detail_hapus=explode(";", $data["tindakanhapus"]);
				$data_return=$this->m_tindakan->hapusDetailTindakanOperasi($data_detail_hapus,";".$idUser,";".$tgluser);
			}
			if(!empty($data["datatindakanedit"])){
				foreach ($data["datatindakanedit"] AS $value){    
			        $data_detail_update=array(
			        	"operator"=>$value['operator'],
			        	"kdTindakan"=>$value['kodetindakan'],
			        	"tindakan"=>$value['tindakan'],
			        	"jmlTindakan"=>$value['jmltindakan'],
			        	"kdTarif"=>$value['kodetarif'],
			        	"tarif"=>$value['tarif'],
			        	"subTotal"=>$value['subtotaltindakan'],
			        	"idUser"=>explode("~",$value['idtgluser'])[0].";".$idUser,
			        	"tglUser"=>explode("~",$value['idtgluser'])[1].";".$tgluser
			        );
			        $data_return=$this->m_tindakan->updateDetailTindakanOperasi($value["iddetail"],$data_detail_update);
			    }
			}
			if(!empty($data["datatindakanbaru"])){
				foreach ($data["datatindakanbaru"] AS $value){    
			        $data_detail_baru=array(
			        	"noTindakanOP"=>$notindakanop,
			        	"operator"=>$value['operator'],
			        	"kdTindakan"=>$value['kodetindakan'],
			        	"tindakan"=>$value['tindakan'],
			        	"jmlTindakan"=>$value['jmltindakan'],
			        	"kdTarif"=>$value['kodetarif'],
			        	"tarif"=>$value['tarif'],
			        	"subTotal"=>$value['subtotaltindakan'],
			        	"jenisTindakan"=>$value['jenistindakan'],
			        	"statusHapus"=>"0",
			        	"idUser"=>";".$idUser,
			        	"tglUser"=>";".$tgluser
			        );
			        $data_return=$this->m_tindakan->insertDetailTindakanOperasi($data_detail_baru);
			    }
			}
		}
		echo json_encode($data_return." => jenis : ".$jenis);
	}

	function getDiagnosaPasien(){
		$noregop=$_POST["noregop"];
		$data["prapost"]=$this->m_tindakan->getDiagnosaPraPost($noregop)->row();
		echo json_encode($data);
	}

	function getDiagnosaICD(){
		$norm=$_POST["norm"];
		$data["icd"]=$this->m_tindakan->getDiagnosaPasien($norm)->result();
		echo json_encode($data);
	}

	function getListTindakanOP(){
		$kdkelas=$_POST["kdkelas"];
		$data=$this->m_tindakan->getTindakanOP($kdkelas)->result();
		echo json_encode($data);
	}

	function dataTableDiagnosa(){
		$icd=$_POST["icd"];

		$search = $_POST['search']['value'];
		$limit = $_POST['length'];
		$start = $_POST['start'];
		$order_index = $_POST['order'][0]['column'];
		$order_field = $_POST['columns'][$order_index]['data'];
		$order_ascdesc = $_POST['order'][0]['dir'];

		$total_data = $icd=="ICD 10"?$this->m_proses->get("null","t_icd10","kdIcd10!='aselole'")->num_rows():$this->m_proses->get("null","t_icd9","kdIcd9!='aselole'")->num_rows();
		$record = $icd=="ICD 10"? $this->m_proses->get("kdIcd10 AS kdicd,icd10 AS icd,keterangan","t_icd10","kdIcd10 LIKE '%$search%' OR icd10 LIKE '%$search%' OR keterangan LIKE '%$search%' ORDER BY kdIcd10 ASC LIMIT $start,$limit")->result():$this->m_proses->get("kdIcd9 AS kdicd,icd9 AS icd,' - ' AS keterangan","t_icd9","kdIcd9 LIKE '%$search%' OR icd9 LIKE '%$search%' ORDER BY kdIcd9 ASC LIMIT $start,$limit")->result();
		$total_data_filter = $icd=="ICD 10"?$this->m_proses->get("null","t_icd10","kdIcd10 LIKE '%$search%' OR icd10 LIKE '%$search%' OR keterangan LIKE '%$search%'")->num_rows():$this->m_proses->get("null","t_icd9","kdIcd9 LIKE '%$search%' OR icd9 LIKE '%$search%'")->num_rows();;
		$json_data = array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>$total_data,
			'recordsFiltered'=>$total_data_filter,
			'data'=>$record
		);
		echo json_encode($json_data);
	}

	function insertICD(){
		foreach ($_POST['data'] AS $data){
			if($data["icd"]=="ICD 10"){
				$data_insert = array(
					"noDaftar"=>$data["nodaftar"],
					"noRekamedis"=>$data["norm"],
					"kdIcd10"=>$data["kdicd"],
					"icd10"=>$data["diagnosa"],
					"kdJenisDiagnosa"=>$data["jenisdiagnosa"],
					"kdJenisKasus"=>$data["jeniskasus"],
					"kdTenagaMedis"=>$data["dokter"],
					"keterangan"=>$data["jenisdiagnosaoperasi"],
					"tglDiagnosa"=>$data["tgldiagnosa"]
				);
		        $data_sql['icd10']=$this->m_proses->ins("t_diagnosaicd10",$data_insert);
			}else if($data["icd"]=="ICD 9"){
				$data_insert = array(
					"noDaftar"=>$data["nodaftar"],
					"noRekamedis"=>$data["norm"],
					"kdIcd9"=>$data["kdicd"],
					"icd"=>$data["diagnosa"],
					"kdJenisDiagnosa"=>$data["jenisdiagnosa"],
					"kdJenisKasus"=>$data["jeniskasus"],
					"kdPetugasMedis"=>$data["dokter"],
					"keterangan"=>$data["jenisdiagnosaoperasi"],
					"tglDiagnosa"=>$data["tgldiagnosa"]
				);
		        $data_sql['icd9']=$this->m_proses->ins("t_transaksiicd9",$data_insert);
			}
	    }
		echo json_encode($data_sql);
	}

	function updateDiagnosaPrapost(){
		$sess_data = $this->session->userdata("sess_ok_paru");
		$idUser = $sess_data["id"];
		date_default_timezone_set("Asia/Jakarta");
		$tgluser=date("Y-m-d H:i:s");
		$data=$_POST["arr_data"];
		$iddiagnosa=$data["iddiagnosa"];
		$data_update=array(
			"diagnosaPra"=>";".implode(";",$data["diagnosapra"]),
			"diagnosaPost"=>empty($data["diagnosapost"])?null:";".implode(";",$data["diagnosapost"]),
			"tglDiagnosaPost"=>$tgluser,
			"dokterDiagnosaPra"=>$data["dokterdiagnosapra"],
			"dokterDiagnosaPost"=>$data["dokterdiagnosapost"]=="-"?null:$data["dokterdiagnosapost"],
			"sarsCovid"=>$data["sarscovid"],
			"idUser"=>$data["iduser"].";".$idUser,
			"tglUser"=>$data["tgluser"].";".$tgluser
		);
		$data_return=$this->m_tindakan->updateDiagnosaPrapost($iddiagnosa,$data_update);
		echo json_encode($data_return);
	}

	function konfirmasiSelesaiTindakan(){
		$sess_data = $this->session->userdata("sess_ok_paru");
		$iduser = $sess_data["id"];
		date_default_timezone_set("Asia/Jakarta");
		$tgluser=date("Y-m-d H:i:s");
		$noregop=$_POST["noregop"];
		$statusop=$_POST["statusop"];

		$data_return=$this->m_tindakan->konfirmasiSelesaiTindakan($noregop,$statusop,$iduser,$tgluser);
		echo json_encode($data_return);
	}

}
?>
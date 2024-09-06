<?php
class Permintaanlaboratorium extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model('m_tindakan');
		$this->load->model('m_proses');
	}

	public function index(){
		if($this->session->userdata("sess_admin")){
			$sess_data = $this->session->userdata("sess_admin");
			$data["id"] = $sess_data["id"];
			$data["nama"] = $sess_data["nama"];
			$data["dokter"]=$this->m_proses->get("*","t_tenagamedis2","kdKelompokTenagaMedis='ktm1' ORDER BY namapetugasMedis ASC");
			$data["tindakan"]=$this->m_proses->get("*","vw_tindakanlab","kdTindakan!='aselole' ORDER BY kdKelas");
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_permintaanlaboratorium");
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}

	function getEditTindakanPasien(){
		$noregop=$_POST["noregop"];
		$get_data=$this->m_tindakan->getEditPasienTindakan($noregop)->row();
		echo json_encode($get_data);
	}
    
    function getDetailPasien(){
    	$noregop=$_POST["noregop"];
		$data=$this->m_proses->get("*","vw_detailpasienoperasilab","noregistrasiop='".$noregop."'")->row();
		echo json_encode($data);
	}

	function getNoTindakanOP(){
		$noregop=$this->input->post('noregop');
		$get_data=$this->m_tindakan->getNoTindakanOP($noregop)->row();
		echo json_encode($get_data);
	}

	function getDetailTindakanPasien(){
		$noregop=$this->input->post('noregop');
		$notinop=$this->input->post('notinop');
		$get_data=$this->m_tindakan->getDetailTindakanPasien($noregop,$notinop)->result();
		echo json_encode($get_data);
	}

	function getDiagnosaPasien(){
		$norm=$_POST["norm"];
		$data=$this->m_tindakan->getDiagnosaPasien($norm)->result();
		echo json_encode($data);
	}

	function getRiwayatLab(){
		$norm=$_POST["norm"];
		$data=$this->m_proses->get("*","vw_riwayatlaboperasi","norm='".$norm."' ORDER BY tglreg ASC")->result();
		echo json_encode($data);
	}

	function getDetailRiwayatLab(){
		$noreg=substr($_POST["noreg"],0,2);
		$notin=$_POST["notin"];
		if($noreg=="RJ"){
			$data=$this->m_proses->get("td.noTindakanPenunjangRajal AS notin,td.tindakan AS tindakan,td.jumlahTindakan AS jml,tk.kelas AS kelas,td.tarif AS tarif,td.totalTarif AS subtotal,	tnm.namaPetugasMedis AS petugasmedis,IF(td.statusTindakan IS NULL,'SELESAI',td.statusTindakan) AS statustindakan","t_detailtindakanpenunjangrajal td INNER JOIN t_tariftindakan2 ttt ON td.kdTarif = ttt.kdTarif INNER JOIN t_kelas tk ON ttt.kdKelas=tk.kdKelas LEFT JOIN t_tenagamedis2 tnm ON td.kdTenagaMedis = tnm.kdPetugasMedis","td.noTindakanPenunjangRajal='".$notin."'")->result();
			echo json_encode($data);
		}else if($noreg=="RI"){
			$data=$this->m_proses->get("td.noTindakanPenunjangRanap AS notin,td.tindakan AS tindakan,td.jumlahTindakan AS jml,tk.kelas AS kelas,td.tarif AS tarif,td.totalTarif AS subtotal,	tnm.namaPetugasMedis AS petugasmedis,IF(td.statusTindakan IS NULL,'SELESAI',td.statusTindakan) AS statustindakan","t_detailtindakanpenunjangranap td INNER JOIN t_tariftindakan2 ttt ON td.kdTarif = ttt.kdTarif INNER JOIN t_kelas tk ON ttt.kdKelas=tk.kdKelas LEFT JOIN t_tenagamedis2 tnm ON td.kdTenagaMedis = tnm.kdPetugasMedis","td.noTindakanPenunjangRanap='".$notin."'")->result();
			echo json_encode($data);
		}
	}

	function getLastNoReg(){
		$instalasi=$_POST['instalasi'];
		if($instalasi=="rajal"){
			$data["noreg"]=$this->m_proses->get("noRegistrasiPenunjangRajal AS noreg","t_registrasipenunjangrajal","noRegistrasiPenunjangRajal!='aselole' ORDER BY tglMasukPenunjangRajal DESC LIMIT 1")->row();
			$data["notindakan"]=$this->m_proses->get("noTindakanPenunjangRajal AS notin","t_tindakanpenunjangrajal","noTindakanPenunjangRajal!='aselole' ORDER BY STR_TO_DATE(SUBSTRING(noTindakanPenunjangRajal, 5, 13),'%d%m%y%H%i%s') DESC LIMIT 1")->row();
		}else if($instalasi=="ranap"){
			$data["noreg"]=$this->m_proses->get("noRegistrasiPenunjangRanap AS noreg","t_registrasipenunjangranap","noRegistrasiPenunjangRanap!='aselole' ORDER BY tglMasukPenunjangRanap DESC LIMIT 1")->row();
			$data["notindakan"]=$this->m_proses->get("noTindakanPenunjangRanap AS notin","t_tindakanpenunjangranap","noTindakanPenunjangRanap!='aselole' ORDER BY STR_TO_DATE(SUBSTRING(noTindakanPenunjangRanap, 5, 13),'%d%m%y%H%i%s') DESC LIMIT 1")->row();
		}
		echo json_encode($data);
	}

	function insertPermintaanLab(){
		$instalasi=$_POST['instalasi'];
		if($instalasi=="rajal"){
			$data_insert = array(
				"noRegistrasiPenunjangRajal"=>$_POST["noregistrasilab"],
				"noDaftar"=>$_POST["nodaftar"],
				"kdUnitAsal"=>"3003",
				"unitAsal"=>"OK IBS",
				"kdUnit"=>"3002",
				"unit"=>"Laboratorium",
				"tglMasukPenunjangRajal"=>$_POST["tglmasuklab"],
				"statusPenunjang"=>"PERMINTAAN",
				"kdTenagaMedisPengirim"=>$_POST["dokterlab"],
				"ketKlinis"=>$_POST["ketklinis"]
			);
			$data["registrasirajal"]=$this->m_proses->ins("t_registrasipenunjangrajal",$data_insert);
			$data_inserttindakan = array(
				"noTindakanPenunjangRajal"=>$_POST["notinlab"],
				"noRegistrasiPenunjangRajal"=>$_POST["noregistrasilab"],
				"totalTindakanPenunjangRajal"=>$_POST["totaltindakan"],
				"statusPembayaran"=>"BELUM LUNAS"
			);
			$data["tindakanlabrajal"]=$this->m_proses->ins("t_tindakanpenunjangrajal",$data_inserttindakan);
			if(!empty($_POST['datatablevalue'])){
				foreach ($_POST['datatablevalue'] AS $value){
			        $data_insertdetailtindakan = array(
						"noTindakanPenunjangRajal"=>$_POST["notinlab"],
						"kdTarif"=>$value["kodetarif"],
						"tindakan"=>$value["tindakan"],
						"tarif"=>$value["tarif"],
						"jumlahTindakan"=>$value["jmltindakan"],
						"totalTarif"=>$value["subtotaltindakan"],
						"statusTindakan"=>"PERMINTAAN"
					);
					$data["tindakanlabrajal"]=$this->m_proses->ins("t_detailtindakanpenunjangrajal",$data_insertdetailtindakan);
			    }
			}
		}else if($instalasi=="ranap"){
			$data_insert = array(
				"noRegistrasiPenunjangRanap"=>$_POST["noregistrasilab"],
				"noDaftar"=>$_POST["nodaftar"],
				"kdUnitAsal"=>"3003",
				"unitAsal"=>"OK IBS",
				"kdUnit"=>"3002",
				"unit"=>"Laboratorium",
				"tglMasukPenunjangRanap"=>$_POST["tglmasuklab"],
				"statusPenunjang"=>"PERMINTAAN",
				"kdTenagaMedisPengirim"=>$_POST["dokterlab"],
				"ketKlinis"=>$_POST["ketklinis"]
			);
			$data["registrasiranap"]=$this->m_proses->ins("t_registrasipenunjangranap",$data_insert);
			$data_inserttindakan = array(
				"noTindakanPenunjangRanap"=>$_POST["notinlab"],
				"noRegistrasiPenunjangRanap"=>$_POST["noregistrasilab"],
				"totalTindakanPenunjangRanap"=>$_POST["totaltindakan"],
				"statusPembayaran"=>"BELUM LUNAS"
			);
			$data["tindakanlabranap"]=$this->m_proses->ins("t_tindakanpenunjangranap",$data_inserttindakan);
			if(!empty($_POST['datatablevalue'])){
				foreach ($_POST['datatablevalue'] AS $value){
			        $data_insertdetailtindakan = array(
						"noTindakanPenunjangRanap"=>$_POST["notinlab"],
						"kdTarif"=>$value["kodetarif"],
						"tindakan"=>$value["tindakan"],
						"tarif"=>$value["tarif"],
						"jumlahTindakan"=>$value["jmltindakan"],
						"totalTarif"=>$value["subtotaltindakan"],
						"statusTindakan"=>"PERMINTAAN"
					);
					$data["tindakanlabranap"]=$this->m_proses->ins("t_detailtindakanpenunjangranap",$data_insertdetailtindakan);
			    }
			}
		}
		echo json_encode($data);
	}

	function dataTablePasien(){
		$search = $_POST['search']['value'];
		$limit = $_POST['length'];
		$start = $_POST['start'];
		$order_index = $_POST['order'][0]['column'];
		$order_field = $_POST['columns'][$order_index]['data'];
		$order_ascdesc = $_POST['order'][0]['dir'];

		$total_data = $this->m_proses->get("null","vw_pasienoperasilab","norm!='aselole'")->num_rows();
		$record = $this->m_proses->get("*","vw_pasienoperasilab","norm LIKE '%$search%' OR namapasien LIKE '%$search%' OR dokterop LIKE '%$search%' OR unitasal LIKE '%$search%' OR tglpermintaanop2 LIKE '%$search%' OR jenisop LIKE '%$search%' OR noregistrasiop LIKE '%$search%' OR tgljadwalop2 LIKE '%$search%' ORDER BY $order_field $order_ascdesc LIMIT $start,$limit")->result();
		$total_data_filter = $this->m_proses->get("null","vw_pasienoperasilab","norm LIKE '%$search%' OR namapasien LIKE '%$search%' OR dokterop LIKE '%$search%' OR unitasal LIKE '%$search%' OR tglpermintaanop2 LIKE '%$search%' OR jenisop LIKE '%$search%' OR noregistrasiop LIKE '%$search%' OR tgljadwalop2 LIKE '%$search%'")->num_rows();
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
}
?>
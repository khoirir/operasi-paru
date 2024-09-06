<?php
class Resepobat extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->model('m_proses');
		$this->load->model('m_prosesf');
	}

	public function index(){
		if($this->session->userdata("sess_admin")){
			$sess_data = $this->session->userdata("sess_admin");
			$data["id"] = $sess_data["id"];
			$data["nama"] = $sess_data["nama"];
			$data["dokter"]=$this->m_proses->get("*","t_tenagamedis2","kdKelompokTenagaMedis='ktm1' ORDER BY namapetugasMedis ASC");
			$data["tindakan"]=$this->m_proses->get("*","vw_tindakanlab","kdTindakan!='aselole' ORDER BY kdKelas");
			$data["obat"]=$this->m_prosesf->get("*","vw_stokobat","kddepo='DP05' ORDER BY CAST(plu AS UNSIGNED)");
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_resepobat");
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}
    
    function getDetailPasien(){
    	$noregop=$_POST["noregop"];
		$data=$this->m_proses->get("*","vw_detailpasienoperasilab","noregistrasiop='".$noregop."'")->row();
		echo json_encode($data);
	}

	function getDiagnosaPasien(){
		$norm=$_POST["norm"];
		$data=$this->m_tindakan->getDiagnosaPasien($norm)->result();
		echo json_encode($data);
	}

	function getRiwayatResep(){
		$jenisresep=$_POST['jenisresep'];
		$norm=$_POST["norm"];
		$tglawal=$_POST['tglawal'].' 00:00:00';
		$tglakhir=$_POST['tglakhir'].' 23:59:59';
		if($jenisresep=='belum'){
			$data=$this->m_proses->get("*","vw_reseptidakterlayani","norm='".$norm."' AND (tglresep BETWEEN '".$tglawal."' AND '".$tglakhir."') ORDER BY tglresep DESC")->result();
		}else if($jenisresep=='sudah'){
			$data=$this->m_prosesf->get_sp("CALL sp_riwayatpasien('".$norm."','".$tglawal."','".$tglakhir."')")->result();
		}
		
		echo json_encode($data);
	}

	function getDetailRiwayatObat(){
		$jenisresep=$_POST['jenisresep'];
		$notransaksi=$_POST["notransaksi"];
		if($jenisresep=='belum'){
			$data=$this->m_proses->get("*","vw_detailreseptidakterlayani","notransaksi='".$notransaksi."'")->result();
			echo json_encode($data);
		}else if($jenisresep=='sudah'){
			$data=$this->m_prosesf->get_sp("CALL sp_detailriwayatpasien('".$notransaksi."')")->result();
			echo json_encode($data);
		}
	}

	function getLastNoReg(){
		$data=$this->m_proses->get("noResep AS noresep","t_resepranap","LEFT(noResep,5)='RSPOK' ORDER BY tglResep DESC LIMIT 1")->row();
		echo json_encode($data);
	}

	function insertResep(){
		$sess_data = $this->session->userdata("sess_admin");
		$user["id"] = $sess_data["id"];
		$data_insert = array(
			"noResep"=>$_POST["noresep"],
			"noDaftarRawatInap"=>$_POST["nodaftar"],
			"noRekamedis"=>$_POST["norm"],
			"kdDepoObat"=>"DP05",
			"kdTenagaMedis"=>$_POST["dokter"],
			"tglResep"=>$_POST["tglresep"],
			"statusResep"=>"0",
			"createID"=>$user["id"],
			"createDate"=>$_POST["tglresep"]
		);
		$data["resep"]=$this->m_proses->ins("t_resepranap",$data_insert);
		if(!empty($_POST['datatablevalue'])){
			$no=1;
			foreach ($_POST['datatablevalue'] AS $value){
		        $data_insertdetailobat = array(
		        	"noDetailResepRanap"=>"DTR".substr($_POST["noresep"],5,12)."-".$no,
					"noResep"=>$_POST["noresep"],
					"kdObat"=>$value["plu"],
					"nmObat"=>$value["obat"],
					"jumlahPakai"=>$value["jumlah"],
					"aturanPakai"=>$value["aturanpakai"],
					"satuanJual"=>$value["satuan"],
					"hargaJual"=>$value["harga"],
					"totalHargaJual"=>$value["subtotal"],
					"keterangan"=>$value["keterangan"],
					"statusRacikan"=>"0"
				);
				$data["detailresep"]=$this->m_proses->ins("t_detailresepranap",$data_insertdetailobat);
				$no++;
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
}
?>
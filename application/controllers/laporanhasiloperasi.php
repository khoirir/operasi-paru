<?php
class Laporanhasiloperasi extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_laporanhasiloperasi');
		$this->load->library('Pdf');
	}

	function index(){
		if($this->session->userdata("sess_admin")){
			$sess_data = $this->session->userdata("sess_admin");
			$data["id"] = $sess_data["id"];
			$data["nama"] = $sess_data["nama"];
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_laporanhasiloperasi");
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}

	public function hasilOperasi($noregop){
		if($this->session->userdata("sess_admin")){
			$sess_data = $this->session->userdata("sess_admin");
			$data["id"] = $sess_data["id"];
			$data["nama"] = $sess_data["nama"];
			$data["pasien"] = $this->m_laporanhasiloperasi->getPasienLaporan($noregop)->row();
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_laporanhasiloperasi");
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}

	function getDataLaporan(){
		$noregop=$_POST['noregop'];
		$data['pasien']=$this->m_laporanhasiloperasi->getPasienLaporan($noregop)->row();
		// $noregop=!empty($data['pasien'])?$data['pasien']->noregistrasiop:'';
		$notinop=!empty($data['pasien'])?$data['pasien']->notindakanop:'';
		$data['operator']=$this->m_laporanhasiloperasi->getOperator($notinop)->row();
		$data['tindakan']=$this->m_laporanhasiloperasi->getTindakan($notinop)->result();
		$data['hasiloperasi']=$this->m_laporanhasiloperasi->getLaporanOperasi($noregop)->row();

		echo json_encode($data);
	}

	function getEditDataLaporan($noregop){
		$data['pasien']=$this->m_laporanhasiloperasi->getEditPasienLaporan($noregop)->row();
		$noregop=!empty($data['pasien'])?$data['pasien']->noregistrasiop:'';
		$notinop=!empty($data['pasien'])?$data['pasien']->notindakanop:'';
		$data['operator']=$this->m_laporanhasiloperasi->getOperator($notinop)->row();
		$data['tindakan']=$this->m_laporanhasiloperasi->getTindakan($notinop)->result();
		$data['hasiloperasi']=$this->m_laporanhasiloperasi->getLaporanOperasi($noregop)->row();

		echo json_encode($data);
	}

	function getLastNoHasilOperasi(){
		$data=$this->m_laporanhasiloperasi->getLastNoHasilOperasi()->row();
		echo json_encode($data);
	}

	function getStatusBayar(){
		$noregop=$this->input->post('noregop');
		$data=$this->m_laporanhasiloperasi->getStatusBayar($noregop)->row();
		echo json_encode($data);
	}

	function uploadHasil(){
		$nohasiloperasi=$_POST["nohasiloperasi"];
		$noregop=$_POST["noregop"];
		$instalasi=substr($noregop,2,2);
		$statusop=$_POST['statusop'];
		$sess_data = $this->session->userdata("sess_admin");
		$modifieduser["id"] = $sess_data["id"];
		$hasil="";

		$number_of_files = count($_FILES['file_upload']['name']); 
		$config['upload_path']="./template/file_upload/";
        $config['allowed_types']='jpeg|jpg|png|pdf';
        $config['encrypt_name'] = TRUE;         
        $this->load->library('upload',$config);
        for ($i=0; $i < $number_of_files; $i++) {
			$_FILES['file']['name']       = $_FILES['file_upload']['name'][$i];
            $_FILES['file']['type']       = $_FILES['file_upload']['type'][$i];
            $_FILES['file']['tmp_name']   = $_FILES['file_upload']['tmp_name'][$i];
            $_FILES['file']['error']      = $_FILES['file_upload']['error'][$i];
			$_FILES['file']['size']       = $_FILES['file_upload']['size'][$i];

			$this->load->library('upload', $config);
			if($this->upload->do_upload('file')){
				$data_upload = array('upload_data' => $this->upload->data());
            	$image	= $data_upload['upload_data']['file_name'];
            	$hasil.=";".$image;
            }
    	}
    	// echo $nohasiloperasi." - ".$noregop." ==> ".$hasil;
		
    	if($statusop=='0'){
    		$data['uploadHasilOP']=$this->m_laporanhasiloperasi->uploadHasilOperasi($nohasiloperasi,$noregop,$hasil,$modifieduser);
    		$data['updateStatusOP']=$this->m_laporanhasiloperasi->updateStatusOP($instalasi,$noregop);
    		$data['filehasil']=$hasil;
    	}else if($statusop=='1') {
    		$updatehasil=$_POST["filehasil"]."".$hasil;
    		$data['updateHasil']=$this->m_laporanhasiloperasi->updateHasilOploadOperasi($nohasiloperasi,$updatehasil,$modifieduser);
    		$data['filehasil']=$updatehasil;
    		$data['nohasiloperasi']=$nohasiloperasi;
    	}
    	echo json_encode($data);

	}

	function hapusLaporan(){
   		$data['hapusFile']=unlink($_POST['file']);
   		$nohasilop=$_POST['nohasilop'];
   		$hasilop=empty($_POST['hasilop'])?null:$_POST['hasilop'];
   		$sess_data = $this->session->userdata("sess_admin");
		$modifieduser["id"] = $sess_data["id"];
   		$data['updateHasil']=$this->m_laporanhasiloperasi->updateHasilOploadOperasi($nohasilop,$hasilop,$modifieduser);
   		echo json_encode($data);
	}

	function insertLaporanHasilOperasi(){
		$nohasilop=$this->input->post('nohasilop');
		$noregop=$this->input->post('noregop');
		$instalasi=substr($noregop,2,2);
		$diagnosapostop=$this->input->post('diagnosapostop');
		$jaringaneksisiinsisi=$this->input->post('jaringaneksisiinsisi');
		$pemeriksaanpa=$this->input->post('pemeriksaanpa');
		$operasimulai=$this->input->post('operasimulai');
		$operasiselesai=$this->input->post('operasiselesai');
		$pembiusanmulai=$this->input->post('pembiusanmulai');
		$pembiusanselesai=$this->input->post('pembiusanselesai');
		$laporan=$this->input->post('laporan');
		$jmlpendarahan=$this->input->post('jmlpendarahan');
		$komplikasi=$this->input->post('komplikasi');
		$instruksipostop=$this->input->post('instruksipostop');
		$pemakaianimplan=$this->input->post('pemakaianimplan');
		$sess_data = $this->session->userdata("sess_admin");
		$modifieduser["id"] = $sess_data["id"];
		$statusop=$this->input->post('statusop');
		if($statusop=='0'){
			$data['insertLaporan']=$this->m_laporanhasiloperasi->insertHasilOperasi($nohasilop,$noregop,$diagnosapostop,$jaringaneksisiinsisi,$pemeriksaanpa,$operasimulai,$operasiselesai,$pembiusanmulai,$pembiusanselesai,$laporan,$jmlpendarahan,$komplikasi,$instruksipostop,$pemakaianimplan,$modifieduser);
			$data['updateStatusOP']=$this->m_laporanhasiloperasi->updateStatusOP($instalasi,$noregop);
		}else{
			$data['updateLaporan']=$this->m_laporanhasiloperasi->updateHasilOperasi($nohasilop,$noregop,$diagnosapostop,$jaringaneksisiinsisi,$pemeriksaanpa,$operasimulai,$operasiselesai,$pembiusanmulai,$pembiusanselesai,$laporan,$jmlpendarahan,$komplikasi,$instruksipostop,$pemakaianimplan,$modifieduser);
		}

		echo json_encode($data);
	}

	function cetakLaporanOperasi(){
		// $nohasilop=$this->input->post('nohasilop');
		// $data['cetakhasil']=$this->m_laporanhasiloperasi->getLaporanOperasiCetak($nohasilop)->row();

		// echo json_encode($data);
	    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
	    $pdf->SetTitle('Contoh');
	    $pdf->SetTopMargin(20);
	    $pdf->setFooterMargin(20);
	    $pdf->SetAutoPageBreak(true);
	    $pdf->SetAuthor('Author');
	    $pdf->SetDisplayMode('real', 'default');
	    $pdf->AddPage();
	    $pdf->Write(5, 'Contoh Laporan PDF dengan CodeIgniter + tcpdf');
	    $pdf->Output('contoh1.pdf', 'I');
	}
}
?>
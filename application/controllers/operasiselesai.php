<?php

class Operasiselesai extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('m_operasiselesai');
	}

	function index(){
		if($this->session->userdata("sess_ok_paru")){
			$sess_data = $this->session->userdata("sess_ok_paru");
			$data["id"] = $sess_data["id"];
			$data['nama']=$sess_data["nama"];
			$data["jenisoperasi"]=$this->m_operasiselesai->getJenisOperasi();
			$data["operator"]=$this->m_operasiselesai->getDataOperator();
			$this->load->view("includes/v_header",$data);
			$this->load->view("v_operasiselesai",$data);
			$this->load->view("includes/v_footer");
		}
		else{
			redirect("login","refresh");
		}
	}

	function index_eksporexcel(){
		if($this->session->userdata("sess_ok_paru")){
			$tglawal=date("Y-m-d",strtotime($_POST['tglawal']))." 00:00:00";
			$tglakhir=date("Y-m-d",strtotime($_POST['tglakhir']))." 23:59:59";
			$jenisop=$_POST['jenisop'];
			$operator=$_POST["operator"];
			$data['tgl_awal']=$_POST['tglawal'];
			$data['tgl_akhir']=$_POST['tglakhir'];
			$data['operasi_selesai']=$this->m_operasiselesai->getDataOperasi($tglawal, $tglakhir, $jenisop, $operator);
			$this->load->view("v_tabeloperasiselesai",$data);
		}
		else{
			redirect("login","refresh");
		}
	}

	function permintaanList(){
		$tglawal=date("Y-m-d",strtotime($_POST['tglawal']))." 00:00:00";
		$tglakhir=date("Y-m-d",strtotime($_POST['tglakhir']))." 23:59:59";
		$jenisop=$_POST['jenisop'];
		$operator=$_POST["operator"];
		$sql_data = $this->m_operasiselesai->dataOperasiSelesai($tglawal, $tglakhir, $jenisop,$operator)->result_array();
		$data = array(
			'draw'=>$_POST['draw'],
			'recordsTotal'=>0,
			'recordsFiltered'=>0,
			'data'=>$sql_data
		);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	function eksporXls(){
		$tglawal=date("Y-m-d",strtotime($_POST['tglawal']))." 00:00:00";
		$tglakhir=date("Y-m-d",strtotime($_POST['tglakhir']))." 23:59:59";
		$jenisop=$_POST['jenisop'];
		$operator=$_POST["operator"];

		$filename = "pasien_okparu_".date("Y-m-d",strtotime($_POST['tglawal']))."_".date("Y-m-d",strtotime($_POST['tglakhir']));
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xls"'); 
		header('Cache-Control: max-age=0');

		echo "<center>
				<h3>LAPORAN PASIEN OK PARU<br>".date("d-m-Y",strtotime($_POST['tglawal']))." S/D ".date("d-m-Y",strtotime($_POST['tglakhir']))."</h3>
			</center>";
		echo "<table>
				<tr>
					<th style='text-align:center;border: 0.5px solid black;'>No.</th>
					<th style='text-align:center;border: 0.5px solid black;'>Nama Pasien</th>
					<th style='text-align:center;border: 0.5px solid black;'>No. RM</th>
					<th style='text-align:center;border: 0.5px solid black;'>Tgl. MRS</th>
					<th style='text-align:center;border: 0.5px solid black;'>Tgl. Operasi</th>
					<th style='text-align:center;border: 0.5px solid black;'>Jenis Kelamin</th>
					<th style='text-align:center;border: 0.5px solid black;'>Kedatangan Awal Pasien</th>
					<th style='text-align:center;border: 0.5px solid black;'>Ruang Perawatan</th>
					<th style='text-align:center;border: 0.5px solid black;'>Kategori Operasi</th>
					<th style='text-align:center;border: 0.5px solid black;'>Kelengkapan Asesmen Pra bedah</th>
					<th style='text-align:center;border: 0.5px solid black;'>Diagnosa Pre Op</th>
					<th style='text-align:center;border: 0.5px solid black;'>Nama Tindakan</th>
					<th style='text-align:center;border: 0.5px solid black;'>Diagnosa Post Op</th>
					<th style='text-align:center;border: 0.5px solid black;'>SARS COVID</th>
					<th style='text-align:center;border: 0.5px solid black;'>SMF</th>
					<th style='text-align:center;border: 0.5px solid black;'>Operator</th>
					<th style='text-align:center;border: 0.5px solid black;'>Asisten Operasi</th>
					<th style='text-align:center;border: 0.5px solid black;'>Instrumen</th>
					<th style='text-align:center;border: 0.5px solid black;'>On Loop</th>
					<th style='text-align:center;border: 0.5px solid black;'>Anastesi</th>
					<th style='text-align:center;border: 0.5px solid black;'>Asisten Anastesi</th>
					<th style='text-align:center;border: 0.5px solid black;'>Tarif Operasi</th>
					<th style='text-align:center;border: 0.5px solid black;'>Tambahan Tarif Operator 2</th>
					<th style='text-align:center;border: 0.5px solid black;'>Pemakaian Implan</th>
					<th style='text-align:center;border: 0.5px solid black;'>Jenis Implan</th>
					<th style='text-align:center;border: 0.5px solid black;'>Site Marking</th>
					<th style='text-align:center;border: 0.5px solid black;'>Pemakaian Gelang Pasien</th>
					<th style='text-align:center;border: 0.5px solid black;'>Kesesuaian identitas dan Gelang Pasien</th>
					<th style='text-align:center;border: 0.5px solid black;'>Discrepancy Operasi</th>
					<th style='text-align:center;border: 0.5px solid black;'>Kejadian Pasien Jatuh</th>
					<th style='text-align:center;border: 0.5px solid black;'>Tertinggalnya Benda Asing</th>
					<th style='text-align:center;border: 0.5px solid black;'>DOT (Death On Table)</th>
					<th style='text-align:center;border: 0.5px solid black;'>Re Operasi Dengan Diagnosa Sama</th>
					<th style='text-align:center;border: 0.5px solid black;'>Apakah terdapat insiden terkait pasien ini ?</th>
					<th style='text-align:center;border: 0.5px solid black;'>Kronologi Insiden</th>
					<th style='text-align:center;border: 0.5px solid black;'>Apakah Operasi di tunda dari hari sebelumnya?</th>
					<th style='text-align:center;border: 0.5px solid black;'>Sign Out</th>
					<th style='text-align:center;border: 0.5px solid black;'>Tindakan sementara yang sudah dilakukan</th>
					<th style='text-align:center;border: 0.5px solid black;'>Jenis insiden</th>
					<th style='text-align:center;border: 0.5px solid black;'>Permasalahan Saat Operasi Berlangsung</th>
				</tr>";
		
		$data=$this->m_operasiselesai->getDataOperasi($tglawal, $tglakhir, $jenisop, $operator);
		$no=1;
		$row=2;
		foreach ($data AS $v) {
			$jk=strtolower($v->jk)=='p'?"Perempuan":"Laki-Laki";
			$perawatsirkuler=$v->perawatsirkuler!=null?join("; ",explode(";",substr($v->perawatsirkuler,1))):"";
			$diagnosapra=$v->diagnosapra!=null?join("; ",explode(";",substr($v->diagnosapra,1))):"";
			$diagnosapost=$v->diagtnosapost!=null?join("; ",explode(";",substr($v->diagtnosapost,1))):"";
			$dokterop=$v->dokterop!=null?join("; ",explode(";",substr($v->dokterop,1))):"";
			$asistenop=$v->asistenop!=null?join("; ",explode(";",substr($v->asistenop,1))):"";
			$perawatinstrument=$v->perawatinstrument!=null?join("; ",explode(";",substr($v->perawatinstrument,1))):"";
			$dokteranestesi=$v->dokteranestesi!=null?join("; ",explode(";",substr($v->dokteranestesi,1))):"";
			$asistenanestesi=$v->asistenanestesi!=null?join("; ",explode(";",substr($v->asistenanestesi,1))):"";
			$data_detail=$this->m_operasiselesai->getDetailTarifOperasi($v->notinop);
			$tarif1='';
			$tarif2='';
			foreach ($data_detail AS $vd) {
				if($vd->operator==$v->dokterpengirim){
					$tarif1.="; ".$vd->tindakan." (Rp ".number_format($vd->subtotal,2,',','.').")";
				}else{
					$tarif2.="; ".$vd->tindakan." (Rp ".number_format($vd->subtotal,2,',','.').")";
				}
			}
			$get_tarif1=$tarif1!=""?substr($tarif1,2):$tarif1;
			$get_tarif2=$tarif2!=""?substr($tarif2,2):$tarif2;
			$jenisimplan=$v->jenisimplan!=null?join("; ",explode(";",substr($v->jenisimplan,1))):"";
			echo "<tr>
					<td style='text-align:center;border: 0.5px solid black;'>".$no."</td>
					<td style='border: 0.5px solid black;'>".$v->pasien."</td>
					<td style='border: 0.5px solid black;'>'".$v->norm."</td>
					<td style='border: 0.5px solid black;'>".$v->tglmrs."</td>
					<td style='border: 0.5px solid black;'>".$v->tglop."</td>
					<td style='border: 0.5px solid black;'>".$jk."</td>
					<td style='border: 0.5px solid black;'>".$v->instalasi."</td>
					<td style='border: 0.5px solid black;'>".$v->ruangperawatan."</td>
					<td style='border: 0.5px solid black;'>".$v->jenisop."</td>
					<td style='border: 0.5px solid black;'>".$v->lengkapasesmen."</td>
					<td style='border: 0.5px solid black;'>".$diagnosapra."</td>
					<td style='border: 0.5px solid black;'>&nbsp;</td>
					<td style='border: 0.5px solid black;'>".$diagnosapost."</td>
					<td style='border: 0.5px solid black;'>".$v->sarscovid."</td>
					<td style='border: 0.5px solid black;'>".$v->unit."</td>
					<td style='border: 0.5px solid black;'>".$dokterop."</td>
					<td style='border: 0.5px solid black;'>".$asistenop."</td>
					<td style='border: 0.5px solid black;'>".$perawatinstrument."</td>
					<td style='border: 0.5px solid black;'>".$perawatsirkuler."</td>
					<td style='border: 0.5px solid black;'>".$dokteranestesi."</td>
					<td style='border: 0.5px solid black;'>".$asistenanestesi."</td>
					<td style='border: 0.5px solid black;'>".$get_tarif1."</td>
					<td style='border: 0.5px solid black;'>".$get_tarif2."</td>
					<td style='border: 0.5px solid black;'>".$v->pakaiimplan."</td>
					<td style='border: 0.5px solid black;'>".$jenisimplan."</td>
					<td style='border: 0.5px solid black;'>".$v->sitemarking."</td>
					<td style='border: 0.5px solid black;'>".$v->pemakaiangelang."</td>
					<td style='border: 0.5px solid black;'>".$v->kesesuaianidentitas."</td>
					<td style='border: 0.5px solid black;'>".$v->discrepancyop."</td>
					<td style='border: 0.5px solid black;'>".$v->pasienjatuh."</td>
					<td style='border: 0.5px solid black;'>".$v->bendaasing."</td>
					<td style='border: 0.5px solid black;'>".$v->dot."</td>
					<td style='border: 0.5px solid black;'>".$v->reoperasi."</td>
					<td style='border: 0.5px solid black;'>".$v->insidenpasien."</td>
					<td style='border: 0.5px solid black;'>".$v->kronologiinsiden."</td>
					<td style='border: 0.5px solid black;'>".$v->tundaop."</td>
					<td style='border: 0.5px solid black;'>".$v->signout."</td>
					<td style='border: 0.5px solid black;'>".$v->tindakansementara."</td>
					<td style='border: 0.5px solid black;'>".$v->jenisinsiden."</td>
					<td style='border: 0.5px solid black;'>".$v->permasalahanop."</td>
				</tr>";
			$no++;
			$row++;
		}
		echo "</table>";
	}

	function getDetail(){
		$noregop=$this->input->post('noregop');
		$data['detail_pasien']=$this->m_operasiselesai->getDetailPasien($noregop)->row();
		$notinop=!empty($data['detail_pasien'])?$data['detail_pasien']->notindakanop:'';
		$data['operator']=$this->m_operasiselesai->getDetailPelaksanaOperasi($notinop)->row();
		$data['tindakan']=$this->m_operasiselesai->getTindakan($notinop)->result();
		$data['hasiloperasi']=$this->m_operasiselesai->getLaporanHasilOperasi($noregop)->row();
		echo json_encode($data);
	}

	function getDiagnosaPasien(){
		$norm=$_POST["norm"];
		$data=$this->m_operasiselesai->getDiagnosaPasien($norm)->result();
		echo json_encode($data);
	}


	function cetakLaporanOperasi($nohasilop){
		// $data=$this->m_operasiselesai->getLaporanOperasiCetak($nohasilop)->row();

		// $template_file_name = 'bootstrap/template/template_laporan.docx';
		// $fileName = $data->nohasilop."(".$data->norm.").docx";
		 
		// $folder   = "bootstrap/laporan";
		// $full_path = $folder . '/' . $fileName;
		 
		// try{   
		//     copy($template_file_name, $full_path);
		//     $zip_val = new ZipArchive;
		//     if($zip_val->open($full_path) == true){
		//         $key_file_name = 'word/document.xml';
		//         $message = $zip_val->getFromName($key_file_name);                
		                     
		//         $timestamp = date('d-M-Y H:i:s');
		//         $message = str_replace("string_norm", $data->norm, $message);
		//         $message = str_replace("string_nama_jk", $data->namapasien." (".$data->jk.")", $message);
		//         $message = str_replace("string_tgllahir", $data->tgllahir, $message);
		//         $message = str_replace("string_alamat", $data->alamat, $message);  
		//         $message = str_replace("string_diagnosapra", $data->diagnosapreop, $message);
		//         $message = str_replace("string_diagnosapost", $data->diagnosapostop, $message);
		//         $message = str_replace("string_jaringan", $data->jaringan, $message);
		//         $message = str_replace("string_tglop", $data->tglop, $message);
		//         $message = str_replace("string_om", "Jam ".$data->opmulai, $message);
		//         $message = str_replace("string_os", "Jam ".$data->opselesai, $message);
		//         $message = str_replace("string_bm", "Jam ".$data->biusmulai, $message);
		//         $message = str_replace("string_bs", "Jam ".$data->biusselesai, $message);
		//         $message = str_replace("string_laporan", $data->laporan, $message);
		//         $message = str_replace("string_pakaiimplan", $data->pakaiimplan, $message);
		//         $message = str_replace("string_komplikasi", $data->komplikasi, $message);
		//         $message = str_replace("string_instruksipost", $data->instruksipostop, $message);
		//         //Replace the content with the new content created above.
		//         $zip_val->addFromString($key_file_name, $message);
		//         $zip_val->close();

		// 		echo "oke";
		//     }
		// }
		// catch (Exception $exc) 
		// {
		//     $error_message =  "Gagal Membuat Laporan Hasil Operasi";
		//     var_dump($exc);
		// }
    /*
        ---- ---- ---- ----
        your code here
        ---- ---- ---- ----
    */
        $this->load->library('Pdf');
    	$this->load->view('v_pdf');

	}

	 
 	// $filename = "sample.docx";// or /var/www/html/file.docx  
 	// $content = read_file_docx($filename);  
 	// if($content !== false) {  
  //     	echo nl2br($content);  
 	// }  
  // 	else{  
  //     	echo 'Couldn\'t the file. Please check that file.';  
  //   }

// 	function toword($id) {
// 		$this->db->where('id',$id);
// 		$insiden = $this->db->get('insiden')->row();
// 		if($insiden->gender=='P'){
// 			$gender="Perempuan";
// 		}
// 		elseif($insiden->gender=='L'){
// 			$gender="Laki-Laki";
// 		}
// 		$this->db->where('id',$insiden->pembuat_laporan);
// 		$idpembuat_laporan  = $this->db->get('users')->row();
// 		$id_p_laporan = $idpembuat_laporan->nama_lengkap;

// 		$this->db->where('id',$insiden->penerima_laporan);
// 		$idpenerima_laporan  = $this->db->get('users')->row();
// 		$id_pe_laporan = $idpenerima_laporan->nama_lengkap;

// 		$document = file_get_contents("assets/FORM.rtf");
// 		$document = str_replace("data_nama_pasien", $insiden->nama_pasien, $document);
// 		$document = str_replace("data_tanggal_lahir", date('d-m-Y',strtotime($insiden->tanggal_lahir)), $document);
// 		$document = str_replace("data_no_mr", $insiden->mr, $document);
// 		$document = str_replace("data_ruangan", $insiden->ruangan, $document);
// 		$document = str_replace("data_umur", $insiden->umur, $document);
// 		$document = str_replace("data_jenis_kelamin", $gender, $document);
// 		$document = str_replace("data_biaya", $insiden->pembayaran, $document);
// 		$document = str_replace("data_tanggal_insiden", $insiden->tanggal_kejadian, $document);
// 		$document = str_replace("data_jam", $insiden->waktu_kejadian, $document);
// 		$document = str_replace("data_insiden", $insiden->insiden, $document);
// 		$document = str_replace("data_kronologis", $insiden->deskripsi_insiden, $document);
// 		$document = str_replace("data_jenis_insiden", $insiden->jenis_insiden, $document);
// 		$document = str_replace("data_orang_pertama", $insiden->pelapor, $document);
// 		$document = str_replace("data_korban", $insiden->korban, $document);
// 		$document = str_replace("data_pasien", $insiden->menyangkut_pasien, $document);
// 		$document = str_replace("data_lokasi", $insiden->lokasi_kejadian, $document);
// 		$document = str_replace("data_spesialisasi", $insiden->spesialisasi, $document);
// 		$document = str_replace("data_unit_penyebab", $insiden->unit_berkaitan, $document);
// 		$document = str_replace("data_akibat", $insiden->akibat_insiden, $document);
// 		$document = str_replace("data_tindakan_hasil", $insiden->hasil_tindakan, $document);
// 		$document = str_replace("data_dilakukan_oleh", $insiden->penindak, $document);
// 		$document = str_replace("data_pernah_terjadi", $insiden->sudah_terjadi, $document);
// 		$document = str_replace("data_pencegahan", $insiden->deskripsi_kejadian, $document);
// 		$document = str_replace("data_pembuat", $id_p_laporan, $document);
// 		$document = str_replace("data_penerima", $id_pe_laporan, $document);
// 		$document = str_replace("data_tanggal_lapor", $insiden->tanggal_lapor, $document);
// 		$document = str_replace("data_tanggal_terima", $insiden->tanggal_terima, $document);
// 		$document = str_replace("data_resiko", $insiden->grading_resiko, $document);

// // header untuk membuka file output RTF dengan MS. Word

		// header("Content-type: application/msword");
		// header("Content-disposition: inline; filename=laporan".$insiden->nama_pasien."".$insiden->tanggal_kejadian.".doc");
		// header("Content-length: ".strlen($document));
		// echo $document;
// 	}

	

}

?>
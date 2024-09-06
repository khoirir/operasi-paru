<?php
class M_laporanhasiloperasi extends CI_Model{
	function getPasienLaporann($norm){
		$sql=$this->db->query("SELECT noregistrasiop,norm,namapasien,jk,tgllahir,alamat,diagnosapreop,notindakanop,statustindakan,statusop,statuspembayaran FROM vw_permintaanoperasi WHERE norm LIKE '%$norm' ORDER BY tglregistrasiop DESC LIMIT 1");
		return $sql;
	}
	function getPasienLaporan($noregop){
		$sql=$this->db->query("SELECT noregistrasiop,norm,namapasien,jk,tgllahir,alamat,diagnosapreop,notindakanop,statustindakan,statusop,statuspembayaran FROM vw_permintaanoperasi WHERE noregistrasiop = ?",array($noregop));
		return $sql;
	}
	function getOperator($notinop){
		$sql=$this->db->query("SELECT noTindakanOP,noRegistrasiOP,dokterOP,timOP,perawatInstrument,dokterAnestesi,asistenAnestesi,perawatSirkuler,radiografer,jenisAnestesi,DATE_FORMAT(tglTindakan,'%d-%m-%Y %H:%i:%s') AS tglTindakan FROM t_tindakanok WHERE noTindakanOP=?",array($notinop));
		return $sql;
	}
	function getTindakan($notinop){
		$sql=$this->db->query("SELECT * FROM t_detailtindakanok WHERE noTindakanOP=? AND statusHapus='0'",array($notinop));
		return $sql;
	}
	function getLastNoHasilOperasi(){
		$sql=$this->db->query("SELECT noHasilOP AS nohasilop,SUBSTR(noHasilOP,4,6) as getdatesql FROM t_hasiloperasi ORDER BY CAST(SUBSTR(noHasilOP,4,12) AS UNSIGNED) DESC LIMIT 1");
		return $sql;
	}
	function getLaporanOperasi($noregop){
		$sql=$this->db->query("SELECT noHasilOP AS nohasilop,noRegistrasiOP AS noregop,diagnosaPostOP AS diagnosapost,jaringanEksisiInsisi AS jaringan,pemeriksaanPA AS pemeriksaanpa,DATE_FORMAT(operasiMulai,'%d-%m-%Y') AS tglop,DATE_FORMAT(operasiMulai,'%H:%i:%s') AS opmulai,DATE_FORMAT(operasiSelesai,'%H:%i:%s') AS opselesai,(SELECT TIMEDIFF(operasiSelesai, operasiMulai)) AS lamaop,DATE_FORMAT(pembiusanMulai,'%H:%i:%s') AS biusmulai,DATE_FORMAT(pembiusanSelesai,'%H:%i:%s') AS biusselesai,(SELECT TIMEDIFF(pembiusanSelesai, pembiusanMulai)) AS lamabius,laporan AS laporan,jmlPendarahan AS jmlpendarahan,komplikasi AS komplikasi,instruksiPostOP AS instruksipost,pemakaianImplan AS pakaiimplan,hasilOP AS hasilop FROM t_hasiloperasi WHERE noRegistrasiOP=?",array($noregop));
		return $sql;
	}
	function insertHasilOperasi($noHasilOP,$noRegistrasiOP,$diagnosaPostOP,$jaringanEksisiInsisi,$pemeriksaanPA,$operasiMulai,$operasiSelesai,$pembiusanMulai,$pembiusanSelesai,$laporan,$jmlPendarahan,$komplikasi,$instruksiPostOP,$pemakaianImplan,$modifiedUser){
		$sql=$this->db->query("INSERT INTO t_hasiloperasi(noHasilOP,noRegistrasiOP,diagnosaPostOP,jaringanEksisiInsisi,pemeriksaanPA,operasiMulai,operasiSelesai,pembiusanMulai,pembiusanSelesai,laporan,jmlPendarahan,komplikasi,instruksiPostOP,pemakaianImplan,modifiedUser,modifiedDate) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,CONCAT(';',?),CONCAT(';',NOW()))",array($noHasilOP,$noRegistrasiOP,$diagnosaPostOP,$jaringanEksisiInsisi,$pemeriksaanPA,$operasiMulai,$operasiSelesai,$pembiusanMulai,$pembiusanSelesai,$laporan,$jmlPendarahan,$komplikasi,$instruksiPostOP,$pemakaianImplan,$modifiedUser));
		return $sql;
	}
	function uploadHasilOperasi($noHasilOP,$noRegistrasiOP,$hasilOP,$modifiedUser){
		$sql=$this->db->query("INSERT INTO t_hasiloperasi(noHasilOP,noRegistrasiOP,hasilOP,modifiedUser,modifiedDate) VALUES(?,?,?,CONCAT(';',?),CONCAT(';',NOW()))",array($noHasilOP,$noRegistrasiOP,$hasilOP,$modifiedUser));
		return $sql;
	}
	function updateHasilOploadOperasi($noHasilOP,$hasilOP,$modifiedUser){
		$sql=$this->db->query("UPDATE t_hasiloperasi SET hasilOP=?,modifiedUser=CONCAT(COALESCE(modifiedUser,''),';',?),modifiedDate=CONCAT(COALESCE(modifiedDate,''),';',NOW()) WHERE noHasilOP=?",array($hasilOP,$modifiedUser,$noHasilOP));
		return $sql;
	}
	function getStatusBayar($noregop){
		$sql=$this->db->query("SELECT statusPembayaran AS statusbayar, DATE_FORMAT(tglPembayaran,'%d-%m-%Y %H:%s:%i') AS tglbayar FROM t_tindakanok WHERE noRegistrasiOP=?",array($noregop));
		return $sql;
	}
	function updateHasilOperasi($noHasilOP,$noRegistrasiOP,$diagnosaPostOP,$jaringanEksisiInsisi,$pemeriksaanPA,$operasiMulai,$operasiSelesai,$pembiusanMulai,$pembiusanSelesai,$laporan,$jmlPendarahan,$komplikasi,$instruksiPostOP,$pemakaianImplan,$modifiedUser){
		$sql=$this->db->query("UPDATE t_hasiloperasi SET diagnosaPostOP=?, jaringanEksisiInsisi=?, pemeriksaanPA=?, operasiMulai=?, operasiSelesai=?, pembiusanMulai=?, pembiusanSelesai=?, laporan=?, jmlPendarahan=?, komplikasi=?, instruksiPostOP=?, pemakaianImplan=?, modifiedUser=CONCAT(COALESCE(modifiedUser,''),';',?), modifiedDate=CONCAT(COALESCE(modifiedDate,''),';',NOW()) WHERE noHasilOP=? AND noRegistrasiOP=?",array($diagnosaPostOP,$jaringanEksisiInsisi,$pemeriksaanPA,$operasiMulai,$operasiSelesai,$pembiusanMulai,$pembiusanSelesai,$laporan,$jmlPendarahan,$komplikasi,$instruksiPostOP,$pemakaianImplan,$modifiedUser,$noHasilOP,$noRegistrasiOP));
		return $sql;
	}
	function updateStatusOP($instalasi,$noregop){
        $hasil="";
        if($instalasi==="01"||$instalasi==="02"){
            $hasil=$this->db->query("UPDATE t_registrasiokrajal SET statusOP='1' WHERE noRegistrasiOP=?",array($noregop));
        }else if($instalasi==="03"){
            $hasil=$this->db->query("UPDATE t_registrasiokranap SET statusOP='1' WHERE noRegistrasiOP=?",array($noregop));
        }
		return $hasil;
    }
    function getLaporanOperasiCetak($nohasilop){
    	$sql=$this->db->query("SELECT * FROM vw_cetakhasiloperasi WHERE nohasilop=?",array($nohasilop));
    	return $sql;
    }
}
?>
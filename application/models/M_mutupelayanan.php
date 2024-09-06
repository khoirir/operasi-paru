<?php
class M_mutupelayanan extends CI_Model{
	function getDetailPasien($norm){
        $this->db->select("noRekamedis AS norm,nmPasien AS namapasien,tempatLahir AS tmplahir,DATE_FORMAT(tglLahir,'%d-%m-%Y') AS tgllahir,jenisKelamin AS jk,alamat AS alamat,kelurahan AS kelurahan, kecamatan AS kecamatan, kabupaten AS kabupaten,provinsi AS provinsi");
        return $this->db->get_where("t_pasien",array("noRekamedis"=>$norm));
    }

    function getDetailAsalPasien($noregistrasi){
        if(strtolower(substr($noregistrasi,0,2))=='ri'){
            $select="trg.noDaftar AS nodaftar,DATE_FORMAT(trg.tglDaftar,'%d-%m-%Y %H:%i:%s') AS tgldaftar,trorn.noDaftarRawatInap AS noregistrasi,DATE_FORMAT(trorn.tglMasukRawatInap,'%d-%m-%Y %H:%i:%s') AS tglregistrasi,UPPER(trorn.rawatInap) AS unitasal,IF(trorn.kelas IS NULL,'',trorn.kelas) AS kelas,tcb.carabayar AS carabayar,tpj.penjamin AS penjamin";
            $this->db->select($select);
            $this->db->from('t_registrasirawatinap trorn');
            $this->db->join('t_registrasi trg', 'trorn.noDaftar = trg.noDaftar');
            $this->db->join('t_carabayar tcb', 'tcb.kdCaraBayar = trg.kdCaraBayar');
            $this->db->join('t_penjamin tpj', 'tpj.kdPenjamin = trg.kdPenjamin');
            $where = array('trorn.noDaftarRawatInap' => $noregistrasi);
            $this->db->where($where);
            $sql=$this->db->get();
        }else{
            $select="trg.noDaftar AS nodaftar,DATE_FORMAT(trg.tglDaftar,'%d-%m-%Y %H:%i:%s') AS tgldaftar,trorj.noRegistrasiRawatJalan AS noregistrasi,DATE_FORMAT(trorj.tglMasukRawatJalan,'%d-%m-%Y %H:%i:%s') AS tglregistrasi,UPPER(tun.unit) AS unitasal,'' AS kelas,tcb.carabayar AS carabayar,tpj.penjamin AS penjamin";
            $this->db->select($select);
            $this->db->from('t_registrasirawatjalan trorj');
            $this->db->join('t_unit tun', 'trorj.kdUnit = tun.kdUnit');
            $this->db->join('t_registrasi trg', 'trorj.noDaftar = trg.noDaftar');
            $this->db->join('t_carabayar tcb', 'tcb.kdCaraBayar = trg.kdCaraBayar');
            $this->db->join('t_penjamin tpj', 'tpj.kdPenjamin = trg.kdPenjamin');
            $where = array('trorj.noRegistrasiRawatJalan' => $noregistrasi);
            $this->db->where($where);
            $sql=$this->db->get();
        }
        return $sql;
    }

    function getDetailPemesananOperasi($noregop){
        $select="tro.noRM AS norm,tro.noRegistrasiPasien AS noregistrasi,tjop.jenisOperasi AS jenisop,tjop.keterangan AS warnajenisop,tro.keterangan AS keterangan,tro.noRegistrasiOP AS noregistrasiop,DATE_FORMAT( tro.tglRegistrasiOP, '%d-%m-%Y %H:%i:%s') AS tglregistrasiop,tro.dokterPengirim AS dokterpengirim,DATE_FORMAT( tro.tglPermintaanOP, '%d-%m-%Y %H:%i:%s') AS tglpermintaanop,DATE_FORMAT(tro.tglKonfirmasiJadwalOP,'%d-%m-%Y') AS tgljadwalop,tro.instalasi AS instalasi,(SELECT GROUP_CONCAT(CONCAT(';',operator) SEPARATOR '') FROM t_detailtindakanokparu WHERE noTindakanOP=top.noTindakanOP AND statusHapus='0') AS dokterop,top.kamarOP AS kamarop";
        $this->db->select($select);
        $this->db->from('t_registrasiokparu tro');
        $this->db->join('t_jenisop tjop', 'tro.jenisOperasi = tjop.kdJenisOperasi');
        $this->db->join('t_tindakanokparu top','tro.noRegistrasiOP = top.noRegistrasiOP','left');
        $where = array('tro.noRegistrasiOP' => $noregop);
        $this->db->where($where);
        $sql=$this->db->get();

        return $sql;
    }

    function getRawatInap(){
    	return $this->db->query("SELECT kdRawatInap AS kode,rawatInap AS rawatinap FROM t_rawatinap ORDER BY rawatInap")->result();
    }

    function getMutuPelayanan($noregop){
    	$sql=$this->db->query("
    		SELECT 
    			tmk.idMutuPelayanan AS id,
				tmk.noRegistrasiOP AS noregop,
				tmk.ruangPerawatan AS ruangperawatan, 
				tmk.terdapatInsiden AS terdapatinsiden,
				tmk.kronologiInsiden AS kronologiinsiden,
				tmk.jenisInsiden AS jenisinsiden,
				tmk.tindakanSementara AS tindakansementara,
				tmk.permasalahanOP AS permasalahanop,
				tmk.siteMarking AS sitemarking,
				tmk.pemakaianGelangPasien AS gelangpasien,
				tmk.kesesuaianIdentitas AS sesuaiidentitas,
				tmk.kejadianPasienJatuh AS pasienjatuh,
				tmk.tertinggalBendaAsing AS bendaasing,
				tmk.dot AS dot,
				tmk.discrepancyOP AS discrepancyop,
				tmk.reOperasi AS reoperasi,
				tmk.tundaOP AS tundaop,
				tmk.kelangkapanAsesmen AS lengkapasesmen,
				tmk.signOut AS signout,
				tmk.idUser AS iduser,
				tmk.tglUser AS tgluser
			FROM
				t_mutukamarokparu tmk
			WHERE
				tmk.noRegistrasiOP = ?
		",array($noregop));
		return $sql;
    }

    function updateMutuPelayanan($id,$data){
        $this->db->where('idMutuPelayanan', $id);
        return $this->db->update('t_mutukamarokparu', $data);
    }

    function insertMutuPelayanan($data){
        return $this->db->insert('t_mutukamarokparu', $data);
    }
}

?>
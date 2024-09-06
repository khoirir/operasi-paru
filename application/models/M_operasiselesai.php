<?php
class M_operasiselesai extends CI_Model{

    function dataOperasiSelesai($tglawal, $tglakhir, $jenisop, $operator){
        $sql=$this->db->query("
            SELECT
                tro.noRegistrasiOP AS noregop,
                tp.nmPasien AS pasien,
                tro.noRM AS norm,
                un.tglmrs AS tglmrs,
                DATE_FORMAT(tro.tglKonfirmasiJadwalOP,'%d-%m-%Y') AS tglop,
                tp.jenisKelamin AS jk,
                tro.instalasi AS instalasi,
                un.unit AS unit,
                tjo.jenisOperasi AS jenisop,
                tjo.keterangan AS warnajenisop,
                (SELECT GROUP_CONCAT(CONCAT(';',operator) SEPARATOR '') FROM t_detailtindakanokparu WHERE noTindakanOP=top.noTindakanOP AND statusHapus='0') AS dokterop,
                tmk.idMutuPelayanan AS id
            FROM
                t_registrasiokparu tro
                INNER JOIN t_tindakanokparu top ON tro.noRegistrasiOP = top.noRegistrasiOP
                INNER JOIN t_jenisop tjo ON tro.jenisOperasi = tjo.kdJenisOperasi
                INNER JOIN t_registrasi trg ON tro.noDaftarPasien = trg.noDaftar
                INNER JOIN t_pasien tp ON tro.noRM = tp.noRekamedis
                INNER JOIN (SELECT trj.noRegistrasiRawatJalan AS noregistrasi,DATE_FORMAT(trj.tglMasukRawatJalan,'%d-%m-%Y') AS tglmrs,tun.unit AS unit FROM t_registrasirawatjalan trj INNER JOIN t_unit tun ON trj.kdUnit = tun.kdUnit UNION ALL SELECT  tri.noDaftarRawatInap AS noregistrasi, DATE_FORMAT(tri.tglMasukRawatInap,'%d-%m-%Y') AS tglmrs,tri.rawatInap AS unit FROM t_registrasirawatinap tri ) un ON tro.noRegistrasiPasien = un.noregistrasi
                LEFT JOIN t_mutukamarokparu tmk ON tro.noRegistrasiOP = tmk.noRegistrasiOP
            WHERE
                tro.statusOP='5' AND tro.jenisOperasi $jenisop AND (tro.tglKonfirmasiJadwalOP BETWEEN '$tglawal' AND '$tglakhir') AND (SELECT GROUP_CONCAT(CONCAT(';',operator) SEPARATOR '') FROM t_detailtindakanokparu WHERE noTindakanOP=top.noTindakanOP AND statusHapus='0') $operator
            ORDER BY
                tro.tglKonfirmasiJadwalOP ASC
        ");
        return $sql;
    }

    function getDataOperasi($tglawal, $tglakhir, $jenisop, $operator){
        $sql=$this->db->query("
            SELECT
                tp.nmPasien AS pasien,
                tro.noRM AS norm,
                un.tglmrs AS tglmrs,
                DATE_FORMAT(tro.tglKonfirmasiJadwalOP,'%d-%m-%Y') AS tglop,
                tp.jenisKelamin AS jk,
                tro.instalasi AS instalasi,
                tri.rawatInap AS ruangperawatan,
                un.unit AS unit,
                tjo.jenisOperasi AS jenisop,
                top.noTindakanOP AS notinop,
                tmk.kelangkapanAsesmen AS lengkapasesmen,
                tdo.diagnosaPra AS diagnosapra,
                tdo.diagnosaPost AS diagtnosapost,
                tdo.sarsCovid AS sarscovid,
                tro.dokterPengirim AS dokterpengirim,
                top.asistenOP AS asistenop,
                top.perawatInstrument AS perawatinstrument,
                top.perawatSirkuler AS perawatsirkuler,
                tan.dokterAnestesi AS dokteranestesi,
                tan.asistenAnestesi AS asistenanestesi,
                top.pemakaianImplan AS pakaiimplan,
                top.jenisImplan AS jenisimplan,
                tmk.siteMarking AS sitemarking,
                tmk.pemakaianGelangPasien AS pemakaiangelang,
                tmk.kesesuaianIdentitas AS kesesuaianidentitas,
                tmk.tertinggalBendaAsing AS bendaasing,
                tmk.dot AS dot,
                tmk.discrepancyOP AS discrepancyop,
                tmk.reOperasi AS reoperasi,
                tmk.tundaOP AS tundaop,
                tmk.signOut AS signout,
                tmk.kejadianPasienJatuh AS pasienjatuh,
                tmk.terdapatInsiden AS insidenpasien,
                tmk.kronologiInsiden AS kronologiinsiden,
                tmk.jenisInsiden AS jenisinsiden,
                tmk.tindakanSementara AS tindakansementara,
                tmk.permasalahanOP AS permasalahanop
            FROM
                t_registrasiokparu tro
                INNER JOIN t_tindakanokparu top ON tro.noRegistrasiOP = top.noRegistrasiOP
                INNER JOIN t_jenisop tjo ON tro.jenisOperasi = tjo.kdJenisOperasi
                INNER JOIN t_diagnosapasienokparu tdo ON tro.noRegistrasiOP = tdo.noRegistrasiOP
                INNER JOIN t_tindakananestesiokparu tan ON tro.noRegistrasiOP = tan.noRegistrasiOP
                INNER JOIN t_registrasi trg ON tro.noDaftarPasien = trg.noDaftar
                INNER JOIN t_pasien tp ON tro.noRM = tp.noRekamedis
                INNER JOIN t_carabayar tcb ON trg.kdCaraBayar = tcb.kdCaraBayar
                INNER JOIN t_penjamin tpj ON trg.kdPenjamin = tpj.kdPenjamin
                LEFT JOIN t_tenagamedis2 tnm ON tro.dokterPengirim = tnm.namapetugasMedis
                INNER JOIN (SELECT trj.noRegistrasiRawatJalan AS noregistrasi,DATE_FORMAT(trj.tglMasukRawatJalan,'%d-%m-%Y') AS tglmrs,tun.unit AS unit FROM t_registrasirawatjalan trj INNER JOIN t_unit tun ON trj.kdUnit = tun.kdUnit UNION ALL SELECT  tri.noDaftarRawatInap AS noregistrasi, DATE_FORMAT(tri.tglMasukRawatInap,'%d-%m-%Y') AS tglmrs,tri.rawatInap AS unit FROM t_registrasirawatinap tri ) un ON tro.noRegistrasiPasien = un.noregistrasi
                LEFT JOIN t_mutukamarokparu tmk ON tro.noRegistrasiOP = tmk.noRegistrasiOP
                LEFT JOIN t_rawatinap tri ON tmk.ruangPerawatan = tri.kdRawatInap
            WHERE
                tro.statusOP='5' AND tro.jenisOperasi $jenisop AND (tro.tglKonfirmasiJadwalOP BETWEEN '$tglawal' AND '$tglakhir') AND (SELECT GROUP_CONCAT(CONCAT(';',operator) SEPARATOR '') FROM t_detailtindakanokparu WHERE noTindakanOP=top.noTindakanOP AND statusHapus='0') $operator
            ORDER BY
                tro.tglKonfirmasiJadwalOP ASC;
        ");
        return $sql->result();
    }

    function getDetailTarifOperasi($notinop){
        $sql=$this->db->query("SELECT operator AS operator,tindakan AS tindakan,subTotal AS subtotal,jenisTindakan AS jenistindakan FROM t_detailtindakanokparu WHERE statusHapus=? AND noTindakanOP=?",array('0',$notinop));
        return $sql->result();
    }

    function getJenisOperasi(){
        $sql=$this->db->query("SELECT kdJenisOperasi AS kode,jenisOperasi AS jenisoperasi FROM t_jenisop WHERE kdJenisOperasi!='3' ORDER BY jenisOperasi");
        return $sql->result();
    }

    function getDokter(){
        return $this->db->query("SELECT kdPetugasMedis AS kode,namapetugasMedis AS dokter FROM vw_dokter ORDER BY namapetugasMedis ASC")->result();
    }

    function getDataOperator(){
        $queryOperator="SELECT kdPetugasMedis AS kode, namapetugasMedis AS dokter FROM t_tenagamedis2 WHERE kdPetugasMedis IN('P119','P009','P010') OR kdKelompokTenagaMedis IN('ktm1','ktm2','ktm5','ktm6','ktm7','ktm8') ORDER BY namapetugasMedis ASC";
        return $this->db->query($queryOperator)->result();
    }
}

?>
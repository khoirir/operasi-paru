<?php
class M_tindakan extends CI_Model{
    function getPasienTindakan($noregistrasiop){
        $this->db->where("noregistrasiop",$noregistrasiop);
        return $this->db->get("vw_detailpasienokparu");
    }

    function getDataOperator(){
        $queryOperator="SELECT kdPetugasMedis AS kode, namapetugasMedis AS operator FROM t_tenagamedis2 WHERE kdPetugasMedis IN('P119','P009','P010') OR kdKelompokTenagaMedis IN('ktm1','ktm2','ktm5','ktm6','ktm7','ktm8') ORDER BY namapetugasMedis ASC";
        return $this->db->query($queryOperator)->result();
    }

    function getDokter(){
        return $this->db->query("SELECT kdPetugasMedis AS kode,namapetugasMedis AS dokter FROM vw_dokter ORDER BY namapetugasMedis ASC");
    }

    function getPerawat(){
        return $this->db->query("SELECT kdPetugasMedis AS kode,namapetugasMedis AS perawat FROM t_tenagamedis2 WHERE kdKelompokTenagaMedis='ktm4' ORDER BY namapetugasMedis ASC");
    }

    function getJenisImplanOP(){
        $this->db->order_by("idJenisImplan","ASC");
        return $this->db->get("t_jenisimplanop");
    }

    function getKelasTindakanOP(){
        return $this->db->query("SELECT kdkelas,kelas FROM vw_tindakanokparu GROUP BY kdkelas");
    }

    function getTindakanOP($kdkelas){
        $this->db->where("kdkelas",$kdkelas);
        return $this->db->get("vw_tindakanokparu");
    }



    function getEditPasienTindakan($noregop){
        $hsl=$this->db->query("SELECT * FROM vw_detailpermintaanoperasiselesaitindakan WHERE noregistrasiop = ?",array($noregop));
        return $hsl;
    }

    function getDokterAnestesi(){
        $this->db->where_in("kdPetugasMedis",array("0006","0050","0078"));
        $this->db->order_by("namapetugasMedis","ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getPerawatAnestesi(){
        $this->db->where_in("kdPetugasMedis",array("P011","P012","P092","P200"));
        $this->db->order_by("namapetugasMedis","ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getJenisAnestesi(){
        return $this->db->get("t_jenisanestesi");
    }

    function getDokterOperator(){
        $this->db->where_in("kdPetugasMedis",array("0009","0007","0015","0024","0041","0010","0038","0011","0054","0030","0033","0019","0074","0056","0052"));
        $this->db->order_by("namapetugasMedis","ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getPerawatOP(){
        $this->db->where_in("kdPetugasMedis",array("P044","P015","P103","P115","P128","P129","P102","P075","P076","P072","P074","P042","P071","P061","P073","P018"));
        $this->db->order_by("namapetugasMedis","ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getPerawatInsSir(){
        $this->db->where_in("kdPetugasMedis",array("P103","P115","P128","P129","P102","P075","P076","P072","P074","P071","P061","P073","P018"));
        $this->db->order_by("namapetugasMedis","ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getRadiografer(){
        $this->db->where("kdKelompokTenagaMedis","ktm12");
        $this->db->order_by("namapetugasMedis","ASC");
        return $this->db->get("t_tenagamedis2");
    }

    function getKamarOP(){
        $this->db->order_by("idKamarOP","ASC");
        return $this->db->get("t_kamarop");
    }

    function getTindakanAnestesi($noregistrasiop){
        $this->db->select("noTindakanAnestesi AS notindakananestesi,DATE_FORMAT(tglTindakan,'%d-%m-%Y %H:%i:%s') AS tgltindakananestesi,tindakanAnestesi AS tindakananestesi,dokterAnestesi AS dokteranestesi,asistenAnestesi AS asistenanestesi,jenisAnestesi AS jenisanestesi,keterangan AS keterangan,idUser AS iduser,tglUser AS tgluser");
        return $this->db->get_where("t_tindakananestesiokparu",array("noRegistrasiOP"=>$noregistrasiop));
    }

    function updateTindakanAnestesi($notindakananestesi,$data){
        $this->db->where('noTindakanAnestesi', $notindakananestesi);
        return $this->db->update('t_tindakananestesiokparu', $data);
    }

    function insertTindakanAnestesi($data){
        return $this->db->insert('t_tindakananestesiokparu', $data);
    }

    function getTindakanOperasi($noregistrasiop){
        $this->db->select("noTindakanOP AS notindakanop,DATE_FORMAT(tglTindakan,'%d-%m-%Y %H:%i:%s') AS tgltindakanop,totalTarifTindakan AS totaltariftindakan,statusPembayaran AS statuspembayaran,DATE_FORMAT(tglPembayaran,'%d-%m-%Y %H:%i:%s') AS tglpembayaran,dokterOP AS dokterop,asistenOP AS asistenop,radiografer AS radiografer,perawatSirkuler AS perawatsirkuler,perawatInstrument AS perawatinstrument,jamInduksi AS jaminduksi,jamIncisi AS jamincisi,pemakaianImplan AS pemakaianimplan,jenisImplan AS jenisimplan,kamarOP AS kamarop,idUser AS iduser,tglUser AS tgluser");
        return $this->db->get_where("t_tindakanokparu",array("noRegistrasiOP"=>$noregistrasiop));
    }

    function getDetailTindakanOperasi($notindakanop){
        $select="tdto.idDetailTindakan AS iddetail,tdto.noTindakanOP AS notindakanop,tdto.operator AS operator,tdto.kdTindakan AS kdtindakan,tdto.tindakan AS tindakan,tdto.jmlTindakan AS jmltindakan,UPPER(tdto.jenisTindakan) AS jenistindakan,IF(tk.kelas IS NULL,'-',tk.kelas) AS kelas,tdto.kdTarif AS kdtarif,tdto.tarif AS tarif,tdto.subTotal AS subtotal,tdto.statusHapus AS statushapus,tdto.idUser AS iduser,tglUser AS tgluser";
        $this->db->select($select);
        $this->db->from('t_detailtindakanokparu tdto');
        $this->db->join('t_tariftindakan2 tt', 'tdto.kdTarif = tt.kdTarif','left');
        $this->db->join('t_kelas tk', 'tk.kdKelas = tt.kdKelas','left');
        $where = array('tdto.noTindakanOP' => $notindakanop,'tdto.statusHapus'=>'0');
        $this->db->where($where);
        $this->db->order_by("tdto.idDetailTindakan","ASC");
        return $this->db->get();
    }

    function updateTindakanOperasi($notindakanop,$data){
        $this->db->where('noTindakanOP', $notindakanop);
        return $this->db->update('t_tindakanokparu', $data);
    }

    function insertTindakanOperasi($data){
        return $this->db->insert('t_tindakanokparu', $data);
    }

    function insertDetailTindakanOperasi($data){
        return $this->db->insert('t_detailtindakanokparu', $data);
    }

    function updateDetailTindakanOperasi($iddetail,$data){
        $this->db->where('idDetailTindakan', $iddetail);
        return $this->db->update('t_detailtindakanokparu', $data);
    }

    function hapusDetailTindakanOperasi($iddetail,$iduser,$tgluser){
        $this->db->set('statusHapus', '1');
        $this->db->set('idUser', $iduser);
        $this->db->set('tglUser', $tgluser);
        $this->db->where_in('idDetailTindakan', $iddetail);
        return $this->db->update('t_detailtindakanokparu');
    }

    function getDataObat(){
        $db2=$this->load->database('farmasi',TRUE);
        $db2->select("plu,obat,jmlstok,satuan,hargajual");
        $db2->where("kddepo","DP05");
        $db2->order_by("obat","ASC");
        return $db2->get("vw_stokobat");
    }

    function getNoResepLast(){
        $this->db->select("noResep AS noresep");
        $this->db->where("LEFT(noResep,5)","RSPOK");
        $this->db->order_by("tglResep","DESC");
        $this->db->limit(1);
        return $this->db->get("t_resepranap");
    }

    function insertResep($data){
        return $this->db->insert('t_resepranap', $data);
    }

    function insertDetailResep($data){
        return $this->db->insert('t_detailresepranap', $data);
    }

    function getRiwayatResepTidakTerlayani($norm,$tglawal,$tglakhir){
        $select="tres.noRekamedis AS norm,tres.noResep AS noresep,tres.tglResep AS tglresep,tnm.namaPetugasMedis AS dokter,tdp.depoObat AS depo";
        $this->db->select($select);
        $this->db->from('t_resepranap tres');
        $this->db->join('t_tenagamedis2 tnm', 'tres.kdTenagaMedis=tnm.kdPetugasMedis');
        $this->db->join('farmasi2.t_depoobat tdp', 'tres.kdDepoObat=tdp.kdDepoObat');
        $this->db->where('tres.noRekamedis', $norm);
        $this->db->where('tres.tglResep >=', $tglawal);
        $this->db->where('tres.tglResep <=', $tglakhir);
        $this->db->order_by("tres.tglResep","DESC");
        return $this->db->get();
    }

    function getDetailRiwayatResepTidakTerlayani($noresep){
        $select="tdr.noResep AS notransaksi,tob.nmObat AS obat,tdr.jumlahPakai AS butuh,tdr.jmlPemberianKronis AS butuhkronis,tdr.jmlPemberianNonKronis AS butuhnonkronis,tob.satuanJual AS satuan,tob.hargaJual AS harga";
        $this->db->select($select);
        $this->db->from('t_detailresepranap tdr');
        $this->db->join('farmasi2.t_obat tob', 'tdr.kdObat=tob.kdObat');
        $this->db->where('tdr.noResep', $noresep);
        $this->db->order_by("tob.nmObat","DESC");
        return $this->db->get();
    }

    function getRiwayatResepTerlayani($norm,$tglawal,$tglakhir){
        $db2=$this->load->database('farmasi',TRUE);
        $sql=$db2->query("
            SELECT * FROM (
                SELECT 
                    trj.noPenjualanObatRajal AS nopenjualan,
                    DATE_FORMAT(trj.tglPenjualanObatRajal,'%d-%m-%Y %H:%i:%s') AS tglpenjualan,
                    trj.noRekamedis AS norm,
                    tm.namapetugasMedis AS dokter,
                    trj.instalasi AS instalasi,
                    UPPER(trj.caraPembayaran) AS carabayar,
                    UPPER(trj.penjamin) AS penjamin,
                    trj.totalAkhirPenjualanRajal AS totalakhir,
                    trj.statusPembayaran AS statusbayar,
                    trj.tglPenjualanObatRajal AS tgl,
                    trj.unit AS unit
                FROM 
                    t_penjualanobatrajal trj 
                    LEFT JOIN simrs.t_tenagamedis2 tm ON trj.dokterPemberiResep = tm.kdPetugasMedis 
                WHERE 
                    trj.noRekamedis='$norm' AND trj.tglPenjualanObatRajal BETWEEN '$tglawal' AND '$tglakhir'
                UNION ALL
                SELECT
                    trn.noPenjualanObatRanap AS nopenjualan,
                    DATE_FORMAT(trn.tglPenjualanObatRanap,'%d-%m-%Y %H:%i:%s') AS tglpenjualan,
                    trn.noRekamedis AS norm,
                    tm.namapetugasMedis AS dokter,
                    trn.instalasi AS instalasi,
                    UPPER(trn.caraPembayaran) AS carabayar,
                    UPPER(trn.penjamin) AS penjamin,
                    trn.totalAkhirPenjualanRanap AS totalakhir,
                    trn.statusPembayaran AS statusbayar,
                    trn.tglPenjualanObatRanap AS tgl,
                    trn.ruang AS unit
                FROM 
                    t_penjualanobatranap trn 
                    LEFT JOIN simrs.t_tenagamedis2 tm ON trn.dokterPemberiResep = tm.kdPetugasMedis
                WHERE 
                    trn.noRekamedis='$norm' AND trn.tglPenjualanObatRanap BETWEEN '$tglawal' AND '$tglakhir'
                UNION ALL
                SELECT
                    tig.noPenjualanObatIGD AS nopenjualan,
                    DATE_FORMAT(tig.tglPenjualanObatIGD,'%d-%m-%Y %H:%i:%s') AS tglpenjualan,
                    tig.noRekamedis AS norm,
                    tm.namapetugasMedis AS dokter,
                    tig.instalasi AS instalasi,
                    UPPER(tig.caraPembayaran) AS carabayar,
                    UPPER(tig.penjamin) AS penjamin,
                    tig.totalAkhirPenjualanIGD AS totalakhir,
                    tig.statusPembayaran AS statusbayar,
                    tig.tglPenjualanObatIGD AS tgl,
                    tig.unit AS unit
                FROM
                    t_penjualanobatigd tig
                    LEFT JOIN simrs.t_tenagamedis2 tm ON tig.dokterPemberiResep = tm.kdPetugasMedis
                WHERE 
                    tig.noRekamedis='$norm' AND tig.tglPenjualanObatIGD BETWEEN '$tglawal' AND '$tglakhir'
                UNION ALL
                SELECT
                    tpok.noPenjualanObatOK AS nopenjualan,
                    DATE_FORMAT(tpok.tglPenjualanObatOK,'%d-%m-%Y %H:%i:%s') AS tglpenjualan,
                    tpok.noRekamedis AS norm,
                    tm.namapetugasMedis AS dokter,
                    tpok.instalasi AS instalasi,
                    UPPER(tpok.caraPembayaran) AS carabayar,
                    UPPER(tpok.penjamin) AS penjamin,
                    tpok.totalAkhirPenjualanOK AS totalakhir,
                    tpok.statusPembayaran AS statusbayar,
                    tpok.tglPenjualanObatOK AS tgl,
                    tpok.unit AS unit
                FROM
                    t_penjualanobatok tpok
                    LEFT JOIN simrs.t_tenagamedis2 tm ON tpok.dokterPemberiResep = tm.kdPetugasMedis
                WHERE 
                    tpok.noRekamedis='$norm' AND tpok.tglPenjualanObatOK BETWEEN '$tglawal' AND '$tglakhir'
            ) AS sel ORDER BY tgl DESC
        ");
        return $sql;
    }

    function getDetailRiwayatResepTerlayani($nopenjualan,$instalasi){
        $db2=$this->load->database('farmasi',TRUE);
        if($instalasi=="P1RJ"){
            $select="tdrj.noPenjualanObatRajal AS nopenjualan,tdrj.idDetailPenjualanObatRajal AS id,tdrj.kdObat AS plu,tdrj.namaObat AS obat,tdrj.harga AS harga,( tdrj.diberikanKronis + tdrj.diberikanNonKronis ) AS jmljual,UPPER(tdrj.satuan) AS satuan,tdrj.diberikanKronis AS berikronis,tdrj.diberikanNonKronis AS berinonkronis,tdrj.subTotalPenjualan AS subtotal,tdrj.kebutuhanKronis AS butuhkronis,tdrj.kebutuhanNonKronis AS butuhnonkronis";
            $db2->select($select);
            $sql=$db2->get_where("t_detailpenjualanobatrajal tdrj",array("tdrj.noPenjualanObatRajal"=>$nopenjualan));
        }else if($instalasi=="P1RI"){
            $select="tdrn.noPenjualanObatRanap AS nopenjualan,tdrn.idDetailPenjualanObatRanap AS id,tdrn.kdObat AS plu,tdrn.namaObat AS obat,tdrn.harga AS harga,( tdrn.diberikanKronis + tdrn.diberikanNonKronis ) AS jmljual,UPPER(tdrn.satuan) AS satuan,tdrn.diberikanKronis AS berikronis,tdrn.diberikanNonKronis AS berinonkronis,tdrn.subTotalPenjualan AS subtotal,tdrn.kebutuhanKronis AS butuhkronis,tdrn.kebutuhanNonKronis AS butuhnonkronis";
            $db2->select($select);
            $sql=$db2->get_where("t_detailpenjualanobatranap tdrn",array("tdrn.noPenjualanObatRanap"=>$nopenjualan));
        }if($instalasi=="PIGD"){
            $select="tdig.noPenjualanObatIGD AS nopenjualan,tdig.idDetailPenjualanObatIGD AS id,tdig.kdObat AS plu,tdig.namaObat AS obat,tdig.harga AS harga,( tdig.diberikanKronis + tdig.diberikanNonKronis ) AS jmljual,UPPER(tdig.satuan) AS satuan,tdig.diberikanKronis AS berikronis,tdig.diberikanNonKronis AS berinonkronis,tdig.subTotalPenjualan AS subtotal,tdig.kebutuhanKronis AS butuhkronis,tdig.kebutuhanNonKronis AS butuhnonkronis";
            $db2->select($select);
            $sql=$db2->get_where("t_detailpenjualanobatigd tdig",array("tdig.noPenjualanObatIGD"=>$nopenjualan));
        }else if($instalasi=="PIOK"){
            $select="tdok.noPenjualanObatOK AS nopenjualan,tdok.idDetailPenjualanObatOK AS id,tdok.kdObat AS plu,tdok.namaObat AS obat,tdok.harga AS harga,( tdok.diberikanKronis + tdok.diberikanNonKronis ) AS jmljual,UPPER(tdok.satuan) AS satuan,tdok.diberikanKronis AS berikronis,tdok.diberikanNonKronis AS berinonkronis,tdok.subTotalPenjualan AS subtotal,tdok.kebutuhanKronis AS butuhkronis,tdok.kebutuhanNonKronis AS butuhnonkronis";
            $db2->select($select);
            $sql=$db2->get_where("t_detailpenjualanobatok tdok",array("tdok.noPenjualanObatOK"=>$nopenjualan));
        }
        return $sql;
    }

    function getKelasTindakanLab(){
        return $this->db->query("SELECT kdKelas,kelas FROM vw_tindakanlab GROUP BY kdKelas");
    }

    function getTindakanLab($kdkelas){
        $this->db->where("kdKelas",$kdkelas);
        return $this->db->get("vw_tindakanlab");
    }

    function getLastNoRegLab($instalasi){
        if($instalasi=="RI"){
            $this->db->select("noRegistrasiPenunjangRanap AS noreg");
            $this->db->order_by("tglMasukPenunjangRanap","DESC");
            $this->db->limit(1);
            $sql=$this->db->get("t_registrasipenunjangranap");
        }else{
            $this->db->select("noRegistrasiPenunjangRajal AS noreg");
            $this->db->order_by("tglMasukPenunjangRajal","DESC");
            $this->db->limit(1);
            $sql=$this->db->get("t_registrasipenunjangrajal");
        }
        return $sql;
    }

    function getLastNoTinLab($instalasi){
        if($instalasi=="RI"){
            $sql=$this->db->query("SELECT noTindakanPenunjangRanap AS notin FROM t_tindakanpenunjangranap ORDER BY STR_TO_DATE(SUBSTRING(noTindakanPenunjangRanap, 5, 13),'%d%m%y%H%i%s') DESC LIMIT 1");
        }else{
            $sql=$this->db->query("SELECT noTindakanPenunjangRajal AS notin FROM t_tindakanpenunjangrajal ORDER BY STR_TO_DATE(SUBSTRING(noTindakanPenunjangRajal, 5, 13),'%d%m%y%H%i%s') DESC LIMIT 1");
        }
        return $sql;
    }

    function insertRegistrasiLabRanap($data){
        return $this->db->insert('t_registrasipenunjangranap', $data);
    }

    function insertRegistrasiLabRajal($data){
        return $this->db->insert('t_registrasipenunjangrajal', $data);
    }

    function insertTindakanLabRanap($data){
        return $this->db->insert('t_tindakanpenunjangranap', $data);
    }

    function insertTindakanLabRajal($data){
        return $this->db->insert('t_tindakanpenunjangrajal', $data);
    }

    function insertDetailTindakanLabRanap($data){
        return $this->db->insert('t_detailtindakanpenunjangranap', $data);
    }

    function insertDetailTindakanLabRajal($data){
        return $this->db->insert('t_detailtindakanpenunjangrajal', $data);
    }

    function getRiwayatLab($norm,$tglawal,$tglakhir){
        $this->db->where('norm', $norm);
        $this->db->where('tglreg >=', $tglawal);
        $this->db->where('tglreg <=', $tglakhir);
        $this->db->order_by("tglreg","ASC");
        return $this->db->get("vw_riwayatlaboperasi"); 
    }

    function getDetailRiwayatLab($kodeinstalasi,$notindakan){
        if($kodeinstalasi=="ri"){
            $this->db->select("td.noTindakanPenunjangRanap AS notin,td.tindakan AS tindakan,td.jumlahTindakan AS jml,tk.kelas AS kelas,td.tarif AS tarif,td.totalTarif AS subtotal,tnm.namaPetugasMedis AS petugasmedis,IF(td.statusTindakan IS NULL,'SELESAI',td.statusTindakan) AS statustindakan");
            $this->db->from("t_detailtindakanpenunjangranap td");
            $this->db->join("t_tariftindakan2 ttt", "td.kdTarif = ttt.kdTarif");
            $this->db->join("t_kelas tk", "ttt.kdKelas=tk.kdKelas");
            $this->db->join("t_tenagamedis2 tnm", "td.kdTenagaMedis = tnm.kdPetugasMedis","left");
            $this->db->where("td.noTindakanPenunjangRanap",$notindakan);
            $sql=$this->db->get();
        }else{
            $this->db->select("td.noTindakanPenunjangRajal AS notin,td.tindakan AS tindakan,td.jumlahTindakan AS jml,tk.kelas AS kelas,td.tarif AS tarif,td.totalTarif AS subtotal,tnm.namaPetugasMedis AS petugasmedis,IF(td.statusTindakan IS NULL,'SELESAI',td.statusTindakan) AS statustindakan");
            $this->db->from("t_detailtindakanpenunjangrajal td");
            $this->db->join("t_tariftindakan2 ttt", "td.kdTarif = ttt.kdTarif");
            $this->db->join("t_kelas tk", "ttt.kdKelas=tk.kdKelas");
            $this->db->join("t_tenagamedis2 tnm", "td.kdTenagaMedis = tnm.kdPetugasMedis","left");
            $this->db->where("td.noTindakanPenunjangRajal",$notindakan);
            $sql=$this->db->get();
        }
        return $sql;
    }

    function konfirmasiSelesaiTindakan($noregop,$statusop,$iduser,$tgluser){
        $sql=$this->db->query("UPDATE t_registrasiokparu SET statusOP=?,idUser=CONCAT(COALESCE(idUser,''),';',?),tglUser=CONCAT(COALESCE(tglUser,''),';',?) WHERE noRegistrasiOP=?",array($statusop,$iduser,$tgluser,$noregop));
        return $sql;
    }

    function getNoTindakanOP($noregistrasiop){
        $sql=$this->db->query("SELECT noRegistrasiOP AS noregop,noTindakanOP AS notinop,statusTindakan AS statustindakan,dokterOP AS dokterop,timOP AS timop,dokterAnestesi AS dokteranestesi,asistenAnestesi AS asistenanestesi,radiografer,perawatSirkuler AS perawatsirkuler,perawatInstrument AS perawatinstrument,jenisAnestesi AS jenisanestesi,statusPembayaran AS statusbayar FROM t_tindakanok WHERE noregistrasiop=?",array($noregistrasiop));
        return $sql;
    }

    function getDetailTindakanPasien($noregistrasiop,$notindakanop){
        $sql=$this->db->query("SELECT * FROM vw_gettindakanpasienok WHERE noregistrasiop=? AND notindakanop=? AND statushapus=0 ORDER BY tindakan DESC",array($noregistrasiop,$notindakanop));
        return $sql;
    }

    function getDiagnosaPraPost($noregistrasiop){
        $this->db->select('idDiagnosaOP AS iddiagnosa,diagnosaPra AS diagnosapra, diagnosaPost AS diagnosapost, dokterDiagnosaPra AS dokterdiagnosapra,dokterDiagnosaPost AS dokterdiagnosapost,sarsCovid AS sarscovid,idUser AS iduser,tglUser AS tgluser');
        return $this->db->get_where("t_diagnosapasienokparu",array('noRegistrasiOP' => $noregistrasiop));
    }

    function getDiagnosaPasien($norm){
        return $this->db->query("SELECT tgldiagnosa,tgldaftar,kdicd10,icd10,deskripsi,jenisdiagnosa,dokter FROM vw_diagnosapasien WHERE norm=? ORDER BY jenisdiagnosa DESC, IF(tgldiagnosa IS NULL,tgldaftar,tgldiagnosa) ASC",array($norm));
    }

    function updateDiagnosaPrapost($iddiagnosa,$data){
        $this->db->where('idDiagnosaOP', $iddiagnosa);
        return $this->db->update('t_diagnosapasienokparu', $data);
    }

    // function insertTindakan($notinop,$operator,$kdtindakan,$tindakan,$jmlTindakan,$kdtarif,$tarif,$subTotal,$jenistindakan,$statushapus){
    //     $sql=$this->db->query("INSERT INTO t_detailtindakanok(noTindakanOP,operator,kdTindakan,tindakan,jmlTindakan,kdTarif,tarif,subTotal,jenisTindakan,statusHapus,modifiedDate) VALUES (?,?,?,?,?,?,?,?,?,?,CONCAT(';',NOW()))",array($notinop,$operator,$kdtindakan,$tindakan,$jmlTindakan,$kdtarif,$tarif,$subTotal,$jenistindakan,$statushapus));
    //     return $sql;
    // }

    // function hapusTindakan($notinop,$kdtindakan,$kdtarif,$jenistindakan){
    //     $sql=$this->db->query("UPDATE t_detailtindakanok SET statusHapus='1',modifiedDate=CONCAT(COALESCE(modifiedDate,''),';',NOW()) WHERE noTindakanOP IN($notinop) AND kdTindakan IN($kdtindakan) AND kdTarif IN($kdtarif) AND jenisTindakan IN($jenistindakan)");
    //     return $sql;
    // }

    // function updateDetailTindakan($operator,$tindakan,$jmltindakan,$tarif,$subtotal,$notinop,$kdtarif,$kdtindakan,$jenistindakan){
    //     $sql=$this->db->query("UPDATE t_detailtindakanok SET operator=?,tindakan=?,jmlTindakan=?,tarif=?,subTotal=?,modifiedDate=CONCAT(COALESCE(modifiedDate,''),';',NOW()) WHERE noTindakanOP=? AND kdTarif = ? AND kdTindakan = ? AND jenisTindakan =?",array($operator,$tindakan,$jmltindakan,$tarif,$subtotal,$notinop,$kdtarif,$kdtindakan,$jenistindakan));
    //     return $sql;
    // }

    // function updateTindakan($tgltindakan,$totaltarif,$statustindakan,$dokterop,$timop,$dokteranestesi,$asistenanestesi,$perawatinstrument,$perawatsirkuler,$radiografer,$jenisenstesi,$user,$notinop,$noregop){
    //     $sql=$this->db->query("UPDATE t_tindakanok SET tglTindakan=?,totalTarifTindakan=?,statusTindakan=?,dokterOP=?,timOP=?,dokterAnestesi=?,asistenAnestesi=?,perawatInstrument=?,perawatSirkuler=?,radiografer=?,jenisAnestesi=?,modifiedUser=CONCAT(COALESCE(modifiedUser,''),';',?),modifiedDate=CONCAT(COALESCE(modifiedDate,''),';',NOW()) WHERE noTindakanOP=? AND noRegistrasiOP=?",array($tgltindakan,$totaltarif,$statustindakan,$dokterop,$timop,$dokteranestesi,$asistenanestesi,$perawatinstrument,$perawatsirkuler,$radiografer,$jenisenstesi,$user,$notinop,$noregop));
    //     return $sql;
    // }


}
?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Float buttons with text -->
	<div class="page-header page-header-default">
		<div class="breadcrumb-line">
			<ul class="breadcrumb">
				<li><a href="<?php echo base_url('dashboard')?>"><i class="icon-home2 position-left"></i> Beranda</a></li>
				<li class="active">Registrasi Pasien Operasi</li>
			</ul>
		</div>
	</div>
	<!-- /float buttons with text -->
	<!-- Content area -->
	<div class="content">

		<!-- Basic responsive configuration -->
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h6 class="panel-title">REGISTRASI PASIEN OPERASI</h6>
            </div>

            <form role="form" class="form-horizontal" id="form_registrasi">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset>
                                <div class="col-lg-12">
                                    <legend class="text-semibold"><i class="fa fa-hospital-o position-left" style="font-size:16px"></i>INSTALASI</legend>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <input type="radio" name="radio-instalasi" class="styled" value="DP09" onchange="eventRadio('instalasi',this)">
                                            <span id="igd" class='label label-default' style='font-size:12px; padding-top:5px; width:100px; height:30px'><b>IGD</b></span>
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" name="radio-instalasi" class="styled" value="DP03" onchange="eventRadio('instalasi',this)">
                                            <span id="ranap" class='label label-default' style='font-size:12px; padding-top:5px; width:100px; height:30px'><b>RAWAT INAP</b></span>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="radio-instalasi" class="styled" value="DP01" onchange="eventRadio('instalasi',this)">
                                            <span id="rajal" class='label label-default' style='font-size:12px; padding-top:5px; width:100px; height:30px'><b>RAWAT JALAN</b></span>
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <br/><br/><br/>
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <div class="col-md-12">
                                    <legend class="text-semibold"><i class="fa fa-wheelchair position-left" style="font-size:16px"></i>PASIEN</legend>
                                    <div class="form-group">
                                        <label><b>No. RM</b></label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input id="norm" type="text" class="form-control" style="color:black" maxlength="8" onkeyup="caripasien(this,event)" disabled="disabled">
                                            </div>
                                            <div class="col-md-6">
                                                <button type="button" class="btn btn-info btn-labeled" onclick="getPasien()" disabled="disabled" id="btn_cari"><b><i class="icon-search4"></i></b>CARI</button>
                                            </div>
                                        </div>
                                        
                                        <input id="get_norm" type="hidden" class="form-control" style="color:black" maxlength="8">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Nama</b></label>
                                        <input id="nama" type="text" class="form-control" style="color:black" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Tempat/Tgl. Lahir</b></label>
                                        <input id="tmptgllahir" type="text" class="form-control" style="color:black" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Umur</b></label>
                                        <input id="umur" type="text" class="form-control" style="color:black" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Jenis Kelamin</b></label>
                                        <input id="jk" type="text" class="form-control" style="color:black" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Alamat</b></label>
                                        <textarea id="alamat" rows="1" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="col-md-12">
                                    <legend class="text-semibold"><i class="fa fa-hospital-o position-left" style="font-size:16px"></i>ASAL PASIEN</legend>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><b>No. Daftar</b></label>
                                                <input id="nodaftar" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                            <div class="col-lg-6">
                                                <label><b>Tgl. Daftar</b></label>
                                                <input id="tgldaftar" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><b>No. Registrasi</b></label>
                                                <input id="noreg" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                            <div class="col-lg-6">
                                                <label><b>Tgl. Registrasi</b></label>
                                                <input id="tglreg" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Ruang/Poli</b></label>
                                        <input id="ruangpoli" type="text" class="form-control" style="color:black" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Kelas</b></label>
                                        <input id="kelas" type="text" class="form-control" style="color:black" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Cara Bayar</b></label>
                                        <input id="carabayar" type="text" class="form-control" style="color:black" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label><b>Penjamin</b></label>
                                        <input id="penjamin" type="text" class="form-control" style="color:black" disabled="disabled">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <br/><br/><br/>
                    <div class="row">
                        <div class="col-md-6">
                            <fieldset>
                                <div class="col-md-12">
                                    <legend class="text-semibold"><i class="fa fa-stethoscope position-left" style="font-size:16px"></i>DIAGNOSA PASIEN</legend>
                                    <div class="form-group">
                                        <label><b>Sars Covid</b></label>
                                        <select data-placeholder='' class='select' id='selectsars'>
                                            <option value="-">-- Pilih Sars Covid--</option>
                                            <option value="Reaktif">Reaktif</option>
                                            <option value="Non Reaktif">Non Reaktif</option>
                                            <option value="Swab Positive">Swab Positive</option>
                                            <option value="Swab Negative Rapid Reaktif">Swab Negative Rapid Reaktif</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Diagnosa Pra Operasi</b></label>
                                        <select id="diagnosapre" multiple="multiple" class="select-multiple-tags text-uppercase" disabled="disabled"></select>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Dokter Diagnosa</b></label>
                                        <select id="selectdokterdiagnosapra" class="select-search" disabled='disabled'>
                                            <?php foreach($dokter->result() as $data_dokter){
                                                    $namadokter=$data_dokter->namapetugasMedis;
                                                    if($namadokter=='-'){
                                                        $namadokter='-- Pilih Dokter Diagnosa --';
                                                    }
                                            ?>
                                                <option value="<?php echo $data_dokter->namapetugasMedis;?>"><?php echo $namadokter;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <br/>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label><b>Diagnosa ICD</b></label>
                                            </div>
                                            <div class="col-md-6">
                                                <a data-toggle='modal' data-target='#modal_diagnosa'><button type="button" id="btn_tambah_diagnosa" onclick="resetModalDiagnosa()" class="btn btn-primary btn-labeled" disabled="disabled" style="float: right;"><b><i class="icon-plus2"></i></b>TAMBAH DIAGNOSA ICD</button></a>
                                            </div>
                                        </div>
                                        <br/>
                                        <div class="table-responsive pre-scrollable tableFixHead">
                                            <table class="table table-xs table-framed" id="tbl_diagnosa">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align:center">TGL. DIAGNOSA</th>
                                                        <th style="text-align:center">KODE</th>
                                                        <th style="text-align:center">DIAGNOSA</th>
                                                        <th style="text-align:center">DESKRIPSI</th>
                                                        <th style="text-align:center">JENIS DIAGNOSA</th>
                                                        <th style="text-align:center">DOKTER</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                       
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="col-md-12">
                                    <legend class="text-semibold"><i class="fa fa-medkit position-left" style="font-size:16px"></i>PEMESANAN OPERASI</legend>
                                    <div class="form-group">
                                        <label><b>Jenis Operasi</b></label>
                                        <select id="selectjenisop" class="select" disabled='disabled'>
                                                <option value="-">-- Pilih Jenis Operasi --</option>
                                            <?php foreach($jenisoperasi->result() as $jop){?>
                                                <option value="<?php echo $jop->kdjenisoperasi;?>"><?php echo $jop->jenisoperasi;?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><b>Tgl. Registrasi Operasi</b></label>
                                                <input id="tglregop" type="date" class="form-control" style="color:black" required="required" disabled='disabled'>
                                            </div>
                                            <div class="col-lg-6">
                                                <label><b>Jam Registrasi Operasi</b></label>
                                                <input id="jamregop" type="time" class="form-control" style="color:black" required="required" disabled='disabled'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label><b>Tgl. Pemesanan Operasi</b></label>
                                                <input id="tglpesan" type="date" class="form-control" style="color:black" required="required" disabled='disabled'>
                                            </div>
                                            <div class="col-lg-6">
                                                <label><b>Jam Pemesanan Operasi</b></label>
                                                <input id="jampesan" type="time" class="form-control" style="color:black" required="required" disabled='disabled'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label><b>Dokter Pengirim</b></label>
                                        <select id="selectdokter" class="select-search" disabled='disabled'>
                                        <?php 
                                            foreach($dokter->result() as $data_dokter){
                                                $namadokter=$data_dokter->namapetugasMedis;
                                                if($namadokter=='-'){
                                                    $namadokter='-- Pilih Dokter Pengirim --';
                                                }
                                        ?>
                                            <option value="<?php echo $data_dokter->namapetugasMedis;?>"><?php echo $namadokter;?></option>
                                        <?php 
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label><b>Dokter Operator</b></label>
                                        <select id="selectdokterop" class="select-search" disabled='disabled'>
                                        <?php 
                                            foreach($dokter->result() as $data_dokter){
                                                $namadokter=$data_dokter->namapetugasMedis;
                                                if($namadokter=='-'){
                                                    $namadokter='-- Pilih Dokter Operator --';
                                                }
                                        ?>
                                            <option value="<?php echo $data_dokter->namapetugasMedis;?>"><?php echo $namadokter;?></option>
                                        <?php 
                                            }
                                        ?>
                                        </select>
                                    </div> -->
                                    <div class="form-group">
                                        <label><b>Keterangan</b></label>
                                        <textarea id="keterangan" rows="1" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <br/>
                </div>
                <div class="modal-footer">
                    <hr>
                    <button type="button" class="btn btn-success btn-labeled" id="btn_simpan" onclick="insertRegistrasi()" disabled><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                    <button type="button" class="btn btn-danger btn-labeled" id="btn_batal" onclick="batalRegistrasi()" disabled><b><i class="glyphicon glyphicon-floppy-remove"></i></b>BATAL</button>
                </div>
            </form>
        </div>
        <div id="modal_diagnosa" class="modal fade">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">DIAGNOSA PASIEN</h5>
                    </div>
                    <form role="form" class="form-horizontal" id="form_diagnosa">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"><b>Dokter</b></label>
                                        <div class="col-lg-9">
                                            <select data-placeholder='' class='select-search' id='selectdokterdiagnosa'>
                                                <option value="0000;-">-- Pilih Dokter Diagnosa ICD --</option>
                                            <?php 
                                                foreach ($dokter->result() as $data_dokter) { 
                                                    if($data_dokter->namapetugasMedis!='-'){
                                            ?>
                                                    <option value="<?php echo $data_dokter->kdPetugasMedis . ";" . $data_dokter->namapetugasMedis; ?>"><?php echo $data_dokter->namapetugasMedis; ?></option>
                                            <?php 
                                                    }
                                                }
                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"><b>Jenis Diagnosa/Kasus</b></label>
                                        <div class="col-lg-3">
                                            <select data-placeholder='' class='select' id='selectjenisdiagnosaoperasi'>
                                                <option value="PRA OPERASI">PRA OPERASI</option>
                                                <option value="PASCA OPERASI">PASCA OPERASI</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <select data-placeholder='' class='select' id='selectjenisdiagnosa'>
                                                <?php foreach($jenisdiagnosa->result() as $data_jenisdiagnosa){?>
                                                    <option value="<?php echo $data_jenisdiagnosa->kdJenisDiagnosa.";".$data_jenisdiagnosa->jenisDiagnosa;?>"><?php echo $data_jenisdiagnosa->jenisDiagnosa;?></option>
                                                 <?php }?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3">
                                            <select data-placeholder='' class='select' id='selectjeniskasus'>
                                                <?php foreach($jeniskasus->result() as $data_jeniskasus){?>
                                                    <option value="<?php echo $data_jeniskasus->kdKasusDiagnosa;?>"><?php echo $data_jeniskasus->kasus;?></option>
                                                 <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"><b>ICD</b></label>
                                        <div class="col-lg-9">
                                            <label class="radio-inline">
                                                <input type="radio" name="radio-diagnosa" class="styled" value="ICD 10" onchange="eventRadio('icd',this)">
                                                <span id="icd10" class='label label-default' style='font-size:12px; padding-top:5px; width:100px; height:30px'><b>ICD 10</b></span>
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="radio-diagnosa" class="styled" value="ICD 9" onchange="eventRadio('icd',this)">
                                                <span id="icd9" class='label label-default' style='font-size:12px; padding-top:5px; width:100px; height:30px'><b>ICD 9</b></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="hidden" id="hidden_norm">
                                    <input type="hidden" id="hidden_nodaftar">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <table id="data_diagnosa" class="table datatable-responsive table-framed">
                                        <thead style="background: #eee; height: 60px;">
                                            <tr>
                                                <th style="text-align:center">KODE</th>
                                                <th style="text-align:center">DIAGNOSA</th>
                                                <th style="text-align:center">DESKRIPSI</th>
                                                <th style="text-align:center">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <br/><br/><br style="line-height:36px;" />
                                    <div class="table-responsive pre-scrollable tableFixHead" style="height: 410px;">
                                        <table class="table table-xs table-framed" id="tbl_pilih_diagnosa">
                                            <thead style="height: 60px;">
                                                <tr>
                                                    <th style="text-align:center">KODE</th>
                                                    <th style="text-align:center">DIAGNOSA</th>
                                                    <th style="text-align:center">DESKRIPSI</th>
                                                    <th style="text-align:center">JENIS DIAGNOSA</th>
                                                    <th style="text-align:center">DOKTER</th>
                                                    <th style="text-align:center">AKSI</th>
                                                    <th style="display:none">HIDDEN</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <hr>
                            <button type="button" class="btn btn-success btn-labeled" id="btn_simpan_diagnosa" onclick="insertICD()"><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<style type="text/css">
    .tableFixHead {
        overflow-y: auto;
        height: 300px; 
    }
    .tableFixHead thead tr:nth-child(1) th {
        background: #eee;
        position: sticky;
        top: 0;
        z-index: 10;
    }
</style>

<script type="text/javascript">
    function eventRadio(jenis,el){
        if(jenis=="instalasi"){
            _("btn_cari").disabled=false;
            _('norm').disabled=false;
            _('norm').value='';
            _('norm').focus();
            _('btn_batal').disabled=false;
            if($(el).val()=='DP09'){
                _("igd").className="label label-info";
                _("ranap").className="label label-default";
                _("rajal").className="label label-default";
            }else if($(el).val()=='DP03'){
                _("igd").className="label label-default";
                _("ranap").className="label label-info";
                _("rajal").className="label label-default";
            }else if($(el).val()=='DP01'){
                _("igd").className="label label-default";
                _("ranap").className="label label-default";
                _("rajal").className="label label-info";
            }
            clearForm();
        }else if(jenis=="icd"){
            if($(el).val()=='ICD 10'){
                _("icd10").className="label label-info";
                _("icd9").className="label label-default";
            }else if($(el).val()=='ICD 9'){
                _("icd10").className="label label-default";
                _("icd9").className="label label-info";
            }
            tampilDataDiagnosa($(el).val());
        }
    }

    function clearForm(){
        _('get_norm').value="";
        _('nama').value="";
        _("nodaftar").value="";
        _("tgldaftar").value="";
        _('tmptgllahir').value="";
        _('umur').value="";
        _('jk').value="";
        _('alamat').value="";
        _('noreg').value="";
        _('tglreg').value="";
        _('ruangpoli').value="";
        _('kelas').value="";
        _('penjamin').value="";
        _('carabayar').value="";
        _('tglregop').value="";
        _('jamregop').value="";
        _('tglpesan').value="";
        _('jampesan').value="";
        $('#diagnosapre').val("").trigger('change');
        _('tglregop').disabled=true;
        _('jamregop').disabled=true;
        _('tglpesan').disabled=true;
        _('jampesan').disabled=true;
        $('#selectjenisop').val("-").trigger('change');
        _('selectjenisop').disabled=true;
        $('#selectsars').val("-").trigger('change');
        _('selectsars').disabled=true;
        $('#selectdokter').val("-").trigger('change');
        _('selectdokter').disabled=true;
        // $('#selectdokterop').val("-").trigger('change');
        // _('selectdokterop').disabled=true;
        $('#selectdokterdiagnosapra').val("-").trigger('change');
        _('selectdokterdiagnosapra').disabled=true;
        _('diagnosapre').disabled=true;
        _('keterangan').value="";
        _('btn_tambah_diagnosa').disabled = true;
        _('keterangan').disabled=true;
        let bodyRef = _('tbl_diagnosa').getElementsByTagName('tbody')[0];
        bodyRef.innerHTML = '';
    }

    function resetForm(){
        _("form_registrasi").reset();
        _("btn_cari").disabled=true;
        _("norm").disabled=true;
        _("igd").className="label label-default";
        _("ranap").className="label label-default";
        _("rajal").className="label label-default";
        _('tglregop').disabled=true;
        _('jamregop').disabled=true;
        _('tglpesan').disabled=true;
        _('jampesan').disabled=true;
        $('#selectjenisop').val("-").trigger('change');
        _('selectjenisop').disabled=true;
        $('#selectsars').val("-").trigger('change');
        _('selectsars').disabled=true;
        $('#selectdokter').val("-").trigger('change');
        _('selectdokter').disabled=true;
        // $('#selectdokterop').val("-").trigger('change');
        // _('selectdokterop').disabled=true;
        $('#selectdokterdiagnosapra').val("-").trigger('change');
        _('selectdokterdiagnosapra').disabled=true;
        _('btn_tambah_diagnosa').disabled = true;
        let bodyRef = _('tbl_diagnosa').getElementsByTagName('tbody')[0];
        bodyRef.innerHTML = '';
        $('#diagnosapre').val("").trigger('change');
        _('diagnosapre').disabled=true;
        _('keterangan').disabled=true;
        _('btn_simpan').disabled=true;
        _('btn_batal').disabled=true;
    }

    function resetModalDiagnosa(){
        $("#selectdokterdiagnosa").val("0000;-").trigger('change');
        $("#selectjenisdiagnosaoperasi").val("PRA OPERASI").trigger('change');
        $("#selectjenisdiagnosa").val("jd01;UTAMA").trigger('change');
        $("#selectjeniskasus").val("k01").trigger('change');
        _nm('radio-diagnosa')[0].checked=false;
        _nm('radio-diagnosa')[1].checked=false;
        _("icd10").className="label label-default";
        _("icd9").className="label label-default";
        _("tbl_pilih_diagnosa").getElementsByTagName('tbody')[0].innerHTML="";
        $("#data_diagnosa").DataTable().clear().destroy();
        $("#data_diagnosa").dataTable({
            "bInfo":false,
            "lengthMenu": [[5, 10, 25], [5, 10, 25]],
            "columnDefs": [
                {"targets": [0],"orderable": false},
                {"targets": [1],"orderable": false},
                {"targets": [2],"orderable": false},
                {"targets": [3],"orderable": false}
            ],
            "deferRender": true
        });
    }

    window.onload = function(){
        resetForm();
    }

    function caripasien(id,event){
        let kode = event.which || event.keyCode;
        if(kode === 8||kode===46){
            clearForm();
        }else{
            return $('#norm').val($('#norm').val().replace(/[^0-9]+/g,''));
        }
    }

    function getPasien(){
        if(_("norm").value==""){
            swal({
                title: "Gagal",
                text: "No. RM Tidak Noleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_("norm").focus()
            });
        }else{
            let instalasi=radioGetValue('radio-instalasi');
            let get_norm=_("norm").value;
            let norm0='00000000';
            let getNorm0=norm0.substring(0,(norm0.length-get_norm.length));
            _("norm").value=getNorm0+get_norm;
            let norm=getNorm0+get_norm;
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('registrasipasien/getPasien');?>",
                data:{instalasi:instalasi,norm:norm},
                dataType: "JSON",
                success: function (data) {
                    if(data['cek']==null||data['cek'].statusop=='5'||data['cek'].statusop=='6'){
                        if(data['pasien']!=null){
                            _('tglregop').disabled=false;
                            _('jamregop').disabled=false;
                            _('tglpesan').disabled=false;
                            _('jampesan').disabled=false;
                            _('diagnosapre').disabled=false;
                            _("selectsars").disabled = false;
                            _("selectdokter").disabled = false;
                            // _("selectdokterop").disabled = false;
                            _("selectdokterdiagnosapra").disabled = false;
                            _("selectjenisop").disabled = false;
                            _('btn_tambah_diagnosa').disabled = false;
                            _('keterangan').disabled = false;
                            _('btn_simpan').disabled = false;
                            _('norm').value=data['pasien'].norm;
                            _('get_norm').value=data['pasien'].norm;
                            _('nama').value=data['pasien'].pasien;
                            _('tmptgllahir').value=hpskotakab(data['pasien'].tempatlahir)+" / "+formatTanggalLahir(data['pasien'].tgllahir);
                            _('umur').value=hitungUmur(data['pasien'].tgllahir);
                            _('jk').value=jklengkap(data['pasien'].jk);
                            _('alamat').value=data['pasien'].alamat.toUpperCase();
                            _('nodaftar').value=data['pasien'].nodaftar;
                            _('tgldaftar').value=data['pasien'].tgldaftar;
                            _('noreg').value=data['pasien'].noregistrasi;
                            _('tglreg').value=data['pasien'].tglregistrasi;
                            _('ruangpoli').value=data['pasien'].unit.toUpperCase();
                            _('kelas').value=data['pasien'].kelas;
                            _('carabayar').value=data['pasien'].carabayar.toUpperCase();
                            _('penjamin').value=data['pasien'].penjamin.toUpperCase();
                            _('tglregop').value=ubahFormatTanggal(data['pasien'].tglsekarang,1);
                            _('jamregop').value=ubahFormatTanggal(data['pasien'].tglsekarang,0);
                            _('tglpesan').value=ubahFormatTanggal(data['pasien'].tglsekarang,1);
                            _('jampesan').value=ubahFormatTanggal(data['pasien'].tglsekarang,0);
                            getDiagnosaPasien(norm);
                        }else{
                            if(instalasi=="DP09"){
                                instalasi="GAWAT DARURAT"
                            }else if(instalasi=="DP03"){
                                instalasi="RAWAT INAP";
                            }else if(instalasi=="DP01"){
                                instalasi="RAWAT JALAN";
                            }
                            swal({
                                title: "Gagal",
                                text: "No. RM "+_('norm').value+" Tidak Terdaftar\ndi INSTALASI "+instalasi+" !!!\nSilahkan Hubungi Pendaftaran.",
                                confirmButtonColor: "#EF5350",
                                type: "error",
                                onClose: _('norm').focus()
                            });
                        }
                    }else{
                        swal({
                            title: "Gagal",
                            text: "No. RM "+_('norm').value+" Sudah Registrasi Operasi\nPada Tanggal "+data['cek'].tglregistrasiop,
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                        clearForm();
                    }
                },
            });
        }
    }

    function getDiagnosaPasien(norm){
        _('tbl_diagnosa').getElementsByTagName('tbody')[0].innerHTML = '';
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('registrasipasien/getDiagnosaPasien');?>",
            data:{norm:norm},
            dataType: "JSON",
            success: function (data) {
                if(data!=null){
                    let table = _("tbl_diagnosa");
                    let row_count = table.tBodies[0].rows.length;
                    
                    let data_clean = [...new Set(data.map(obj => JSON.stringify(obj)))].map(str => JSON.parse(str));

                    for(let i=0; i<data_clean.length; i++){
                        let row_insert = table.tBodies[0].insertRow(row_count);
                        let TGL_DIAGNOSA = row_insert.insertCell(0);
                        let KODE = row_insert.insertCell(1);
                        KODE.style.textAlign="center";
                        let DIAGNOSA = row_insert.insertCell(2);
                        let DESKRIPSI = row_insert.insertCell(3);
                        let JENIS_DIAGNOSA = row_insert.insertCell(4);
                        let DOKTER = row_insert.insertCell(5);

                        TGL_DIAGNOSA.innerHTML = data_clean[i].tgldiagnosa==null|data_clean[i].tgldiagnosa=='0000-00-00 00:00:00'?formatTanggalData(data_clean[i].tgldaftar):formatTanggalData(data_clean[i].tgldiagnosa);
                        KODE.innerHTML = data_clean[i].kdicd10;
                        DIAGNOSA.innerHTML = data_clean[i].icd10;
                        DESKRIPSI.innerHTML = data_clean[i].deskripsi;
                        JENIS_DIAGNOSA.innerHTML = data_clean[i].jenisdiagnosa;
                        DOKTER.innerHTML = data_clean[i].dokter;
                    }
                }
            }
        });
    }

    function tampilDataDiagnosa(icd){
        $('#data_diagnosa').dataTable({
            "bDestroy": true,
            "processing": true,
            "bInfo": false,
            "serverSide": true,
            "ordering": true,
            "order": [[1, 'ASC']], 
            "ajax": {
                "url": "<?php echo base_url('registrasipasien/dataTableDiagnosa')?>",
                "type": "POST",
                "data":{icd:icd}
            },
            "deferRender": true,
            "lengthMenu": [[5,10,25],[5,10,25]],
            "columnDefs": [
                {
                    "targets": [0],
                    "orderable": false,
                    "className":"text-center",
                    "data": "kdicd"
                },
                {
                    "targets": [1],
                    "orderable": false,
                    "data": "icd"
                },
                {
                    "targets": [2],
                    "orderable": false,
                    "data": "keterangan"
                },
                {
                    "targets": [3],
                    "orderable": false,
                    "className":"text-center",
                    "render": function(data, type, row) {
                        let kdicd = row.kdicd;
                        let icd = row.icd.replace(/'/g, "\\'");
                        let deskripsi = row.keterangan.replace(/'/g, "\\'");
                        let param = kdicd + ";" + icd + ";" + deskripsi;

                        let html ="<a type='button' data-popup='tooltip' title='Pilih Diagnosa ICD' class='btn btn-primary btn-icon' onclick=\"getPilihDiagnosa('" +param + "');\"><i class='icon-checkmark4'></i></a>";
                        return html;
                    }
                }
            ]
        });

        _('hidden_norm').value=_('get_norm').value;
        _('hidden_nodaftar').value=_('noreg').value;
    }

    function getPilihDiagnosa(data){
        let dokter=_('selectdokterdiagnosa').value.split(";")[1];
        if(dokter!="-"){
            let table = _("tbl_pilih_diagnosa");
            let row_count = table.tBodies[0].rows.length;
            let data_array = data.split(';');
            let jenisdiagnosa=radioGetValue('radio-diagnosa')+' - '+_('selectjenisdiagnosa').value.split(';')[1];
            
            let hidden_data=radioGetValue('radio-diagnosa')+";"+_('hidden_nodaftar').value+";"+_('hidden_norm').value+";"+data_array[0]+";"+data_array[1]+";"+_('selectdokterdiagnosa').value.split(";")[0]+";"+_('selectjenisdiagnosaoperasi').value+";"+_('selectjenisdiagnosa').value.split(';')[0].toUpperCase()+";"+_('selectjeniskasus').value.split(';')[0].toUpperCase();
            // console.log(data);
            if(getTableValue(table,hidden_data,6)===""){
                let row_insert = table.tBodies[0].insertRow(row_count);
                let KODE = row_insert.insertCell(0);
                let DIAGNOSA = row_insert.insertCell(1);
                let DESKRIPSI = row_insert.insertCell(2);
                let JENISDIAGNOSA = row_insert.insertCell(3);
                JENISDIAGNOSA.style.textAlign="center";
                let DOKTER = row_insert.insertCell(4);
                let AKSI = row_insert.insertCell(5);
                let HIDDEN = row_insert.insertCell(6);
                HIDDEN.style.display="none";

                KODE.innerHTML = data_array[0];
                DIAGNOSA.innerHTML = data_array[1];
                DESKRIPSI.innerHTML = data_array[2];
                JENISDIAGNOSA.innerHTML = jenisdiagnosa;
                DOKTER.innerHTML = dokter;
                HIDDEN.innerHTML = hidden_data;
                AKSI.innerHTML = "<a data-popup='tooltip' title='Hapus Diagnosa ICD' onclick=\"hapusDiagnosaTemp(this);\" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></a>";
            }else{
                swal({
                    title: "Gagal",
                    text: "Diagnosa "+radioGetValue('radio-diagnosa')+" Sudah Dipilih!",
                    confirmButtonColor: "#EF5350",
                    type: "error"
                });
            }
        }else{
            swal({
                title: "Gagal",
                text: "Silahkan Pilih Dokter!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('selectjenisdiagnosa').focus()
            });
        }
    }

    function hapusDiagnosaTemp(element){
        const table = _("tbl_pilih_diagnosa");
        let row=$(element).closest('td').parent()[0].sectionRowIndex;
        table.deleteRow(row+1);
    }

    function getDataTableValueDiagnosa(table){
        let row_count = table.tBodies[0].rows.length;
        let data=[];
        let tgl=getDate("yyyy-mm-dd HH:MM:SS");
        for (let brs = 0; brs < row_count; brs++) {
            let data_temp=table.tBodies[0].rows[brs].cells[6].innerText.split(";");
            data.push({
                "icd":data_temp[0],
                "nodaftar":data_temp[1],
                "norm":data_temp[2],
                "kdicd":data_temp[3],
                "diagnosa":data_temp[4],
                "jenisdiagnosa":data_temp[7].toLowerCase(),
                "jeniskasus":data_temp[8].toLowerCase(),
                "jenisdiagnosaoperasi":data_temp[6],
                "dokter":data_temp[5],
                "tgldiagnosa":tgl
            });
        }
        return data;
    }

    function insertICD(){
        let data=getDataTableValueDiagnosa(_("tbl_pilih_diagnosa"));
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('registrasipasien/insertICD')?>",
            data:{data:data},
            dataType:"JSON",
            success: function(data){
                console.log(data);
                getDiagnosaPasien(_('hidden_norm').value);
                swal({
                    title: "Berhasil",
                    text: "Diagnosa Disimpan",
                    confirmButtonColor: "#66BB6A",
                    type: "success",
                    onClose: $('#modal_diagnosa').modal('hide')
                });
            }, error: function(data){
                console.log(data);
                swal({
                    title: "Gagal",
                    text: "Diagnosa Tidak Disimpan!",
                    confirmButtonColor: "#EF5350",
                    type: "error"
                });
            }
        });
    }

    function getTableValue(table,input,cell){
        let row_count = table.tBodies[0].rows.length;
        let row="";
        for (let brs = 0; brs < row_count; brs++) {
            let data = typeof table.tBodies[0].rows[brs].cells[cell].children[0] !== 'undefined' ? table.tBodies[0].rows[brs].cells[cell].children[0].value:table.tBodies[0].rows[brs].cells[cell].innerText;
            if(data===input){
                row+=brs;
            }
        }
        return row;
    }

    function setNoRegistrasiOperasi() {
        let today = getDate("yymmdd");
        let fulltoday=getDate("yymmddHHMMSS");
        let setNoRegistrasiOP=null;
        let instalasi=radioGetValue('radio-instalasi');
        $.ajax({
            type: "post",
            async: false,
            url: "<?php echo base_url('registrasipasien/getLastNoRegistrasiOperasi');?>",
            dataType: "JSON",
            success: function (data) {
                if (data === null) {
                    setNoRegistrasiOP = "OKP" +fulltoday+ "-1";
                } else {
                    if (data.getdatesql===today) {
                        let arrId = data.noregop.split('-');
                        let angka = arrId[1];
                        setNoRegistrasiOP = "OKP" +fulltoday+'-'+(parseInt(angka) + 1);
                    } else {
                        setNoRegistrasiOP = "OKP" +fulltoday+ "-1";
                    }
                }
            }
        });
        return setNoRegistrasiOP;
    }

    function insertRegistrasi(){        
        if(_("selectjenisop").value=="-"){
            swal({
                title: "Gagal Disimpan",
                text: "Jenis Operasi\nTidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('selectjenisop').focus()
            });
        }else if(_('tglregop').value==""){
            swal({
                title: "Gagal Disimpan",
                text: "Tgl. Registrasi Operasi\nTidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('tglregop').focus()
            });    
        }else if(_('jamregop').value==""){
            swal({
                title: "Gagal Disimpan",
                text: "Jam Registrasi Operasi\nTidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('jamregop').focus()
            });    
        }else if(_('tglpesan').value==""){
            swal({
                title: "Gagal Disimpan",
                text: "Tgl. Pemesanan Operasi\nTidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('tglpesan').focus()
            });    
        }else if(_('jampesan').value==""){
            swal({
                title: "Gagal Disimpan",
                text: "Jam Pemesanan Operasi\nTidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('jampesan').focus()
            });    
        }else if(_("selectdokter").value=="-"){
            swal({
                title: "Gagal Disimpan",
                text: "Dokter Pengirim\nTidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('selectdokter').focus()
            });    
        }
        // else if(_("selectdokterop").value=="-"){
        //     swal({
        //         title: "Gagal Disimpan",
        //         text: "Dokter Operator\nTidak Boleh Kosong",
        //         confirmButtonColor: "#EF5350",
        //         type: "error",
        //         onClose:_('selectdokterop').focus()
        //     });    
        // }
        else if(_("selectsars").value=="-"){
            swal({
                title: "Gagal Disimpan",
                text: "SARS COVID\nTidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('selectsars').focus()
            });    
        }else if(_("diagnosapre").value==""){
            swal({
                title: "Gagal Disimpan",
                text: "Diagnosa Pra Operasi\nTidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('diagnosapre').focus()
            });
        }else if(_("selectdokterdiagnosapra").value=="-"){
            swal({
                title: "Gagal Disimpan",
                text: "Dokter Diagnosa\nTidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose:_('selectdokterdiagnosapra').focus()
            });    
        }else{
            swal({
                title: "Simpan Registrasi",
                text: "Apakah Yakin Simpan Registrasi Pasien?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#EF5350",
                confirmButtonText: "YA",
                cancelButtonText: "TIDAK",
                closeOnConfirm: false,
                closeOnCancel: true
            },
            function(isConfirm){
                if (isConfirm) {
                    let noregop=setNoRegistrasiOperasi();
                    let tglregop=formatTanggal('tglregop','jamregop');
                    let norm=_('norm').value;
                    let noreg=_('noreg').value;
                    let nodaftar=_('nodaftar').value;
                    let instalasi=radioGetValue('radio-instalasi');
                    if(instalasi=="DP09"){
                        instalasi="IGD";
                    }else if(instalasi=="DP03"){
                        instalasi="RAWAT INAP";
                    }else if(instalasi=="DP01"){
                        instalasi="RAWAT JALAN";
                    }
                    let dokterpengirim=_("selectdokter").value;
                    let dokterdiagnosapra=_("selectdokterdiagnosapra").value;
                    let jenisop=_("selectjenisop").value;
                    let tglpesan=formatTanggal('tglpesan','jampesan');
                    let sarscovid=_("selectsars").value;
                    let diagnosapre=$("#diagnosapre").val();
                    let keterangan=_('keterangan').value;
                    let today=getDate("yyyy-mm-dd HH:MM:SS");
                    let notinop="T"+noregop;
                    let noanestesi="A"+noregop;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('registrasipasien/insertRegistrasi');?>",
                        data:{noregop:noregop,tglregop:tglregop,norm:norm,noreg:noreg,nodaftar:nodaftar,instalasi:instalasi,dokterpengirim:dokterpengirim,jenisop:jenisop,tglpesan:tglpesan,keterangan:keterangan,sarscovid:sarscovid,diagnosapre:diagnosapre,today:today,notinop:notinop,noanestesi:noanestesi,dokterdiagnosapra:dokterdiagnosapra},
                        dataType: "JSON",
                        success: function (data) {
                            swal({
                                title: "Berhasil",
                                text: "Data Disimpan",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                            });
                            resetForm();
                            setCount();
                        },
                        error: function() {
                            swal({
                                title: "Gagal",
                                text: "Data Tidak Disimpan!",
                                confirmButtonColor: "#EF5350",
                                type: "error"
                            });
                        }
                    });
                }
            });
        }
    }

    function batalRegistrasi(){
        swal({
            title: "Batal Registrasi",
            text: "Apakah Yakin Batal Registrasi Pasien?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#EF5350",
            confirmButtonText: "YA",
            cancelButtonText: "TIDAK",
            closeOnConfirm: false,
            closeOnCancel: true
        },
        function(isConfirm){
            if (isConfirm) {
                resetForm();
                swal({
                    title: "Registrasi Pasien",
                    text: "Dibatalkan",
                    confirmButtonColor: "#66BB6A",
                    type: "success"
                });
            }
        });
    }

</script>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Float buttons with text -->
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo base_url('dashboard')?>">
                        <i class="icon-home2 position-left"></i>
                        Beranda</a>
                </li>
                <li class="active">Operasi Selesai</li>
            </ul>
        </div>
    </div>
    <!-- /float buttons with text -->

    <!-- Content area -->
    <div class="content">

        <!-- Basic responsive configuration -->
        <form role="form" action="operasiselesai/index_eksporexcel" target="_blank" method="POST" class="form-horizontal" onsubmit="return eksporExcel()">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h6 class="panel-title">DATA OPERASI SELESAI</h6>
                </div>
                    <div class="modal-header">
                        <fieldset>
                            <legend class="text-semibold"><i class="glyphicon glyphicon-time position-left" style="font-size:16px"></i>FILTER TANGGAL OPERASI</legend>
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-2">
                                        <label><b>Tanggal Operasi Awal</b></label>
                                        <input id="tglawal" name="tglawal" type="date" class="form-control" style="color:black;width: 96%;">
                                    </div>
                                    <div class="col-md-2">
                                        <label><b>Tanggal Operasi Akhir</b></label>
                                        <input id="tglakhir" name="tglakhir" type="date" class="form-control" style="color:black;width: 96%;">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="control-label"><b>Jenis Operasi</b></label>
                                        <select data-placeholder='' class='select' id='selectjenisoperasi' name="jenisop">
                                            <option value="!='ehem'">SEMUA</option>
                                            <?php foreach($jenisoperasi AS $data){?>
                                            <option value="='<?php echo $data->kode; ?>'"><?php echo $data->jenisoperasi; ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label"><b>Dokter Operator</b></label>
                                        <select data-placeholder='' class='select-search' id='selectoperator' name="operator">
                                            <option value="!='ehem'">SEMUA</option>
                                            <?php 
                                                foreach($operator AS $data){
                                                    if($data->dokter!="-"){
                                            ?>
                                            <option value="LIKE '%<?php echo $data->dokter; ?>%'"><?php echo $data->dokter; ?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <br style="line-height: 30px;">
                                        <button type="button" style="float: right;" class="btn btn-labeled btn-info" onclick="tampilDataTabel()"><b><i id="i_btn_tampil" class="icon-file-text2"></i></b>TAMPILKAN</button>
                                    </div>
                                </div>
                            </fieldset>
                        </fieldset>
                        <hr>
                    </div>
                    <div class="modal-body">
                        <table id="tampil_data" class="table datatable-responsive table-framed">
                            <thead>
                                <tr style="background:#eee;">
                                    <th style="text-align: center;">NO.</th>
                                    <th style="text-align: center;">NO. REGISTRASI OPERASI</th>
                                    <th style="text-align: center;">NO. RM</th>
                                    <th style="text-align: center;">NAMA PASIEN</th>
                                    <th style="text-align: center;">JENIS KELAMIN</th>
                                    <th style="text-align: center;">ASAL PASIEN</th>
                                    <th style="text-align: center;">TGL. MRS</th>
                                    <th style="text-align: center;">TGL. OPERASI</th>
                                    <th style="text-align: center;">JENIS OPERASI</th>
                                    <th style="text-align: center;">OPERATOR</th>
                                    <th style="text-align: center;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                <div class="panel-footer">
                    <div class="heading-elements">
                        <div class="heading-text">
                            <button type="submit" class="btn btn-labeled btn-info"><b><i id="i_btn_ekspor" class="icon-file-excel"></i></b>EKSPOR EXCEL</button>
                        </div>
                    </div>
                    <br/>
                </div>
            </div>
        </form>


        <div id="modal_full" class="modal fade">
            <div class="modal-dialog modal-full">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title">DETAIL PASIEN OPERASI</h5>
                    </div>
                    <form role="form" class="form-horizontal" id="form_detail">
                        <div class="modal-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li><a href="#tab-identitas-pasien" data-toggle="tab"><i class="fa fa-wheelchair position-left"></i>IDENTITAS PASIEN</a></li>
                                    <li><a href="#tab-asal-pasien" data-toggle="tab"><i class="fa fa-hospital-o position-left"></i>ASAL PASIEN</a></li>
                                    <li class="active"><a href="#tab-pemesanan-operasi" data-toggle="tab"><i class="fa fa-medkit position-left"></i></i>PEMESANAN OPERASI</a></li>
                                    <li><a href="#tab-diagnosa-pasien" data-toggle="tab"><i class="fa fa-stethoscope position-left"></i></i>DIAGNOSA PASIEN</a></li>
                                    <li><a href="#tab-tindakan-operasi" data-toggle="tab"><i class="fa fa-heartbeat position-left" style="font-size:16px"></i> TINDAKAN OPERASI</a></li>
                                    <li><a href="#tab-hasil-operasi" data-toggle="tab"><img style="float: left; width: 20px; height: auto; margin-right: 6px;" src="<?php echo base_url();?>/template/assets/css/icons/results.svg"></i>HASIL OPERASI</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane" id="tab-identitas-pasien">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>No. RM</b></label>
                                                    <input id="norm" type="text" class="form-control" style="color:black" disabled="disabled">
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
                                            </fieldset>
                                        </div>                                 
                                    </div>
                                    <div class="tab-pane" id="tab-asal-pasien">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>No. Daftar</b></label>
                                                    <input id="nodaftar" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tgl. Daftar</b></label>
                                                    <input id="tgldaftar" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>No. Registrasi</b></label>
                                                    <input id="noreg" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tgl. Registrasi</b></label>
                                                    <input id="tglreg" type="text" class="form-control" style="color:black" disabled="disabled">
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
                                            </fieldset>
                                        </div>                                
                                    </div>
                                    <div class="tab-pane active" id="tab-pemesanan-operasi">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>Jenis Operasi</b></label>
                                                    <span class='label label-danger' style='font-size:13px; padding-top:8px; width:100%; height:35px' id="jenisop"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Keterangan</b></label>
                                                    <input id="keterangan" type="text" class="form-control" disabled="disabled" style="color:black">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>No. Registrasi Operasi</b></label>
                                                    <input id="noregop" name="noregistrasiop" type="text" class="form-control" style="color:black" readonly="readonly">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Tgl. Registrasi Operasi</b></label>
                                                    <input id="tglregop" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Dokter Pengirim</b></label>
                                                    <input id="dokterpengirim" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Waktu Pemesanan Operasi</b></label>
                                                    <input id="wktpemesanan" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Waktu Pelaksanaan Operasi</b></label>
                                                    <input id="wktpelaksanaanop" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-diagnosa-pasien">
                                        <div class="modal-body">
                                            <fieldset>
                                                <legend class="text-semibold"><i class="fa fa-stethoscope position-left" style="font-size:16px"></i>DIAGNOSA PRA & POST OPERASI</legend>
                                                <div class="form-group">
                                                    <label><b>Sars Covid</b></label>
                                                    <input id="sarscovid" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label><b>Diagnosa Pra Operasi</b></label>
                                                            <textarea id="diagnosapre" rows="2" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label><b>Diagnosa Post Operasi</b></label>
                                                            <textarea id="diagnosapost" rows="2" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label><b>Dokter Diagnosa Pra</b></label>
                                                            <input id="dokterdiagnosapra" type="text" class="form-control" style="color:black" disabled="disabled">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label><b>Dokter Diagnosa Post</b></label>
                                                            <input id="dokterdiagnosapost" type="text" class="form-control" style="color:black" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <legend class="text-semibold"><img style="float: left; width: 20px; height: auto; margin-right: 6px;" src="<?php echo base_url();?>/template/assets/css/icons/icd2.png">DIAGNOSA ICD</legend>
                                                <div class="form-group">
                                                    <label><b>Diagnosa ICD</b></label>
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
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-tindakan-operasi">
                                        <div class="modal-body">
                                            <fieldset>
                                                <div class="form-group">
                                                    <label><b>Waktu Tindakan Operasi</b></label>
                                                    <input id="wakttindakanop" type="text" class="form-control" style="color:black" disabled="disabled">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <label><b>Pemakaian Impan</b></label>
                                                            <input id="pakaiimplan" type="text" class="form-control  text-uppercase" style="color:black" disabled="disabled">
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <label><b>Jenis Implan</b></label>
                                                            <textarea id="jenisimplan" rows="2" cols="5" class="form-control text-uppercase" disabled="disabled" style="color:black"></textarea>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label><b>Tindakan Operasi</b></label>
                                                    <div class="table-responsive">
                                                        <table class="table table-xs table-framed" id="tbl_tindakan">
                                                            <thead>
                                                                <tr style="background:#eee;">
                                                                    <th style="text-align:center">OPERATOR</th>
                                                                    <th style="text-align:center">TINDAKAN</th>
                                                                    <th style="text-align:center;">KELAS</th>
                                                                    <th style="text-align:center;">JUMLAH</th>
                                                                    <th style="text-align:center">TARIF</th>
                                                                    <th style="text-align:center">SUBTOTAL</th>               
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="4"></th>
                                                                    <th style="text-align:center;">TOTAL</th>
                                                                    <th id='subtotal' style="text-align:right">Rp. 0,00</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="4"></th>
                                                                    <th style="text-align:center;">STATUS PEMBAYARAN</th>
                                                                    <th id='statuspembayaran' style="text-align:right">-</th>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="4"></th>
                                                                    <th style="text-align:center;">TGL. PEMBAYARAN</th>
                                                                    <th id='tglpembayaran' style="text-align:right">-</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-hasil-operasi">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="table-responsive">
                                                    <table class="table table-xs table-framed" id="tbl_hasiloperasi">
                                                        <thead>
                                                            <tr style="background:#eee;">
                                                                <th class="col-lg-4" style="text-align:center">HASIL OPERASI</th>
                                                                <th class="col-lg-2" style="text-align:center">AKSI</th>
                                                                <th style="display:none">iduser</th>
                                                                <th style="display:none">tgluser</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="modal-footer" id="div_hasil">
                                        </div>                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /basic responsive configuration -->

        <!-- <div id="modal_hasil_operasi" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h5 class="modal-title" id="title_modal_hasil"></h5>
                    </div>

                    <form action="#" class="form-horizontal">
                        <div class="modal-body">
                            <iframe id="framehasil" src="" width="100%" height="600px"></iframe>
                        </div>
                    </form>
                </div>
            </div>
        </div> -->

<style type="text/css">
    .tableFixHead {
        overflow-y: auto;
        height: 300px; 
    }
    .tableFixHead thead th {
        position: sticky; top: 0;
    }
    .tableFixHead th { 
        background:#eee;
    }
</style>

<script type="text/javascript">
    $(document).ready(function () {
        $('#tglawal').val(localStorage.getItem("tglawalokparu"));
        $('#tglakhir').val(localStorage.getItem("tglakhirokparu"));
        $("#selectjenisoperasi").val(localStorage.getItem("jenisopokparu")==null?"!='ehem'":localStorage.getItem("jenisopokparu")).trigger("change");
        $("#selectoperator").val(localStorage.getItem("operatorokparu")==null?"!='ehem'":localStorage.getItem("operatorokparu")).trigger("change");
        tampilDataTabel();
    });

    function tampilDataTabel() {
        var tglawal=$('#tglawal').val();
        var tglakhir=$('#tglakhir').val();
        let jenisop=_('selectjenisoperasi').value;
        let operator=_('selectoperator').value;
        var tabel = $('#tampil_data').dataTable({
            "bDestroy": true,
            "bLengthChange" : false,
            "bPaginate": false,
            "bInfo" : false,
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "searching": false,
            "order": [
                [0, 'ASC']
            ], 
            "ajax": {
                "url": "<?php echo base_url('operasiselesai/permintaanList') ?>",
                "type": "POST",
                "data":{
                    tglawal:tglawal,
                    tglakhir:tglakhir,
                    jenisop:jenisop,
                    operator:operator
                },
                beforeSend: function (request) {
                    $("#i_btn_tampil").removeClass('icon-file-text2');
                    _("i_btn_tampil").className = 'icon-spinner2 spinner';
                }, 
                complete:function(data){
                    _("i_btn_tampil").className = 'icon-file-text2';
                    localStorage.setItem("tglawalokparu", tglawal);
                    localStorage.setItem("tglakhirokparu", tglakhir);
                    localStorage.setItem("jenisopokparu", jenisop);
                    localStorage.setItem("operatorokparu", operator);
                },
                error:function(err){
                    _("i_btn_tampil").className = 'icon-file-text2';
                }
            },
            "deferRender": true,
            "columnDefs": [
                {
                    "targets": [0],
                    "orderable": false,
                    "render": function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    },
                    "className":"text-center",
                    "width":"2%"
                },
                {
                    "targets": [1],
                    "orderable": false,
                    "render": function (data, type, row) {
                        var html = "<a data-toggle='modal' data-target='#modal_full' onclick=\"getDetail('"+row.noregop+"');\">"+row.noregop+"</a>"
                        return html;
                    },
                    "className":"text-center",
                    "width":"10%"
                },
                {
                    "targets": [2],
                    "orderable": false,
                    "data": "norm",
                    "className":"text-center"
                },
                {
                    "targets": [3],
                    "orderable": false,
                    "data": "pasien"
                },
                {
                    "targets": [4],
                    "orderable": false,
                    "render": function (data, type, row) {
                        return jklengkap(row.jk);
                    },
                    "className":"text-center",
                    "width":"5%"
                },
                {
                    "targets": [5],
                    "orderable": false,
                    "render": function (data, type, row) {
                        let instalasi = row.instalasi;
                        let unit = row.unit;
                        let asalpasien=instalasi=="IGD"?unit:instalasi+" - "+unit;
                        return asalpasien.toUpperCase();
                    },
                    "width":"10%"
                },
                {
                    "targets": [6],
                    "orderable": false,
                    "render": function (data, type, row) {
                        return row.tglmrs;
                    },
                    "className":"text-center",
                    "width":"7%"
                },
                {
                    "targets": [7],
                    "orderable": false,
                    "render": function (data, type, row) {
                        return row.tglop;
                    },
                    "className":"text-center",
                    "width":"8%"
                },
                {
                    "targets": [8],
                    "render": function(data, type, row) {
                        var html = "<span class='label label-" + row.warnajenisop +"' style='width:100px'>" + row.jenisop + "</span>"
                        return html;
                    },
                    "orderable": false,
                    "className":"text-center",
                    "width":"7%"
                },
                {
                    "targets": [9],
                    "render": function (data, type, row) {
                        let getdokter=row.dokterop;
                        let arrdokter=Array.from(new Set(getdokter.split(";"))).join("<br/>"+"- ").substring(5);
                        return arrdokter;
                    },
                    "orderable": false
                },
                {
                    "render": function (data, type, row) {
                        var noregistrasi=row.noregop;
                        var p=","+noregistrasi;
                        let id=row.id;
                        let btn_class=id==null?"btn-primary":"btn-success";
                        let tittle=id==null?"Isi Keselamatan Pasien":"Edit Keselamatan Pasien";
                        let html="<button data-popup='tooltip' title='Cetak Kwitansi' type='button' onclick=\"cetakKwitansi('"+noregistrasi+"');\" class='btn btn-info btn-icon'><i class='icon-printer2'></i></button>&nbsp;&nbsp;<button data-popup='tooltip' title='"+tittle+"' type='button' onclick=\"inputMutu('"+noregistrasi+"');\" class='btn "+btn_class+" btn-icon'><i class='glyphicon glyphicon-pencil'></i></button>";

                        return html;
                    },
                    "targets": [10],
                    "orderable": false,
                    "width": "5%",
                    "className":"text-center"
                }
            ],
        });
    }

    function getDetailPasien(norm){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('permintaanselesaitindakan/getDetailPasien');?>",
            dataType: "JSON",
            data: {norm:norm},
            success: function (data) {
                $('#norm').val(data.norm);
                $('#nama').val(data.namapasien);
                $('#tmptgllahir').val(hpskotakab(data.tmplahir).toUpperCase()+" / "+data.tgllahir);
                $('#umur').val(hitungUmur(data.tgllahir));
                $('#jk').val(jklengkap(data.jk));
                let alamat=data.alamat+", "+data.kelurahan+", "+data.kecamatan+", "+data.kabupaten+", "+data.provinsi;
                $('#alamat').val(alamat.toUpperCase());
            },error:function(data){
                console.log(data);
            }
        });
    }

    function getDetailAsalPasien(noregistrasi){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('permintaanselesaitindakan/getDetailAsalPasien');?>",
            dataType: "JSON",
            data: {noregistrasi:noregistrasi},
            success: function (data) {
                _("nodaftar").value=data.nodaftar;
                _("tgldaftar").value=data.tgldaftar;
                $('#noreg').val(data.noregistrasi);
                $('#tglreg').val(data.tglregistrasi);
                $('#ruangpoli').val(data.unitasal.toUpperCase());
                $('#kelas').val(data.kelas==""?"-":data.kelas);
                $('#penjamin').val(data.penjamin.toUpperCase());
                $('#carabayar').val(data.carabayar.toUpperCase());
            },error:function(data){
                console.log(data);
            }
        });
    }


    function getDetail(noregop){
        clearFormDetail();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('permintaanselesaitindakan/getDetailPemesananOperasi');?>",
            dataType: "JSON",
            data: {noregop:noregop},
            success: function (data) {
                _('noregop').value=data.noregistrasiop;
                _("jenisop").innerHTML=data.jenisop;
                _("jenisop").className = "label label-"+data.warnajenisop;
                $('#dokterpengirim').val(data.dokterpengirim);
                $('#tglregop').val(data.tglregistrasiop);
                $('#wktpemesanan').val(data.tglpermintaanop);
                _('keterangan').value=data.keterangan==""?"-":data.keterangan;
                $("#wktpelaksanaanop").val(data.tgljadwalop);

                getDetailPasien(data.norm);
                getDetailAsalPasien(data.noregistrasi);
                getDiagnosaPasien(data.norm,data.noregistrasiop);
                getDiagnosaICD(data.norm);
                getTindakanOperasi(data.noregistrasiop);
                getHasilOperasi(data.noregistrasiop);
            }
        });
    }

    function getDiagnosaPasien(norm,noregop){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('permintaanselesaitindakan/getDiagnosaPasien');?>",
            data:{noregop:noregop},
            dataType: "JSON",
            success: function (data) {
                _("sarscovid").value=data["prapost"].sarscovid;
                if(data["prapost"].diagnosapra!=null){
                    let list_diagnosapra = data["prapost"].diagnosapra.split(';').join("\n-  ");
                    $('#diagnosapre').val(list_diagnosapra.substring(1).toUpperCase());
                }
                _("dokterdiagnosapra").value=data["prapost"].dokterdiagnosapra;
                if(data["prapost"].diagnosapost!=null){
                    let list_diagnosapost = data["prapost"].diagnosapost.split(';').join("\n-  ");
                    $('#diagnosapost').val(list_diagnosapost.substring(1).toUpperCase());
                }
                _("dokterdiagnosapost").value=data["prapost"].dokterdiagnosapost;    
            }
        });
    }

    function getDiagnosaICD(norm){
        let table = _("tbl_diagnosa");
        table.getElementsByTagName('tbody')[0].innerHTML = '';
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('permintaanselesaitindakan/getDiagnosaICD');?>",
            data:{norm:norm},
            dataType: "JSON",
            success: function (data) {
                if(data["icd"]!=null){
                    let row_count = table.tBodies[0].rows.length;
                    let data_clean = [...new Set(data["icd"].map(obj => JSON.stringify(obj)))].map(str => JSON.parse(str));
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

    function getTindakanOperasi(noregop){
        $.ajax({
            type:"POST",
            url:"<?php echo base_url('permintaanselesaitindakan/getTindakanOperasi');?>",
            data:{noregop:noregop},
            dataType:"JSON",
            success:function(data){
                _("wakttindakanop").value=data.tgltindakanop;
                _("pakaiimplan").value=data.pemakaianimplan;
                if(data.jenisimplan!=null){
                    let list = data.jenisimplan.split(';').join("\n-  ");
                    _("jenisimplan").value=list.substring(1);
                }
                getDetailTindakanOperasi(data.notindakanop);
                _("subtotal").innerHTML=tambahRP(data.totaltariftindakan);
                _("statuspembayaran").innerHTML=data.statuspembayaran.toUpperCase();
                _("tglpembayaran").innerHTML=data.tglpembayaran==null?"-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;":data.tglpembayaran;
            },error:function(response){
                console.log(response);
            }
        });
    }

    function getDetailTindakanOperasi(notinop){
        let table = _("tbl_tindakan");
        table.getElementsByTagName('tbody')[0].innerHTML="";
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('permintaanselesaitindakan/getDetailTindakanOperasi');?>",
            dataType: "JSON",
            data: {notinop:notinop},
            success: function (data) {
                let row_count = table.tBodies[0].rows.length;
                for(let i=0; i<data.length; i++){
                    let row_insert = table.tBodies[0].insertRow(row_count);

                    let OPERATOR = row_insert.insertCell(0);
                    let TINDAKAN = row_insert.insertCell(1);
                    let KELAS = row_insert.insertCell(2);KELAS.style.textAlign="center";
                    let JMLTINDAKAN = row_insert.insertCell(3);JMLTINDAKAN.style.textAlign="center";
                    let TARIF = row_insert.insertCell(4);TARIF.style.textAlign="right";
                    let SUBTOTAL = row_insert.insertCell(5);SUBTOTAL.style.textAlign="right";

                    let getdokter=";"+data[i].operator;
                    let arrdokter=getdokter.split(";").join("<br/>"+"- ");
                    let operator_value = arrdokter.substring(5);

                    OPERATOR.innerHTML = operator_value;
                    TINDAKAN.innerHTML = data[i].tindakan.toUpperCase();
                    KELAS.innerHTML = data[i].kelas;
                    JMLTINDAKAN.innerHTML = data[i].jmltindakan;
                    TARIF.innerHTML = tambahRP(data[i].tarif);
                    SUBTOTAL.innerHTML = tambahRP(data[i].subtotal);
                }
            }
        });
    }

    function getHasilOperasi(noregop){
        let table = _("tbl_hasiloperasi");
        table.getElementsByTagName('tbody')[0].innerHTML = '';
        _("div_hasil").innerHTML="";
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('permintaanselesaitindakan/getHasilOperasi');?>",
            data:{noregop:noregop},
            dataType: "JSON",
            success: function (data) {
                for(let i=0; i<data.length; i++){
                    let row_insert = table.tBodies[0].insertRow(i);
                    let HASIL = row_insert.insertCell(0);HASIL.style.textAlign="center";
                    let AKSI = row_insert.insertCell(1);AKSI.style.textAlign="center";
                    let IDUSER = row_insert.insertCell(2);IDUSER.style.display="none";
                    let TGLUSER = row_insert.insertCell(3);TGLUSER.style.display="none";

                    HASIL.innerHTML = "Hasil Operasi "+(i+1);
                    AKSI.innerHTML = "<button data-popup='tooltip' title='Lihat Hasil' onclick=\"tampilHasil('"+data[i].hasilop+"',this);\" type='button' class='btn btn-info btn-icon'><i class='icon-file-eye'></i></button>";
                    IDUSER.innerHTML = data[i].iduser;
                    TGLUSER.innerHTML = data[i].tgluser;
                }
            }
        });
    }

    function tampilHasil(file,id) {
        var header = _("tbl_hasiloperasi");
        var btns = header.getElementsByClassName("btn");
        let this_btn_class=id.className.split(" ")[1];
        $(btns).attr('class', 'btn btn-info btn-icon');
        if(this_btn_class=="btn-info"){
            $(id).attr('class', 'btn btn-success btn-icon');
            _("div_hasil").innerHTML="<iframe id='framehasil' src='<?php echo base_url();?>template/file_upload/"+file+"' width='100%' height='600px'></iframe>";
        }else if(this_btn_class=="btn-success"){
            $(id).attr('class', 'btn btn-info btn-icon');
            _("div_hasil").innerHTML="";
        }
    }

    function eksporExcel(){
        var tglawal=$('#tglawal').val();
        var tglakhir=$('#tglakhir').val();
        let count_table = $('#tampil_data').dataTable().fnGetData().length;
        if(count_table<=0){
            swal({
                title: "Data Tabel Kosong",
                text: "Isi Tgl. Awal dan Tgl. Akhir,\nKlik TAMPILKAN untuk Tampil Data",
                confirmButtonColor: "#EF5350",
                type: "error"
            });
            return false;
        }
        else if (tglawal == '') {
            swal({
                title: "Tgl. Awal",
                text: "Tidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("tglawal").focus()
            });
            return false;
        } else if (tglakhir == '') {
            swal({
                title: "Tgl. Akhir",
                text: "Tidak Boleh Kosong",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("tglakhir").focus()
            });
            return false;
        }else{
            return true;
        }
    }

    function inputMutu(noregop) {
        document.location = "<?php echo base_url(); ?>mutupelayanan/isiMutuPelayanan/" + noregop;
    }

    function cetakKwitansi(noregop) {
        window.open("<?php echo base_url(); ?>cetakkwitansi/cetak_selesai/"+noregop);
    }

    function clearFormDetail(){
        _("norm").value="";
        _("nama").value="";
        _("tmptgllahir").value="";
        _("umur").value="";
        _("jk").value="";
        _("alamat").value="";
        _("nodaftar").value="";
        _("tgldaftar").value="";
        _("noreg").value="";
        _("tglreg").value="";
        _("ruangpoli").value="";
        _("kelas").value="";
        _("penjamin").value="";
        _("carabayar").value="";
        _("noregop").value="";
        _("jenisop").innerHTML="";
        _("jenisop").className = "label label-default";
        _("dokterpengirim").value="";
        _("tglregop").value="";
        _("wktpemesanan").value="";
        _("keterangan").value="";
        _("wktpelaksanaanop").value="";
        _("sarscovid").value="";
        _("diagnosapre").value="";
        _("dokterdiagnosapra").value="";
        _("diagnosapost").value="";
        _("dokterdiagnosapost").value="";
        _("wakttindakanop").value="";
        _("pakaiimplan").value="";
        _("jenisimplan").value="";
        _("subtotal").innerHTML="Rp 0,00";
        _("statuspembayaran").innerHTML="BELUM LUNAS";
        _("tglpembayaran").innerHTML="";
    }

</script>
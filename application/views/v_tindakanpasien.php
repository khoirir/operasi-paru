<!-- Main content -->
<div class="content-wrapper">

    <!-- Float buttons with text -->
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard') ?>"><i class="icon-home2 position-left"></i>Beranda</a></li>
                <li class="active">Tindakan Operasi</li>
            </ul>
        </div>
    </div>
    <!-- /float buttons with text -->
    <!-- Content area -->
    <div class="content">

        <!-- Basic responsive configuration -->
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h6 class="panel-title">PASIEN</h6>
                    </div>
                    <form action="#" class="form-vertical">
                        <div class="modal-header">
                            <a data-toggle='modal' data-target='#modal_data_pasien'><button style="width: 100%;" type="button" class="btn btn-info btn-labeled" onclick="tampilDataPasien()"><b><i class="icon-search4"></i></b>CARI PASIEN</button></a>
                        </div>
                        <hr>
                        <div class="modal-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li class="active" data-popup="tooltip" title="Identitas Pasien"><a href="#tab-identitas-pasien" data-toggle="tab"><i class="fa fa-wheelchair"></i></a></li>
                                    <li data-popup="tooltip" title="Asal Pasien"><a href="#tab-asal-pasien" data-toggle="tab"><i class="fa fa-hospital-o"></i></a></li>
                                    <li data-popup="tooltip" title="Pemesanan Operasi"><a href="#tab-pemesanan-operasi" data-toggle="tab"><i class="fa fa-medkit"></i></i></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-identitas-pasien">
                                        <fieldset>
                                            <!-- <legend class="text-semibold"><i class="fa fa-wheelchair position-left" style="font-size:16px"></i>IDENTITAS PASIEN</legend> -->
                                            <div class="form-group">
                                                <label><b>Nama</b></label>
                                                <input id="nama" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                            <div class="form-group">
                                                <label><b>No. RM</b></label>
                                                <input id="norm" type="text" class="form-control" style="color:black" disabled="disabled">
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
                                                <textarea id="alamat" rows="2" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="tab-pane" id="tab-asal-pasien">
                                        <fieldset>
                                            <!-- <legend class="text-semibold"><i class="fa fa-hospital-o position-left" style="font-size:16px"></i>ASAL PASIEN</legend> -->
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
                                                <label><b>Instalasi</b></label>
                                                <input id="instalasi" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Unit</b></label>
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
                                    <div class="tab-pane" id="tab-pemesanan-operasi">
                                        <fieldset>
                                            <!-- <legend class="text-semibold"><i class="fa fa-medkit position-left" style="font-size:16px"></i>PEMESANAN OPERASI</legend> -->
                                            <div class="form-group">
                                                <label><b>Jenis Operasi</b></label>
                                                <span class='label label-default' style='font-size:13px; padding-top:8px; width:100%; height:35px' id="jenisop">&nbsp;</span>
                                            </div>
                                            <div class="form-group">
                                                <label><b>Keterangan</b></label>
                                                <textarea id="keterangan" rows="1" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label><b>No. Registrasi Operasi</b></label>
                                                <input id="noregop" type="text" class="form-control" style="color:black" disabled="disabled" value="<?php echo (!empty($noregop) ? $noregop : ""); ?>">
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
                                                <input id="wktpesanop" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Waktu Pelayanan Operasi</b></label>
                                                <input id="wktpelaksanaan" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h6 class="panel-title">KONFIRMASI SELESAI TINDAKAN</h6>
                    </div>
                    <form action="#" class="form-vertical">
                        <div class="modal-body">
                            <button type="button" style="width: 100%;" class="btn btn-success btn-labeled" id="btn_selesai" onclick="konfirmasiSelesai()" disabled><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SELESAI TINDAKAN</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h6 class="panel-title">TINDAKAN PASIEN</h6>
                    </div>
                    <form role="form" class="form-horizontal">
                        <div class="modal-body">
                            <div class="tabbable">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li class="active"><a href="#tab-diagnosa-pasien" data-toggle="tab"><i class="fa fa-stethoscope position-left" style="font-size:16px"></i></i>DIAGNOSA PASIEN</a></li>
                                    <li><a href="#tab-tindakan-operasi" data-toggle="tab"><i class="fa fa-heartbeat position-left" style="font-size:16px"></i>TINDAKAN OPERASI</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-diagnosa-pasien">
                                        <div class="modal-body">
                                            <fieldset>
                                                <legend class="text-semibold"><i class="fa fa-stethoscope position-left" style="font-size:16px"></i>DIAGNOSA PRA & POST OPERASI</legend>
                                                <input type="hidden" id="iddiagnosa">
                                                <input type="hidden" id="iduserdiagnosa">
                                                <input type="hidden" id="tgluserdiagnosa">
                                                <div class="form-group">
                                                    <label><b>Sars Covid</b></label>
                                                    <select class='select' id='selectsarscovid' disabled='disabled'>
                                                        <option value="-">-- Pilih Sars Covid --</option>
                                                        <option value="Reaktif">Reaktif</option>
                                                        <option value="Non Reaktif">Non Reaktif</option>
                                                        <option value="Swab Positive">Swab Positive</option>
                                                        <option value="Swab Negative Rapid Reaktif">Swab Negative Rapid Reaktif</option>
                                                    </select>
                                                    <!-- <input id="sarscovid" type="text" class="form-control" style="color:black" disabled="disabled"> -->
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Dokter Diagnosa Pra</b></label>
                                                    <select id="selectdokterdiagnosapra" class="select-search" disabled='disabled'>
                                                        <option value="-">-- Pilih Dokter Diagnosa Pra --</option>
                                                        <?php foreach ($dokter->result() as $data_dokter) {
                                                            $namadokter = $data_dokter->dokter;
                                                            if ($namadokter != '-') { ?>
                                                                <option value="<?php echo $data_dokter->dokter; ?>"><?php echo $namadokter; ?></option>
                                                        <?php   }
                                                        } ?>
                                                    </select>
                                                    <!-- <input id="dokterdiagnosapra" type="text" class="form-control" style="color:black" disabled="disabled"> -->
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Diagnosa Pra Operasi</b></label>
                                                    <select id="diagnosapre" multiple="multiple" class="select-multiple-tags" disabled="disabled">
                                                    </select>
                                                    <!-- <textarea id="diagnosapre" rows="1" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea> -->
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Dokter Diagnosa Post</b></label>
                                                    <select id="selectdokterdiagnosapost" class="select-search" disabled='disabled'>
                                                        <option value="-">-- Pilih Dokter Diagnosa Post --</option>
                                                        <?php foreach ($dokter->result() as $data_dokter) {
                                                            $namadokter = $data_dokter->dokter;
                                                            if ($namadokter != '-') { ?>
                                                                <option value="<?php echo $data_dokter->dokter; ?>">
                                                                    <?php echo $namadokter; ?></option>
                                                        <?php   }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label><b>Diagnosa Post Operasi</b></label>
                                                    <select id="diagnosapost" multiple="multiple" class="select-multiple-tags" disabled="disabled">
                                                    </select>
                                                </div>
                                                <br /><br />
                                                <legend class="text-semibold"><img style="float: left; width: 20px; height: auto; margin-right: 6px;" src="<?php echo base_url(); ?>/template/assets/css/icons/icd.svg">DIAGNOSA ICD</legend>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <a data-toggle='modal' data-target='#modal_diagnosa'><button type="button" id="btn_tambah_diagnosa" onclick="resetModalDiagnosa()" class="btn btn-primary btn-labeled" disabled="disabled" style="float: right"><b><i class="icon-plus2"></i></b>TAMBAH DIAGNOSA ICD</button></a>
                                                        </div>
                                                    </div>
                                                    <br>
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

                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <hr>
                                            <button type="button" class="btn btn-success btn-labeled" id="btn_simpan_diagnosaprapost" onclick="updateDiagnosaPrapost()" disabled><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                                            <!-- <button type="button" class="btn btn-danger btn-labeled" id="btn_batal" onclick="batalTindakan()" disabled><b><i class="glyphicon glyphicon-floppy-remove"></i></b>BATAL</button> -->
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-tindakan-operasi">
                                        <div class="modal-body">
                                            <fieldset>
                                                <input type="hidden" id="notindakanoperasi">
                                                <input type="hidden" id="iduserop">
                                                <input type="hidden" id="tgluserop">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <label><b>Tgl. Tindakan Operasi</b></label>
                                                            <input id="tgltindakanop" type="date" class="form-control" style="color:black" required="required" disabled='disabled'>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label><b>Jam Tindakan Operasi</b></label>
                                                            <input id="jamtindakanop" type="time" class="form-control" style="color:black" required="required" disabled='disabled'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label><b>Pemakaian Implan</b></label>
                                                            <select id="selectpakaiimplan" class="select" disabled='disabled' onchange="changeSelect('implan',this)">
                                                                <option value="-">-- Pilih Pemakaian Implan --</option>
                                                                <option value="YA">YA</option>
                                                                <option value="TIDAK">TIDAK</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <label><b>Jenis Implan</b></label>
                                                            <select id="selectimplan" multiple="multiple" class="select-multiple-tags" disabled="disabled">
                                                                <?php foreach ($jenisimplanop->result() as $datajenisimplanop) { ?>
                                                                    <option value="<?php echo $datajenisimplanop->jenisImplan; ?>"><?php echo $datajenisimplanop->jenisImplan; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label><b>Kelas Tindakan</b></label>
                                                            <select id="selectkelastindakan" class="select-search" disabled='disabled' onchange="changeSelect('kelastindakan',this)">
                                                                <option value="-">-- Pilih Kelas Tindakan --</option>
                                                                <?php foreach ($kelastindakanop->result() as $datakelastindakanop) { ?>
                                                                    <option value="<?php echo $datakelastindakanop->kdkelas; ?>"><?php echo $datakelastindakanop->kelas; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <label><b>Tindakan Operasi</b></label>
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <select data-placeholder='' class='select-search select-clear' id='selecttindakan' disabled='disabled'>
                                                                        <option></option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button id="btn_tambah" class='btn btn-primary btn-labeled' onclick="insertDataTable()" type="button" disabled><b><i class="icon-plus2"></i></b>TAMBAH</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <input type="hidden" id="tindakanhapus">
                                                <div class="form-group">
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
                                                                    <th style="text-align:center">AKSI</th>
                                                                    <th style="display:none">kodetarif</th>
                                                                    <th style="display:none">jenistindakan</th>
                                                                    <th style="display:none">kodetindakan</th>
                                                                    <th style="display:none">baru</th>
                                                                    <th style="display:none">hidden jumlah</th>
                                                                    <th style="display:none">dataedit</th>
                                                                    <th style="display:none">editoperator</th>
                                                                    <th style="display:none">idtindakan</th>
                                                                    <th style="display:none">usertgl</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th colspan="4"></th>
                                                                    <th style="text-align:center;">TOTAL</th>
                                                                    <th id='subtotal' style="text-align:right">Rp 0,00
                                                                    </th>
                                                                    <th></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                    <th style="display:none"></th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <hr>
                                            <button type="button" class="btn btn-success btn-labeled" id="btn_simpan_tindakan" onclick="insupTindakanOperasi()" disabled><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="modal_data_pasien" class="modal fade">
                    <div class="modal-dialog modal-full">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h5 class="modal-title">PASIEN OPERASI</h5>
                            </div>
                            <form role="form" class="form-horizontal">
                                <div class="modal-body">
                                    <div class="row">
                                        <table id="data_pasien" class="table datatable-basic table-framed">
                                            <thead>
                                                <tr style="background:#eee;">
                                                    <th style="width: 60px">NO.</th>
                                                    <th>NO. REGISTRASI OPERASI</th>
                                                    <th>NO. RM</th>
                                                    <th>NAMA PASIEN</th>
                                                    <th>ASAL PASIEN</th>
                                                    <th>UNIT</th>
                                                    <th>JENIS OPERASI</th>
                                                    <th>WAKTU PERMINTAAN</th>
                                                    <th>WAKTU PELAKSANAAN</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                                            if ($data_dokter->dokter != '-') {
                                                        ?>
                                                                <option value="<?php echo $data_dokter->kode . ";" . $data_dokter->dokter; ?>"><?php echo $data_dokter->dokter; ?></option>
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
                                                        <?php
                                                        foreach ($jenisdiagnosa->result() as $data_jenisdiagnosa) { ?>
                                                            <option value="<?php echo $data_jenisdiagnosa->kdJenisDiagnosa . ";" . $data_jenisdiagnosa->jenisDiagnosa; ?>"><?php echo $data_jenisdiagnosa->jenisDiagnosa; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-3">
                                                    <select data-placeholder='' class='select' id='selectjeniskasus'>
                                                        <?php
                                                        foreach ($jeniskasus->result() as $data_jeniskasus) { ?>
                                                            <option value="<?php echo $data_jeniskasus->kdKasusDiagnosa; ?>"><?php echo $data_jeniskasus->kasus; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-3 control-label"><b>ICD</b></label>
                                                <div class="col-lg-9">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="radio-diagnosa" class="styled" value="ICD 10" onchange="eventRadio(this)">
                                                        <span id="icd10" class='label label-default' style='font-size:12px; padding-top:5px; width:100px; height:30px'><b>ICD 10</b></span>
                                                    </label>
                                                    <label class="radio-inline">
                                                        <input type="radio" name="radio-diagnosa" class="styled" value="ICD 9" onchange="eventRadio(this)">
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
                                            <br /><br /><br style="line-height:36px;" />
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

            .tablekonten {
                overflow-y: auto;
                height: 250px;
            }

            .tablekonten thead tr:nth-child(1) th {
                background: #eee;
                position: sticky;
                top: 0;
                z-index: 10;
            }
        </style>

        <script type="text/javascript">
            $(document).ready(function() {
                getDetailPasien($('#noregop').val());
            });

            //BEGIN DATA PASIEN
            function tampilDataPasien() {
                $('#data_pasien').dataTable({
                    "bDestroy": true,
                    "processing": true,
                    "serverSide": true,
                    "ordering": true,
                    "bInfo": false,
                    "order": [
                        [8, 'ASC']
                    ],
                    "ajax": {
                        "url": "<?php echo base_url('permintaansudah/permintaanList') ?>",
                        "type": "POST",
                    },
                    "deferRender": true,
                    "lengthMenu": [
                        [10, 25, 50],
                        [10, 25, 50]
                    ],
                    "columnDefs": [{
                            "render": function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            },
                            "targets": [0],
                            "orderable": false
                        },
                        {
                            "data": "noregop",
                            "targets": [1],
                            "orderable": false
                        },
                        {
                            "data": "norm",
                            "targets": [2],
                            "orderable": false
                        },
                        {
                            "data": "pasien",
                            "targets": [3]
                        },
                        {
                            "render": function(data, type, row) {
                                var html = row.instalasi.toUpperCase()
                                return html;
                            },
                            "targets": [4]
                        },
                        {
                            "render": function(data, type, row) {
                                var html = row.unit.toUpperCase();
                                return html;
                            },
                            "targets": [5]
                        },
                        {
                            "render": function(data, type, row) {
                                var html = "<span class='label label-" + row.warnajenisop + "' style='width:100px'>" + row.jenisop + "</span>"
                                return html;
                            },
                            "targets": [6],
                            "orderable": true
                        },
                        {
                            "render": function(data, type, row) {
                                var html = formatTanggalData(row.tglpermintaanop);
                                return html;
                            },
                            "targets": [7]
                        },
                        {
                            "render": function(data, type, row) {
                                let datareturn = row.tglkonfirmasiop == null ? "" : formatTanggalData(row.tglkonfirmasiop);
                                return datareturn;
                            },
                            "targets": [8]
                        },
                        {
                            "render": function(data, type, row) {
                                var noregistrasi = row.noregop;
                                let tglkonfirmasi = row.tglkonfirmasiop == null ? "0" : row.tglkonfirmasiop;
                                let html = `<button data-popup='tooltip' title='Pilih Pasien' type='button' onclick="getDetailPasien('${noregistrasi}','${tglkonfirmasi}')" data-dismiss='modal' class='btn btn-primary btn-icon'><i class='icon-checkmark4'></i></button>`;
                                return html;
                            },
                            "targets": [9],
                            "orderable": false
                        }
                    ]
                });
            }

            function getDetailPasien(noregop, tglkonfirmasi = "") {
                if (tglkonfirmasi == "0") {
                    swal({
                        title: "Gagal",
                        text: "Waktu Pelaksanaan Operasi Belum Diisi!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    }, () => clearForm());
                } else {
                    if (noregop !== "") {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('tindakan/getPasienTindakan'); ?>",
                            data: {
                                noregop: noregop
                            },
                            dataType: "JSON",
                            success: function(data) {
                                clearForm();
                                $('#nama').val(data.namapasien);
                                $('#norm').val(data.norm);
                                $('#tmptgllahir').val(hpskotakab(data.tmplahir).toUpperCase() + " / " + data.tgllahir);
                                $('#umur').val(hitungUmur(data.tgllahir));
                                $('#jk').val(jklengkap(data.jk));
                                $('#alamat').val(data.alamat.toUpperCase());
                                $("#nodaftar").val(data.nodaftar);
                                $("#tgldaftar").val(data.tgldaftar);
                                $('#noreg').val(data.noregistrasi);
                                $('#tglreg').val(data.tglregistrasi);
                                $('#instalasi').val(data.instalasi);
                                $('#ruangpoli').val(data.unitasal.toUpperCase());
                                $('#kelas').val(data.kelas == null ? "-" : data.kelas);
                                $('#carabayar').val(data.carabayar.toUpperCase());
                                $('#penjamin').val(data.penjamin.toUpperCase());
                                _("jenisop").innerHTML = data.jenisop;
                                _("jenisop").className = 'label label-' + data.warnajenisop;
                                $('#keterangan').val(data.keterangan == "" ? "-" : data.keterangan.toUpperCase());
                                $('#noregop').val(data.noregistrasiop);
                                $('#tglregop').val(data.tglregistrasiop);
                                $('#dokterpengirim').val(data.dokterpengirim);
                                $('#wktpesanop').val(data.tglpermintaanop);
                                $('#wktpelaksanaan').val(data.tgljadwalop);
                                _("btn_selesai").disabled = false;
                                getDiagnosaPasien(data.norm, data.noregistrasiop);
                                getTindakanOperasi(data.noregistrasiop);
                                window.history.pushState("", "", '/ok_paru/tindakan');
                            }
                        });
                    }
                }

            }
            //END DATA PASIEN


            //BEGIN DIAGNOSA
            function eventRadio(el) {
                if ($(el).val() == 'ICD 10') {
                    _("icd10").className = "label label-info";
                    _("icd9").className = "label label-default";
                } else if ($(el).val() == 'ICD 9') {
                    _("icd10").className = "label label-default";
                    _("icd9").className = "label label-info";
                }
                tampilDataDiagnosa($(el).val());
            }

            function resetModalDiagnosa() {
                $("#selectdokterdiagnosa").val("0000;-").trigger('change');
                $("#selectjenisdiagnosaoperasi").val("PRA OPERASI").trigger('change');
                $("#selectjenisdiagnosa").val("jd01;UTAMA").trigger('change');
                $("#selectjeniskasus").val("k01").trigger('change');
                _nm('radio-diagnosa')[0].checked = false;
                _nm('radio-diagnosa')[1].checked = false;
                _("icd10").className = "label label-default";
                _("icd9").className = "label label-default";
                _("tbl_pilih_diagnosa").getElementsByTagName('tbody')[0].innerHTML = "";
                $("#data_diagnosa").DataTable().clear().destroy();
                $("#data_diagnosa").dataTable({
                    "bInfo": false,
                    "lengthMenu": [
                        [5, 10, 25],
                        [5, 10, 25]
                    ],
                    "columnDefs": [{
                            "targets": [0],
                            "orderable": false
                        },
                        {
                            "targets": [1],
                            "orderable": false
                        },
                        {
                            "targets": [2],
                            "orderable": false
                        },
                        {
                            "targets": [3],
                            "orderable": false
                        }
                    ],
                    "deferRender": true
                });
            }

            function tampilDataDiagnosa(icd) {
                $('#data_diagnosa').dataTable({
                    "bDestroy": true,
                    "bInfo": false,
                    "processing": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                        [1, 'ASC']
                    ],
                    "ajax": {
                        "url": "<?php echo base_url('tindakan/dataTableDiagnosa') ?>",
                        "type": "POST",
                        "data": {
                            icd: icd
                        }
                    },
                    "deferRender": true,
                    "lengthMenu": [
                        [5, 10, 25],
                        [5, 10, 25]
                    ],
                    "columnDefs": [{
                            "targets": [0],
                            "orderable": false,
                            "className": "text-center",
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
                            "className": "text-center",
                            "render": function(data, type, row) {
                                let kdicd = row.kdicd;
                                let icd = row.icd.replace(/'/g, "\\'");
                                let deskripsi = row.keterangan.replace(/'/g, "\\'");
                                let param = kdicd + ";" + icd + ";" + deskripsi;

                                let html = "<a type='button' data-popup='tooltip' title='Pilih Diagnosa ICD' class='btn btn-primary btn-icon' onclick=\"getPilihDiagnosa('" + param + "');\"><i class='icon-checkmark4'></i></a>";
                                return html;
                            }
                        }
                    ]
                });

                _('hidden_norm').value = _('norm').value;
                _('hidden_nodaftar').value = _('nodaftar').value;
            }

            function getPilihDiagnosa(data) {
                let dokter = _('selectdokterdiagnosa').value.split(";")[1];
                if (dokter != "-") {
                    let table = _("tbl_pilih_diagnosa");
                    let row_count = table.tBodies[0].rows.length;
                    let data_array = data.split(';');
                    let jenisdiagnosa = radioGetValue('radio-diagnosa') + ' - ' + _('selectjenisdiagnosa').value.split(';')[1];

                    let hidden_data = radioGetValue('radio-diagnosa') + ";" + _('hidden_nodaftar').value + ";" + _('hidden_norm').value + ";" + data_array[0] + ";" + data_array[1] + ";" + _('selectdokterdiagnosa').value.split(";")[0] + ";" + _('selectjenisdiagnosaoperasi').value + ";" + _('selectjenisdiagnosa').value.split(';')[0].toUpperCase() + ";" + _('selectjeniskasus').value.split(';')[0].toUpperCase();
                    if (getTableValue(table, hidden_data, 6) === "") {
                        let row_insert = table.tBodies[0].insertRow(row_count);
                        let KODE = row_insert.insertCell(0);
                        let DIAGNOSA = row_insert.insertCell(1);
                        let DESKRIPSI = row_insert.insertCell(2);
                        let JENISDIAGNOSA = row_insert.insertCell(3);
                        JENISDIAGNOSA.style.textAlign = "center";
                        let DOKTER = row_insert.insertCell(4);
                        let AKSI = row_insert.insertCell(5);
                        let HIDDEN = row_insert.insertCell(6);
                        HIDDEN.style.display = "none";

                        KODE.innerHTML = data_array[0];
                        DIAGNOSA.innerHTML = data_array[1];
                        DESKRIPSI.innerHTML = data_array[2];
                        JENISDIAGNOSA.innerHTML = jenisdiagnosa;
                        DOKTER.innerHTML = dokter;
                        HIDDEN.innerHTML = hidden_data;
                        AKSI.innerHTML = "<a data-popup='tooltip' title='Hapus Diagnosa ICD' onclick=\"hapusDiagnosaTemp(this);\" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></a>";
                    } else {
                        swal({
                            title: "Gagal",
                            text: "Diagnosa " + radioGetValue('radio-diagnosa') + " Sudah Dipilih!",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    }
                } else {
                    swal({
                        title: "Gagal",
                        text: "Silahkan Pilih Dokter!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _('selectjenisdiagnosa').focus()
                    });
                }
            }

            function hapusDiagnosaTemp(element) {
                const table = _("tbl_pilih_diagnosa");
                let row = $(element).closest('td').parent()[0].sectionRowIndex;
                table.deleteRow(row + 1);
            }

            function getDataTableValueDiagnosa(table) {
                let row_count = table.tBodies[0].rows.length;
                let data = [];
                let tgl = getDate("yyyy-mm-dd HH:MM:SS");
                for (let brs = 0; brs < row_count; brs++) {
                    let data_temp = table.tBodies[0].rows[brs].cells[6].innerText.split(";");
                    data.push({
                        "icd": data_temp[0],
                        "nodaftar": data_temp[1],
                        "norm": data_temp[2],
                        "kdicd": data_temp[3],
                        "diagnosa": data_temp[4],
                        "jenisdiagnosa": data_temp[7].toLowerCase(),
                        "jeniskasus": data_temp[8].toLowerCase(),
                        "jenisdiagnosaoperasi": data_temp[6],
                        "dokter": data_temp[5],
                        "tgldiagnosa": tgl
                    });
                }
                return data;
            }

            function insertICD() {
                let data = getDataTableValueDiagnosa(_("tbl_pilih_diagnosa"));
                console.log(data.length);
                if (data != 0) {
                    swal({
                            title: "Simpan Diagnosa",
                            text: "Apakah Yakin Menambahkan Diagnosa Pasien?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#EF5350",
                            confirmButtonText: "YA",
                            cancelButtonText: "TIDAK",
                            closeOnConfirm: false,
                            closeOnCancel: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('tindakan/insertICD') ?>",
                                    data: {
                                        data: data
                                    },
                                    dataType: "JSON",
                                    success: function(data) {
                                        console.log(data);
                                        getDiagnosaICD(_("norm").value);
                                        swal({
                                            title: "Berhasil",
                                            text: "Diagnosa Disimpan",
                                            confirmButtonColor: "#66BB6A",
                                            type: "success",
                                            onClose: $('#modal_diagnosa').modal('hide')
                                        });
                                    },
                                    error: function(data) {
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
                        });
                } else {
                    swal({
                        title: "Gagal Disimpan",
                        text: "Data Diagnosa Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                }
            }

            function getDiagnosaPasien(norm, noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('tindakan/getDiagnosaPasien'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: function(data) {
                        _("iddiagnosa").value = data["prapost"].iddiagnosa;
                        _("iduserdiagnosa").value = data["prapost"].iduser;
                        _("tgluserdiagnosa").value = data["prapost"].tgluser;
                        _("selectsarscovid").disabled = false;
                        $("#selectsarscovid").val(data["prapost"].sarscovid == null ? "-" : data["prapost"].sarscovid).trigger("change");
                        _("selectdokterdiagnosapra").disabled = false;
                        $("#selectdokterdiagnosapra").val(data["prapost"].dokterdiagnosapra == null ? "-" : data["prapost"].dokterdiagnosapra).trigger("change");
                        _("diagnosapre").disabled = false;
                        let option_diagnosapra = "";
                        if (data["prapost"].diagnosapra != null) {
                            let data_diagnosa = data["prapost"].diagnosapra.substring(1).split(";");
                            for (let i = 0; i < data_diagnosa.length; i++) {
                                option_diagnosapra += "<option value='" + data_diagnosa[i] + "'>" +
                                    data_diagnosa[i] + "</option>";
                            }
                        }
                        $("select#diagnosapre").html(option_diagnosapra);
                        $('#diagnosapre').val(data["prapost"].diagnosapra == null ? "" : data["prapost"].diagnosapra.substring(1).split(";")).trigger('change');

                        _("selectdokterdiagnosapost").disabled = false;
                        $("#selectdokterdiagnosapost").val(data["prapost"].dokterdiagnosapost == null ? "-" : data["prapost"].dokterdiagnosapost).trigger("change");
                        _("diagnosapost").disabled = false;
                        let option_diagnosapost = "";
                        if (data["prapost"].diagnosapost != null) {
                            let data_diagnosa = data["prapost"].diagnosapost.substring(1).split(";");
                            for (let i = 0; i < data_diagnosa.length; i++) {
                                option_diagnosapost += "<option value='" + data_diagnosa[i] + "'>" +
                                    data_diagnosa[i] + "</option>";
                            }
                        }
                        $("select#diagnosapost").html(option_diagnosapost);
                        $('#diagnosapost').val(data["prapost"].diagnosapost == null ? "" : data["prapost"].diagnosapost.substring(1).split(";")).trigger('change');
                        _("btn_tambah_diagnosa").disabled = false;
                        getDiagnosaICD(norm);
                        _("btn_simpan_diagnosaprapost").disabled = false;
                    }
                });
            }

            function getDiagnosaICD(norm) {
                let table = _("tbl_diagnosa");
                table.getElementsByTagName('tbody')[0].innerHTML = '';
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('tindakan/getDiagnosaICD'); ?>",
                    data: {
                        norm: norm
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data["icd"] != null) {
                            let row_count = table.tBodies[0].rows.length;
                            let data_clean = [...new Set(data["icd"].map(obj => JSON.stringify(obj)))].map(str => JSON.parse(str));
                            for (let i = 0; i < data_clean.length; i++) {
                                let row_insert = table.tBodies[0].insertRow(row_count);
                                let TGL_DIAGNOSA = row_insert.insertCell(0);
                                let KODE = row_insert.insertCell(1);
                                KODE.style.textAlign = "center";
                                let DIAGNOSA = row_insert.insertCell(2);
                                let DESKRIPSI = row_insert.insertCell(3);
                                let JENIS_DIAGNOSA = row_insert.insertCell(4);
                                let DOKTER = row_insert.insertCell(5);

                                TGL_DIAGNOSA.innerHTML = data_clean[i].tgldiagnosa == null | data_clean[i].tgldiagnosa == '0000-00-00 00:00:00' ? formatTanggalData(data_clean[i].tgldaftar) : formatTanggalData(data_clean[i].tgldiagnosa);
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

            function updateDiagnosaPrapost() {
                let noregop = _("noregop").value;
                let norm = _("norm").value;
                let iddiagnosa = _("iddiagnosa").value;
                let iduser = _("iduserdiagnosa").value;
                let tgluser = _("tgluserdiagnosa").value;
                let sarscovid = _("selectsarscovid").value;
                let dokterdiagnosapra = _("selectdokterdiagnosapra").value;
                let diagnosapra = $("#diagnosapre").val();
                let dokterdiagnosapost = _("selectdokterdiagnosapost").value;
                let diagnosapost = $("#diagnosapost").val();
                if (sarscovid == "-") {
                    swal({
                        title: "Sars Covid",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("selectsarscovid").focus()
                    });
                } else if (dokterdiagnosapra == "-") {
                    swal({
                        title: "Dokter Diagnosa Pra",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("selectdokterdiagnosapra").focus()
                    });
                } else if (diagnosapra == null) {
                    swal({
                        title: "Diagnosa Pra",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("diagnosapre").focus()
                    });
                } else {
                    swal({
                            title: "Diagnosa Pasien",
                            text: "Apakah Yakin Simpan?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#EF5350",
                            confirmButtonText: "YA",
                            cancelButtonText: "TIDAK",
                            closeOnConfirm: false,
                            closeOnCancel: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                let arr_data = {
                                    iddiagnosa: iddiagnosa,
                                    iduser: iduser,
                                    tgluser: tgluser,
                                    sarscovid: sarscovid,
                                    dokterdiagnosapra: dokterdiagnosapra,
                                    diagnosapra: diagnosapra,
                                    dokterdiagnosapost: dokterdiagnosapost,
                                    diagnosapost: diagnosapost
                                };
                                $.ajax({
                                    type: "POST",
                                    url: "<?php echo base_url('tindakan/updateDiagnosaPrapost'); ?>",
                                    data: {
                                        arr_data: arr_data
                                    },
                                    dataType: "JSON",
                                    success: function(data) {
                                        console.log(data);
                                        swal({
                                            title: "Berhasil",
                                            text: "Data Disimpan",
                                            confirmButtonColor: "#66BB6A",
                                            type: "success",
                                            onClose: getDiagnosaPasien(norm, noregop)
                                        });
                                    },
                                    error: function(data) {
                                        console.log(data);
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
            // END DIAGNOSA PASIEN


            //BEGIN TINDAKAN OPERASI
            function changeSelect(jenis, id) {
                if (jenis == "implan") {
                    let val = $(id).val();
                    if (val == "YA") {
                        _("selectimplan").disabled = false;
                    } else {
                        $('#selectimplan').val("").trigger('change');
                        _("selectimplan").disabled = true;
                    }
                } else if (jenis == "kelastindakan") {
                    let kdkelas = $(id).val();
                    if (kdkelas != "-") {
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url('tindakan/getListTindakanOP'); ?>",
                            data: {
                                kdkelas
                            },
                            dataType: "JSON",
                            success: function(data) {
                                _("selecttindakan").disabled = false;
                                $("#selecttindakan").val("").trigger('change');
                                let option_tindakan = `<option value='-'>-- Pilih Tindakan Operasi --</option>`;
                                for (let i = 0; i < data.length; i++) {
                                    option_tindakan += `<option value="${data[i].kdtarif};${data[i].tindakan};${data[i].tarif};${data[i].kelas};${data[i].kdtindakan}">${data[i].tindakan} - ${tambahRP(data[i].tarif)}</option>`;
                                }
                                $("select#selecttindakan").html(option_tindakan);
                            },
                            error: function(response) {
                                console.log(response);
                            }
                        });
                    } else {
                        $("select#selecttindakan").html("<option value=''></option>");
                        $("#selecttindakan").val("").trigger('change');
                        _("selecttindakan").disabled = true;
                    }
                } else if (jenis == "operator") {
                    let operator = $(id).val();
                    const table = _("tbl_tindakan");
                    let row = $(id).closest('td').parent()[0].sectionRowIndex;
                    table.tBodies[0].rows[row].cells[13].innerHTML = operator != null ? operator.join(";") : "";
                    console.log(operator);
                    let databaru = table.tBodies[0].rows[row].cells[10].innerText;
                    if (databaru === 'X') {
                        table.tBodies[0].rows[row].cells[12].innerHTML = 'E';
                    }
                }
            }

            function getTindakanOperasi(noregop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('tindakan/getTindakanOperasi'); ?>",
                    data: {
                        noregop: noregop
                    },
                    dataType: "JSON",
                    success: function(data) {
                        _("notindakanoperasi").value = data.notindakanop == null ? "" : data.notindakanop;
                        _("iduserop").value = data.iduser;
                        _("tgluserop").value = data.tgluser;
                        _("tgltindakanop").disabled = false;
                        $('#tgltindakanop').val(data.tgltindakanop == null ? "" : ubahFormatTanggal(data.tgltindakanop, 1));
                        _("jamtindakanop").disabled = false;
                        $('#jamtindakanop').val(data.tgltindakanop == null ? "" : ubahFormatTanggal(data.tgltindakanop, 0));
                        _("selectpakaiimplan").disabled = false;
                        $("#selectpakaiimplan").val(data.pemakaianimplan == null ? "-" : data.pemakaianimplan).trigger("change");
                        if (data.jenisimplan != null) {
                            _("selectimplan").disabled = false;
                            addOptionSelect(data.jenisimplan, "selectimplan");
                        }
                        _("selectkelastindakan").disabled = false;
                        _("btn_tambah").disabled = false;
                        getDetailTindakanOperasi(data.notindakanop);
                        _("btn_simpan_tindakan").disabled = false;
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            }

            function addOptionSelect(data, id) {
                if (data != null) {
                    let arr_data = data.substring(1).split(";");
                    let jml_arr_data = arr_data.length;
                    $("#" + id).val(arr_data).trigger("change");
                    let data_baru = $("#" + id).val();
                    let jml_data_baru = data_baru.length;
                    if (jml_data_baru < jml_arr_data) {
                        let dataa = "";
                        for (let i = 0; i < jml_data_baru; i++) {
                            dataa += ";" + data_baru[i];
                        }
                        let option_baru = data.replace(dataa, "").substring(1).split(";");
                        for (let a = 0; a < option_baru.length; a++) {
                            let select_data = _(id);
                            let option_data = document.createElement("option");
                            option_data.text = option_baru[a];
                            option_data.value = option_baru[a];
                            select_data.add(option_data);
                        }
                        $('#' + id).val(data.substring(1).split(";")).trigger('change');
                    } else {
                        $('#' + id).val(data.substring(1).split(";")).trigger('change');
                    }
                } else {
                    $('#' + id).val("").trigger('change');
                }
            }

            function getDetailTindakanOperasi(notinop) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('tindakan/getDetailTindakanOperasi'); ?>",
                    dataType: "JSON",
                    data: {
                        notinop: notinop
                    },
                    success: function(data) {
                        let table = _("tbl_tindakan");
                        table.getElementsByTagName('tbody')[0].innerHTML = "";
                        let html = '';
                        for (let i = 0; i < data.length; i++) {
                            let operator = setDataOperator(data[i].operator);
                            let tindakan = (data[i].kdtarif).length != 12 ? data[i].tindakan : `<input type='text' class='form-control text-uppercase' value="${data[i].tindakan}">`;
                            let kelas = data[i].kelas;
                            let jmltindakan = `<input type='number' onpaste='return false' onwheel="blur()" onchange="hitungSubtotal(this)" class='form-control' min='1' value='${data[i].jmltindakan}' step='1' style='text-align:center;' onkeydown='return false'>`;
                            let tarif = data[i].kdtarif.length != 12 ? tambahRP(data[i].tarif) : `<input type='text' style='text-align:right' class='form-control' onkeyup="inputTarif(this)" onblur="gantiFormatBlur(this)" onfocus="gantiFormatFocus(this)" value='${tambahRP(data[i].tarif)}'>`;
                            let subtotal = tambahRP(data[i].subtotal);
                            let aksi = `<a data-popup='tooltip' title='Hapus Tindakan' type='button' onclick="deleteTindakan(this)" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></a>`;

                            let kodetarif = data[i].kdtarif;
                            let jenistindakan = data[i].jenistindakan;
                            let kodetindakan = data[i].kdtindakan;
                            let hiddenjml = data[i].jmltindakan;
                            let editoperator = data[i].operator;
                            let iddetail = data[i].iddetail;
                            let usertgl = data[i].iduser + "~" + data[i].tgluser;
                            html += /*html*/
                                `<tr>
                                    <td>${operator}</td>
                                    <td>${tindakan}</td>
                                    <td style="text-align:center;">${kelas}</td>
                                    <td>${jmltindakan}</td>
                                    <td style="text-align:right;">${tarif}</td>
                                    <td style="text-align:right;">${subtotal}</td>
                                    <td style="text-align:center;">${aksi}</td>
                                    <td style="display:none;">${kodetarif}</td>
                                    <td style="display:none;">${jenistindakan}</td>
                                    <td style="display:none;">${kodetindakan}</td>
                                    <td style="display:none;">X</td>
                                    <td style="display:none;">${hiddenjml}</td>
                                    <td style="display:none;">T</td>
                                    <td style="display:none;">${editoperator}</td>
                                    <td style="display:none;">${iddetail}</td>
                                    <td style="display:none;">${usertgl}</td>
                                </tr>`;
                        }
                        table.getElementsByTagName('tbody')[0].innerHTML = html;
                        _("subtotal").innerHTML = subTotal();
                        $('.select-2').select2();
                    }
                });
            }

            function insertDataTable() {
                let table = _("tbl_tindakan");
                let row_count = table.tBodies[0].rows.length;
                let data = _("selecttindakan").value;
                if (data !== '') {
                    if (data != "-") {
                        let data_array = data.split(';');
                        if (getTableValue(table, data_array[4], 9) === "") {
                            let row_insert = table.tBodies[0].insertRow(row_count);

                            let OPERATOR = row_insert.insertCell(0);
                            let TINDAKAN = row_insert.insertCell(1);
                            let KELAS = row_insert.insertCell(2);
                            KELAS.style.textAlign = "center";
                            let JMLTINDAKAN = row_insert.insertCell(3);
                            let TARIF = row_insert.insertCell(4);
                            TARIF.style.textAlign = "right";
                            let SUBTOTAL = row_insert.insertCell(5);
                            SUBTOTAL.style.textAlign = "right";
                            let AKSI = row_insert.insertCell(6);
                            AKSI.style.textAlign = "CENTER";

                            let KODETARIF = row_insert.insertCell(7);
                            KODETARIF.style.display = "none";
                            let JENISTINDAKAN = row_insert.insertCell(8);
                            JENISTINDAKAN.style.display = "none";
                            let KODETINDAKAN = row_insert.insertCell(9);
                            KODETINDAKAN.style.display = "none";
                            let DATABARU = row_insert.insertCell(10);
                            DATABARU.style.display = "none";
                            let HIDDENJML = row_insert.insertCell(11);
                            HIDDENJML.style.display = "none";
                            let DATAEDIT = row_insert.insertCell(12);
                            DATAEDIT.style.display = "none";
                            let EDITOPERATOR = row_insert.insertCell(13);
                            EDITOPERATOR.style.display = "none";
                            let IDDETAIL = row_insert.insertCell(14);
                            IDDETAIL.style.display = "none";
                            let USERTGL = row_insert.insertCell(15);
                            USERTGL.style.display = "none";
                            OPERATOR.innerHTML = setDataOperator("");
                            TINDAKAN.innerHTML = data_array[1];
                            KELAS.innerHTML = data_array[3];
                            JMLTINDAKAN.innerHTML = `<input type="number" onpaste="return false" onwheel="blur()" onchange="hitungSubtotal(this)" class="form-control" min="1" value="1" step="1" style="text-align:center;" onkeydown="return false">`;
                            TARIF.innerHTML = tambahRP(data_array[2]);
                            SUBTOTAL.innerHTML = tambahRP(data_array[2]);
                            AKSI.innerHTML = `<a data-popup='tooltip' title='Hapus Tindakan' type='button' onclick="deleteTindakan(this)" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></a>`;

                            KODETARIF.innerHTML = data_array[0];
                            JENISTINDAKAN.innerHTML = 'TAMBAHAN';
                            KODETINDAKAN.innerHTML = data_array[4];
                            DATABARU.innerHTML = 'Y';
                            HIDDENJML.innerHTML = '1';
                            DATAEDIT.innerHTML = 'T';
                            EDITOPERATOR.innerHTML = '';
                            IDDETAIL.innerHTML = "";
                            USERTGL.innerHTML = "";
                            $("#selecttindakan").val("-").trigger('change');
                            _("subtotal").innerHTML = subTotal();
                            $('.select-2').select2();
                        } else {
                            $("#selecttindakan").val("-").trigger('change');
                            swal({
                                title: "Gagal",
                                text: "Tindakan Sudah Dipilih!",
                                confirmButtonColor: "#EF5350",
                                type: "error"
                            });
                        }
                    } else {
                        swal({
                            title: "Gagal",
                            text: "Pilih Tindakan Terlebih Dahulu!",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    }
                } else {
                    swal({
                            title: "Biaya Tambahan",
                            text: "Apakah Ingin Menambahkan Tambahan Biaya?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#EF5350",
                            confirmButtonText: "YA",
                            cancelButtonText: "TIDAK",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                let row_insert = table.tBodies[0].insertRow(row_count);

                                let OPERATOR = row_insert.insertCell(0);
                                let TINDAKAN = row_insert.insertCell(1);
                                let KELAS = row_insert.insertCell(2);
                                KELAS.style.textAlign = "center";
                                let JMLTINDAKAN = row_insert.insertCell(3);
                                let TARIF = row_insert.insertCell(4);
                                TARIF.style.textAlign = "right";
                                let SUBTOTAL = row_insert.insertCell(5);
                                SUBTOTAL.style.textAlign = "right";
                                let AKSI = row_insert.insertCell(6);
                                AKSI.style.textAlign = "CENTER";

                                let KODETARIF = row_insert.insertCell(7);
                                KODETARIF.style.display = "none";
                                let JENISTINDAKAN = row_insert.insertCell(8);
                                JENISTINDAKAN.style.display = "none";
                                let KODETINDAKAN = row_insert.insertCell(9);
                                KODETINDAKAN.style.display = "none";
                                let DATABARU = row_insert.insertCell(10);
                                DATABARU.style.display = "none";
                                let HIDDENJML = row_insert.insertCell(11);
                                HIDDENJML.style.display = "none";
                                let DATAEDIT = row_insert.insertCell(12);
                                DATAEDIT.style.display = "none";
                                let EDITOPERATOR = row_insert.insertCell(13);
                                EDITOPERATOR.style.display = "none";
                                let IDDETAIL = row_insert.insertCell(14);
                                IDDETAIL.style.display = "none";
                                let USERTGL = row_insert.insertCell(15);
                                USERTGL.style.display = "none";
                                OPERATOR.innerHTML = setDataOperator("");
                                TINDAKAN.innerHTML = `<input type='text' class='form-control text-uppercase'>`;
                                KELAS.innerHTML = '-';
                                JMLTINDAKAN.innerHTML = `<input type='number' onpaste='return false' onwheel="blur()" onchange="hitungSubtotal(this)" class='form-control' min='1' value='1' step='1' style='text-align:center;' onkeydown='return false'>`;
                                TARIF.innerHTML = `<input type='text' style='text-align:right' class='form-control' onkeyup="inputTarif(this)" onblur="gantiFormatBlur(this)" onfocus="gantiFormatFocus(this)">`;
                                SUBTOTAL.innerHTML = 'Rp 0,00';
                                AKSI.innerHTML = `<a data-popup='tooltip' title='Hapus Tindakan' type='button' onclick="deleteTindakan(this)" class='btn btn-danger btn-icon'><i class='glyphicon glyphicon-trash'></i></a>`;

                                KODETARIF.innerHTML = setKodeTarifOpsional();
                                JENISTINDAKAN.innerHTML = 'TAMBAHAN';
                                KODETINDAKAN.innerHTML = '0000000';
                                DATABARU.innerHTML = 'Y';
                                HIDDENJML.innerHTML = '1';
                                DATAEDIT.innerHTML = 'T';
                                EDITOPERATOR.innerHTML = '';
                                IDDETAIL.innerHTML = '';
                                USERTGL.innerHTML = "";
                                $("#selecttindakan").val("-").trigger('change');
                                $('.select-2').select2();
                            }
                        });
                }
            }

            function setKodeTarifOpsional() {
                let getDate = new Date();
                let dd = String(getDate.getDate()).padStart(2, '0');
                let mm = String(getDate.getMonth() + 1).padStart(2, '0');
                let yy = getDate.getFullYear().toString();
                let HH = String(getDate.getHours()).padStart(2, '0');
                let MM = String(getDate.getMinutes()).padStart(2, '0');
                let SS = String(getDate.getSeconds()).padStart(2, '0');
                return yy.substr(-2) + mm + dd + HH + MM + SS;
            }

            function setDataOperator(op) {
                let dataOperator = "";
                let arr_op = op != "" ? op.split(";") : "";
                $.ajax({
                    async: false,
                    url: "<?php echo base_url('tindakan/getDataOperator'); ?>",
                    dataType: "JSON",
                    success: function(data) {
                        data.forEach(o => {
                            if (o.operator != "-") {
                                let selected_op = arr_op.indexOf(o.operator) != -1 ? "selected" : "";
                                // let selected_op = op.search(o.operator)>=0?"selected":"";
                                dataOperator += `<option value="${o.operator}" ${selected_op}>${o.operator}</option>`;
                            }
                        });
                    }
                });
                return `<select style="width:100%;" multiple="multiple" class="select select-2" data-placeholder="-- Pilih Operator --${nbsp(20)}" onchange="changeSelect('operator', this)">
                    ${dataOperator}
                </select>`;
            }

            function inputTarif(element) {
                const table = _("tbl_tindakan");
                let row = $(element).closest('td').parent()[0].sectionRowIndex;
                let input = $(element).val().replace(/[^0-9]+/g, '');
                $(element).val(input);
                let jml = table.tBodies[0].rows[row].cells[11].innerText;
                let subtotal = jml * input;
                table.tBodies[0].rows[row].cells[5].innerHTML = tambahRP(subtotal);
                _("subtotal").innerHTML = subTotal();

                var evtobj = window.event ? event : element
                if (evtobj.keyCode == 13) {
                    $(element).blur();
                    $(element).val(tambahRP(input));
                }

                let databaru = table.tBodies[0].rows[row].cells[10].innerText;
                if (databaru === 'X') {
                    table.tBodies[0].rows[row].cells[12].innerHTML = 'E';
                }
            }

            function gantiFormatBlur(element) {
                let input = $(element).val();
                $(element).val(tambahRP(input));
            }

            function gantiFormatFocus(element) {
                let input = $(element).val();
                if (input.substring(0, 2) == 'Rp') {
                    $(element).val(hapusRP(input));
                }
            }

            function subTotal() {
                const table = _("tbl_tindakan");
                let row_count = table.tBodies[0].rows.length;
                let tempTotal = [];

                for (let brs = 0; brs < row_count; brs++) {
                    tempTotal.push(hapusRP(table.tBodies[0].rows[brs].cells[5].innerText));
                }
                let subtotal = 0;
                tempTotal.forEach(function(t) {
                    subtotal += t;
                });
                return tambahRP(subtotal);
            }

            function hitungSubtotal(element) {
                const table = _("tbl_tindakan");
                let row = $(element).closest('td').parent()[0].sectionRowIndex;
                let jml = $(element).val();
                let kode = table.tBodies[0].rows[row].cells[7].innerText;
                let gettarif = kode.length == 12 ? table.tBodies[0].rows[row].cells[4].children[0].value : table.tBodies[0].rows[row].cells[4].innerText;
                let tarif = hapusRP(gettarif);
                let subtotal = jml * tarif;
                table.tBodies[0].rows[row].cells[5].innerHTML = tambahRP(subtotal);
                table.tBodies[0].rows[row].cells[11].innerHTML = jml;
                _("subtotal").innerHTML = subTotal();
                let databaru = table.tBodies[0].rows[row].cells[10].innerText;
                if (databaru === 'X') {
                    table.tBodies[0].rows[row].cells[12].innerHTML = 'E';
                }
            }

            function deleteTindakan(element) {
                const table = _("tbl_tindakan");
                let row = $(element).closest('td').parent()[0].sectionRowIndex;
                let tindakanvalue = table.tBodies[0].rows[row].cells[1].innerText;
                let iddetailtindakan = table.tBodies[0].rows[row].cells[14].innerText;
                let databaru = table.tBodies[0].rows[row].cells[10].innerText;
                let notindakanvalue = $("#notindakan").val();
                swal({
                        title: "Hapus Tindakan " + tindakanvalue,
                        text: "Apakah Yakin Dihapus?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#EF5350",
                        confirmButtonText: "YA",
                        cancelButtonText: "TIDAK",
                        closeOnConfirm: true,
                        closeOnCancel: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            if (databaru === 'X') {
                                _("tindakanhapus").value = _("tindakanhapus").value + ";" + iddetailtindakan;
                            }
                            table.deleteRow(row + 1);
                            _("subtotal").innerHTML = subTotal();
                        }
                    });
            }

            function getValueTindakanOperasi(table, cell, input) {
                let row_count = table.tBodies[0].rows.length;
                let row = [];
                for (let brs = 0; brs < row_count; brs++) {
                    var cell_ = table.tBodies[0].rows[brs].cells[0].children[0];
                    if (table.tBodies[0].rows[brs].cells[cell].innerText === input) {
                        row.push({
                            "iddetail": table.tBodies[0].rows[brs].cells[14].innerText,
                            "operator": table.tBodies[0].rows[brs].cells[13].innerText,
                            "kodetarif": table.tBodies[0].rows[brs].cells[7].innerText,
                            "tindakan": table.tBodies[0].rows[brs].cells[7].innerText.length == 12 ? table.tBodies[0].rows[brs].cells[1].children[0].value : table.tBodies[0].rows[brs].cells[1].innerText,
                            "jenistindakan": table.tBodies[0].rows[brs].cells[8].innerText,
                            "kelas": table.tBodies[0].rows[brs].cells[2].innerText,
                            "tarif": table.tBodies[0].rows[brs].cells[7].innerText.length == 12 ? hapusRP(table.tBodies[0].rows[brs].cells[4].children[0].value) : hapusRP(table.tBodies[0].rows[brs].cells[4].innerText),
                            "subtotaltindakan": hapusRP(table.tBodies[0].rows[brs].cells[5].innerText),
                            "kodetindakan": table.tBodies[0].rows[brs].cells[9].innerText,
                            "jmltindakan": table.tBodies[0].rows[brs].cells[11].innerText,
                            "idtgluser": table.tBodies[0].rows[brs].cells[15].innerText
                        });
                    }
                }
                return row;
            }

            function getValidasiTableValue(table, input, cell) {
                let row_count = table.tBodies[0].rows.length;
                let row = "";
                for (let brs = 0; brs < row_count; brs++) {
                    let data = typeof table.tBodies[0].rows[brs].cells[cell].children[0] !== 'undefined' ? table.tBodies[0].rows[brs].cells[cell].children[0].value : table.tBodies[0].rows[brs].cells[cell].innerText;
                    if (data === input) {
                        row += brs;
                    }
                }
                return row;
            }

            function insupTindakanOperasi() {
                let noregistrasiop = _("noregop").value;
                let notindakanop = _("notindakanoperasi").value;
                let jenis = notindakanop == "" ? "insert" : "update";
                let iduser = _("iduserop").value;
                let tgluser = _("tgluserop").value;
                let tgltindakanop = _("tgltindakanop").value;
                let jamtindakanop = _("jamtindakanop").value;
                let pemakaianimplan = _("selectpakaiimplan").value;
                let jenisimplan = $("#selectimplan").val();
                let totaltarif = hapusRP(_("subtotal").innerText);
                const table = _("tbl_tindakan");
                let datatindakanbaru = getValueTindakanOperasi(table, 10, 'Y');
                let datatindakanedit = getValueTindakanOperasi(table, 12, 'E');
                // console.log(datatindakanbaru);
                let row_count = table.tBodies[0].rows.length;
                if (tgltindakanop == "") {
                    swal({
                        title: "Tgl. Tindakan Operasi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("tgltindakanop").focus()
                    });
                } else if (jamtindakanop == "") {
                    swal({
                        title: "Jam Tindakan Operasi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("jamtindakanop").focus()
                    });
                } else if (pemakaianimplan == "-") {
                    swal({
                        title: "Pemakaian Implan",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("selectpakaiimplan").focus()
                    });
                } else if (pemakaianimplan == "YA" && jenisimplan == null) {
                    swal({
                        title: "Jenis Implan",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error",
                        onClose: _("selectimplan").focus()
                    });
                } else if (row_count == 0) {
                    swal({
                        title: "Tindakan Operasi",
                        text: "Tidak Boleh Kosong!",
                        confirmButtonColor: "#EF5350",
                        type: "error"
                    });
                } else {
                    let operator = getValidasiTableValue(table, "", 13);
                    let tarif = getValidasiTableValue(table, "Rp 0,00", 5);
                    let tarif2 = getValidasiTableValue(table, "", 5);
                    let tindakanhapus = _("tindakanhapus").value;
                    if (operator == "") {
                        if (tarif == "" && tarif2 == "") {
                            let datatindakanbaru = getValueTindakanOperasi(table, 10, 'Y');
                            let datatindakanedit = getValueTindakanOperasi(table, 12, 'E');
                            swal({
                                    title: "Tindakan Operasi",
                                    text: "Apakah Yakin Simpan?",
                                    type: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#EF5350",
                                    confirmButtonText: "YA",
                                    cancelButtonText: "TIDAK",
                                    closeOnConfirm: false,
                                    closeOnCancel: true
                                },
                                function(isConfirm) {
                                    if (isConfirm) {
                                        let arr_data = {
                                            jenis: jenis,
                                            notindakanop: notindakanop,
                                            iduser: iduser,
                                            tgluser: tgluser,
                                            tgltindakanop: formatTanggal("tgltindakanop", "jamtindakanop"),
                                            pemakaianimplan: pemakaianimplan,
                                            jenisimplan: jenisimplan,
                                            totaltarif: totaltarif,
                                            datatindakanedit: datatindakanedit,
                                            datatindakanbaru: datatindakanbaru,
                                            tindakanhapus: tindakanhapus
                                        };
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo base_url('tindakan/insupTindakanOperasi'); ?>",
                                            data: {
                                                arr_data: arr_data
                                            },
                                            dataType: "JSON",
                                            success: function(data) {
                                                console.log(data);
                                                swal({
                                                    title: "Berhasil",
                                                    text: "Data Disimpan",
                                                    confirmButtonColor: "#66BB6A",
                                                    type: "success",
                                                    onClose: getTindakanOperasi(noregistrasiop)
                                                });
                                            },
                                            error: function(data) {
                                                console.log(data);
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
                        } else {
                            swal({
                                title: "Tarif Tindakan",
                                text: "Tidak Boleh Kosong!",
                                confirmButtonColor: "#EF5350",
                                type: "error"
                            });
                        }
                    } else {
                        swal({
                            title: "Operator Tindakan",
                            text: "Tidak Boleh Kosong!",
                            confirmButtonColor: "#EF5350",
                            type: "error"
                        });
                    }
                }
            }
            //END TINDAKAN OPERASI


            //BEGIN GLOBAL
            function getTableValue(table, input, cell) {
                let row_count = table.tBodies[0].rows.length;
                let row = "";
                for (let brs = 0; brs < row_count; brs++) {
                    let data = typeof table.tBodies[0].rows[brs].cells[cell].children[0] !== 'undefined' ? table.tBodies[0]
                        .rows[brs].cells[cell].children[0].value : table.tBodies[0].rows[brs].cells[cell].innerText;
                    if (data === input) {
                        row += brs;
                    }
                }
                return row;
            }


            function konfirmasiSelesai() {
                swal({
                        title: "Selesai Tindakan",
                        text: "Apakah Yakin Selesai Melakukan Tindakan?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#EF5350",
                        confirmButtonText: "YA",
                        cancelButtonText: "TIDAK",
                        closeOnConfirm: false,
                        closeOnCancel: true
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            let statusop = 4;
                            let noregop = _("noregop").value;
                            $.ajax({
                                type: "POST",
                                url: "<?php echo base_url('tindakan/konfirmasiSelesaiTindakan'); ?>",
                                data: {
                                    noregop: noregop,
                                    statusop: statusop
                                },
                                success: function(data) {
                                    console.log(data);
                                    swal({
                                        title: "Berhasil",
                                        text: "Data Disimpan",
                                        confirmButtonColor: "#66BB6A",
                                        type: "success",
                                        onClose: clearForm()
                                    });
                                    setCount();
                                },
                                error: function(response) {
                                    console.log(response);
                                    swal({
                                        title: "Gagal",
                                        text: "Data Tidak Disimpan!",
                                        confirmButtonColor: "#EF5350",
                                        type: "error"
                                    });
                                }
                            });
                        }
                    }
                );
            }

            function clearForm() {
                //PASIEN
                _("nama").value = "";
                _("norm").value = "";
                _("tmptgllahir").value = "";
                _("umur").value = "";
                _("jk").value = "";
                _("alamat").value = "";
                _("nodaftar").value = "";
                _("tgldaftar").value = "";
                _("noreg").value = "";
                _("tglreg").value = "";
                _("instalasi").value = "";
                _("ruangpoli").value = "";
                _("kelas").value = "";
                _("carabayar").value = "";
                _("penjamin").value = "";
                _("jenisop").innerHTML = "";
                _("jenisop").className = 'label label-default';
                _("keterangan").value = "";
                _("noregop").value = "";
                _("tglregop").value = "";
                _("dokterpengirim").value = "";
                _("wktpesanop").value = "";
                _("wktpelaksanaan").value = "";
                _("btn_selesai").disabled = true;
                //DIAGNOSA
                _("iddiagnosa").value = "";
                _("iduserdiagnosa").value = "";
                _("tgluserdiagnosa").value = "";
                $('#selectsarscovid').val("-").trigger('change');
                _("selectsarscovid").disabled = true;
                $('#selectdokterdiagnosapra').val("-").trigger('change');
                _("selectdokterdiagnosapra").disabled = true;
                $('#diagnosapre').val("").trigger('change');
                _("diagnosapre").disabled = true;
                $('#selectdokterdiagnosapost').val("-").trigger('change');
                _("selectdokterdiagnosapost").disabled = true;
                $('#diagnosapost').val("-").trigger('change');
                _("diagnosapost").disabled = true;
                _("btn_tambah_diagnosa").disabled = true;
                _('tbl_diagnosa').getElementsByTagName('tbody')[0].innerHTML = '';
                _("btn_simpan_diagnosaprapost").disabled = true;

                //TINDAKAN OPERASI
                _("notindakanoperasi").value = "";
                _("iduserop").value = "";
                _("tgluserop").value = "";
                _("tgltindakanop").value = "";
                _("tgltindakanop").disabled = true;
                _("jamtindakanop").value = "";
                _("jamtindakanop").disabled = true;
                $('#selectpakaiimplan').val("-").trigger('change');
                _("selectpakaiimplan").disabled = true;
                $('#selectkelastindakan').val("-").trigger('change');
                _("selectkelastindakan").disabled = true;
                _("btn_tambah").disabled = true;
                _("tindakanhapus").value = "";
                _('tbl_tindakan').getElementsByTagName('tbody')[0].innerHTML = '';
                _("subtotal").innerHTML = "Rp 0,00";
                _("btn_simpan_tindakan").disabled = true;
            }
            //END GLOBAL
        </script>
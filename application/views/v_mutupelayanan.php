<!-- Main content -->
<div class="content-wrapper">

    <!-- Float buttons with text -->
    <div class="page-header page-header-default">
        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard') ?>"><i class="icon-home2 position-left"></i> Beranda</a></li>
                <li class="active">Mutu Pelayanan</li>
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
                                                <label><b>Tgl. Operasi</b></label>
                                                <input id="tglop" type="text" class="form-control" style="color:black" disabled="disabled">
                                            </div>
                                            <div class="form-group">
                                                <label><b>Operator</b></label>
                                                <textarea id="dokterop" rows="3" cols="5" class="form-control" disabled="disabled" style="color:black"></textarea>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h6 class="panel-title">KESELAMATAN PASIEN</h6>
                    </div>
                    <form role="form" class="form-horizontal">
                        <div class="modal-body">
                            <div class="modal-body">
                                <fieldset>
                                    <legend class="text-semibold"><i class="fa fa-hospital-o position-left" style="font-size:16px"></i>RUANG PERAWATAN</legend>
                                    <input type="hidden" id="hidden_mutu">
                                    <input type="hidden" id="hidden_iduser">
                                    <input type="hidden" id="hidden_tgluser">
                                    <div class="form-group">
                                        <label><b>Ruang Perawatan</b></label>
                                        <select data-placeholder='' class='select-search' id='select_ruang_perawatan'>
                                            <option value="-">-- Pilih Ruang Perawatan --</option>
                                            <?php foreach($rawatinap AS $ri){?>
                                                <option value="<?php echo $ri->kode;?>"><?php echo strtoupper($ri->rawatinap);?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </fieldset>
                                <br>
                                <fieldset>
                                    <legend class="text-semibold"><img style="float: left; width: 20px; height: auto; margin-right: 6px;" src="<?php echo base_url(); ?>/template/assets/css/icons/health-insurance.svg"></i>KESELAMATAN PASIEN</legend>
                                    <div class="form-group">
                                        <label><b>Apakah Terdapat Insiden?</b></label>
                                        <select data-placeholder='' class='select' id='select_insiden'>
                                            <option value="-">-- Pilih Insiden Pasien --</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Kronologi Insiden</b></label>
                                        <textarea id="kronologi_insiden" rows="3" cols="5" class="form-control" style="color:black"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Jenis Insiden</b></label>
                                        <select class='select-search' id='select_jenis_insiden'>
                                            <option value="-">-- Pilih Jenis Insiden --</option>
                                            <option value="KTD">KTD</option>
                                            <option value="KPC">KPC</option>
                                            <option value="KTC">KTC</option>
                                            <option value="KNC">KNC</option>
                                            <option value="SENTINEL">SENTINEL</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Tindakan Sementara yang Sudah Dilakukan</b></label>
                                        <textarea id="tindakan_sementara" rows="3" cols="5" class="form-control" style="color:black"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Permasalahan Saat Operasi Berlangsung</b></label>
                                        <textarea id="permasalahan_operasi" rows="3" cols="5" class="form-control" style="color:black"></textarea>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Site Marking</b></label>
                                        <select data-placeholder='' class='select' id='select_site_marking'>
                                            <option value="-">-- Pilih Site Marking --</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                            <option value="TIDAK DIPERLUKAN">TIDAK DIPERLUKAN</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Pemakaian Gelang Pasien</b></label>
                                        <select data-placeholder='' class='select' id='select_pemakaian_gelang'>
                                            <option value="-">-- Pilih Pemakaian Gelang Pasien --</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Kesesuaian Identitas dan Gelang Pasien</b></label>
                                        <select data-placeholder='' class='select' id='select_kesesuaian_identitas'>
                                            <option value="-">-- Pilih Kesesuaian Identitas --</option>
                                            <option value="SESUAI">SESUAI</option>
                                            <option value="TIDAK SESUAI">TIDAK SESUAI</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Kejadian Pasien Jatuh</b></label>
                                        <select data-placeholder='' class='select' id='select_pasien_jatuh'>
                                            <option value="-">-- Pilih Kejadian Pasien Jatuh --</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Apakah ada Benda Asing Tertinggal?</b></label>
                                        <select data-placeholder='' class='select' id='select_benda_asing'>
                                            <option value="-">-- Pilih Tertinggalnya Benda Asing --</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>DOT (Death On Table)</b></label>
                                        <select data-placeholder='' class='select' id='select_dot'>
                                            <option value="-">-- Pilih Kejadian DOT --</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Discrepancy Operasi</b></label>
                                        <select data-placeholder='' class='select' id='select_discrepancy'>
                                            <option value="-">-- Pilih Discrepancy Operasi --</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Re Operasi dengan Diagnosa yang sama</b></label>
                                        <select data-placeholder='' class='select' id='select_reoperasi'>
                                            <option value="-">-- Pilih Re Operasi --</option>
                                            <option value="IYA">IYA</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Apakah Operasi Ditunda dari Hari Sebelumnya?</b></label>
                                        <select data-placeholder='' class='select' id='select_tunda_operasi'>
                                            <option value="-">-- Pilih Tunda Operasi --</option>
                                            <option value="IYA (Bukan Indikasi Medis)">IYA (Bukan Indikasi Medis)</option>
                                            <option value="TIDAK">TIDAK</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Kelengkapan Asesmen Pra Bedah</b></label>
                                        <select data-placeholder='' class='select' id='select_asesmen'>
                                            <option value="-">-- Pilih Kelengkapan Asesmen --</option>
                                            <option value="LENGKAP">LENGKAP</option>
                                            <option value="TIDAK LENGKAP">TIDAK LENGKAP</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label><b>Sign Out</b></label>
                                        <select class='select-search' id='select_signout'>
                                            <option value="-">-- Pilih Sign Out --</option>
                                            <option value="Salah Prosedur">Salah Prosedur</option>
                                            <option value="Salah Sisi Operasi">Salah Sisi Operasi</option>
                                            <option value="Benda Tertinggal">Benda Tertinggal</option>
                                            <option value="Opsi 4">Opsi 4</option>
                                            <option value="Salah Orang">Salah Orang</option>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="modal-footer">
                                <hr>
                                <button type="button" class="btn btn-success btn-labeled" id="btn_simpan_diagnosaprapost" onclick="insupMutuPelayanan()"><b><i class="glyphicon glyphicon-floppy-saved"></i></b>SIMPAN</button>
                            </div>
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
    $(document).ready(function () {
        getDetail(_("noregop").value);
        
    });

    function getDetailPasien(norm){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('mutupelayanan/getDetailPasien');?>",
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
            url: "<?php echo base_url('mutupelayanan/getDetailAsalPasien');?>",
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
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('mutupelayanan/getDetailPemesananOperasi');?>",
            dataType: "JSON",
            data: {noregop:noregop},
            success: function (data) {
                if(data!=null){
                    _("jenisop").innerHTML=data.jenisop;
                    _("jenisop").className = "label label-"+data.warnajenisop;
                    _("instalasi").value=data.instalasi;
                    _("noregop").value=data.noregistrasiop;
                    $('#tglop').val(data.tgljadwalop);
                    $('#tglregop').val(data.tglregistrasiop);
                    if(data.dokterop!=null){
                        let getoperator=data.dokterop;
                        let operator=Array.from(new Set(getoperator.split(";"))).join("\n-  ").substring(1);
                        _("dokterop").value=operator;
                    }
                    _('keterangan').value=data.keterangan==""?"-":data.keterangan;

                    getDetailPasien(data.norm);
                    getDetailAsalPasien(data.noregistrasi);
                    getMutuPelayanan(data.noregistrasiop);
                    localStorage.setItem("noregistrasiokparu", data.noregistrasiop);
                    window.history.pushState("", "", '/ok_paru/mutupelayanan');
                }else{
                    getDetail(localStorage.getItem("noregistrasiokparu"));
                }

            }
        });
    }

    function getMutuPelayanan(noregop){
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('mutupelayanan/getMutuPelayanan');?>",
            dataType: "JSON",
            data: {noregop:noregop},
            success: function (data) {
                if(data!=null){
                    $("#select_ruang_perawatan").val(data.ruangperawatan == null ? "-" : data.ruangperawatan).trigger("change");
                    $("#select_insiden").val(data.terdapatinsiden == null ? "-" : data.terdapatinsiden).trigger("change");
                    _("kronologi_insiden").value=data.kronologiinsiden;
                    $("#select_jenis_insiden").val(data.jenisinsiden == null ? "-" : data.jenisinsiden).trigger("change");
                    _("tindakan_sementara").value=data.tindakansementara;
                    _("permasalahan_operasi").value=data.permasalahanop;
                    $("#select_site_marking").val(data.sitemarking == null ? "-" : data.sitemarking).trigger("change");
                    $("#select_pemakaian_gelang").val(data.gelangpasien == null ? "-" : data.gelangpasien).trigger("change");
                    $("#select_kesesuaian_identitas").val(data.sesuaiidentitas == null ? "-" : data.sesuaiidentitas).trigger("change");
                    $("#select_pasien_jatuh").val(data.pasienjatuh == null ? "-" : data.pasienjatuh).trigger("change");
                    $("#select_benda_asing").val(data.bendaasing == null ? "-" : data.bendaasing).trigger("change");
                    $("#select_dot").val(data.dot == null ? "-" : data.dot).trigger("change");
                    $("#select_discrepancy").val(data.discrepancyop == null ? "-" : data.discrepancyop).trigger("change");
                    $("#select_reoperasi").val(data.reoperasi == null ? "-" : data.reoperasi).trigger("change");
                    $("#select_tunda_operasi").val(data.tundaop == null ? "-" : data.tundaop).trigger("change");
                    $("#select_asesmen").val(data.lengkapasesmen == null ? "-" : data.lengkapasesmen).trigger("change");
                    $("#select_signout").val(data.signout == null ? "-" : data.signout).trigger("change");
                    _("hidden_mutu").value=data.id;
                    _("hidden_iduser").value=data.iduser;
                    _("hidden_tgluser").value=data.tgluser;
                }
            }
        });
    }

    function insupMutuPelayanan(){
        let noregop=_("noregop").value;
        let ruangperawatan=_("select_ruang_perawatan").value;
        let insidenpasien=_("select_insiden").value;
        let kronologiinsiden=_("kronologi_insiden").value;
        let jenisinsiden=_("select_jenis_insiden").value;
        let tindakansementara=_("tindakan_sementara").value;
        let permasalahanop=_("permasalahan_operasi").value;
        let sitemarking=_("select_site_marking").value;
        let gelangpasien=_("select_pemakaian_gelang").value;
        let sesuaiidentitas=_("select_kesesuaian_identitas").value;
        let pasienjatuh=_("select_pasien_jatuh").value;
        let bendaasing=_("select_benda_asing").value;
        let dot=_("select_dot").value;
        let discrepancyop=_("select_discrepancy").value;
        let reoperasi=_("select_reoperasi").value;
        let tundaop=_("select_tunda_operasi").value;
        let lengkapasesmen=_("select_asesmen").value;
        let signout=_("select_signout").value;

        let id=_("hidden_mutu").value;
        let iduser=_("hidden_iduser").value;
        let tgluser=_("hidden_tgluser").value;

        if(ruangperawatan=="-"){
            swal({
                title: "Ruang Perawatan",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_ruang_perawatan").focus()
            });
        } else if (insidenpasien == "-") {
            swal({
                title: "Insiden Pasien",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_insiden").focus()
            });
        } else if (sitemarking == "-") {
            swal({
                title: "Site Marking",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_site_marking").focus()
            });
        } else if (gelangpasien == "-") {
            swal({
                title: "Pemakaian Gelang Pasien",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_pemakaian_gelang").focus()
            });
        } else if (sesuaiidentitas == "-") {
            swal({
                title: "Kesesuaian Identitas",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_kesesuaian_identitas").focus()
            });
        } else if (pasienjatuh == "-") {
            swal({
                title: "Kejadian Pasien Jatuh",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_pasien_jatuh").focus()
            });
        } else if (bendaasing == "-") {
            swal({
                title: "Tertinggalnya Benda Asing",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_benda_asing").focus()
            });
        } else if (dot == "-") {
            swal({
                title: "DOT (Death On Table)",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_dot").focus()
            });
        } else if (discrepancyop == "-") {
            swal({
                title: "Discrepancy Operasi",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_discrepancy").focus()
            });
        } else if (reoperasi == "-") {
            swal({
                title: "Re Operasi dengan Diagnosa yang sama",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_reoperasi").focus()
            });
        } else if (tundaop == "-") {
            swal({
                title: "Operasi Ditunda dari Hari Sebelumnya",
                text: "Tidak Boleh Kosong!",
                confirmButtonColor: "#EF5350",
                type: "error",
                onClose: _("select_tunda_operasi").focus()
            });
        } else {
            swal({
                title: "Insiden Keselamatan Pasien",
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
                        noregop:noregop,
                        ruangperawatan: ruangperawatan,
                        insidenpasien: insidenpasien,
                        kronologiinsiden: kronologiinsiden,
                        jenisinsiden: jenisinsiden,
                        tindakansementara: tindakansementara,
                        permasalahanop: permasalahanop,
                        sitemarking: sitemarking,
                        gelangpasien: gelangpasien,
                        sesuaiidentitas: sesuaiidentitas,
                        pasienjatuh: pasienjatuh,
                        bendaasing: bendaasing,
                        dot: dot,
                        discrepancyop: discrepancyop,
                        reoperasi: reoperasi,
                        tundaop: tundaop,
                        lengkapasesmen: lengkapasesmen,
                        signout: signout,
                        id: id,
                        iduser: iduser,
                        tgluser: tgluser
                    };

                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('mutupelayanan/insupMutuPelayanan'); ?>",
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
                                onClose: getMutuPelayanan(_("noregop").value)
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

    window.addEventListener('popstate', function (event) {
        document.location = "<?php echo base_url(); ?>operasiselesai";
    });
</script>
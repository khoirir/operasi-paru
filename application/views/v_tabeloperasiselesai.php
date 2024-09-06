<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>OK Paru - RSUKH</title>
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>template/assets/images/logorskh2.png">
</head>
<body>
   <table id='data_operasi' summary="Code page support in different versions of MS Windows." rules="groups" frame="hsides" border="1">
      <caption><h3>LAPORAN PASIEN OK PARU<br><?php echo date("d-m-Y",strtotime($tgl_awal))." S/D ".date("d-m-Y",strtotime($tgl_akhir));?></h3></caption>
      <thead>
         <tr>
            <th style='text-align:center;'>No.</th>
            <th style='text-align:center;'>Nama Pasien</th>
            <th style='text-align:center;'>No. RM</th>
            <th style='text-align:center;'>Tgl. MRS</th>
            <th style='text-align:center;'>Tgl. Operasi</th>
            <th style='text-align:center;'>Jenis Kelamin</th>
            <th style='text-align:center;'>Kedatangan Awal Pasien</th>
            <th style='text-align:center;'>Ruang Perawatan</th>
            <th style='text-align:center;'>Kategori Operasi</th>
            <th style='text-align:center;'>Kelengkapan Asesmen Pra bedah</th>
            <th style='text-align:center;'>Diagnosa Pre Op</th>
            <th style='text-align:center;'>Diagnosa Post Op</th>
            <th style='text-align:center;'>SARS COVID</th>
            <th style='text-align:center;'>Operator</th>
            <th style='text-align:center;'>Tarif Tindakan</th>
            <th style='text-align:center;'>Pemakaian Implan</th>
            <th style='text-align:center;'>Jenis Implan</th>
            <th style='text-align:center;'>Site Marking</th>
            <th style='text-align:center;'>Pemakaian Gelang Pasien</th>
            <th style='text-align:center;'>Kesesuaian identitas dan Gelang Pasien</th>
            <th style='text-align:center;'>Discrepancy Operasi</th>
            <th style='text-align:center;'>Kejadian Pasien Jatuh</th>
            <th style='text-align:center;'>Tertinggalnya Benda Asing</th>
            <th style='text-align:center;'>DOT (Death On Table)</th>
            <th style='text-align:center;'>Re Operasi Dengan Diagnosa Sama</th>
            <th style='text-align:center;'>Apakah terdapat insiden terkait pasien ini ?</th>
            <th style='text-align:center;'>Kronologi Insiden</th>
            <th style='text-align:center;'>Apakah Operasi di tunda dari hari sebelumnya?</th>
            <th style='text-align:center;'>Sign Out</th>
            <th style='text-align:center;'>Tindakan sementara yang sudah dilakukan</th>
            <th style='text-align:center;'>Jenis insiden</th>
            <th style='text-align:center;'>Permasalahan Saat Operasi Berlangsung</th>
         </tr>
      </thead>
      <?php
         $no=1;
         $row=2;
         foreach ($operasi_selesai AS $v) {
            $jk=strtolower($v->jk)=='p'?"Perempuan":"Laki-Laki";
            $diagnosapra=$v->diagnosapra!=null?join("; ",explode(";",substr($v->diagnosapra,1))):"";
            $diagnosapost=$v->diagtnosapost!=null?join("; ",explode(";",substr($v->diagtnosapost,1))):"";
            $asal_pasien=$v->instalasi." / ".$v->unit;
            $data_detail=$this->m_operasiselesai->getDetailTarifOperasi($v->notinop);
            $get_operator='';
            $get_tarif_tindakan='';
            foreach ($data_detail AS $vd) {
                  $get_operator.= ";".$vd->operator;
                  $get_tarif_tindakan.="; ".$vd->tindakan." (Rp ".number_format($vd->subtotal,2,',','.').")";
            }
            $set_operator = implode("<br/>"."- ",array_unique(explode(";",$get_operator)));
            $operator = substr($set_operator,5);
            $set_tarif_tindakan = implode("<br/>"."- ",explode(";",$get_tarif_tindakan));
            $tarif_tindakan = substr($set_tarif_tindakan,5);
            $jenisimplan=$v->jenisimplan!=null?join("; ",explode(";",substr($v->jenisimplan,1))):"";
      ?>
      <tbody>
         <tr>
            <td style='text-align:center; vertical-align: middle;'><?php echo $no;?></td>
            <td style='vertical-align: middle;'><?php echo $v->pasien; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo "&nbsp;".$v->norm; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->tglmrs; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->tglop; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $jk; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $asal_pasien; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->ruangperawatan; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->jenisop; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->lengkapasesmen; ?></td>
            <td style='vertical-align: middle;'><?php echo $diagnosapra; ?></td>
            <td style='vertical-align: middle;'><?php echo $diagnosapost; ?></td>
            <td style='vertical-align: middle;'><?php echo $v->sarscovid; ?></td>
            <td style='vertical-align: middle;'><?php echo $operator; ?></td>
            <td style='vertical-align: middle;'><?php echo $tarif_tindakan; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->pakaiimplan; ?></td>
            <td style='vertical-align: middle;'><?php echo $jenisimplan; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->sitemarking; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->pemakaiangelang; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->kesesuaianidentitas; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->discrepancyop; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->pasienjatuh; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->bendaasing; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->dot; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->reoperasi; ?></td>
            <td style='vertical-align: middle;'><?php echo $v->insidenpasien; ?></td>
            <td style='vertical-align: middle;'><?php echo $v->kronologiinsiden; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->tundaop; ?></td>
            <td style='text-align:center; vertical-align: middle;'><?php echo $v->signout; ?></td>
            <td style='vertical-align: middle;'><?php echo $v->tindakansementara; ?></td>
            <td style='vertical-align: middle;'><?php echo $v->jenisinsiden; ?></td>
            <td style='vertical-align: middle;'><?php echo $v->permasalahanop; ?></td>
         </tr>
      </tbody>
      <?php
            $no++;
            $row++;
         }
      ?>
   </table>
</body>
</html>

<script type="text/javascript" src="<?php echo base_url(); ?>template/assets/js/core/libraries/jquery.min.js"></script>
<script type = "text/javascript" >
   var file_name="<?php echo 'pasien_ok_paru_'.date('Y-m-d',strtotime($tgl_awal)).'_'.date('Y-m-d',strtotime($tgl_akhir));?>";
   $(document).ready(function () {
      tableToExcel('data_operasi','pasien_ok_paru');
      window.close();
   });
   var tableToExcel = (function() {
      var uri = 'data:application/vnd.ms-excel;base64,'
      var template = `<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
                        <head>
                           <!--[if gte mso 9]>
                              <xml>
                                 <x:ExcelWorkbook>
                                    <x:ExcelWorksheets>
                                       <x:ExcelWorksheet>
                                          <x:Name>{worksheet}</x:Name>
                                          <x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions>
                                       </x:ExcelWorksheet>
                                    </x:ExcelWorksheets>
                                 </x:ExcelWorkbook>
                              </xml>
                           <![endif]-->
                        </head>
                        <body>
                           <table border="1">{table}</table>
                        </body>
                     </html>`
      var base64 = function(s) {
         return window.btoa(unescape(encodeURIComponent(s)))
      }
      var format = function(s, c) {
         return s.replace(/{(\w+)}/g, function(m, p) {
            return c[p];
         })
      }
      return function(table,name) {
         if (!table.nodeType) 
            table = document.getElementById(table)
         var ctx = {
            worksheet: name,
            table: table.innerHTML
         }
         var a = document.createElement('a');
         a.href = uri + base64(format(template, ctx));
         a.download = file_name;
         a.click();
      }
   })()
</script>
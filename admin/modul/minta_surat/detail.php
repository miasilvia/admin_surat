<?php
include "../../../config/koneksi.php";
if ($_POST['idx']) {
  $id = $_POST['idx'];
  $detail = mysqli_query($konek, "SELECT * FROM permintaan WHERE id_permintaan='$id'");
  $r = mysqli_fetch_array($detail);
  $data = mysqli_query($konek, "SELECT * from nomor_surat  order by no_urut DESC LIMIT 0,1");
  $i = mysqli_fetch_array($data);
  // ID OTOMATIS//***************************************************
  $kode2 = substr($i['no_urut'], 0) + 1;

  if ($kode2 < 10) {
    $kode = '000' . $kode2;
  } elseif ($kode2 > 9 && $kode2 <= 99) {
    $kode = '00' . $kode2;
  } else {
    $kode = '0' . $kode2;
  }
  $tgl_sekarng = date('Y-m-d');
  $tahun = date('Y');
?>
  <div id='collapse4' class='body'>
    <?php echo "
               <div id='div-1' class='body'>
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/minta_surat/aksi_mintasurat.php?act=input' enctype='multipart/form-data' >
<br/>
<input type=hidden name=id value=$r[id_permintaan]>
                 <div class='form-group'>
                        <label class='control-label col-lg-3' for='dpYears'>Tanggal Minta</label>

                        <div class='col-lg-6'>
                            <div class='input-group input-append date' id='dpYears' data-date='$r[tgl_minta]'
                                 data-date-format='yyyy-mm-dd'>
                                <input name='tgl_minta' class='form-control' type='text' value='$r[tgl_minta]' readonly>
                                <span class='input-group-addon add-on'><i class='fa fa-calendar'></i></span>
                            </div>
                        </div>
                    </div>
                <div class='form-group'>
                        <label class='control-label col-lg-3' for='dp3'>Tanggal Surat</label>

                        <div class='col-lg-6'>
                            <div class='input-group input-append date' id='dp3' data-date='$r[tgl_surat]'
                                 data-date-format='yyyy-mm-dd'>
                                <input name='tgl_surat' class='form-control' type='text' value='$r[tgl_surat]' readonly>
                                <span class='input-group-addon add-on'><i class='fa fa-calendar'></i></span>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-3'>Nomor Urut</label>
                    <div class='col-lg-2'>
                        <input required='required' type='text' name='no_urut' value='$kode'  class='form-control'>
                    </div>
             

                    <div class='col-lg-2'>
                        <input required='required' name='pengajuan' type='text' value='PL42' id='text1' placeholder='' class='form-control'>
                    </div>


                <div class='col-lg-3'>
                <select name='id_perihal' id='id_perihal'  data-placeholder='Kode Perihal' class='form-control chzn-select' tabindex='2'>
                <option value=''></option>";
    $tampil = mysqli_query($konek, 'SELECT * FROM kode_perihal order BY nama_perihal');
    if ($r["id_perihal"] == 0) {
      echo "<option value=0 selected>- Pilih Kode Perihal -</option>";
    }

    while ($w = mysqli_fetch_array($tampil)) {
      if ($r["id_perihal"] == $w["id_perihal"]) {
        echo "<option value=$w[id_perihal] selected> $w[kode_perihal]</option>";
      } else {
        echo "<option value=$w[id_perihal]>$w[nama_perihal] ($w[kode_perihal])</option>";
      }
    }
    echo " 
                </select>
                </div>
                                 

                    <div class='col-lg-2'>
                        <input required='required' name='tahun' value='$tahun' type='text' id='text1' placeholder='Nomor Surat' class='form-control'>
                    </div>
                </div>
               <div class='form-group'>
                    <label for='text1' class='control-label col-lg-3'>Perihal</label>

                    <div class='col-lg-6'>
                        <input required='required' name='perihal' type='text' id='text1' value='$r[hal]' class='form-control'>
                    </div>
                </div>
<div class='form-actions no-margin-bottom'><br/><br/>
                         <button class='btn btn-primary' type='submit'>Update</button>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                    </div>
                    
            </form> "; ?>





  <?php }
  ?>
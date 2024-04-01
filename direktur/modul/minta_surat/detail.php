<?php
include "../../../config/koneksi.php";
if ($_POST['idx']) {
  $id = $_POST['idx'];
  $detail = mysqli_query($konek, "SELECT * FROM permintaan WHERE id_permintaan='$id'");
  $r = mysqli_fetch_array($detail); ?>
  <div id='collapse4' class='body'>
    <?php echo "
                                <table   class='table table-bordered '>
                                <tbody>
                                <tr><td>Tanggal Minta &nbsp &nbsp  &nbsp :$r[tgl_minta]</td></tr>
                                <tr><td>Tanggal Surat &nbsp &nbsp  &nbsp &nbsp  : $r[tgl_surat]</td></tr>
                                <tr><td>Jenis Permintaan &nbsp  : $r[jenis_permintaan]</td></tr>
                                <tr><td>Status Balasan &nbsp &nbsp &nbsp:";
    if ($r['balasan_admin'] == '') {
      echo "<font color=red>Belum Dibalas</color>";
    } else {
      echo " Sudah Dibalas";
    }
    echo " </td>
                                    ";
    echo "
                                   <tr><td>Balasan &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$r[id_permintaan]&act=minta-surat'> $r[balasan_admin]</a></strong></td></tr>
                             </tbody></table> "; ?><?php
                                                  if ($r['balasan_admin'] !== '') {
                                                    echo "
 <form action='modul/minta_surat/edit.php' method='post' enctype='multipart/form-data'>
  <input type='hidden' name='id_permintaan' value=$r[id_permintaan]>
                                        <div class='form-group'>
                        <label class='control-label col-lg-3'>Upload Surat</label>
                        <div class='col-lg-9'>
                            <div class='fileinput fileinput-new' data-provides='fileinput'>
                  <div class='input-group'>
                <div class='form-control uneditable-input span3' data-trigger='fileinput'>
                <i class='glyphicon glyphicon-file fileinput-exists'></i> <span class='fileinput-filename'></span></div>
                <span class='input-group-addon btn btn-default btn-file'><span class='fileinput-new'>Select file</span><span class='fileinput-exists'>Change</span><input type='file'  required='required'  name='fupload'></span>
                <a href='#' class='input-group-addon btn btn-default fileinput-exists' data-dismiss='fileinput'>Remove</a>
                  </div>
                </div>
                        </div>
                    </div>
     <button class='btn btn-primary' type='submit'>Update</button>
        </form>    
                    <br/>";
                                                  } else {
                                                    echo " ";
                                                  }; ?>


  <?php }
  ?>
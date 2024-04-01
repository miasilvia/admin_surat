<?php
include "../../../config/koneksi.php";
if ($_POST['idx']) {
  $id = $_POST['idx'];
  $detail = mysqli_query($konek, "SELECT * FROM permintaan per JOIN kode_perihal kp ON per.id_perihal=kp.id_perihal WHERE id_permintaan='$id'");
  $r = mysqli_fetch_array($detail); ?>
  <div id='collapse4' class='body'>
    <?php echo "
                                <table   class='table table-bordered '>
                                <tbody>
                                <tr><td>Perihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp : $r[nama_perihal]</td></tr>
                                <tr><td>Tanggal Surat &nbsp &nbsp  &nbsp &nbsp  : $r[tgl_surat]</td></tr>
                               <tr><td>Surat Finish &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$r[id_permintaan]&act=minta-surat'> $r[file_finish]</a></strong></td></tr>
                             </tbody></table> "; ?>


  <?php }
  ?>
<?php
include "../../../config/koneksi.php";
if ($_POST['idx']) {
  $id = $_POST['idx'];
  $detaill = mysqli_query($konek, "SELECT * FROM surat_masuk WHERE id_surat='$id'");
  $rr    = mysqli_fetch_array($detaill);
  $detail = mysqli_query($konek, "SELECT * FROM surat_masuk sm JOIN disposisi dis ON dis.id_surat=sm.id_surat JOIN unit_pengelola up ON dis.id_unitPengelola=up.id_unitPengelola Where sm.id_surat='$id'");
  $r = mysqli_fetch_array($detail);
  $detail3 = mysqli_query($konek, "SELECT * FROM surat_masuk, surat_keputusan WHERE surat_keputusan.id_surat=surat_masuk.id_surat AND surat_masuk.id_surat='$id'");
  $r3 = mysqli_fetch_array($detail3);
  $kode2 = $r['no_agenda'];
  if ($kode2 < 10) {
    $kode = '000' . $kode2;
  } elseif ($kode2 > 9 && $kode2 <= 99) {
    $kode = '00' . $kode2;
  } else {
    $kode = '0' . $kode2;
  }
?>
  <div id='collapse4' class='body'>
    <h1 size="3"><b>Data Surat Masuk</b></h1>
    <table class='table table-bordered '>
      <tbody>
        <?php
        echo "
                    <br/> 
                                 <tr>
                          <td>Nomor Agenda &nbsp &nbsp: $kode</td>
                                    <td>Tanggal Terima &nbsp &nbsp &nbsp: $rr[tgl_terima]</td>    
                                     </tr>
                            <tr>
                                    <td>Tanggal Surat&nbsp &nbsp &nbsp &nbsp: $rr[tgl_surat] </td>
                                    <td>Nomor Surat &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[nomor_surat] </td>
                                     </tr>
                                     </tbody></table>
                                      <table   class='table table-bordered '>
                                <tbody>
                                <tr><td>Asal Surat   &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[asal_surat]</td></tr>
                                <tr><td>Perihal &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[perihal]</td></tr>
                                 <tr><td>Unit Pengelola &nbsp &nbsp &nbsp: $r[unit_pengelola]</td></tr>
                                 <tr><td>File Surat Keluar  &nbsp &nbsp: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$r[id_surat]&act=surat-masuk'> $r[nama_file]</a></strong></td></tr>
                                 <tr><td>File Surat Keputusan: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$r3[id_surat]&act=surat-keputusan'> $r3[nama_file]</a></strong> </td></tr>

                                </tbody></table>
                                <font size='3'><b>Proses Disposisi Surat Masuk</b></font>
                                <table   class='table table-bordered '>
                                <tbody>
                                <tr><td>No</td><td>Proses</td> <td>Ket</td></tr>
                                <tr><td width='2'>1</td><td>Disposisi Sudah dibuat </td><td>
                                ";
        if ($r['id_surat']) {
          echo "<i class='glyphicon glyphicon-ok'></i>";
        } else {
          echo "";
        }
        echo " 
                                 </td></tr>
                                 ";
        while ($r2 = mysqli_fetch_array($detail)) {
          $status = "<i class='glyphicon glyphicon-ok'></i>";
          if ($r2["isi_disposisi"] == '') {
            $status = "";
          }
        }
        echo "
                                  <tr><td width='2'>2</td><td>Isi Disposisi Selesai </td><td>$status</td></tr>
                                    <tr><td width='2'>3</td><td>Surat Keputusan Sudah Dibuat</td><td>
                                  ";
        if ($r3['id_surat']) {
          echo "<i class='glyphicon glyphicon-ok'></i>";
        } else {
          echo "";
        }
        echo "</td></tr>";
        if ($r3['id_surat']) {
          if ($r3["status_terima"] == 'B') {
            $status2 = "Belum Diterima/Dilaksanakan";
          } elseif ($r3["status_terima"] == 'ST') {
            $status2 = "Sudah Diterima";
          } else {
            $status2 = "Sudah Dilaksanakan";
          }
        }
        echo "  <tr><td width='2'>4</td><td>Telah Diterima </td><td>$status2</td></tr>";
        echo " 
                              
                              
                             </tbody></table> "; ?>
        <?php
        $detail2 = mysqli_query($konek, "SELECT * FROM surat_masuk, disposisi WHERE disposisi.id_surat=surat_masuk.id_surat AND disposisi.id_surat='$id'");
        echo "  <table  class='table table-bordered '> <tbody>
                                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Diteruskan Kepada</th>
                       <th>Isi Disposisi</th>
                        <th>Tanggal Pengisian</th>
                   
                    </tr>";
        while ($r2 = mysqli_fetch_array($detail2)) {
          $no++;
          $admin = mysqli_query($konek, "SELECT * FROM admin WHERE id_admin='$r2[id_admin]' ");
          $p4 = mysqli_fetch_array($admin);
          echo "
                            <tr>
                            <td>$no</td>
                    <td>$p4[nama_lengkap]</td>
                    <td>$r2[isi_disposisi]</td>
                    <td>$r2[tgl_isi]</td></tr>"; ?>
      <?php }
      }
      ?>
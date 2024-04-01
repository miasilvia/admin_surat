  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
  <script src="assets/lib/jquery/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <?php
    include "../config/koneksi.php";
    $q = mysqli_query($konek, "SELECT * FROM admin where username='" . $_SESSION['username'] . "'");
    $b = mysqli_fetch_array($q); ?>

  <?php

    // Periksa apakah username dan passuser kosong
    if (empty($_SESSION['username']) && empty($_SESSION['passuser'])) {
        // Jika kosong, berikan pesan untuk login
        echo "<link href='style.css' rel='stylesheet' type='text/css'>";
        echo "<center>Untuk mengakses modul, Anda harus login <br>";
        echo "<a href='../../index.php'><b>LOGIN</b></a></center>";
    } else {
        $aksi = "modul/minta_surat/aksi_mintasurat.php";
        if (isset($_GET['aksi'])) {
            switch ($_GET['aksi']) {
                default:
                    echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                                           
  <div class='row'>
    <div class='col-lg-12'>
          <div class='box'>
              <header>
                  <div class='icons'><i class='fa fa-table'></i></div>
                  <h5>Data Pembuatan Surat </h5>
              </header>
              <div id='collapse4' class='body'>
              <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
              <thead>
              <tr>
              <th>No</th>
              <th>Pemohon</th>
              <th>Jenis Permintaan</th>
              <th>Tgl Surat</th>
               <th>Kode Perihal</th>
              <th>Status Balasan</th>
     
              <th>Aksi</th>
             
              </tr>
              </thead>
              <tbody>";

                    $tp = mysqli_query($konek, "SELECT * FROM permintaan per JOIN admin adm ON per.id_admin=adm.id_admin  ORDER BY id_permintaan  ASC");
                    while ($r = mysqli_fetch_array($tp)) {
                        $no++;
                        $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
                        $p2 = mysqli_fetch_array($perihal);

                        echo "
                            <tr>
                                <td>$no</td>
                                <td>$r[nama_lengkap]</td>
                                    <td>$r[jenis_permintaan]</td>
                                    <td>$r[tgl_surat]</td>
                                    <td>$p2[nama_perihal] ($p2[kode_perihal])</td>
                                    <td>";
                        if ($r['balasan_admin'] == '') {
                            echo "<font color=red>Belum Dibalas</color>";
                        } else {
                            echo " Sudah Dibalas";
                        }
                        echo " </td>
                                    "; ?>

                      <?php echo "
                               <td align='center'>
                             
                               
                               "; ?>

                      <?php echo " <a data-toggle='tooltip' data-original-title='BALAS' class='glyphicon glyphicon-eye-open btn btn-default' href='?hal=permintaan&aksi=detail&id=$r[id_permintaan]'></a>";
                        ?>



                      <a data-toggle='tooltip' data-original-title='Hapus' onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' href='modul/minta_surat/aksi_mintasurat.php?act=hapus&id=$r[id_permintaan]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
                      </a>

                  <?php echo "
                            </td>


                            </tr>";
                    }
                    echo "
                           
                    </tbody>                </table>
                 
                    <div id='right' class='onoffcanvas is-right is-fixed bg-light' aria-expanded=false>
                        <a class='onoffcanvas-toggler' href='#right' data-toggle=onoffcanvas aria-expanded=false></a>
                        <br>
                        <br>
                        <div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Warning!</strong> Best check yo self, you're not looking too good.
                        </div>
                        <!-- .well well-small -->
                        <div class='well well-small dark'>
                            <ul class='list-unstyled'>
                                <li>Visitor <span class='inlinesparkline pull-right'>1,4,4,7,5,9,10</span></li>
                                <li>Online Visitor <span class='dynamicsparkline pull-right'>Loading..</span></li>
                                <li>Popularity <span class='dynamicbar pull-right'>Loading..</span></li>
                                <li>New Users <span class='inlinebar pull-right'>1,3,4,5,3,5</span></li>
                            </ul>
                        </div>
                       
                        <div class='well well-small dark'>
                            <button class='btn btn-block'>Default</button>
                            <button class='btn btn-primary btn-block'>Primary</button>
                            <button class='btn btn-info btn-block'>Info</button>
                            <button class='btn btn-success btn-block'>Success</button>
                            <button class='btn btn-danger btn-block'>Danger</button>
                            <button class='btn btn-warning btn-block'>Warning</button>
                            <button class='btn btn-inverse btn-block'>Inverse</button>
                            <button class='btn btn-metis-1 btn-block'>btn-metis-1</button>
                            <button class='btn btn-metis-2 btn-block'>btn-metis-2</button>
                            <button class='btn btn-metis-3 btn-block'>btn-metis-3</button>
                            <button class='btn btn-metis-4 btn-block'>btn-metis-4</button>
                            <button class='btn btn-metis-5 btn-block'>btn-metis-5</button>
                            <button class='btn btn-metis-6 btn-block'>btn-metis-6</button>
                        </div>
                        <!-- /.well well-small -->
                        <!-- .well well-small -->
                        <div class='well well-small dark'>
                            <span>Default</span><span class='pull-right'><small>20%</small></span>
                        
                            <div class='progress xs'>
                                <div class='progress-bar progress-bar-info' style='width: 20%'></div>
                            </div>
                            <span>Success</span><span class='pull-right'><small>40%</small></span>
                        
                            <div class='progress xs'>
                                <div class='progress-bar progress-bar-success' style='width: 40%''></div>
                            </div>
                            <span>warning</span><span class='pull-right'><small>60%</small></span>
                        
                            <div class='progress xs'>
                                <div class='progress-bar progress-bar-warning' style='width: 60%'></div>
                            </div>
                            <span>Danger</span><span class='pull-right'><small>80%</small></span>
                        
                            <div class='progress xs'>
                                <div class='progress-bar progress-bar-danger' style='width: 80%'></div>
                            </div>
                        </div>
                    </div>
         </div>
                    </div>
            </div>   </div>   </div>   </div>   </div>   </div>
      ";
                    echo "";
                    break;

                case "arsip":
                    $tgl_minta = date('Y-m-d');
                    echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>                       
  <div class='row'>
    <div class='col-lg-12'>
          <div class='box'>
              <header>
                  <div class='icons'><i class='fa fa-table'></i></div>
                  <h5>Kiriman Surat Keluar </h5>
              </header>
              <div id='collapse4' class='body'>
              <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
              <thead>
              <tr>
              <th>No</th>
              <th>Pemohon</th>
           
              <th>Tgl Surat</th>
        <th>status</th>
              <th>Aksi</th>
              </tr>
              </thead>
              <tbody>";
                    $tp = mysqli_query($konek, "SELECT * FROM permintaan per JOIN admin adm ON per.id_admin=adm.id_admin where file_finish!=''  ORDER BY id_permintaan  DESC");
                    $no = 0;
                    while ($r = mysqli_fetch_array($tp)) {
                        $no++;
                        $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
                        $p2 = mysqli_fetch_array($perihal);

                        echo "
                            <tr>
                                <td>$no</td>
                                <td>$r[nama_lengkap]</td>
                                
                                    <td>$r[tgl_surat]</td>
                               <td>"; ?>
                      <?php
                        if ($r['status_arsip'] == 'sudah') {
                        ?>
                          Sudah Diarsipkan
                      <?php
                        } else {
                        ?>
                          <a data-toggle='tooltip' data-original-title='Status arsip' onclick="return confirm('Apakah surat sudah diarsipkan?')" class="btn btn-success" href="modul/minta_surat/aksi_mintasurat.php?act=head&id=<?php echo $r['id_permintaan']; ?>">
                              <i class="glyphicon glyphicon-ok icon-white"></i>
                          </a>
                      <?php
                        }
                        ?>

                      <?php echo "</td>
                               <td align='center'>
                             <a href='#edit_modal3' class='glyphicon  btn btn-default' data-toggle='modal' data-id=" . $r['id_permintaan'] . "> Unduh File </a>
  <div class='modal fade' id='edit_modal3' role='dialog'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Kiriman Surat Keluar yang sudah disetujui</h4>
                </div>
                <div class='modal-body'>
                    <div class='hasil-data'></div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Keluar</button>
                </div>
            </div>
        </div>
    </div>"; ?>


                      <a data-toggle='tooltip' data-original-title='Hapus' onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' href='modul/minta_surat/aksi_mintasurat.php?act=hapus&id=$r[id_permintaan]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
                      </a>

                  <?php echo "
                            </td>


                            </tr>";
                    }

                    echo "

                           
                    </tbody>                </table>
                 
                    <div id='right' class='onoffcanvas is-right is-fixed bg-light' aria-expanded=false>
                        <a class='onoffcanvas-toggler' href='#right' data-toggle=onoffcanvas aria-expanded=false></a>
                        <br>
                        <br>
                        <div class='alert alert-danger'>
                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                            <strong>Warning!</strong> Best check yo self, you're not looking too good.
                        </div>
                        <!-- .well well-small -->
                        <div class='well well-small dark'>
                            <ul class='list-unstyled'>
                                <li>Visitor <span class='inlinesparkline pull-right'>1,4,4,7,5,9,10</span></li>
                                <li>Online Visitor <span class='dynamicsparkline pull-right'>Loading..</span></li>
                                <li>Popularity <span class='dynamicbar pull-right'>Loading..</span></li>
                                <li>New Users <span class='inlinebar pull-right'>1,3,4,5,3,5</span></li>
                            </ul>
                        </div>
                       
                        <div class='well well-small dark'>
                            <button class='btn btn-block'>Default</button>
                            <button class='btn btn-primary btn-block'>Primary</button>
                            <button class='btn btn-info btn-block'>Info</button>
                            <button class='btn btn-success btn-block'>Success</button>
                            <button class='btn btn-danger btn-block'>Danger</button>
                            <button class='btn btn-warning btn-block'>Warning</button>
                            <button class='btn btn-inverse btn-block'>Inverse</button>
                            <button class='btn btn-metis-1 btn-block'>btn-metis-1</button>
                            <button class='btn btn-metis-2 btn-block'>btn-metis-2</button>
                            <button class='btn btn-metis-3 btn-block'>btn-metis-3</button>
                            <button class='btn btn-metis-4 btn-block'>btn-metis-4</button>
                            <button class='btn btn-metis-5 btn-block'>btn-metis-5</button>
                            <button class='btn btn-metis-6 btn-block'>btn-metis-6</button>
                        </div>
                        <!-- /.well well-small -->
                        <!-- .well well-small -->
                        <div class='well well-small dark'>
                            <span>Default</span><span class='pull-right'><small>20%</small></span>
                        
                            <div class='progress xs'>
                                <div class='progress-bar progress-bar-info' style='width: 20%'></div>
                            </div>
                            <span>Success</span><span class='pull-right'><small>40%</small></span>
                        
                            <div class='progress xs'>
                                <div class='progress-bar progress-bar-success' style='width: 40%''></div>
                            </div>
                            <span>warning</span><span class='pull-right'><small>60%</small></span>
                        
                            <div class='progress xs'>
                                <div class='progress-bar progress-bar-warning' style='width: 60%'></div>
                            </div>
                            <span>Danger</span><span class='pull-right'><small>80%</small></span>
                        
                            <div class='progress xs'>
                                <div class='progress-bar progress-bar-danger' style='width: 80%'></div>
                            </div>
                        </div>
                    </div>
         </div>
                    </div>
            </div>   </div>   </div>   </div>   </div>   </div>
      ";
                    echo "";
                    break;

                case "tambah":
                    $tgl_minta = date('Y-m-d');
                    echo "
<div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Input Data Surat</h5>
         
            <div class='toolbar'>
              <nav style='padding: 8px;'>
                  <a href='javascript:;' class='btn btn-default btn-xs collapse-box'>
                      <i class='fa fa-minus'></i>
                  </a>
                  <a href='javascript:;' class='btn btn-default btn-xs full-box'>
                      <i class='fa fa-expand'></i>
                  </a>
              </nav>
            </div>  
        </header>
        <div id='div-1' class='body'>
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/minta_surat/aksi_mintasurat.php?act=input' enctype='multipart/form-data' >
            <input type=hidden name=id value=$r[id_permintaan]>
             <div class='form-group'>
                    <label class='control-label col-lg-4'>Pengelola</label>

                    <div class='col-lg-6'>
                        <input required='required' type='hidden' name='id_admin' value='$b[id_admin]'  class='form-control'>
                    </div>
                </div>
                   <div class='form-group' >
                     <label for='text1' class='control-label col-lg-4'>Pilih Permintaan </label>
                      <div class='col-lg-6'>
                      <input type='radio' name='jenis_permintaan' value='buat surat' id='rad1'  class='rad'/>Minta Buat Surat
                      <input type='radio' name='jenis_permintaan' id='rad2' value='minta nomor' class='rad'/> Minta Nomor Surat</div></div>
     
       <div class='form-group' id='form1' style='display:none' >
           
                    <label for='text1' class='control-label col-lg-4'>Lampiran</label>
                    <div class='col-lg-6'>
                        <input  type='text' name='lampiran' placeholder='Lampiran'   class='form-control'>
                    </div><br/><br/><br/>
              
                    <label for='text1' class='control-label col-lg-4'>Perihal</label>
                    <div class='col-lg-6'>
                        <input  type='text' name='hal'  placeholder='Perihal' class='form-control'>
                    </div>
           <br/><br/><br/>
                    
                    <label for='text1' class='control-label col-lg-4'>Kota Tanggal</label>
                    <div class='col-lg-6'>
                        <input type='text' name='kota' placeholder='Kota tanggal'  class='form-control'>
                    </div><br/><br/><br/>
               
                    <label for='text1' class='control-label col-lg-4'>Penerima Surat</label>
                    <div class='col-lg-6'>
                        <input type='text' name='penerima' placeholder= 'Penerima Surat'  class='form-control'>
                    </div><br/><br/><br/>
            
                    <label for='text1' class='control-label col-lg-4'>Tempat Penerima</label>
                    <div class='col-lg-6'>
                        <input  type='text' name='tempat_penerima' placeholder='Tempat Penerima'   class='form-control'>
                    </div><br/><br/><br/>
           
                    <label for='text1' class='control-label col-lg-4'>Jabatan yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input type='text' name='jabatan_ttd' placeholder='Jabatan yang Menandatangani'   class='form-control'>
                    </div><br/><br/><br/>
           
                   <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nama yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input type='text' name='nama_ttd' placeholder='Nama yang Menandatangani'   class='form-control'>
                    </div><br/><br/><br/>
          
                    <label for='text1' class='control-label col-lg-4'>nomor_induk</label>
                    <div class='col-lg-6'>
                        <input type='text' name='nomor_induk' placeholder='Nomor Induk (Kosongkan bila tidak ada)'   class='form-control'>
                    </div><br/><br/><br/>
 
                    <label for='limiter' class='control-label col-lg-4'>Isi Surat</label>

                    <div class='col-lg-6'>
                        <textarea name='isi_surat'></textarea>
                    </div>
                </div>
                </div>
<div class='form-group'   >
             <label class='control-label col-lg-4' for='dpYears'>Tanggal Surat</label>
                        <div class='col-lg-3'>
                                <input name='tgl_surat' class='form-control' type='date' value='$tgl_sekarng' > 
                            </div>
                        </div>
                          <div class='form-group' >
               <label class='control-label col-lg-4'>Kode Perihal</label>

                <div class='col-lg-6'>
                <select name='id_perihal' id='id_perihal'  data-placeholder='Kode Perihal' class='form-control chzn-select' tabindex='2'>
                <option value=''></option>";
                    $tampil = mysqli_query($konek, 'SELECT * FROM kode_perihal order BY nama_perihal');
                    if ($r["id_perihal"] == 0) {
                        echo "<option value=0 selected>- Pilih Kode Perihal -</option>";
                    }

                    while ($w = mysqli_fetch_array($tampil)) {
                        if ($r["id_perihal"] == $w["id_perihal"]) {
                            echo "<option value=$w[id_perihal] selected> $w[nama_perihal] $w[kode_perihal]</option>";
                        } else {
                            echo "<option value=$w[id_perihal]>$w[nama_perihal] $w[kode_perihal]</option>";
                        }
                    }
                    echo "
               
                </select>
                </div> </div>
      <div class='form-group'  id='form2' style='display:none'>
      </div>
<div class='form-actions no-margin-bottom'>
                        <input type='submit' value='Simpan' class='btn btn-primary'>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
";
                    echo "";
                    break;
                case "detail2":
                    $detaill = mysqli_query($konek, "SELECT * FROM permintaan WHERE id_permintaan='$_GET[id]'");
                    $rr    = mysqli_fetch_array($detaill);
                    $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$rr[id_perihal]'");
                    $p2 = mysqli_fetch_array($perihal);
                    $data = mysqli_query($konek, "SELECT * from nomor_surat  order by no_urut DESC LIMIT 0,1");
                    $i = mysqli_fetch_array($data);
                    $ns = mysqli_query($konek, "SELECT * FROM buat_suratdinas where id_permintaan='$_GET[id]' ORDER BY id_buatsurat DESC
 limit 1");
                    $r5 = mysqli_fetch_array($ns);
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
                    echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                                         
<div class='row'>
  <div class='col-lg-12'>
        <div class='box'>
            <header>
                <div class='icons'><i class='fa fa-table'></i></div>
                <h5>Detail File Surat Keluar</h5>
            </header>"; ?>
                  <?php echo " <a href='#edit_modal2' class='glyphicon  btn btn-default' data-toggle='modal' data-id=" . $rr['id_permintaan'] . "> Input Nomor </a>";
                    ?>
              <?php echo "
 <div class='modal fade' id='edit_modal2' role='dialog'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Input Nomor Surat</h4>
                </div>
                <div class='modal-body'>
                    <div class='hasil-data'></div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Keluar</button>
                </div>
            </div>
        </div>
    </div>
            <div id='collapse4' class='body'>
                                <table   class='table table-bordered '>
                                <tbody>
                                <tr><td>Tanggal Surat &nbsp &nbsp &nbsp : $rr[tgl_surat]</td></tr>
                                <tr><td>Kode Perihal &nbsp &nbsp &nbsp &nbsp   : $p2[nama_perihal]($p2[kode_perihal])</td></tr>
                                <tr><td>Jenis Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  : $rr[jenis_permintaan]</td></tr>
                                 <tr><td>Perihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : $rr[hal]</td></tr>
                            
                                 <tr><td>Surat Finish &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$rr[id_permintaan]&act=surat-keluar'> $rr[file_finish]</a></strong></td></tr>";
                    echo "
                                               </table></div></div></div></div></div></div></div>";


                    echo "
                       ";
                    echo "";
                    break;

                case "detail":
                    $detaill = mysqli_query($konek, "SELECT * FROM permintaan WHERE id_permintaan='$_GET[id]'");
                    $rr    = mysqli_fetch_array($detaill);
                    $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$rr[id_perihal]'");
                    $p2 = mysqli_fetch_array($perihal);
                    $data = mysqli_query($konek, "SELECT * from nomor_surat  order by no_urut DESC LIMIT 0,1");
                    $i = mysqli_fetch_array($data);
                    $ns = mysqli_query($konek, "SELECT * FROM buat_suratdinas where id_permintaan='$_GET[id]' ORDER BY id_buatsurat DESC
 limit 1");
                    $r5 = mysqli_fetch_array($ns);
                    // ID OTOMATIS//***************************************************
                    $kode2 = substr($i['no_urut'], 0);

                    if ($kode2 < 10) {
                        $kode = '000' . $kode2;
                    } elseif ($kode2 > 9 && $kode2 <= 99) {
                        $kode = '00' . $kode2;
                    } else {
                        $kode = '0' . $kode2;
                    }
                    $tgl_sekarng = date('Y-m-d');
                    $tahun = date('Y');
                    echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                                         
<div class='row'>
  <div class='col-lg-12'>
        <div class='box'>
            <header>
                <div class='icons'><i class='fa fa-table'></i></div>
                <h5>Detail File Permintaan</h5>
            </header>"; ?>
                  <?php echo " <a href='#edit_modal2' class='glyphicon  btn btn-default' data-toggle='modal' data-id=" . $rr['id_permintaan'] . "> Input Nomor </a>";
                    ?>
              <?php echo "
 <div class='modal fade' id='edit_modal2' role='dialog'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Input Nomor Surat</h4>
                </div>
                <div class='modal-body'>
                    <div class='hasil-data'></div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Keluar</button>
                </div>
            </div>
        </div>
    </div>

            <div id='collapse4' class='body'>
                                <table   class='table table-bordered '>
                                <tbody>
                                <tr><td>Tanggal Minta &nbsp &nbsp &nbsp : $rr[tgl_minta]</td></tr>
                                <tr><td>Tanggal Surat &nbsp &nbsp &nbsp : $rr[tgl_surat]</td></tr>
                                <tr><td>Kode Perihal &nbsp &nbsp &nbsp &nbsp   : $p2[nama_perihal]($p2[kode_perihal])</td></tr>
                                <tr><td>Jenis Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  : $rr[jenis_permintaan]</td></tr>
                                 <tr><td>Perihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp : $rr[hal]</td></tr>

                                <tr><td>Status Balasan &nbsp &nbsp &nbsp:";
                    if ($rr['balasan_admin'] == '') {
                        echo "<font color=red> Belum Dibalas</color>";
                    } else {
                        echo " Sudah Dibalas";
                    }
                    echo "</td></tr>
                                   ";
                    if ($r5['id_permintaan'] == $_GET['id']) {
                        echo "  <tr><td>  Unduh Surat &nbsp &nbsp &nbsp &nbsp &nbsp  :
                  <a data-toggle='tooltip' data-original-title='Cetak Surat' href='modul/buat_suratdinas/convert.php?id=$r5[id_buatsurat]' role='button' class='glyphicon  btn btn-metis-4' target='_blank'>Unduh Surat</a> 
                </td></tr>
                   ";
                    } else {
                    }
                    echo "
                                               </table>";

                    if ($rr['jenis_permintaan'] == 'buat surat') {

                        echo " 

                                               <div id='div-1' class='body'>
            <form class='form-horizontal' method='post' action='modul/minta_surat/aksi_mintasurat.php?act=input2' enctype='multipart/form-data'>
              <div class='form-group' >
                     <label for='text1' class='control-label col-lg-4'>Pilih Permintaan </label>
                      <div class='col-lg-6'>
                      <input type='radio' name='jenis_permintaan' value='buat surat' id='rad1'  class='rad'/>Buat Surat
                      <input type='radio' name='jenis_permintaan' id='rad2' value='minta nomor' class='rad'/> Berikan Surat</div></div>
              <input type=hidden name=id_permintaan value=$rr[id_permintaan]>    
            <div class='form-group' id='form1' style='display:none' >
            <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>
            <div class='col-lg-6'>
            <input required='required' type='text' name='nomor_surat' value='$kode/$i[pengajuan]/$p2[kode_perihal]/$i[tahun]'  class='form-control'>
                    </div>
               <br/><br/><br/>
                    <label for='text1' class='control-label col-lg-4'>Lampiran</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='lampiran' value='$rr[lampiran]'  class='form-control'>
                    </div>
           <br/><br/><br/>
               
                    <label for='text1' class='control-label col-lg-4'>Perihal</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='hal' value='$rr[hal]'  class='form-control'>
                    </div>
             <br/><br/><br/>
              <div class='form-group'   >
             <label class='control-label col-lg-4' for='dpYears'>Tanggal Surat</label>
                        <div class='col-lg-3'>
                                <input name='tgl_surat' class='form-control' type='date' value='$rr[tgl_surat]' > 
                            </div>
                        </div>

            
                    
                    <label for='text1' class='control-label col-lg-4'>Kota Tanggal</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='kota' value='$rr[kota]'   class='form-control'>
                    </div>
               <br/><br/><br/>
                  
                    <label for='text1' class='control-label col-lg-4'>Penerima</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='penerima' value='$rr[penerima]'   class='form-control'>
                    </div>
               <br/><br/><br/>
                
                    <label for='text1' class='control-label col-lg-4'>Tempat Penerima</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='tempat_penerima' value='$rr[tempat_penerima]'   class='form-control'>
                    </div>
                <br/><br/><br/>
                  
                    <label for='text1' class='control-label col-lg-4'>Jabatan yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='jabatan_ttd' value='$rr[jabatan_ttd]'   class='form-control'>
                    </div>
             <br/><br/><br/>
                 
                    <label for='text1' class='control-label col-lg-4'>Nama yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nama_ttd' value='$rr[nama_ttd]'   class='form-control'>
                    </div>
               <br/><br/><br/>
              
                    <label for='text1' class='control-label col-lg-4'>Nomor Induk</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nomor_induk' value='$rr[nomor_induk]'   class='form-control'>
                    </div>
               <br/><br/><br/>
               
                    <label for='limiter' class='control-label col-lg-2'>Isi Surat</label>

                   <div class='col-lg-8'>
                        <textarea name='isi_surat' >$rr[isi_surat]</textarea>
                    </div>
             
                        <input type='submit' value='Simpan' class='btn btn-primary'>
                    </div>   </div>
                    
            </form>
              <div class='form-group'  id='form2' style='display:none'>
               <form class='form-horizontal' method='post' action='modul/minta_surat/aksi_mintasurat.php?act=update2' enctype='multipart/form-data'>
                 <input type=hidden name=id value=$rr[id_permintaan]>  
            <div class='form-group'>
                        <label class='control-label col-lg-4'>Kirim File</label>
                        <div class='col-lg-4'>
                            <div class='fileinput fileinput-new' data-provides='fileinput'>
                  <div class='input-group'>
                <div class='form-control uneditable-input span3' data-trigger='fileinput'><i class='glyphicon glyphicon-file fileinput-exists'></i> <span class='fileinput-filename'></span></div>
                <span class='input-group-addon btn btn-default btn-file'><span class='fileinput-new'>Select file</span><span class='fileinput-exists'>Change</span><input type='file' name='fupload'></span>
                <a href='#' class='input-group-addon btn btn-default fileinput-exists' data-dismiss='fileinput'>Remove</a>
                  </div>
                </div>
                        </div>
                    </div>
                         <input type='submit' value='Simpan' class='btn btn-primary'>
            </div>
        
        </div>
    </div>
</div>
</div>
                       
                    </div>    </div>

                </div>
                        </div>
                    </div></div></div></div>
        </form>    
                    <br/>";
                    } else {
                        echo " <form data-validate='parsley' class='form-horizontal' method='post' action='modul/minta_surat/aksi_mintasurat.php?act=update' enctype='multipart/form-data' > 
                         <input type=hidden name=id value=$rr[id_permintaan]>  
                         <div class='form-group'>
                         ";
                        if ($rr['balasan_admin'] == '') {

                            echo "
                    <label class='control-label col-lg-4'>Kirim Nomor Surat</label>

                    <div class='col-lg-6'>

                        <input required='required' type='text' name='balasan_admin' value='$kode/$i[pengajuan]/$p2[kode_perihal]/$i[tahun]' class='form-control'>
                    </div>
                </div>  
                 <button class='btn btn-primary'  type='submit'>Kirim</button> 
                  ";
                        } else {
                            echo " <label class='control-label col-lg-4'>Edit Kiriman Nomor Surat</label>

                    <div class='col-lg-6'>

                        <input required='required' type='text' name='balasan_admin' value='$rr[balasan_admin]' class='form-control'>
                    </div>
                </div>  
                 <button class='btn btn-primary'  type='submit'>Update</button> ";
                        }
                        echo "
                 </form> 

                         </div>
                </div>
                        </div>
                    </div>    </div>
                </div>
                        </div>
                    </div>";
                    }
                    echo "
                       ";
                    echo "";
                    break;
            }
        } else {
            echo "<div id='content'>
            <div class='outer'>
                <div class='inner bg-light lter'>
                                   
<div class='row'>
<div class='col-lg-12'>
  <div class='box'>
      <header>
          <div class='icons'><i class='fa fa-table'></i></div>
          <h5>Data Pembuatan Surat </h5>
      </header>
      <div id='collapse4' class='body'>
      <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
      <thead>
      <tr>
      <th>No</th>
      <th>Pemohon</th>
      <th>Jenis Permintaan</th>
      <th>Tgl Surat</th>
       <th>Kode Perihal</th>
      <th>Status Balasan</th>

      <th>Aksi</th>
     
      </tr>
      </thead>
      <tbody>";

            $tp = mysqli_query($konek, "SELECT * FROM permintaan per JOIN admin adm ON per.id_admin=adm.id_admin  ORDER BY id_permintaan  ASC");
            $no = 0;
            while ($r = mysqli_fetch_array($tp)) {
                $no++;
                $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
                $p2 = mysqli_fetch_array($perihal);

                echo "
                    <tr>
                        <td>$no</td>
                        <td>$r[nama_lengkap]</td>
                            <td>$r[jenis_permintaan]</td>
                            <td>$r[tgl_surat]</td>
                            <td>$p2[nama_perihal] ($p2[kode_perihal])</td>
                            <td>";
                if ($r['balasan_admin'] == '') {
                    echo "<font color=red>Belum Dibalas</color>";
                } else {
                    echo " Sudah Dibalas";
                }
                echo " </td>
                            "; ?>

              <?php echo "
                       <td align='center'>
                     
                       
                       "; ?>

              <?php echo " <a data-toggle='tooltip' data-original-title='BALAS' class='glyphicon glyphicon-eye-open btn btn-default' href='?hal=permintaan&aksi=detail&id=$r[id_permintaan]'></a>";
                ?>



              <a data-toggle='tooltip' data-original-title='Hapus' onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' href='modul/minta_surat/aksi_mintasurat.php?act=hapus&id=$r[id_permintaan]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
              </a>

  <?php echo "
                    </td>


                    </tr>";
            }
            echo "
                   
            </tbody>                </table>
         
            <div id='right' class='onoffcanvas is-right is-fixed bg-light' aria-expanded=false>
                <a class='onoffcanvas-toggler' href='#right' data-toggle=onoffcanvas aria-expanded=false></a>
                <br>
                <br>
                <div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>Warning!</strong> Best check yo self, you're not looking too good.
                </div>
                <!-- .well well-small -->
                <div class='well well-small dark'>
                    <ul class='list-unstyled'>
                        <li>Visitor <span class='inlinesparkline pull-right'>1,4,4,7,5,9,10</span></li>
                        <li>Online Visitor <span class='dynamicsparkline pull-right'>Loading..</span></li>
                        <li>Popularity <span class='dynamicbar pull-right'>Loading..</span></li>
                        <li>New Users <span class='inlinebar pull-right'>1,3,4,5,3,5</span></li>
                    </ul>
                </div>
               
                <div class='well well-small dark'>
                    <button class='btn btn-block'>Default</button>
                    <button class='btn btn-primary btn-block'>Primary</button>
                    <button class='btn btn-info btn-block'>Info</button>
                    <button class='btn btn-success btn-block'>Success</button>
                    <button class='btn btn-danger btn-block'>Danger</button>
                    <button class='btn btn-warning btn-block'>Warning</button>
                    <button class='btn btn-inverse btn-block'>Inverse</button>
                    <button class='btn btn-metis-1 btn-block'>btn-metis-1</button>
                    <button class='btn btn-metis-2 btn-block'>btn-metis-2</button>
                    <button class='btn btn-metis-3 btn-block'>btn-metis-3</button>
                    <button class='btn btn-metis-4 btn-block'>btn-metis-4</button>
                    <button class='btn btn-metis-5 btn-block'>btn-metis-5</button>
                    <button class='btn btn-metis-6 btn-block'>btn-metis-6</button>
                </div>
                <!-- /.well well-small -->
                <!-- .well well-small -->
                <div class='well well-small dark'>
                    <span>Default</span><span class='pull-right'><small>20%</small></span>
                
                    <div class='progress xs'>
                        <div class='progress-bar progress-bar-info' style='width: 20%'></div>
                    </div>
                    <span>Success</span><span class='pull-right'><small>40%</small></span>
                
                    <div class='progress xs'>
                        <div class='progress-bar progress-bar-success' style='width: 40%''></div>
                    </div>
                    <span>warning</span><span class='pull-right'><small>60%</small></span>
                
                    <div class='progress xs'>
                        <div class='progress-bar progress-bar-warning' style='width: 60%'></div>
                    </div>
                    <span>Danger</span><span class='pull-right'><small>80%</small></span>
                
                    <div class='progress xs'>
                        <div class='progress-bar progress-bar-danger' style='width: 80%'></div>
                    </div>
                </div>
            </div>
 </div>
            </div>
    </div>   </div>   </div>   </div>   </div>   </div>";
        }
    }
    ?>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#edit_modal2').on('show.bs.modal', function(e) {
              var idx = $(e.relatedTarget).data('id');
              //menggunakan fungsi ajax untuk pengambilan data
              $.ajax({
                  type: 'post',
                  url: 'modul/minta_surat/detail.php',
                  data: 'idx=' + idx,
                  success: function(data) {
                      $('.hasil-data').html(data); //menampilkan data ke dalam modal
                  }
              });
          });
      });
  </script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#edit_modal3').on('show.bs.modal', function(e) {
              var idx = $(e.relatedTarget).data('id');
              //menggunakan fungsi ajax untuk pengambilan data
              $.ajax({
                  type: 'post',
                  url: 'modul/minta_surat/detail2.php',
                  data: 'idx=' + idx,
                  success: function(data) {
                      $('.hasil-data').html(data); //menampilkan data ke dalam modal
                  }
              });
          });
      });
  </script>


  <script src="assets/lib/jquery/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.26.6/js/jquery.tablesorter.min.js"></script>
  <script src="htps://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>
  <script src="assets/lib/inputlimiter/jquery.inputlimiter.js"></script>
  <script src="assets/lib/validVal/js/jquery.validVal.min.js"></script>
  <script src="assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script>
      $(function() {
          Metis.MetisTable();
          Metis.metisSortable();
      });
  </script>
  <script>
      $(function() {
          Metis.formGeneral();
      });
  </script>

  <script type="text/javascript">
      $(function() {
          $(":radio.rad").click(function() {
              $("#form1, #form2").hide()
              if ($(this).val() == "buat surat") {
                  $("#form1").show();
              } else {
                  $("#form2").show();
              }
          });
      });
  </script>
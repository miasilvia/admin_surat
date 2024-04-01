  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
  <script src="assets/lib/jquery/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>


  <?php
    include "../config/koneksi.php";
    if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
        echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
        echo "<a href=../../index.php><b>LOGIN</b></a></center>";
    } else {

        $aksi = "aksi_suratmasuk.php";
        if (isset($_GET['aksi'])) {
            $aksi = $_GET['aksi'];
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
                <h5>Data Surat Keluar</h5>
            </header>
            <div id='collapse4' class='body'>
                <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
                    <thead>
                    <tr>
                 <th>No</th>
                       <th>Tanggal</th>
                       <th>Ditujukan Kepada</th>
                        <th>Nomor Surat</th>
                        <th>Tgl Surat</th>
                        <th>Unit Pengelola</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>";

                    $tp = mysqli_query($konek, 'SELECT * FROM surat_keluar ORDER BY id_nomor asc');
                    $no = 0;
                    while ($r = mysqli_fetch_array($tp)) {
                        $no++;
                        $pengelola = mysqli_query($konek, "SELECT * FROM unit_pengelola WHERE id_unitPengelola='$r[id_unitPengelola]'");
                        $p1 = mysqli_fetch_array($pengelola);
                        $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
                        $p2 = mysqli_fetch_array($perihal);
                        $kode2 = $r['no_urut'];

                        if ($kode2 < 10) {
                            $kode = '000' . $kode2;
                        } elseif ($kode2 > 9 && $kode2 <= 99) {
                            $kode = '00' . $kode2;
                        } else {
                            $kode = '00' . $kode2;
                        }
                        $tgl_sekarng = date('Y-m-d');
                        $tahun = date('Y');

                        echo "
                            <tr>
                                <td>$no</td>
                                    <td>$r[tgl_posting]</td>
                                    <td>$r[ditujukan]</td>
                                    <td>$kode/$r[pengajuan]/$p2[kode_perihal]/$r[tahun]</td>
                                    <td>$r[tgl_surat]</td>
                                  <td>$p1[unit_pengelola]</td>
                                    "; ?>
                      <?php echo "
                               <td align='center'>
                               <a data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default' href='?hal=data-suratkeluar&aksi=edit&id=$r[id_nomor]'></a>
                               <a class='glyphicon glyphicon-eye-open btn btn-default' href='?hal=data-suratkeluar&aksi=detail&id=$r[id_nomor]'></a>

                               "; ?>
                      <a onclick="return confirm('Hapus Data?')" <?php echo " data-toggle='tooltip' data-original-title='Hapus' class='btn btn-danger' href='modul/surat_keluar/aksi_suratkeluar.php?act=hapus&id=$r[id_nomor]&namafile=$r[nama_file]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
                      </a>



                  <?php echo "
                               </td>


                            </tr>";
                    }
                    echo "
                           
                    </tbody>                </table>
            </div>
        </div>
    </div>
</div>
                        </div>
                     
                    </div>
                  
                </div>
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
      ";
                    echo "";
                    break;

                case "edit":

                    $edit = mysqli_query($konek, "SELECT * FROM nomor_surat, surat_keluar   WHERE nomor_surat.id_nomor=surat_keluar.id_nomor AND nomor_surat.id_nomor='$_GET[id]'");
                    $r    = mysqli_fetch_array($edit);

                    // ID OTOMATIS//***************************************************
                    $kode2 = $r['no_urut'];

                    if ($kode2 < 10) {
                        $kode = '000' . $kode2;
                    } elseif ($kode2 > 9 && $kode2 <= 99) {
                        $kode = '00' . $kode2;
                    } else {
                        $kode = '0' . $kode2;
                    }
                    $tgl_sekarng = date('Y-m-d');
                    $tahun = date('Y');
                    echo "
 <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Edit Data Surat Masuk</h5>
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
            <form class='form-horizontal' method='post' action='modul/surat_keluar/aksi_suratkeluar.php?act=update' enctype='multipart/form-data'>

     
                   
                <input type=hidden name=id value=$r[id_nomor]>
                 <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Tanggal Minta</label>

                        <div class='col-lg-3'>
                            <div class='input-group input-append date' id='dpYears' data-date='$tgl_sekarng'
                                 data-date-format='yyyy-mm-dd'>
                                <input name='tgl_minta' value='$r[tgl_minta]' class='form-control' type='text' value='$tgl_sekarng' readonly>
                                <span class='input-group-addon add-on'><i class='fa fa-calendar'></i></span>
                            </div>
                        </div>
                    </div>
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dp3'>Tanggal Surat</label>

                        <div class='col-lg-3'>
                            <div class='input-group input-append date' id='dp3' data-date='$tgl_sekarng'
                                 data-date-format='yyyy-mm-dd'>
                                <input name='tgl_surat' value='$r[tgl_surat]'  class='form-control' type='text' value='$tgl_sekarng' readonly>
                                <span class='input-group-addon add-on'><i class='fa fa-calendar'></i></span>
                            </div>
                        </div>
                    </div>
                    <div class='row form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>
                    <div class='col-lg-1'>
                        <input required='required' type='text' disabled name='no_urut' value='$kode'    class='form-control'>
                    
                    </div>
               

                    <div class='col-lg-1'>
                        <input required='required' name='pengajuan' disabled type='text' value='$r[pengajuan]'  id='text1'  class='form-control'>
                    </div>
               
              

                <div class='col-lg-2'>
                <select name='id_perihal' id='id_perihal' disabled data-placeholder='Kode Perihal' class='form-control chzn-select' tabindex='2'>
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
                </div>

                    <div class='col-lg-1'>

                        <input required='required' disabled name='tahun' value='$r[tahun]' type='text' id='text1' placeholder='Nomor Surat' class='form-control'>
                    </div></div>
               
                 
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Perihal</label>

                    <div class='col-lg-6'>
                        <input required='required' name='perihal' value='$r[perihal]' type='text' id='text1' placeholder='Nomor Surat' class='form-control'>
                    </div>
                </div>

              
<div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Ditujukan Kepada</label>

                    <div class='col-lg-6'>
                        <input required='required' name='ditujukan' value='$r[ditujukan]' type='text' id='text1' placeholder='Ditujukan Kepada' class='form-control'>
                    </div>
                </div>
                <div class='form-group'>
                <label class='control-label col-lg-4'>Unit Pengelola</label>
                <div class='col-lg-6'>


                <select name='id_unitPengelola' id='id_unitPengelola'  data-placeholder='Unit Pengelola' class='form-control chzn-select' tabindex='2'>
                <option value=''></option>";
                    $tampil = mysqli_query($konek, 'SELECT * FROM unit_pengelola order BY unit_pengelola');
                    if ($r["id_unitPengelola"] == 0) {
                        echo "<option value=0 selected>- Pilih  Pengelola -</option>";
                    }
                    while ($w = mysqli_fetch_array($tampil)) {
                        if ($r["id_unitPengelola"] == $w["id_unitPengelola"]) {
                            echo " <option value=$w[id_unitPengelola] selected>$w[unit_pengelola] </option>";
                        } else {
                            echo "<option value=$w[id_unitPengelola]>$w[unit_pengelola] </option>
                                     ";
                        }
                    }
                    echo "    
               </select>
               </div>
               </div>
               <div class='form-group'>
                        <label class='control-label col-lg-4'>Upload File</label>
                        <div class='col-lg-6'>
                            <div class='fileinput fileinput-new' data-provides='fileinput'>
                  <div class='input-group'>
                <div class='form-control uneditable-input span3' data-trigger='fileinput'><i class='glyphicon glyphicon-file fileinput-exists'></i> <span class='fileinput-filename'></span></div>
                <span class='input-group-addon btn btn-default btn-file'><span class='fileinput-new'>Select file</span><span class='fileinput-exists'>Change</span><input type='file' value='$r[nama_file]' name='fupload'></span>
                <a href='#' class='input-group-addon btn btn-default fileinput-exists' data-dismiss='fileinput'>Remove</a>
                  </div>
                </div>
                        </div>
                    </div>

                   
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
                case "tambah":
                    $data = mysqli_query($konek, "select * from surat_masuk order by no_agenda DESC LIMIT 0,1");
                    $i = mysqli_fetch_array($data);
                    // ID OTOMATIS//***************************************************
                    $kode = substr($i['no_agenda'], 0) + 1;
                    $tgl_sekarng = date('Y-m-d');
                    echo "
<div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Input Data Surat Masuk</h5>
         
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
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/surat_masuk/aksi_suratmasuk.php?act=input' enctype='multipart/form-data' >
<div class='form-group'>
                    <label class='control-label col-lg-4'>Pengelola</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' value='disabled' disabled class='form-control'>
                    </div>
                </div>
               
                 <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Tanggal Terima</label>

                        <div class='col-lg-3'>
                            <div class='input-group input-append date' id='dpYears' data-date='$tgl_sekarng'
                                 data-date-format='yyyy-mm-dd'>
                                <input name='tgl_terima' class='form-control' type='text' value='$tgl_sekarng' readonly>
                                <span class='input-group-addon add-on'><i class='fa fa-calendar'></i></span>
                            </div>
                        </div>
                    </div>
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dp3'>Tanggal Surat</label>

                        <div class='col-lg-3'>
                            <div class='input-group input-append date' id='dp3' data-date='$tgl_sekarng'
                                 data-date-format='yyyy-mm-dd'>
                                <input name='tgl_surat' class='form-control' type='text' value='$tgl_sekarng' readonly>
                                <span class='input-group-addon add-on'><i class='fa fa-calendar'></i></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Asal Surat</label>

                    <div class='col-lg-6'>
                        <input required='required' name='asal_surat' type='text' id='text1' placeholder='Asal Surat' class='form-control'>
                    </div>
                </div>
               

                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>

                    <div class='col-lg-6'>
                        <input required='required' name='nomor_surat' type='text' id='text1' placeholder='Nomor Surat' class='form-control'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='limiter' class='control-label col-lg-4'>Perihal</label>

                    <div class='col-lg-6'>
                        <textarea required='required' name='perihal' id='limiter' class='form-control'></textarea>
                    </div>
                </div>
                 
               <div class='form-group'>
                        <label class='control-label col-lg-4'>Upload File</label>
                        <div class='col-lg-8'>
                            <div class='fileinput fileinput-new' data-provides='fileinput'>
                  <div class='input-group'>
                <div class='form-control uneditable-input span3' data-trigger='fileinput'><i class='glyphicon glyphicon-file fileinput-exists'></i> <span class='fileinput-filename'></span></div>
                <span class='input-group-addon btn btn-default btn-file'><span class='fileinput-new'>Select file</span><span class='fileinput-exists'>Change</span><input type='file' name='fupload'></span>
                <a href='#' class='input-group-addon btn btn-default fileinput-exists' data-dismiss='fileinput'>Remove</a>
                  </div>
                </div>
                        </div>
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

                case "detail":

                    $detaill = mysqli_query($konek, "SELECT * FROM surat_keluar  WHERE id_nomor='$_GET[id]' ");
                    $rr    = mysqli_fetch_array($detaill);
                    $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$rr[id_perihal]'");
                    $p2 = mysqli_fetch_array($perihal);
                    $pengelola = mysqli_query($konek, "SELECT * FROM unit_pengelola WHERE id_unitPengelola='$rr[id_unitPengelola]'");
                    $p3 = mysqli_fetch_array($pengelola);

                    $kode2 = $rr['no_agenda'];

                    if ($kode2 < 10) {
                        $kode = '000' . $kode2;
                    } elseif ($kode2 > 9 && $kode2 <= 99) {
                        $kode = '00' . $kode2;
                    } else {
                        $kode = '0' . $kode2;
                    }
                    echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                                         
<div class='row'>
  <div class='col-lg-12'>
        <div class='box'>
            <header>
                <div class='icons'><i class='fa fa-table'></i></div>
                <h5>Detail Arsip Surat Keluar</h5>
            </header>
            <div id='collapse4' class='body'>
                <table   class='table table-bordered '>
                   
                    <tbody>";
                    echo "
                            <tr>
                                    <td>Ditujukan Kepada &nbsp : $rr[ditujukan]</td>
                                    <td>Tanggal Posting &nbsp &nbsp &nbsp: $rr[tgl_posting]</td>    
                                     </tr>
                            <tr>
                                    <td>Tanggal Surat&nbsp &nbsp &nbsp &nbsp: $rr[tgl_surat] </td>
                                    <td>Nomor Surat &nbsp &nbsp &nbsp &nbsp &nbsp:  $rr[no_urut]/$rr[pengajuan]/$p2[kode_perihal]/$rr[tahun] </td>
                                     </tr>
                                     </tbody></table>
                                      <table   class='table table-bordered '>
                                <tbody>
                                <tr><td>Unit Pengelola &nbsp &nbsp: $p3[unit_pengelola]</td></tr>
                                <tr><td>Perihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[perihal]</td></tr>
                             
                                <tr><td>File Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$rr[id_nomor]&act=surat-keluar'> $rr[nama_file]</a></strong></td></tr>
                                 </table>"; ?>

              <?php
                    echo "
                    </tr></thead></table>
                   


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
            }
        } else {
            // Tindakan jika 'aksi' tidak ada dalam URL
            echo "<div id='content'>
<div class='outer'>
    <div class='inner bg-light lter'>
 
        
<div class='row'>
<div class='col-lg-12'>
<div class='box'>
<header>
<div class='icons'><i class='fa fa-table'></i></div>
<h5>Data Surat Keluar</h5>
</header>
<div id='collapse4' class='body'>
<table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
<thead>
<tr>
<th>No</th>
   <th>Tanggal</th>
   <th>Ditujukan Kepada</th>
    <th>Nomor Surat</th>
    <th>Tgl Surat</th>
    <th>Unit Pengelola</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>";

            $tp = mysqli_query($konek, 'SELECT * FROM surat_keluar ORDER BY id_nomor asc');
            $no = 0;
            while ($r = mysqli_fetch_array($tp)) {
                $no++;
                $pengelola = mysqli_query($konek, "SELECT * FROM unit_pengelola WHERE id_unitPengelola='$r[id_unitPengelola]'");
                $p1 = mysqli_fetch_array($pengelola);
                $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
                $p2 = mysqli_fetch_array($perihal);
                $kode2 = $r['no_urut'];

                if ($kode2 < 10) {
                    $kode = '000' . $kode2;
                } elseif ($kode2 > 9 && $kode2 <= 99) {
                    $kode = '00' . $kode2;
                } else {
                    $kode = '00' . $kode2;
                }
                $tgl_sekarng = date('Y-m-d');
                $tahun = date('Y');

                echo "
        <tr>
            <td>$no</td>
                <td>$r[tgl_posting]</td>
                <td>$r[ditujukan]</td>
                <td>$kode/$r[pengajuan]/$p2[kode_perihal]/$r[tahun]</td>
                <td>$r[tgl_surat]</td>
              <td>$p1[unit_pengelola]</td>
                "; ?>
              <?php echo "
           <td align='center'>
           <a data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default' href='?hal=data-suratkeluar&aksi=edit&id=$r[id_nomor]'></a>
           <a class='glyphicon glyphicon-eye-open btn btn-default' href='?hal=data-suratkeluar&aksi=detail&id=$r[id_nomor]'></a>

           "; ?>
              <a onclick="return confirm('Hapus Data?')" <?php echo " data-toggle='tooltip' data-original-title='Hapus' class='btn btn-danger' href='modul/surat_keluar/aksi_suratkeluar.php?act=hapus&id=$r[id_nomor]&namafile=$r[nama_file]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
              </a>
  <?php echo "
           </td>
        </tr>";
            }
            echo "
       
</tbody>                </table>
</div>
</div>
</div>
</div>
    </div>
 
</div>

</div>
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
</div>";
        }
    }
    ?>



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
  <script>
      $("form").submit(function() {
          $("input").removeAttr("disabled");
          $("select").removeAttr("disabled");
      });
  </script>
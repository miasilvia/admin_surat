  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
  <script src="assets/lib/jquery/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

  <?php
    include "../config/koneksi.php";
    $q = mysqli_query($konek, "select * from admin where username='" . $_SESSION['username'] . "'");
    $b = mysqli_fetch_array($q); ?>
  <?php
    if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
        echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
        echo "<a href=../../index.php><b>LOGIN</b></a></center>";
    } else {
        $aksi = "aksi_suratmasuk.php";
        if (isset($_GET['aksi'])) {
            switch ($_GET['aksi']) {
                default:
                    echo " 
                <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'><br>
                        <p align='right'></p><a href='?hal=data-suratmasuk&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a>
                        <div class='row'>
                        <div class='col-lg-12'>
                        <div class='box'>
                        <header>
                            <div class='icons'><i class='fa fa-table'></i></div>
                            <h5>Data Agenda Surat Masuk</h5>
            </header>
            <div id='collapse4' class='body'>
                <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
                    <thead>
                    <tr>
                 <th>No</th> 
                        <th>Tgl Surat</th>
                        <th>Asal Surat</th>
                        <th>Nomor Surat</th>
                        <th>Pengelola</th>
                        <th>Status Disposisi</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>";

                    $tp = mysqli_query($konek, "SELECT * FROM surat_masuk ORDER BY no_agenda DESC");
                    $no = 0;
                    while ($r = mysqli_fetch_array($tp)) {
                        $no++;
                        $tgl_surat = $r["tgl_surat"];
                        $format_tglsurat = date('d F Y', strtotime($tgl_surat));

                        $disposisi = mysqli_query($konek, "SELECT * FROM disposisi WHERE id_surat='$r[id_surat]'");
                        // Memeriksa apakah baris ditemukan dalam hasil query
                        if (mysqli_num_rows($disposisi) > 0) {
                            $p2 = mysqli_fetch_array($disposisi);
                            echo "
                            <tr>
                              <td>$r[no_agenda]</td>    
                                    <td>$format_tglsurat</td>
                                    <td>$r[asal_surat]</td>
                                    <td>$r[nomor_surat]</td>
                                    <td>$r[pengelola]</td>
                                  
                                    <td>";
                            echo "Sudah Dibuat";
                        } else {
                            echo " <>
                        <td>$r[no_agenda]</td>    
                        <td>$format_tglsurat</td>
                        <td>$r[asal_surat]</td>
                        <td>$r[nomor_surat]</td>
                        <td>$r[pengelola]</td>
                        <td><font color=red>Belum Dibuat</font></td>
                    ";
                        }
                        echo " </td>
                                    "; ?>
                      <?php echo "
                               <td align='center'><a data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default' href='?hal=data-suratmasuk&aksi=edit&id=$r[id_surat]'></a>
                               <a data-toggle='tooltip' data-original-title='Detail' class='glyphicon glyphicon-eye-open btn btn-default' href='?hal=data-suratmasuk&aksi=detail&id=$r[id_surat]'></a>"; ?>
                      <?php echo "
                               <a data-toggle='tooltip' data-original-title='Buat Disposisi' class='btn btn-primary glyphicon glyphicon-list-alt' href='?hal=data-suratmasuk&aksi=disposisi&id=$r[id_surat]' >
  
</a>"; ?>
                      <a onclick="return confirm('Hapus Data?')" <?php echo "data-toggle='tooltip' data-original-title='Hapus' class='btn btn-danger' href='modul/surat_masuk/aksi_suratmasuk.php?act=hapus&id=$r[id_surat]&namafile=$r[nama_file]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
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
                    $edit = mysqli_query($konek, "SELECT * FROM surat_masuk WHERE id_surat='$_GET[id]'");
                    $r    = mysqli_fetch_array($edit);
                    echo "
 <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Edit Data Agenda Surat Masuk</h5>
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
            <form class='form-horizontal' method='post' action='modul/surat_masuk/aksi_suratmasuk.php?act=update' enctype='multipart/form-data'>

              
                <input type=hidden name=id value=$r[id_surat]>
                    <div class='form-group'>
                    <label class='control-label col-lg-4'>Pengelola</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' name='pengelola' value='$b[nama_lengkap]' disabled='disabled' class='form-control'>
                    </div>
                </div>
                  <div class='form-group'>
                    <label class='control-label col-lg-4'>Pengelola</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' name='no_agenda' value='$r[no_agenda]' class='form-control'>
                    </div>
                </div>
                <div class='form-group'   >
             <label class='control-label col-lg-4' for='dpYears'>Tanggal Surat</label>
                        <div class='col-lg-3'>
                                <input name='tgl_surat' class='form-control' type='date' value='$r[tgl_surat]' > 
                            </div>
                        </div>
               <div class='form-group'   >
             <label class='control-label col-lg-4' for='dpYears'>Tanggal Terima</label>
                        <div class='col-lg-3'>
                                <input name='tgl_terima' class='form-control' type='date' value='$r[tgl_terima]' > 
                            </div>
                        </div>

                 
                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Asal Surat</label>

                    <div class='col-lg-6'>
                        <input required='required' name='asal_surat' value='$r[asal_surat]' type='text' id='text1' placeholder='Asal Surat' class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>

                    <div class='col-lg-6'>
                        <input required='required' name='nomor_surat' value='$r[nomor_surat]' type='text' id='text1' placeholder='Nomor Surat' class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Perihal</label>

                    <div class='col-lg-6'>
                        <input required='required' name='perihal' value='$r[perihal]' type='text' id='text1' placeholder='Perihal' class='form-control'>
                    </div>
                </div>

                <div class='form-group'>
                <label class='control-label col-lg-4'>Upload File</label>
                <div class='col-lg-6'>
                <div class='fileinput fileinput-new' data-provides='fileinput'>
                <div class='input-group'>
                <div class='form-control uneditable-input span3' data-trigger='fileinput'><i class='glyphicon glyphicon-file fileinput-exists'></i> <span class='fileinput-filename'></span></div>
                <span class='input-group-addon btn btn-default btn-file'><span class='fileinput-new'>Select file</span><span class='fileinput-exists'>Change</span><input type='file'  value='$r[nama_file]' name='fupload'></span>
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
                    $result = mysqli_query($konek, "SELECT MAX(no_agenda) as max_agenda FROM surat_masuk");

                    $row = mysqli_fetch_assoc($result);
                    $max_agenda = $row['max_agenda'] ?? 0;
                    $a = $max_agenda + 1;
                    echo "
<div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Input Data Agenda Surat Masuk</h5>
         
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
            <input type=hidden name=id value='$a'>
                <div class='form-group'>
                    <label class='control-label col-lg-4'>Pengelola</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' name='pengelola' value='$b[nama_lengkap]' disabled='disabled' class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label class='control-label col-lg-4'>No Agenda</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' name='no_agenda' value='$a'  class='form-control'>
                    </div>
                </div>
               <div class='form-group'   >
             <label class='control-label col-lg-4' for='dpYears'>Tanggal Terima</label>
                        <div class='col-lg-3'>
                                <input name='tgl_terima' class='form-control' type='date' value='$tgl_sekarang' > 
                            </div>
                        </div>
                        <div class='form-group'   >
             <label class='control-label col-lg-4' for='dpYears'>Tanggal Surat</label>
                        <div class='col-lg-3'>
                                <input name='tgl_surat' class='form-control' type='date' value='$tgl_sekarang' > 
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
                    <label for='text1' class='control-label col-lg-4'>Perihal</label>
                    <div class='col-lg-6'>
                        <input required='required' name='perihal'  type='text' id='text1' placeholder='Perihal' class='form-control'>
                    </div>
                </div>
                 
               <div class='form-group'>
                        <label class='control-label col-lg-4'>Upload File</label>
                        <div class='col-lg-6'>
                            <div class='fileinput fileinput-new' data-provides='fileinput'>
                  <div class='input-group'>
                <div class='form-control uneditable-input span3' data-trigger='fileinput'><i class='glyphicon glyphicon-file fileinput-exists'></i> <span class='fileinput-filename'></span></div>
                <span class='input-group-addon btn btn-default btn-file'><span class='fileinput-new'>Select file</span><span class='fileinput-exists'>Change</span><input type='file'  required='required'  name='fupload'></span>
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
                case "disposisi":

                    $edit = mysqli_query($konek, "SELECT * FROM surat_masuk WHERE id_surat='$_GET[id]'");
                    $r    = mysqli_fetch_array($edit);
                    $disposisi = mysqli_query($konek, "SELECT * FROM disposisi WHERE id_surat='$r[id_surat]'");
                    $p2 = mysqli_fetch_array($disposisi);
                    $kode2 = $r['no_agenda'];

                    if ($kode2 < 10) {
                        $kode = '000' . $kode2;
                    } elseif ($kode2 > 9 && $kode2 <= 99) {
                        $kode = '00' . $kode2;
                    } else {
                        $kode = '0' . $kode2;
                    }


                    echo "
<div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Buat Disposisi Surat Masuk</h5>
         
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
        </header>";
                    if ($p2['id_surat']) {
                        echo "<br/><br/><br/><br/><center><font size=7> Disposisi Sudah Dibuat</font></center><br/><br/><br/><br/><br/><br/><br/><br/> ";

                        echo "</div></div></div></div></div></div>";
                    } else {

                        echo "
        <div id='div-1' class='body'>
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/surat_masuk/aksi_suratmasuk.php?act=disposisi' enctype='multipart/form-data' >
            <input type=hidden name=id value= '$_GET[id]' >
            <div id='collapse4' class='body'>
                <table   class='table table-bordered '>     
                    <tbody>
                            <tr>   
                                    <td>Nomor Agenda &nbsp &nbsp: $kode</td>
                                    <td>Tanggal Terima &nbsp &nbsp &nbsp: $r[tgl_terima]</td>    
                            </tr>
                            <tr>
                                    <td>Tanggal Surat&nbsp &nbsp &nbsp &nbsp: $r[tgl_surat] </td>
                                    <td>Nomor Surat &nbsp &nbsp &nbsp &nbsp &nbsp: $r[nomor_surat] </td>
                            </tr>
                                     </tbody></table>
                                    <table   class='table table-bordered '>
                                <tbody>
                                <tr><td>Asal Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $r[asal_surat]</td></tr>
                                <tr><td>Perihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $r[perihal]</td></tr>

                                </table>
            <div class='form-group'>
    <label class='control-label col-lg-4'>Diteruskan Kepada</label>

    <div class='col-lg-6'>
        <select name='admin[]' id='admin' required data-placeholder='Pilih yang ingin diteruskan' multiple class='form-control chzn-select' tabindex='8'>
            <option value=''></option>";


                        $level = 'Unit Kerja';

                        $tampil = mysqli_query($konek, "SELECT * FROM admin  WHERE level='$level' order by id_admin");
                        while ($r = mysqli_fetch_array($tampil)) {

                            $jabatan = mysqli_query($konek, "SELECT * FROM jabatan WHERE id_jabatan='$r[id_jabatan]'");
                            $p2 = mysqli_fetch_array($jabatan);

                            echo " <option value=$r[id_admin]>$r[nama_lengkap] ( $p2[nama_jabatan]) </option>";
                        }

                        echo "
                   </select>
    </div>
</div>
 <div class='form-group'>
                <label class='control-label col-lg-4'>Unit Pengelola</label>

                <div class='col-lg-6'>
                <select name='id_unitPengelola' id='id_unitPengelola'  data-placeholder='Pilih Unit Pengelola' class='form-control chzn-select' tabindex='2'>
                <option value=''></option>";

                        $unit = mysqli_query($konek, "SELECT * FROM unit_pengelola order BY unit_pengelola ");
                        while ($r = mysqli_fetch_array($unit)) {
                            echo "
              <option value=$r[id_unitPengelola]>$r[unit_pengelola]</option>";
                        }
                        echo "
               
                </select>
                </div>
                </div>
               <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>sifat surat</label>
            <div class='col-lg-6'>
          <br><input type='radio' name='sifat_surat' value='rahasia'>&nbsp; Rahasia
          <br><input type='radio' name='sifat_surat' value='penting'>&nbsp; Penting
          <br><input type='radio' name='sifat_surat' value='segera'>&nbsp; Segera
          <br><input type='radio' name='sifat_surat' 
          value='biasa' >&nbsp; Biasa
                  </div></div></div>
        <div class='form-actions no-margin-bottom'>
                        <input type='submit' value='Simpan' class='btn btn-primary'>
                    </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
                        </div>
                    </div>
                </div>
            </div>";
                    }
                    echo "";
                    break;
                case "detail":
                    $detaill = mysqli_query($konek, "SELECT * FROM surat_masuk WHERE id_surat='$_GET[id]'");
                    $rr    = mysqli_fetch_array($detaill);
                    $detail = mysqli_query($konek, "SELECT * FROM surat_masuk, disposisi WHERE disposisi.id_surat=surat_masuk.id_surat AND disposisi.id_surat='$_GET[id]'");
                    $r    = mysqli_fetch_array($detail);

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
                <h5>Detail Surat Masuk dan Disposisi</h5>
            </header>
            <div id='collapse4' class='body'>
                <table   class='table table-bordered '>
                   
                    <tbody>";

                    echo "
                    <br/> 
                    <a href='modul/surat_masuk/convert.php?id=$rr[id_surat]' target='_blank'  type='button' class='btn btn-danger' >Cetak Disposisi</button>
                            </a><br/><br/>   
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
                                <tr><td>Asal Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[asal_surat]</td></tr>
                                <tr><td>Perihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[perihal]</td></tr>
                                <tr><td>Status Disposisi &nbsp &nbsp: 
                                ";

                    if ($r['id_surat']) {
                        echo "Disposisi Sudah Dibuat";
                    } else {
                        echo "<font color=red>DsiposisiBelum Dibuat</color>";
                    }

                    echo "
                                </td></tr>
                                <tr><td>Sifat Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $r[sifat_surat]</td></tr>
                               ";
                    $status = "Disposisi Sudah Komplit";
                    while ($r2 = mysqli_fetch_array($detail)) {

                        if ($r2["isi_disposisi"] == '') {
                            $status = "<font color=red>Disposisi Belum Komplit</color>";
                        }
                    }
                    echo "
                                <tr><td>Status Isi Disposisi : $status</td></tr>
                                 <tr><td>File Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$rr[id_surat]&act=surat-masuk'> $rr[nama_file]</a></strong></td></tr>
                                 </table>"; ?>

                  <?php
                    $detail2 = mysqli_query($konek, "SELECT * FROM surat_masuk, disposisi WHERE disposisi.id_surat=surat_masuk.id_surat AND disposisi.id_surat='$_GET[id]'");
                    $no = 0;
                    echo "       

                                  
                                   <table  class='table table-bordered '> <tbody>
                                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Diteruskan Kepada</th>
                       <th>Isi Disposisi</th>
                        <th>Tanggal Pengisian</th>
                        <th>aksi</th>
                    </tr>";
                    while ($r2 = mysqli_fetch_array($detail2)) {
                        $no++;
                        $admin = mysqli_query($konek, "SELECT * FROM admin WHERE id_admin='$r2[id_admin]'");
                        $p4 = mysqli_fetch_array($admin);
                        echo "
                            <tr>
                            <td>$no</td>
                    <td>$p4[nama_lengkap]</td>
                    <td>$r2[isi_disposisi]</td>
                    <td>$r2[tgl_isi]</td>"; ?>
                      <?php echo " <td><a href='#edit_modal' class='btn btn-default btn-small' data-toggle='modal' data-id=" . $r2['id'] . ">Isi Disposisi</a>";
                        ?>
                      <a onclick="return confirm('Hapus Data?')" <?php echo "data-toggle='tooltip' data-original-title='Hapus' class='btn btn-danger' href='modul/surat_masuk/aksi_suratmasuk.php?act=hapus2&id=$r2[id]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
                      </a>
                      <?php echo "
</td>"; ?>
              <?php


                    }
                    echo "
                    </tr></thead></table>
                   
<div class='modal fade' id='edit_modal' role='dialog'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Isi Disposisi</h4>
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



            </div>
        </div>
    </div>
</div>

<br/><br/><br/><br/>
                        </div>
                    </div>
                  
                </div>
                  
            </div>

      ";
                    echo "";
                    break;
            }
        } else {
            echo "<div id='content'>
        <div class='outer'>
            <div class='inner bg-light lter'><br>
            <p align='right'></p><a href='?hal=data-suratmasuk&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a>
            <div class='row'>
            <div class='col-lg-12'>
            <div class='box'>
            <header>
                <div class='icons'><i class='fa fa-table'></i></div>
                <h5>Data Agenda Surat Masuk</h5>
</header>
<div id='collapse4' class='body'>
    <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
        <thead>
        <tr>
            <th>No</th> 
            <th>Tgl Surat</th>
            <th>Asal Surat</th>
            <th>Nomor Surat</th>
            <th>Pengelola</th>
            <th>Status Disposisi</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>";

            $tp = mysqli_query($konek, "SELECT * FROM surat_masuk ORDER BY no_agenda DESC");
            $no = 0;
            while ($r = mysqli_fetch_array($tp)) {
                $no++;
                $tgl_surat = $r["tgl_surat"];
                $format_tglsurat = date('d F Y', strtotime($tgl_surat));

                $disposisi = mysqli_query($konek, "SELECT * FROM disposisi WHERE id_surat='$r[id_surat]'");
                // Memeriksa apakah baris ditemukan dalam hasil query
                if (mysqli_num_rows($disposisi) > 0) {
                    $p2 = mysqli_fetch_array($disposisi);
                    echo "
                <tr>
                  <td>$r[no_agenda]</td>    
                        <td>$format_tglsurat</td>
                        <td>$r[asal_surat]</td>
                        <td>$r[nomor_surat]</td>
                        <td>$r[pengelola]</td>
                      
                        <td>";
                    echo "Sudah Dibuat";
                } else {
                    echo " 
            <td>$r[no_agenda]</td>    
            <td>$format_tglsurat</td>
            <td>$r[asal_surat]</td>
            <td>$r[nomor_surat]</td>
            <td>$r[pengelola]</td>
            <td><font color=red>Belum Dibuat</font></td>
        ";
                }
                echo " </td>
                        "; ?>
              <?php echo "
                   <td align='center'><a data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default' href='?hal=data-suratmasuk&aksi=edit&id=$r[id_surat]'></a>
                   <a data-toggle='tooltip' data-original-title='Detail' class='glyphicon glyphicon-eye-open btn btn-default' href='?hal=data-suratmasuk&aksi=detail&id=$r[id_surat]'></a>"; ?>
              <?php echo "
                   <a data-toggle='tooltip' data-original-title='Buat Disposisi' class='btn btn-primary glyphicon glyphicon-list-alt' href='?hal=data-suratmasuk&aksi=disposisi&id=$r[id_surat]' >

</a>"; ?>
              <a onclick="return confirm('Hapus Data?')" <?php echo "data-toggle='tooltip' data-original-title='Hapus' class='btn btn-danger' href='modul/surat_masuk/aksi_suratmasuk.php?act=hapus&id=$r[id_surat]&namafile=$r[nama_file]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
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

  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#edit_modal').on('show.bs.modal', function(e) {
              var idx = $(e.relatedTarget).data('id');
              //menggunakan fungsi ajax untuk pengambilan data
              $.ajax({
                  type: 'post',
                  url: 'modul/surat_masuk/detail.php',
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
      $("form").submit(function() {
          $("input").removeAttr("disabled");
      });
  </script>
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
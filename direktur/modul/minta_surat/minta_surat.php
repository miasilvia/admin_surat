  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
  <script src="assets/lib/jquery/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <?php $q = mysqli_query($konek, "SELECT * from admin where username='" . $_SESSION['username'] . "'");
    $b = mysqli_fetch_array($q); ?>

  <?php
    session_start();
    if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
        echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
        echo "<a href=../../index.php><b>LOGIN</b></a></center>";
    } else {
        $aksi = "modul/minta_surat/aksi_mintasurat.php";
        switch ($_GET['aksi']) {
            default:
                echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        <p align='right'></p><a href='?dir=minta-surat&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a>                       
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
              <th>Jenis Permintaan</th>
              <th>Tgl Surat</th>
               <th>Kode Perihal</th>
              <th>Status Balasan</th>
              <th>Aksi</th>
              </tr>
              </thead>
              <tbody>";
                $tp = mysqli_query($konek, "SELECT * FROM permintaan per JOIN admin adm ON per.id_admin=adm.id_admin where adm.id_admin= '" . $_SESSION["id_login"] . "' ORDER BY per.id_permintaan  ASC");
                while ($r = mysqli_fetch_array($tp)) {
                    $no++;
                    $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
                    $p2 = mysqli_fetch_array($perihal);

                    echo "
                            <tr>
                                <td>$no</td>
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
                                   
                               <td align='center'>
                             <a href='#edit_modal2' class='glyphicon glyphicon-eye-open btn btn-default' data-toggle='modal' data-id=" . $r['id_permintaan'] . "> </a>"; ?>

                  <a data-toggle='tooltip' data-original-title='Hapus' onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' href='modul/minta_surat/aksi_mintasurat.php?act=hapus&id=$r[id_permintaan]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
                  </a>

  <?php echo "
                            </td>


                            </tr>";
                }
                echo "
                           
                    </tbody>                </table>
                     <div class='modal fade' id='edit_modal2' role='dialog'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>Proses Surat Masuk</h4>
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
                $edit = mysqli_query($konek, "SELECT * FROM buat_suratdinas WHERE id_buatsurat='$_GET[id]' ");
                $r    = mysqli_fetch_array($edit);


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
            <h5>Edit Data Surat</h5>
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
            <form class='form-horizontal' method='post' action='modul/buat_suratdinas/aksi_suratdinas.php?act=update' enctype='multipart/form-data'>

                <input type=hidden name=id value=$r[id_buatsurat]>
                   
            <div class='form-group'>
            <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>
            <div class='col-lg-6'>
            <input required='required' type='text' name='nomor_surat' value='$r[nomor_surat]'  class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Lampiran</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='lampiran' value='$r[lampiran]'  class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Perihal</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='hal' value='$r[hal]'  class='form-control'>
                    </div>
                </div>
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Tanggal Surat</label>
                        <div class='col-lg-3'>
                           
                                <input name='tgl_surat' class='form-control' type='date' value='$r[tgl_surat]' >
                               
                        </div>
                    </div>
                     <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Kota Tanggal</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='kota' value='$r[kota]'   class='form-control'>
                    </div>
                </div>
                   <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Penerima</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='penerima' value='$r[penerima]'   class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Tempat Penerima</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='tempat_penerima' value='$r[tempat_penerima]'   class='form-control'>
                    </div>
                </div>
                   <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Jabatan yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='jabatan_ttd' value='$r[jabatan_ttd]'   class='form-control'>
                    </div>
                </div>
                   <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nama yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nama_ttd' value='$r[nama_ttd]'   class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nomor Induk</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nomor_induk' value='$r[nomor_induk]'   class='form-control'>
                    </div>
                </div>
                 
                <div class='form-group'>
                    <label for='limiter' class='control-label col-lg-2'>Isi Surat</label>

                   <div class='col-lg-8'>
                        <textarea name='isi_surat' >$r[isi_surat]</textarea>
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
                    <input required='required' type='hidden' name='id_admin' value='$b[id_admin]'  class='form-control'>
              
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
                                
                        </div></div>
                        <div class='form-group' >
                         <label for='text1' class='control-label col-lg-4'>Perihal</label>
                    <div class='col-lg-6'>
                        <input  type='text' name='hal'  placeholder='Perihal' class='form-control'>
                    </div></div>
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

            case "done":
                $input = mysqli_query($konek, "SELECT * FROM nomor_surat  WHERE id_nomor='$_GET[id]' ");
                $r    = mysqli_fetch_array($input);

                // ID OTOMATIS//***************************************************
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
 <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Input Data Surat Keluar</h5>
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
            <form class='form-horizontal' method='post' action='modul/nomor_surat/aksi_nomorsurat.php?act=input2' enctype='multipart/form-data'>
<div class='form-group'>
                    <label class='control-label col-lg-4'>Pengelola</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' value='disabled' disabled class='form-control'>
                    </div>
                </div>
              
                <input type=hidden name=id value=$r[id_nomor]>
                 <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Tanggal Minta</label>

                        <div class='col-lg-3'>
                         <input name='tgl_minta' value='$r[tgl_minta]' class='form-control' type='text' value='$tgl_sekarng' >
                             
                        </div>
                    </div>
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dp3'>Tanggal Surat</label>

                        <div class='col-lg-3'>
                          
                                <input name='tgl_surat' value='$r[tgl_surat]'  class='form-control' type='date' value='$tgl_sekarng' >
                              
                        </div>
                    </div>
                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nomor Urut</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='no_urut' value='$kode'    class='form-control'>
                    </div>
                </div>
                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Pengajuan</label>

                    <div class='col-lg-6'>
                        <input required='required' name='pengajuan' type='text' value='$r[pengajuan]'  id='text1'  class='form-control'>
                    </div>
                </div>
               

                <div class='form-group'>
                <label class='control-label col-lg-4'>Perihal</label>

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
                </div>
                </div>


                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Tahun</label>

                    <div class='col-lg-6'>
                        <input required='required' name='tahun' value='$r[tahun]' type='text' id='text1' placeholder='Nomor Surat' class='form-control'>
                    </div>
                </div>
              
                 
                 <div class='form-group'>
                    <label for='limiter' class='control-label col-lg-4'>Perihal</label>

                    <div class='col-lg-6'>
                        <textarea required='required' name='perihal' class='form-control'>$r[perihal]</textarea>
                    </div>
                </div>
 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Ditujukan Kepada</label>

                    <div class='col-lg-6'>
                        <input required='required' name='ditujukan' type='text' id='text1' placeholder='Ditujukan Kepada' class='form-control'>
                    </div>
                </div>
                <div class='form-group'>
                <label class='control-label col-lg-4'>Unit Pengelola</label>
                <div class='col-lg-6'>
                <select name='id_unitPengelola' id='id_unitPengelola'  data-placeholder='Unit Pengelola' class='form-control chzn-select' tabindex='2'>
                <option value=''></option>";
                $tampil = mysqli_query($konek, 'SELECT * FROM unit_pengelola order BY unit_pengelola');
                while ($r = mysqli_fetch_array($tampil)) {
                    echo " <option value=$r[id_unitPengelola]>$r[unit_pengelola] </option>";
                }

                echo "
               
               </select>
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
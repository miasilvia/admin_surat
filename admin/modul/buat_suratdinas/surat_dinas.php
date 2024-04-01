  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
  <script src="assets/lib/jquery/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>


  <?php
    if (empty($_SESSION['username']) and empty($_SESSION['passuser'])) {
        echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
        echo "<a href=../../index.php><b>LOGIN</b></a></center>";
    } else {
        $aksi = "modul/buat_suratdinas/aksi_suratdinas.php";
        if (isset($_GET['aksi'])) {


            switch ($_GET['aksi']) {
                default:
                    echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        <p align='right'></p><a href='?hal=buat-suratdinas&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a>                       
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
              <th>Nomor Surat</th>
              <th>Tgl Surat</th>
              <th>Penerima</th>
     
              <th>Aksi</th>
             
              </tr>
              </thead>
              <tbody>";

                    $tp = mysqli_query($konek, "SELECT * FROM buat_suratdinas where jenis_surat='surat dinas' ORDER BY id_buatsurat ASC");
                    while ($r = mysqli_fetch_array($tp)) {
                        $no++;
                        echo "
                            <tr>
                                <td>$no</td>
                                    <td>$r[nomor_surat]</td>
                                    <td>$r[tgl_surat]</td>
                                    <td>$r[penerima]</td> "; ?>
                      <?php echo "
                               <td align='center'>
                               <a data-toggle='tooltip' data-original-title='Cetak Surat' href='modul/buat_suratdinas/convert.php?id=$r[id_buatsurat]' role='button' class='glyphicon glyphicon-print  btn btn-metis-4' target='_blank'></a>  
                              <a data-toggle='tooltip' data-original-title='Duplikat Surat'  class='glyphicon glyphicon-copy  btn btn-primary' href='?hal=buat-suratdinas&aksi=duplikat&id=$r[id_buatsurat]'></a>
                               <a data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default' href='?hal=buat-suratdinas&aksi=edit&id=$r[id_buatsurat]'></a>
                                

                               "; ?>

                      <a data-toggle='tooltip' data-original-title='Hapus' onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' href='modul/buat_suratdinas/aksi_suratdinas.php?act=hapus&id=$r[id_buatsurat]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
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
                case "tampilTugas":
                    echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        <p align='right'></p><a href='?hal=buat-suratdinas&aksi=tambahTugas' role='button' class='btn btn-primary'>Input Baru</a>                       
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
              <th>Nomor Surat</th>
              <th>Tgl Surat</th>
      
     
              <th>Aksi</th>
             
              </tr>
              </thead>
              <tbody>";

                    $tp = mysqli_query($konek, "SELECT * FROM buat_suratdinas where jenis_surat='surat tugas' ORDER BY id_buatsurat ASC");
                    while ($r = mysqli_fetch_array($tp)) {
                        $no++;
                        echo "
                            <tr>
                                <td>$no</td>
                                    <td>$r[nomor_surat]</td>
                                    <td>$r[tgl_surat]</td>
                                    "; ?>
                      <?php echo "
                               <td align='center'>
                               <a data-toggle='tooltip' data-original-title='Cetak Surat' href='modul/buat_suratdinas/convert2.php?id=$r[id_buatsurat]' role='button' class='glyphicon glyphicon-print  btn btn-metis-4' target='_blank'></a>  
                              <a data-toggle='tooltip' data-original-title='Duplikat Surat'  class='glyphicon glyphicon-copy  btn btn-primary' href='?hal=buat-suratdinas&aksi=duplikat2&id=$r[id_buatsurat]'></a>
                               <a data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default' href='?hal=buat-suratdinas&aksi=editST&id=$r[id_buatsurat]'></a> "; ?>
                      <a data-toggle='tooltip' data-original-title='Hapus' onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' href='modul/buat_suratdinas/aksi_suratdinas.php?act=hapus2&id=$r[id_buatsurat]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
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
                  <input type=hidden name='jenis_surat' value='$r[jenis_surat]'>
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

                   <div class='col-lg-12'>
                        <textarea rows='22' name='isi_surat' >$r[isi_surat]</textarea>
                    </div>
                </div>

                <div class='form-group'>
                    <label for='limiter' class='control-label col-lg-2'>Isi Surat</label>

                   <div class='col-lg-12'>
                        <textarea rows='22' name='tembusan' >$r[tembusan]</textarea>
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


                case "editST":
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
            <form class='form-horizontal' method='post' action='modul/buat_suratdinas/aksi_suratdinas.php?act=updateST' enctype='multipart/form-data'>
                <input type=hidden name=id value=$r[id_buatsurat]>
                 <input type=hidden name='jenis_surat' value='$r[jenis_surat]'>
            <div class='form-group'>
            <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>
            <div class='col-lg-6'>
            <input required='required' type='text' name='nomor_surat' value='$r[nomor_surat]'  class='form-control'>
                    </div>
                </div>
                
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Tanggal Surat</label>
                        <div class='col-lg-3'>
                                <input name='tgl_surat' class='form-control' type='date' value='$r[tgl_surat]' >  
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

                   <div class='col-lg-12'>
                        <textarea rows='22' name='isi_surat' >$r[isi_surat]</textarea>
                    </div>
                </div>

                <div class='form-group'>
                    <label for='limiter' class='control-label col-lg-2'>Isi Surat</label>

                   <div class='col-lg-12'>
                        <textarea rows='22' name='tembusan' >$r[tembusan]</textarea>
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
                    $ns = mysqli_query($konek, 'SELECT * FROM nomor_surat ORDER BY id_nomor desc
 limit 1 ');

                    $r = mysqli_fetch_array($ns);
                    $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
                    $p2 = mysqli_fetch_array($perihal);
                    $data = mysqli_query($konek, "SELECT * from buat_suratdinas ORDER by id_buatsurat DESC ");
                    $i = mysqli_fetch_array($data);
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
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/buat_suratdinas/aksi_suratdinas.php?act=input' enctype='multipart/form-data' >

     <input type=hidden name='jenis_surat' value='surat dinas'>
                <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nomor_surat' value='$r[no_urut]/$r[pengajuan]/$p2[kode_perihal]/$r[tahun]   ' class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Lampiran</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='lampiran' placeholder='Lampiran'   class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Perihal</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='hal'  placeholder='Perihal' class='form-control'>
                    </div>
                </div>
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Tanggal Surat</label>

                        <div class='col-lg-3'>
                           
                                <input name='tgl_surat' class='form-control' type='date' value='$tgl_sekarng'>
                              
                        </div>
                    </div>
<div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Kota Tanggal</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='kota' placeholder='Kota tanggal'  class='form-control'>
                    </div>
                </div>

                   <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Penerima Surat</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='penerima' placeholder= 'Penerima Surat'  class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Tempat Penerima</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='tempat_penerima' placeholder='Tempat Penerima'   class='form-control'>
                    </div>
                </div>
                   <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Jabatan yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='jabatan_ttd' placeholder='Jabatan yang Menandatangani'   class='form-control'>
                    </div>
                </div>
                   <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nama yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nama_ttd' placeholder='Nama yang Menandatangani'   class='form-control'>
                    </div>
                </div>
                  <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>nomor_induk</label>
                    <div class='col-lg-6'>
                        <input type='text' name='nomor_induk' placeholder='Nomor Induk (Kosongkan bila tidak ada)'   class='form-control'>
                    </div>
                </div>

                <div class='form-group'>
                    <center><b>ISI SURAT</b></center>

                    <div class='col-lg-12'>
                        <textarea rows='22' name='isi_surat'></textarea>
                    </div>
                </div>
                 
              <div class='form-group'>
                  <center><b>TEMBUSAN (jika ada)</b></center>

                    <div class='col-lg-12'>
                        <textarea name='tembusan'></textarea>
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

                case "tambahTugas":
                    $ns = mysqli_query($konek, 'SELECT * FROM nomor_surat ORDER BY id_nomor desc
 limit 1 ');

                    $r = mysqli_fetch_array($ns);
                    $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
                    $p2 = mysqli_fetch_array($perihal);
                    $data = mysqli_query($konek, "SELECT * from buat_suratdinas ORDER BY id_buatsurat DESC ");
                    $i = mysqli_fetch_array($data);
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
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/buat_suratdinas/aksi_suratdinas.php?act=inputTugas' enctype='multipart/form-data' >
 <input type=hidden name='jenis_surat' value='surat tugas'>
     
                <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nomor_surat' value='$r[no_urut]/$r[pengajuan]/$p2[kode_perihal]/$r[tahun]   ' class='form-control'>
                    </div>
                </div>
           
                
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Tanggal Surat</label>

                        <div class='col-lg-3'>
                           
                                <input name='tgl_surat' class='form-control' type='date' value='$tgl_sekarng'>
                              
                        </div>
                    </div>


                
                
                   <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Jabatan yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='jabatan_ttd' placeholder='Jabatan yang Menandatangani'   class='form-control'>
                    </div>
                </div>
                   <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nama yang menandatangani</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nama_ttd' placeholder='Nama yang Menandatangani'   class='form-control'>
                    </div>
                </div>
                  <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>nomor_induk</label>
                    <div class='col-lg-6'>
                        <input type='text' name='nomor_induk' placeholder='Nomor Induk (Kosongkan bila tidak ada)'   class='form-control'>
                    </div>
                </div>

                <div class='form-group'>
                    <center><b>ISI SURAT</b></center>

                    <div class='col-lg-12'>
                        <textarea rows='22' name='isi_surat'></textarea>
                    </div>
                </div>
                 
              <div class='form-group'>
                  <center><b>TEMBUSAN (jika ada)</b></center>

                    <div class='col-lg-12'>
                        <textarea name='tembusan'></textarea>
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
                case "duplikat":

                    $edit = mysqli_query($konek, "SELECT * FROM buat_suratdinas   WHERE id_buatsurat='$_GET[id]' ");
                    $r    = mysqli_fetch_array($edit);
                    $duplikat = mysqli_query($konek, "SELECT * FROM nomor_surat WHERE id_nomor='$_GET[id]'");
                    $r2    = mysqli_fetch_array($edit);
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
            <h5>Duplikat Data Surat</h5>
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
            <form class='form-horizontal' method='post' action='modul/buat_suratdinas/aksi_suratdinas.php?act=duplikat' enctype='multipart/form-data'>

                <input type=hidden name=id value=$r[id_buatsurat]>
                   <input type=hidden name='jenis_surat' value='$r[jenis_surat]'>
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
                                <input name='tgl_surat' class='form-control' type='date' value='$r[tgl_surat]'>
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
                  <div class='form-group'>
                    <label for='limiter' class='control-label col-lg-2'>Isi Surat</label>

                   <div class='col-lg-12'>
                        <textarea rows='22' name='tembusan' >$r[tembusan]</textarea>
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
                case "duplikat2":
                    $edit = mysqli_query($konek, "SELECT * FROM buat_suratdinas   WHERE id_buatsurat='$_GET[id]' ");
                    $r    = mysqli_fetch_array($edit);
                    $duplikat = mysqli_query($konek, "SELECT * FROM nomor_surat WHERE id_nomor='$_GET[id]'");
                    $r2    = mysqli_fetch_array($edit);
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
            <h5>Duplikat Data Surat</h5>
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
            <form class='form-horizontal' method='post' action='modul/buat_suratdinas/aksi_suratdinas.php?act=duplikat2' enctype='multipart/form-data'>

                <input type=hidden name=id value=$r[id_buatsurat]>
                   <input type=hidden name='jenis_surat' value='$r[jenis_surat]'>
            <div class='form-group'>
            <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>
            <div class='col-lg-6'>
            <input required='required' type='text' name='nomor_surat' value='$r[nomor_surat]'  class='form-control'>
                    </div>
                </div>
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Tanggal Surat</label>
                        <div class='col-lg-3'>
                                <input name='tgl_surat' class='form-control' type='date' value='$r[tgl_surat]'>
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
                  <div class='form-group'>
                    <label for='limiter' class='control-label col-lg-2'>Isi Surat</label>

                   <div class='col-lg-12'>
                        <textarea rows='22' name='tembusan' >$r[tembusan]</textarea>
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
        } else {
            echo "<div id='content'>
        <div class='outer'>
            <div class='inner bg-light lter'>
            <p align='right'></p><a href='?hal=buat-suratdinas&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a>                       
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
  <th>Nomor Surat</th>
  <th>Tgl Surat</th>
  <th>Penerima</th>

  <th>Aksi</th>
 
  </tr>
  </thead>
  <tbody>";

            $tp = mysqli_query($konek, "SELECT * FROM buat_suratdinas where jenis_surat='surat dinas' ORDER BY id_buatsurat ASC");
            while ($r = mysqli_fetch_array($tp)) {
                $no++;
                echo "
                <tr>
                    <td>$no</td>
                        <td>$r[nomor_surat]</td>
                        <td>$r[tgl_surat]</td>
                        <td>$r[penerima]</td> "; ?>
              <?php echo "
                   <td align='center'>
                   <a data-toggle='tooltip' data-original-title='Cetak Surat' href='modul/buat_suratdinas/convert.php?id=$r[id_buatsurat]' role='button' class='glyphicon glyphicon-print  btn btn-metis-4' target='_blank'></a>  
                  <a data-toggle='tooltip' data-original-title='Duplikat Surat'  class='glyphicon glyphicon-copy  btn btn-primary' href='?hal=buat-suratdinas&aksi=duplikat&id=$r[id_buatsurat]'></a>
                   <a data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default' href='?hal=buat-suratdinas&aksi=edit&id=$r[id_buatsurat]'></a>
                    

                   "; ?>

              <a data-toggle='tooltip' data-original-title='Hapus' onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' href='modul/buat_suratdinas/aksi_suratdinas.php?act=hapus&id=$r[id_buatsurat]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
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
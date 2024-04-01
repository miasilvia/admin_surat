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
        $aksi = "modul/arsip_suratmasuk/aksi_arsipsurat.php";
        if (isset($_GET['aksi'])) {
        switch ($_GET['aksi']) {
            default:
                echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        <p align='right'></p><a href='?hal=arsip-suratmasuk&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a>
                            
                <div class='row'>
                <div class='col-lg-12'>
                        <div class='box'>
                            <header>
                                <div class='icons'><i class='fa fa-table'></i></div>
                                <h5>Data Arsip Surat Masuk</h5>
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
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>";
                $tp = mysqli_query($konek, "SELECT * FROM arsip_suratmasuk ORDER BY id_surat ASC");
                $no = 0;
                while ($r = mysqli_fetch_array($tp)) {
                    $no++;
                    $pengelola = mysqli_query($konek, "SELECT * FROM unit_pengelola WHERE id_unitPengelola='$r[id_unitPengelola]'");
                    $p2 = mysqli_fetch_array($pengelola);

                    echo "
                                            <tr>
                                                <td>$no</td>
                                            
                                                    <td>$r[tgl_surat]</td>
                                                    <td>$r[asal_surat]</td>
                                                    <td>$r[nomor_surat]</td>
                                                    <td>$p2[unit_pengelola]</td>
                                            
                                                    "; ?>
                  <?php echo "
                                                            <td align='center'><a class='glyphicon glyphicon-pencil btn btn-default' href='?hal=arsip-suratmasuk&aksi=edit&id=$r[id_surat]'></a>
                                                            <a class='glyphicon glyphicon-eye-open btn btn-default' href='?hal=arsip-suratmasuk&aksi=detail&id=$r[id_surat]'></a>"; ?>

                  <a onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' href='modul/arsip_suratmasuk/aksi_arsipsurat.php?act=hapus&id=$r[id_surat]&namafile=$r[nama_file]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
                  </a>

              <?php echo "
                                                            </td>


                                            </tr>";
                }
                echo "
                                        
                                    </tbody></table>
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
                $edit = mysqli_query($konek, "SELECT * FROM arsip_suratmasuk WHERE id_surat='$_GET[id]'");
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
            <h5>Edit Data Arsip Surat Masuk</h5>
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
            <form class='form-horizontal' method='post' action='modul/arsip_suratmasuk/aksi_arsipsurat.php?act=update' enctype='multipart/form-data'>
<div class='form-group'>
                   
                <input type=hidden name=id value=$r[id_surat]>
                    <div class='form-group'>
                    <label class='control-label col-lg-4'>Pengelola</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' name='pengelola' value='$b[nama_lengkap]' disabled='disabled' class='form-control'>
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
                        <div class='col-lg-8'>
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
                $data = mysqli_query($konek, "select * from arsip_suratmasuk");
                $i = mysqli_fetch_array($data);
                // ID OTOMATIS//***************************************************
                //$kode=substr($i['no_agenda'],0)+1;
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
            <h5>Input Data Arsip Surat Masuk</h5>
         
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
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/arsip_suratmasuk/aksi_arsipsurat.php?act=input' enctype='multipart/form-data' >
           
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
                <span class='input-group-addon btn btn-default btn-file'><span class='fileinput-new'>Select file</span><span class='fileinput-exists'>Change</span><input required='required'  type='file' name='fupload'></span>
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
                $detaill = mysqli_query($konek, "SELECT * FROM arsip_suratmasuk WHERE id_surat='$_GET[id]'");
                $rr    = mysqli_fetch_array($detaill);
                $pengelola = mysqli_query($konek, "SELECT * FROM unit_pengelola WHERE id_unitPengelola='$rr[id_unitPengelola]'");
                $p2 = mysqli_fetch_array($pengelola);
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
                                    <td>Nomor Agenda &nbsp &nbsp: $p2[unit_pengelola]</td>
                                    <td>Tanggal Terima &nbsp &nbsp &nbsp: $rr[tgl_terima]</td>
                                 
                                     </tr>
                            <tr>
                             
                                    <td>Tanggal Surat&nbsp &nbsp &nbsp &nbsp: $rr[tgl_surat] </td>
                                    <td>Nomor Surat &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[nomor_surat] </td>
                                 
                                     </tr>
                                     </tbody></table>
                                      <table  class='table table-bordered '>
                                <tbody>
                                <tr><td>Asal Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[asal_surat]</td></tr>
                                <tr><td>Perihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[perihal]</td></tr>
                                <tr><td>File Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$rr[id_surat]&act=arsip-suratmasuk'> $rr[nama_file]</a></strong></td></tr>
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
    }
    else{
        echo "<div id='content'>
        <div class='outer'>
            <div class='inner bg-light lter'>
            <p align='right'></p><a href='?hal=arsip-suratmasuk&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a>
                
    <div class='row'>
    <div class='col-lg-12'>
            <div class='box'>
                <header>
                    <div class='icons'><i class='fa fa-table'></i></div>
                    <h5>Data Arsip Surat Masuk</h5>
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
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>";
    $tp = mysqli_query($konek, "SELECT * FROM arsip_suratmasuk ORDER BY id_surat ASC");
    $no = 0;
    while ($r = mysqli_fetch_array($tp)) {
        $no++;
        $pengelola = mysqli_query($konek, "SELECT * FROM unit_pengelola WHERE id_unitPengelola='$r[id_unitPengelola]'");
        $p2 = mysqli_fetch_array($pengelola);

        echo "
                                <tr>
                                    <td>$no</td>
                                
                                        <td>$r[tgl_surat]</td>
                                        <td>$r[asal_surat]</td>
                                        <td>$r[nomor_surat]</td>
                                        <td>$p2[unit_pengelola]</td>
                                
                                        "; ?>
      <?php echo "
                                                <td align='center'><a class='glyphicon glyphicon-pencil btn btn-default' href='?hal=arsip-suratmasuk&aksi=edit&id=$r[id_surat]'></a>
                                                <a class='glyphicon glyphicon-eye-open btn btn-default' href='?hal=arsip-suratmasuk&aksi=detail&id=$r[id_surat]'></a>"; ?>

      <a onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' href='modul/arsip_suratmasuk/aksi_arsipsurat.php?act=hapus&id=$r[id_surat]&namafile=$r[nama_file]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
      </a>

  <?php echo "
                                                </td>


                                </tr>";
    }
    echo "
                            
                        </tbody></table>
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
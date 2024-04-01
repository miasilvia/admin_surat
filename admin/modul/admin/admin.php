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
        $aksi = "modul/admin/aksi_admin.php";
        if (isset($_GET['aksi'])) {
            switch ($_GET['aksi']) {
                default:
                    echo "
                <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'><br>
                        <p align='left'><a href='?hal=admin&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a> 
    <div class='row'>
      <div class='col-lg-12'>
            <div class='box'>
                <header>
                    <div class='icons'><i class='fa fa-table'></i></div>
                <h5>Data Akun Pengelola</h5>
            </header>
            <div id='collapse4' class='body'>
                <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
                    <thead>
                    <tr>
                    <th>No</th>
                       <th>Nama</th>
                        <th>Username</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>";
                    $tp = mysqli_query($konek, 'SELECT * FROM admin ORDER BY id_admin ASC');
                    $no = 0;
                    while ($r = mysqli_fetch_array($tp)) {
                        $no++;
                        $jabatan = mysqli_query($konek, "SELECT * FROM jabatan WHERE id_jabatan='$r[id_jabatan]'");
                        $p2 = mysqli_fetch_array($jabatan);

                        echo "
                            <tr>
                                <td>$no</td>
                                    <td>$r[nama_lengkap]</td>
                                    <td>$r[username]</td>
                                    <td>$p2[nama_jabatan]</td>
                                   
                                    "; ?>
                      <?php echo "
                               <td align='center'><a  data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default'  href='?hal=admin&aksi=edit&id=$r[id_admin]'></a>
                               "; ?>

                      <a onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' data-toggle='tooltip' data-original-title='Hapus' href='modul/admin/aksi_admin.php?act=hapus&id=$r[id_admin]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
                      </a>

              <?php echo "


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
                        <!-- /.well well-small -->
                        <!-- .well well-small -->
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
                    $edit = mysqli_query($konek, "SELECT * FROM admin WHERE id_admin='$_GET[id]'");
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
            <h5>Input Data Akun Pengelola</h5>
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
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/admin/aksi_admin.php?act=update' enctype='multipart/form-data' >";
                    echo "


                  <input type=hidden name=id value=$r[id_admin]>
                <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nama Lengkap</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nama_lengkap' value='$r[nama_lengkap]' id='text1' placeholder='Nama' class='form-control'>
                    </div>
                </div>
                
                <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>username</label>
                    <div class='col-lg-6'>
                        <input required='required' type='text' name='username'  value='$r[username]' id='text1' placeholder='Username' class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                <label class='control-label col-lg-4'>Perihal</label>
                <div class='col-lg-6'>
                <select name='id_jabatan' id='id_jabatan'  data-placeholder='Pilih Jabatan' class='form-control chzn-select' tabindex='2'>
                <option value=''></option>";
                    $tampil = mysqli_query($konek, 'SELECT * FROM jabatan order BY nama_jabatan');
                    if ($r["id_jabatan"] == 0) {
                        echo "<option value=0 selected>- Pilih Jabatan -</option>";
                    }
                    while ($w = mysqli_fetch_array($tampil)) {
                        if ($r["id_jabatan"] == $w["id_jabatan"]) {
                            echo "<option value=$w[id_jabatan] selected> $w[nama_jabatan] </option>";
                        } else {
                            echo "<option value=$w[id_jabatan]>$w[nama_jabatan] </option>";
                        }
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
                    $tampil = mysqli_query($konek, 'SELECT * FROM unit_pengelola order BY unit_pengelola');
                    if ($r["id_unitPengelola"] == 0) {
                        echo "<option value=0 selected>- Pilih Unit Pengelola -</option>";
                    }
                    while ($w = mysqli_fetch_array($tampil)) {
                        if ($r["id_unitPengelola"] == $w["id_unitPengelola"]) {
                            echo "<option value=$w[id_unitPengelola] selected> $w[unit_pengelola] </option>";
                        } else {
                            echo "<option value=$w[id_unitPengelola]>$w[unit_pengelola] </option>";
                        }
                    }
                    echo "
                </select>
                </div>
                </div>  
                <div class='form-group'>
                <label class='control-label col-lg-4'>Level</label>
                <div class='col-lg-6'>
                <select  class='form-control chzn-select' data-placeholder='$r[level]'  name='level' tabindex='2'>
                <option value=''></option>";




                    echo " <option value='Admin' name='level'>Admin</option>
                <option value='Direktur' name='level'>Direktur</option>
                <option value='Unit Kerja' name='level'>Unit Kerja</option>";

                    echo "
             
                </select>
                </div>
                </div>              
                ";
                    echo "
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Password Baru</label>

                    <div class='col-lg-6'>
                        <input  name='pass_baru' type='password'   id='password' placeholder='Password' class='form-control'>
                    </div>
                </div>
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Ulangi Password Baru</label>

                    <div class='col-lg-6'>
                        <input  name='pass_ulangi' type='password'   id='password' placeholder='Password' class='form-control'>
                    </div>
                </div>
                <div class='form-group'>
                 <label for='text1' class='control-label col-lg-8'>
                **Kosongkan Password jika tidak diganti
                </label>
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

                case "tambah":
                    echo "
<div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Input Data Akun Pengelola</h5>
         
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
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/admin/aksi_admin.php?act=input' enctype='multipart/form-data' >

                <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nama Lengkap</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' name='nama_lengkap' id='text1' placeholder='Nama Lengkap' class='form-control'>
                    </div>
                </div>
                
                <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>username</label>

                    <div class='col-lg-6'>
                        <input required='required' type='text' name='username' id='text1' placeholder='Username' class='form-control'>
                    </div>
                </div>


                <div class='form-group'>
                <label class='control-label col-lg-4'>Jabatan</label>

                <div class='col-lg-6'>
                <select name='id_jabatan' id='id_jabatan'  data-placeholder='Pilih Jabatan' class='form-control chzn-select' tabindex='2'>
                <option value=''></option>";

                    $tampil = mysqli_query($konek, "SELECT * FROM jabatan order BY nama_jabatan ");
                    while ($r = mysqli_fetch_array($tampil)) {
                        echo "
            
              <option value=$r[id_jabatan]>$r[nama_jabatan]</option>";
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
                <label class='control-label col-lg-4'>Level</label>

                <div class='col-lg-6'>
  <select  class='form-control chzn-select' data-placeholder='Pilih Level User'  name='level' tabindex='2'>
  <option value=''></option>
    <option value='Admin' name='level'>Admin</option>
    <option value='Direktur' name='level'>Direktur</option>
    <option value='Unit Kerja' name='level'>Unit Kerja</option>
   </select>
                </div>
                </div>


    
                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Password</label>

                    <div class='col-lg-6'>
                        <input required='required' name='password' type='password' id='password' placeholder='Password' class='form-control'>
                    </div>
                </div>
                <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Ulangi Password</label>

                    <div class='col-lg-6'>
                        <input required='required' name='c_password' type='password' id='c_password' placeholder='Password' class='form-control'>
                    </div>
                </div>

<div class='form-actions no-margin-bottom'>
                        <input type='submit' value='Simpan' class='btn btn-primary'>
                    </div>
                    
            </form>
            <br/><br/><br/><br/><br/><br/>
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
            <div class='inner bg-light lter'><br>
            <p align='left'><a href='?hal=admin&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a> 
<div class='row'>
<div class='col-lg-12'>
<div class='box'>
    <header>
        <div class='icons'><i class='fa fa-table'></i></div>
    <h5>Data Akun Pengelola</h5>
</header>
<div id='collapse4' class='body'>
    <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
        <thead>
        <tr>
        <th>No</th>
           <th>Nama</th>
            <th>Username</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>";
            $tp = mysqli_query($konek, 'SELECT * FROM admin ORDER BY id_admin ASC');
            $no = 0;
            while ($r = mysqli_fetch_array($tp)) {
                $no++;
                $jabatan = mysqli_query($konek, "SELECT * FROM jabatan WHERE id_jabatan='$r[id_jabatan]'");
                $p2 = mysqli_fetch_array($jabatan);

                echo "
                <tr>
                    <td>$no</td>
                        <td>$r[nama_lengkap]</td>
                        <td>$r[username]</td>
                        <td>$p2[nama_jabatan]</td>
                       
                        "; ?>
              <?php echo "
                   <td align='center'><a  data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default'  href='?hal=admin&aksi=edit&id=$r[id_admin]'></a>
                   "; ?>

              <a onclick="return confirm('Hapus Data?')" <?php echo " class='btn btn-danger' data-toggle='tooltip' data-original-title='Hapus' href='modul/admin/aksi_admin.php?act=hapus&id=$r[id_admin]'>"; ?> <i class="glyphicon glyphicon-trash icon-white"></i>
              </a>

  <?php echo "


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
            <!-- /.well well-small -->
            <!-- .well well-small -->
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
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
    $aksi = "modul/nomor_surat/aksi_nomorsurat.php";
    if (isset($_GET['aksi'])) {

        switch ($_GET['aksi']) {
            default:
                echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        <p align='right'></p><a href='?hal=nomor-surat&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a> 
<div class='row'>
  <div class='col-lg-12'>
        <div class='box'>
            <header>
                <div class='icons'><i class='fa fa-table'></i></div>
                <h5>Data Penomoran Surat Keluar</h5>
            </header>
            <div id='collapse4' class='body'>
                <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
                    <thead>
                    <tr>
                    <th>No</th>
                        <th>Tgl Minta</th>
                        <th>Tgl Surat</th>
                        
                        <th>Nomor Surat</th>
                       <th>Status</th>
                      
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>";

                $ns = mysqli_query($konek, 'SELECT * FROM nomor_surat ORDER BY id_nomor ASC');
                $no = 0;
                while ($r = mysqli_fetch_array($ns)) {
                    $no++;
                    $suratkeluar = mysqli_query($konek, "SELECT * FROM surat_keluar WHERE id_nomor='$r[id_nomor]'");
                    $sk = mysqli_fetch_array($suratkeluar);
                    $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
                    if (mysqli_num_rows($perihal) > 0) {
                        $p2 = mysqli_fetch_array($perihal);
                        $kode2 = $r['no_urut'];
                        if ($kode2 < 10) {
                            $kode = '000' . $kode2;
                        } elseif ($kode2 > 9 && $kode2 <= 99) {
                            $kode = '00' . $kode2;
                        } else {
                            $kode = '0' . $kode2;
                        }
                        $tgl_sekarang = date('Y-m-d');
                        $tahun = date('Y');
                        echo "
                            <tr>
                                <td>$no</td>
                                    <td>$r[tgl_minta]</td>
                                    <td>$r[tgl_surat]</td>
                                    <td>
                    "; ?>
                        <?php
                        $tgl_sekarang = date("Y-m-d"); //tanggal sekarang
                        $tgl_surat = $r["tgl_surat"];
                        if (mysqli_num_rows($suratkeluar) > 0) {
                            echo " $kode/$r[pengajuan]/$p2[kode_perihal]/$r[tahun]";
                        } elseif ($tgl_sekarang > $tgl_surat) {
                            echo "<font color=red> $kode/$r[pengajuan]/$p2[kode_perihal]/$r[tahun] (Expired)</color>";
                        } else {
                            echo " $kode/$r[pengajuan]/$p2[kode_perihal]/$r[tahun]";
                        }
                        ?>
                        <?php echo "</td>"; ?>
                        <td>
                        <?php

                        echo "Sudah Digunakan";
                    } else {
                        echo "<font color=red>Belum Digunakan</color>";
                    }
                        ?></td>


                        <?php echo "
                               <td align='center'><a data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default' href='?hal=nomor-surat&aksi=edit&id=$r[id_nomor]'></a>
                               <a data-toggle='tooltip' data-original-title='Input Surat Keluar' class='glyphicon glyphicon-ok-circle  btn btn-default' href='?hal=nomor-surat&aksi=done&id=$r[id_nomor]'></a>"; ?>



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

                $edit = mysqli_query($konek, "SELECT * FROM nomor_surat   WHERE id_nomor='$_GET[id]'");
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
            <h5>Edit Data Nomor Surat</h5>
            <div class='toolbar'>
              <nav style='padding: 8px;'>
                  
                  <a href='javascript:;' class='btn btn-default btn-xs full-box'>
                      <i class='fa fa-expand'></i>
                  </a>
              </nav>
            </div>  
        </header>
        <div id='div-1' class='body'>
            <form class='form-horizontal' method='post' action='modul/nomor_surat/aksi_nomorsurat.php?act=update' enctype='multipart/form-data'>

                   
                <input type=hidden name=id value=$r[id_nomor]>
<div class='form-group'   >
             <label class='control-label col-lg-4' for='dpYears'>Tanggal Minta</label>
                        <div class='col-lg-3'>
                                <input name='tgl_minta' class='form-control' type='date' value='$r[tgl_minta]'  > 
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
                    <div class='col-lg-1'>
                        <input required='required' disabled type='text' name='no_urut' value='$kode'    class='form-control'>
                    </div>
               
                    

                    <div class='col-lg-1'>
                        <input required='required' name='pengajuan' type='text' value='$r[pengajuan]'  id='text1'  class='form-control'>
                    </div>
   

                <div class='col-lg-2'>
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
               


                    

                    <div class='col-lg-1'>
                        <input required='required' name='tahun' value='$r[tahun]' type='text' id='text1' placeholder='Nomor Surat' class='form-control'>
                    </div>
                </div>               
                 
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Perihal</label>

                    <div class='col-lg-6'>
                        <input required='required' name='perihal' value='$r[perihal]' type='text' id='text1' placeholder='Nomor Surat' class='form-control'>
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
                $data = mysqli_query($konek, "select * from nomor_surat  order by no_urut DESC LIMIT 0,1");
                $i = mysqli_fetch_array($data);
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
                echo "
<div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                        
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Input Data Penomoran Surat Keluar</h5>
         
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
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/nomor_surat/aksi_nomorsurat.php?act=input' enctype='multipart/form-data' >
<br/>
                 <div class='form-group'>
                        <label class='control-label col-lg-3' for='dpYears'>Tanggal Minta</label>

                        <div class='col-lg-6'>
                           
                                <input name='tgl_minta' class='form-control' type='date' value='$tgl_sekarng' >
                              
                        </div>
                    </div>
                <div class='form-group'>
                        <label class='control-label col-lg-3' for='dp3'>Tanggal Surat</label>

                        <div class='col-lg-6'>
                          
                                <input name='tgl_surat' class='form-control' type='date' value='$tgl_sekarng'>
                              
                        </div>
                    </div>
                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-3'>Nomor Surat</label>
                    <div class='col-lg-1'>
                        <input required='required' disabled type='text' name='no_urut' value='$kode'  class='form-control'>
                    </div>
             

                    <div class='col-lg-1'>
                        <input required='required' name='pengajuan' type='text' value='PL42' id='text1' placeholder='' class='form-control'>
                    </div>


                <div class='col-lg-2'>
                <select name='id_perihal' id='id_perihal'  data-placeholder='Kode Perihal' class='form-control chzn-select' tabindex='2'>
                <option value=''></option>";
                $tampil = mysqli_query($konek, 'SELECT * FROM kode_perihal order BY nama_perihal');
                while ($r = mysqli_fetch_array($tampil)) {
                    echo " <option value=$r[id_perihal]>$r[nama_perihal] ($r[kode_perihal])</option>";
                }

                echo "
               
                </select>
                </div>
                                 

                    <div class='col-lg-1'>
                        <input required='required' name='tahun' value='$tahun' type='text' id='text1' placeholder='Nomor Surat' class='form-control'>
                    </div>
                </div>
               <div class='form-group'>
                    <label for='text1' class='control-label col-lg-3'>Perihal</label>

                    <div class='col-lg-6'>
                        <input required='required' name='perihal' type='text' id='text1' placeholder='Perihal' class='form-control'>
                    </div>
                </div>
<div class='form-actions no-margin-bottom'><br/><br/>
                        <input type='submit' value='Simpan' class='btn btn-primary'>
                        <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
                $suratkeluar = mysqli_query($konek, "SELECT * FROM surat_keluar WHERE id_nomor='$r[id_nomor]'");
                $sk = mysqli_fetch_array($suratkeluar);

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
        </header>";
                if (mysqli_num_rows($suratkeluar) > 0) {

                    echo "<br/><br/><br/><br/><center><font size=7>  Nomor Surat ini sudah digunakan!</font></center><br/><br/><br/><br/><br/><br/><br/><br/></div></div></div></div></div></div></div>";
                } else {

                    echo "
        <div id='div-1' class='body'>
            <form class='form-horizontal' method='post' action='modul/nomor_surat/aksi_nomorsurat.php?act=input2' enctype='multipart/form-data'>

              
                <input type=hidden name='id_nomor' value=$r[id_nomor]>
               
               
                 <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Tanggal Minta</label>

                        <div class='col-lg-3'>
                           
                                <input name='tgl_minta' value='$r[tgl_minta]'  disabled class='form-control' type='date' value='$tgl_sekarng' >
                               
                        </div>
                    </div>
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dp3'>Tanggal Surat</label>
                        <div class='col-lg-3'>
                                <input name='tgl_surat' value='$r[tgl_surat]'   disabled class='form-control' type='date' value='$tgl_sekarng'>
                        </div>
                    </div>
                    <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Nomor Surat</label>
                    <div class='col-lg-1'>
                        <input required='required' type='text'  disabled name='no_urut' value='$kode'    class='form-control'>
                    </div>
            
                   
                    <div class='col-lg-1'>
                        <input required='required' name='pengajuan' type='text'  disabled value='$r[pengajuan]'  id='text1'  class='form-control'>
                    </div>
              
                

                <div class='col-lg-2'>
                <select name='id_perihal' id='id_perihal' disabled  data-placeholder='Kode Perihal' class='form-control chzn-select' tabindex='2'>
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
                        <input required='required' name='tahun'  disabled value='$r[tahun]' type='text' id='text1' placeholder='Tahun' class='form-control'>
                    </div>
                </div>
              
                 
                 <div class='form-group'>
                    <label for='text1' class='control-label col-lg-4'>Perihal</label>

                    <div class='col-lg-6'>
                        <input required='required' name='perihal'  disabled value='$r[perihal]' type='text' id='text1' placeholder='Perihal' class='form-control'>
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
                        <div class='col-lg-6'>
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
    } else {
        echo "<div id='content'>
        <div class='outer'>
            <div class='inner bg-light lter'>
            <p align='right'></p><a href='?hal=nomor-surat&aksi=tambah' role='button' class='btn btn-primary'>Input Baru</a> 
<div class='row'>
<div class='col-lg-12'>
<div class='box'>
<header>
    <div class='icons'><i class='fa fa-table'></i></div>
    <h5>Data Penomoran Surat Keluar</h5>
</header>
<div id='collapse4' class='body'>
    <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
        <thead>
        <tr>
        <th>No</th>
            <th>Tgl Minta</th>
            <th>Tgl Surat</th>
            
            <th>Nomor Surat</th>
           <th>Status</th>
          
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>";

        $ns = mysqli_query($konek, 'SELECT * FROM nomor_surat ORDER BY id_nomor ASC');
        $no = 0;
        while ($r = mysqli_fetch_array($ns)) {
            $no++;
            $suratkeluar = mysqli_query($konek, "SELECT * FROM surat_keluar WHERE id_nomor='$r[id_nomor]'");
            $sk = mysqli_fetch_array($suratkeluar);
            $perihal = mysqli_query($konek, "SELECT * FROM kode_perihal WHERE id_perihal='$r[id_perihal]'");
            if (mysqli_num_rows($perihal) > 0) {
                $p2 = mysqli_fetch_array($perihal);
                $kode2 = $r['no_urut'];
                if ($kode2 < 10) {
                    $kode = '000' . $kode2;
                } elseif ($kode2 > 9 && $kode2 <= 99) {
                    $kode = '00' . $kode2;
                } else {
                    $kode = '0' . $kode2;
                }
                $tgl_sekarang = date('Y-m-d');
                $tahun = date('Y');
                echo "
                <tr>
                    <td>$no</td>
                        <td>$r[tgl_minta]</td>
                        <td>$r[tgl_surat]</td>
                        <td>
        "; ?>
                    <?php
                    $tgl_sekarang = date("Y-m-d"); //tanggal sekarang
                    $tgl_surat = $r["tgl_surat"];
                    if (mysqli_num_rows($suratkeluar) > 0) {
                        echo " $kode/$r[pengajuan]/$p2[kode_perihal]/$r[tahun]";
                    } elseif ($tgl_sekarang > $tgl_surat) {
                        echo "<font color=red> $kode/$r[pengajuan]/$p2[kode_perihal]/$r[tahun] (Expired)</color>";
                    } else {
                        echo " $kode/$r[pengajuan]/$p2[kode_perihal]/$r[tahun]";
                    }
                    ?>
                    <?php echo "</td>"; ?>
                    <td>
                    <?php

                    echo "Sudah Digunakan";
                } else {
                    echo "<font color=red>Belum Digunakan</color>";
                }
                    ?></td>


                    <?php echo "
                   <td align='center'><a data-toggle='tooltip' data-original-title='Edit' class='glyphicon glyphicon-pencil btn btn-default' href='?hal=nomor-surat&aksi=edit&id=$r[id_nomor]'></a>
                   <a data-toggle='tooltip' data-original-title='Input Surat Keluar' class='glyphicon glyphicon-ok-circle  btn btn-default' href='?hal=nomor-surat&aksi=done&id=$r[id_nomor]'></a>"; ?>



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
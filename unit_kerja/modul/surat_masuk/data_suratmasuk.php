  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
  <script src="assets/lib/jquery/jquery.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

               <?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
$aksi="modul/surat_masuk/aksi_suratmasuk.php";
switch($_GET['aksi']){
default:
echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'><br>
                       
                            
<div class='row'>
  <div class='col-lg-12'>
        <div class='box'>
            <header>
                <div class='icons'><i class='fa fa-table'></i></div>
                <h5>Data Surat Masuk</h5>
            </header>
            <div id='collapse4' class='body'>
                <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Tgl Surat</th>
                        <th>Diteruskan</th>
                        <th>Nomor Surat</th>
                        <th>Asal Surat</th>
                        <th>Perihal</th>
                        <th>Pengelola</th>
                        <th>Status</th>
                        
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>";

                    //$tp=mysql_query("SELECT * FROM disposisi dis JOIN admin adm ON dis.id_admin=adm.id_admin JOIN surat_masuk sm ON dis.id_surat=sm.id_surat JOIN jabatan jbt ON adm.id_jabatan=jbt.id_jabatan where adm.id_admin='".$_SESSION[id_login]."' NOT IN (SELECT jbt.level FROM disposisi WHERE isi_disposisi = '' AND jbt.level < '".$_SESSION[level]."'  )  ORDER BY dis.id_surat asc");

                    $d = mysql_query("SELECT * FROM disposisi dis JOIN admin adm ON di
                        s.id_admin=adm.id_admin JOIN surat_masuk sm ON dis.id_surat=sm.id_surat JOIN jabatan jbt ON adm.id_jabatan=jbt.id_jabatan where sm.id_surat='8' ORDER BY jbt.level asc");

                    $tp = mysql_query("SELECT *, jbt.level as lvl FROM disposisi dis JOIN admin adm ON dis.id_admin=adm.id_admin JOIN surat_masuk sm ON dis.id_surat=sm.id_surat JOIN jabatan jbt ON adm.id_jabatan=jbt.id_jabatan where adm.id_admin='".$_SESSION[id_login]."' ORDER BY dis.id_surat asc");

                    while($r=mysql_fetch_assoc($tp)){
                        $no++;
                        $cek = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as total FROM disposisi dis JOIN admin adm ON dis.id_admin=adm.id_admin JOIN surat_masuk sm ON dis.id_surat=sm.id_surat JOIN jabatan jbt ON adm.id_jabatan=jbt.id_jabatan where sm.id_surat='$r[id_surat]' AND jbt.level < $r[lvl] AND dis.isi_disposisi = '' "));
                        if($cek['total'] != 0){
                            continue;
                        }
                       
                        echo"
                            <tr>
                                    <td>$no</td>
                                    <td>$r[tgl_surat]</td>
                                    <td>$r[nama_jabatan]</td>
                                     <td>$r[nomor_surat]</td>
                                    <td>$r[asal_surat]</td>

                                   
                                    <td>$r[perihal]</td>
                                    <td>$r[pengelola]</td>
                                  
                                    <td>"; if ($r['isi_disposisi']!=''){
                                        echo"Sudah Diisi";
                                    }else{
                                        echo"<font color=red>Belum Diisi</color>";
                                    }

                                   echo" </td>

                                    ";?>
                                    <?php echo"
                               <td align='center'>
                               <a data-toggle='tooltip' data-original-title='Detail' class='glyphicon glyphicon-eye-open btn btn-default' href='?unit=data-suratmasuk&aksi=detail&id=$r[id_surat]'></a>";?>
                             
                                <?php echo"
                              </td>


                            </tr>";}


                            // dsd
                            echo"
                           
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
case"pengelola":
echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'><br>
                       
                            
<div class='row'>
  <div class='col-lg-12'>
        <div class='box'>
            <header>
                <div class='icons'><i class='fa fa-table'></i></div>
                <h5>Data Pengelolaaa</h5>
            </header>
            <div id='collapse4' class='body'>
                <table id='dataTable' class='table table-bordered table-condensed table-hover table-striped'>
                    <thead>
                    <tr>
                        <th>No</th> 
                        <th>Tgl Surat</th>
                        <th>Nomor Surat</th>
                        <th>Asal Surat</th>
                        <th>Perihal</th>
                        <th>Pengelola</th>
                        <th>Status SK</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>";

                    //$tp=mysql_query("SELECT * FROM disposisi dis JOIN admin adm ON dis.id_admin=adm.id_admin JOIN surat_masuk sm ON dis.id_surat=sm.id_surat JOIN jabatan jbt ON adm.id_jabatan=jbt.id_jabatan where adm.id_admin='".$_SESSION[id_login]."' NOT IN (SELECT jbt.level FROM disposisi WHERE isi_disposisi = '' AND jbt.level < '".$_SESSION[level]."'  )  ORDER BY dis.id_surat asc");
 $tp=mysql_query(" SELECT * FROM disposisi inner join surat_masuk on disposisi.id_surat=surat_masuk.id_surat WHERE disposisi.id_surat NOT IN (SELECT id_surat FROM disposisi WHERE isi_disposisi = '' GROUP BY id_surat) and disposisi.id_unitPengelola='".$_SESSION[id_unitPengelola]."' GROUP BY disposisi.id_surat asc");
                            while($r=mysql_fetch_array($tp)){$no++; 
        $sk = mysql_query("SELECT * FROM  surat_keputusan WHERE id_surat='$r[id_surat]'");
    $skn    = mysql_fetch_array($sk);
                 echo"
                            <tr>
                                    <td>$no</td>
                                    <td>$r[tgl_surat]</td>
                                     <td>$r[nomor_surat]</td>
                                    <td>$r[asal_surat]</td>
                                    <td>$r[perihal]</td>
                                    <td>$r[id_surat]</td>
                                    <td>  ";  
                                 if ($skn['id_surat']){
                                        echo"SK Sudah Dibuat";
                                    }else{
                                        echo"<font color=red>SK Belum Dibuat</color>";
                                    }

                                echo"
                                </td>
                                    ";?>
                                    <?php echo"
                               <td align='center'>
                               <a data-toggle='tooltip' data-original-title='Detail' class='glyphicon glyphicon-eye-open btn btn-default' href='?unit=data-suratmasuk&aksi=detail2&id=$r[id_surat]'></a>";?>
                             
                                <?php echo"
                              </td>


                            </tr>";}


                            // dsd
                            echo"
                           
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


case"detail":
$detaill = mysql_query("SELECT * FROM surat_masuk WHERE id_surat='$_GET[id]'");
    $rr    = mysql_fetch_array($detaill);
 $detail = mysql_query("SELECT * FROM surat_masuk, disposisi WHERE disposisi.id_surat=surat_masuk.id_surat AND disposisi.id_surat='$_GET[id]'");
    $r    = mysql_fetch_array($detail);

$kode2=$rr['no_agenda'];

if($kode2<10){
  $kode='000'.$kode2;
}elseif($kode2 > 9 && $kode2 <=99){
  $kode='00'.$kode2;
}else{
  $kode='0'.$kode2;
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
                            
                    echo"
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
                                <tr><td>Asal Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[asal_surat]</td></tr>
                                <tr><td>Perihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[perihal]</td></tr>
                                <tr><td>Status Disposisi &nbsp &nbsp: 
                                ";  
                                
                                if ($r['id_surat']){
                                        echo"Disposisi Sudah Dibuat";
                                    }else{
                                        echo"<font color=red>Disposisi Belum Dibuat</color>";
                                    }

                                echo"
                                </td></tr>
                                <tr><td>Sifat Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $r[sifat_surat]</td></tr>
                               ";
                                while($r2 = mysql_fetch_array($detail)){
                                 $status = "Disposisi Sudah Komplit"; 
                    if($r2[isi_disposisi]==''){
                        $status = "<font color=red>Disposisi Belum Komplit</color>";
                    }
                }
                echo"
                                <tr><td>Status Isi Disposisi : $status</td></tr>
                                 <tr><td>File Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$rr[id_surat]&act=surat-masuk'> $rr[nama_file]</a></strong></td></tr>
                                 </table>";?>

                                <?php
                                $detail2 = mysql_query("SELECT * FROM surat_masuk, disposisi WHERE disposisi.id_surat=surat_masuk.id_surat AND disposisi.id_surat='$_GET[id]'");
  
                            echo"       

                                  
                                   <table  class='table table-bordered '> <tbody>
                                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Diteruskan Kepada</th>
                       <th>Isi Disposisi</th>
                        <th>Tanggal Pengisian</th>
                      
                    </tr>";
                    while($r2 = mysql_fetch_array($detail2)){ $no++;
                         $admin=mysql_query("SELECT * FROM admin WHERE id_admin='$r2[id_admin]'");
                        $p4=mysql_fetch_array($admin);
                            echo"
                            <tr>
                            <td>$no</td>
                    <td>$p4[nama_lengkap]</td>
                    <td>$r2[isi_disposisi]</td>
                    <td>$r2[tgl_isi]</td>";?>
                    <?php  
                }
                    echo"
                    </tr></thead></table>
                   ";?>

                   <?php 
                    $detail3 = mysql_query("SELECT * FROM surat_masuk sm JOIN disposisi dis on   dis.id_surat=sm.id_surat join admin adm on dis.id_admin=adm.id_admin where dis.id_surat='$_GET[id]' and adm.id_admin='".$_SESSION[id_login]."'");
  
$r22 = mysql_fetch_array($detail3);
                   echo " <a href='#edit_modal' class='btn btn-primary btn-small' data-toggle='modal' data-id=".$r22['id'].">Isi Disposisi</a>";
?>
                   <?php  echo"
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
      echo"";
break;
case"detail2":
$detaill = mysql_query("SELECT * FROM surat_masuk WHERE id_surat='$_GET[id]'");
    $rr    = mysql_fetch_array($detaill);
 $detail = mysql_query("SELECT * FROM surat_masuk, disposisi WHERE disposisi.id_surat=surat_masuk.id_surat AND disposisi.id_surat='$_GET[id]'");
    $r    = mysql_fetch_array($detail);

$kode2=$rr['no_agenda'];

if($kode2<10){
  $kode='000'.$kode2;
}elseif($kode2 > 9 && $kode2 <=99){
  $kode='00'.$kode2;
}else{
  $kode='0'.$kode2;
}
    echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>
                                         
<div class='row'>
  <div class='col-lg-12'>
        <div class='box'>
            <header>
                <div class='icons'><i class='fa fa-table'></i></div>
                <h5>Data Surat Masuk yang Dikelola</h5>
            </header>
            <div id='collapse4' class='body'>
                <table   class='table table-bordered '>
                   
                    <tbody>";
                            
                    echo"
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
                                <tr><td>Asal Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[asal_surat]</td></tr>
                                <tr><td>Perihal &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $rr[perihal]</td></tr>
                                <tr><td>Status Disposisi &nbsp &nbsp: 
                                ";  
                                
                                if ($r['id_surat']){
                                        echo"Disposisi Sudah Dibuat";
                                    }else{
                                        echo"<font color=red>Disposisi Belum Dibuat</color>";
                                    }

                                echo"
                                </td></tr>
                                <tr><td>Sifat Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: $r[sifat_surat]</td></tr>
                               ";
                                while($r2 = mysql_fetch_array($detail)){
                                 $status = "Disposisi Sudah Komplit"; 
                    if($r2[isi_disposisi]==''){
                        $status = "<font color=red>Disposisi Belum Komplit</color>";
                    }
                }
                echo"
                                <tr><td>Status Isi Disposisi : $status</td></tr>
                                 <tr><td>File Surat &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp: <strong><a class='wpdm-download-link wpdm-download-locked [btnclass]' rel='nofollow'  target='_blank' href='unduh.php?id=$rr[id_surat]&act=surat-masuk'> $rr[nama_file]</a></strong></td></tr>
                                 </table>";?>

                                <?php
                                $detail2 = mysql_query("SELECT * FROM surat_masuk, disposisi WHERE disposisi.id_surat=surat_masuk.id_surat AND disposisi.id_surat='$_GET[id]'");
  
                            echo"       

                                  
                                   <table  class='table table-bordered '> <tbody>
                                    <thead>
                    <tr>
                    <th>No</th>
                    <th>Diteruskan Kepada</th>
                       <th>Isi Disposisi</th>
                        <th>Tanggal Pengisian</th>
                      
                    </tr>";
                    while($r2 = mysql_fetch_array($detail2)){ $no++;
                         $admin=mysql_query("SELECT * FROM admin WHERE id_admin='$r2[id_admin]'");
                        $p4=mysql_fetch_array($admin);
                            echo"
                            <tr>
                            <td>$no</td>
                    <td>$p4[nama_lengkap]</td>
                    <td>$r2[isi_disposisi]</td>
                    <td>$r2[tgl_isi]</td>";?>
                    <?php  
                }
                    echo"
                    </tr></thead></table>
                   ";?>

            <?php  echo"

            </div>
        </div>
    </div>
</div>
 <form data-validate='parsley' class='form-horizontal' method='post' action='modul/surat_masuk/aksi_suratmasuk.php?act=input2' enctype='multipart/form-data' >
  <input type='hidden' name='id' value=$rr[id_surat]>
                                        <div class='form-group'>
                        <label class='control-label col-lg-3'>Upload Surat</label>
                        <div class='col-lg-9'>
                            <div class='fileinput fileinput-new' data-provides='fileinput'>
                  <div class='input-group'>
                <div class='form-control uneditable-input span3' data-trigger='fileinput'>
                <i class='glyphicon glyphicon-file fileinput-exists'></i> <span class='fileinput-filename'></span></div>
                <span class='input-group-addon btn btn-default btn-file'><span class='fileinput-new'>Select file</span><span class='fileinput-exists'>Change</span><input type='file'  required='required'  name='fupload'></span>
                <a href='#' class='input-group-addon btn btn-default fileinput-exists' data-dismiss='fileinput'>Remove</a>
                  </div>
                </div>
                        </div>
                    </div>
     <button class='btn btn-primary' type='submit'>Kirim</button>
        </form> ";
 $sk = mysql_query("SELECT * FROM  surat_keputusan WHERE id_surat='$_GET[id]'");
    $skn    = mysql_fetch_array($sk);
        echo"

        <div class='form-group'>  
<form data-validate='parsley' class='form-horizontal' method='post' action='modul/surat_masuk/aksi_suratmasuk.php?act=update_st' enctype='multipart/form-data' >
  <input type='hidden' name='id' value=$rr[id_surat]>

  
                <label class='control-label col-lg-4'>Unit Pengelola</label>
                <div class='col-lg-2'>
                <select name='status_terima' data-placeholder='Unit Pengelola' class='form-control chzn-select' tabindex='2'>
                <option name='status_terima' value='$skn[status_terima]'></option>";
               
                 echo" <option name='status_terima' value='B'>Belum </option>
                 <option name='status_terima' value='ST'>Sudah Diterima </option>
                <option name='status_terima' value='SL'>Sudah Dilaksanakan </option>

                 ";
               

               echo"
               
               </select>
               </div>
               </div>
   <button class='btn btn-primary' type='submit'>Kirim</button>
        </form>   
<br/><br/><br/><br/><br/><br/><br/><br/>
                        </div>
                    </div>
                  
                </div>
                  
            </div>


      ";
      echo"";
break;
}}
?>    

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#edit_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'modul/surat_masuk/detail.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
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
 

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

    echo " <div id='content'>
                    <div class='outer'>
                        <div class='inner bg-light lter'>                   
<div class='row'>
<div class='col-lg-12'>
    <div class='box dark'>
        <header>
            <div class='icons'><i class='fa fa-edit'></i></div>
            <h5>Laporan Data Surat Keluar</h5>
         
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
            <form data-validate='parsley' class='form-horizontal' method='post' action='modul/laporan_suratkeluar/cetakpdf.php' enctype='multipart/form-data' target='_blank' >

                 <div class='form-group'>
                        <label class='control-label col-lg-4' for='dpYears'>Dari Tanggal</label>
                        <div class='col-lg-3'>
                                <input name='Dari' class='form-control' type='date' required='required' >
                        </div>
                    </div>
                <div class='form-group'>
                        <label class='control-label col-lg-4' for='dp3'>Sampai Tanggal</label>

                        <div class='col-lg-3'>
                                <input name='Sampai' class='form-control' type='date'  required='required' >
                        </div>
                    </div>
                  <div class='form-actions no-margin-bottom'>
                        <input type='submit' value='Cetak Agenda Surat Keluar' name='cetak9' class='btn btn-primary'>

                    </div>

                    
            </form>
             <br/><br/><br/><br/><br/><br/><br/><br/><br/>
        </div>
    </div>
</div>
</div>
                        </div>
                    </div>
                </div>
            </div>
            ";
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
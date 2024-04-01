

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Validation-Engine/2.6.4/validationEngine.jquery.min.css">


       
              
                <div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                        
<div class="row">
<div class="col-lg-12">
    <div class="box dark">
        <header>
            <div class="icons"><i class="fa fa-edit"></i></div>
            <h5>Input Data Surat Masuk</h5>
            <!-- .toolbar -->
            <div class="toolbar">
              <nav style="padding: 8px;">
                  <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                      <i class="fa fa-minus"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-default btn-xs full-box">
                      <i class="fa fa-expand"></i>
                  </a>
              </nav>
            </div>            <!-- /.toolbar -->
        </header>
        <div id="div-1" class="body">
            <form class="form-horizontal" method='post' action='modul/produk/aksi_produk.php?act=update' >
<div class="form-group">
                    <label class="control-label col-lg-4">Disabled input</label>

                    <div class="col-lg-6">
                        <input type="text" value="disabled" disabled class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Nomor Agenda</label>

                    <div class="col-lg-6">
                        <input type="text" id="text1" placeholder="Nomor Agenda" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                        <label class="control-label col-lg-4" for="dp3">Tanggal Surat</label>

                        <div class="col-lg-3">
                            <div class="input-group input-append date" id="dp3" data-date="12-02-2012"
                                 data-date-format="dd-mm-yyyy">
                                <input class="form-control" type="text" value="12-02-2012" readonly>
                                <span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Asal Surat</label>

                    <div class="col-lg-6">
                        <input type="text" id="text1" placeholder="Asal Surat" class="form-control">
                    </div>
                </div>

                    <div class="form-group">
                    <label for="text1" class="control-label col-lg-4">Nomor Surat</label>

                    <div class="col-lg-6">
                        <input type="text" id="text1" placeholder="Nomor Surat" class="form-control">
                    </div>
                </div>

               

                <div class="form-group">
                    <label for="limiter" class="control-label col-lg-4">Perihal</label>

                    <div class="col-lg-6">
                        <textarea id="limiter" class="form-control"></textarea>
                    </div>
                </div>
               

</select>
                
<div class="form-actions no-margin-bottom">
                        <input type="submit" value="Validate" class="btn btn-primary">
                    </div>
                <!-- /.form-group -->
            </form>
        </div>
    </div>
</div>


</div>

                        </div>

                    </div>
                
                </div>
           


                    
            </div>
          
            
            <script src="assets/lib/jquery/jquery.js"></script>

                    
                    <script src="assets/lib/inputlimiter/jquery.inputlimiter.js"></script>
                    <script src="assets/lib/validVal/js/jquery.validVal.min.js"></script>
                    <script src="/assets/lib/bootstrap-daterangepicker/daterangepicker.js"></script>

                <script>
                    $(function() {
                      Metis.formGeneral();
                    });
                </script>
            <!-- Metis core scripts -->
            <script src="assets/js/core.js"></script>
            <!-- Metis demo scripts -->
            <script src="assets/js/app.js"></script>
            <script src="assets/js/style-switcher.js"></script>
        </body>

</html>

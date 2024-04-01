  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css">
  <script src="assets/lib/jquery/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
  <?php $q = mysqli_query($konek, "SELECT * from admin where username='" . $_SESSION['username'] . "'");
  $b = mysqli_fetch_array($q);
  $jabatan = mysqli_query($konek, "SELECT * FROM jabatan WHERE id_jabatan='$b[id_jabatan]'");
  $p2 = mysqli_fetch_array($jabatan);
  $tgl_sekarang = date('Y-m-d');
  $format = date('d F Y', strtotime($tgl_sekarang)); ?>
  <!-- /.navbar -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">

    <!-- .nav -->
    <ul class="nav navbar-nav">

      <li><a href="?unit=dashboard">Dashboard</a></li>
      <li><a class="dropdown-toggle" href="?unit=data-suratmasuk"><span class="label label-pill label-danger count"></span>
          Surat Masuk</a></li>
      <li><a href="?unit=minta-surat">Buat Surat</a></li>
      <li><a href="?unit=data-suratmasuk&aksi=pengelola">Data Pengelola</a></li>



    </ul>
    <!-- /.nav -->
  </div>
  </div>
  <!-- /.container-fluid -->
  </nav>
  <header class="head">
    <div class="search-bar">
      <?php echo "$b[nama_lengkap]"; ?><br />
      <?php echo "$p2[nama_jabatan]"; ?>
    </div>
    <!-- /.search-bar -->

    <div class="main-bar">
      Tanggal : <?php echo " $format"; ?>

    </div>
    <!-- /.main-bar -->
  </header>
  <!-- /.head -->
  </div>
  <!-- /#top -->

  <!-- /#menu -->
  <script>
    $(document).ready(function() {
      function load_unseen_notification(view = '') {
        $.ajax({
          url: "fetch.php",
          method: "POST",
          data: {
            view: view
          },
          dataType: "json",
          success: function(data) {
            $('.dropdown-menu').html(data.notification);
            if (data.unseen_notification > 0) {
              $('.count').html(data.unseen_notification);
            }
          }
        });
      }

      load_unseen_notification();
      $('#comment_form').on('submit', function(event) {
        event.preventDefault();
        if ($('#subject').val() != '' && $('#comment').val() != '') {
          var form_data = $(this).serialize();
          $.ajax({
            url: "modul/surat_masuk/aksi_suratmasuk.php",
            method: "POST",
            data: form_data,
            success: function(data) {
              $('#comment_form')[0].reset();
              load_unseen_notification();
            }
          })
        } else {
          alert("Both Fields are Required");
        }
      });
      $(document).on('click', '.dropdown-toggle', function() {
        $('.count').html('');
        load_unseen_notification('yes');
      })

      setInterval(function() {
        load_unseen_notification();
      }, 5000);

    });
  </script>
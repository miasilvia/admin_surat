 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
 <script src="../assets/lib/jquery/jquery.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
 <div id="content">
     <div class="outer">
         <div class="inner bg-light lter">
             <div class="text-center">
                 <title>DASHBOARD ADMIN</title>
                 <br />
                 <br />
                 <br />
                 <br />
                 <br />

                 <ul class="stats_box">
                     <br /><br />
                     <?php
                        include "../config/koneksi.php";
                        $thn = date('Y');
                        $jml_suratmasuk = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM disposisi INNER JOIN surat_masuk USING (id_surat) WHERE DATE_FORMAT(tgl_terima,'%Y')='$thn' AND isi_disposisi IS NOT NULL AND isi_disposisi ='' GROUP BY id_surat"));
                        $jml_suratmasuk2 = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM disposisi INNER JOIN surat_masuk ON disposisi.id_surat=surat_masuk.id_surat WHERE disposisi.id_surat NOT IN (SELECT id_surat FROM disposisi WHERE DATE_FORMAT(tgl_terima,'%Y')='$thn' AND isi_disposisi = '' GROUP BY id_surat) GROUP BY disposisi.id_surat"));
                        $jml_agendaSM = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM surat_masuk"));
                        ?>
                     <li>
                         <div class="stat_text">
                             <strong>Jumlah Agenda Surat Masuk <br />
                                 <p>Thn <?php echo $thn ?></p>
                             </strong>
                             Jumlah Agenda Surat Masuk: <?php echo "$jml_agendaSM" ?> <br>
                             Disposisi sedang diproses: <?php echo "$jml_suratmasuk" ?> <br>
                             Proses disposisi selesai: <?php echo "$jml_suratmasuk2" ?> <br>

                             <a href="?hal=data-suratmasuk">Lihat Data</a>
                             <span class="percent down"> </span>
                         </div>
                     </li>

                     <?php $jml_arsipSM = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM  arsip_suratmasuk where  DATE_FORMAT(tgl_terima,'%Y')='$thn'  ")); ?>
                     <li>
                         <div class="stat_text">
                             <strong>Jumlah Data Arsip Surat Masuk <br /><br><br>
                                 <p class="text-center"><?php echo "$jml_arsipSM" ?></p>
                             </strong>
                             <br />
                             <a href="?hal=arsip-suratmasuk">Lihat Data</a>
                         </div>
                     </li>
                     <?php $jml_arsipSK = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM  surat_keluar where  DATE_FORMAT(tgl_surat,'%Y')='$thn'  ")); ?>
                     <li>
                         <div class="stat_text">
                             <strong>Jumlah Data Arsip Surat Keluar tahun ini<br /><br><br>
                                 <p class=text-center><?php echo " $jml_arsipSK" ?></p>
                             </strong>
                             <br />
                             <a href="?hal=data-suratkeluar">Lihat Data</a>
                             <span class="percent"></span>
                         </div>
                     </li>
                 </ul>
             </div>
             <br />
             <br />
             <br />
             <br />
             <br />
             <br />
             <br />
             <br />
             <br />
             <br />
             <br />
         </div>
         <!-- /.inner -->
     </div>
     <!-- /.outer -->
 </div>
 <!-- /#content -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.5/fullcalendar.min.js"></script>
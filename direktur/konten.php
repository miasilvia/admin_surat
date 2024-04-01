<?php
if ($_GET['dir']=='upload_design')
{ include "modul/upload_design/upload_design.php";}

else if ($_GET['dir']=='design_sendiri')
{ include "modul/design_sendiri/design_sendiri.php";}

else if ($_GET['dir']=='dashboard')
{ include "home.php";}
else if ($_GET['dir']=='data-suratmasuk')
{ include "modul/surat_masuk/data_suratmasuk.php";
}
else if ($_GET['dir']=='minta-surat')
{ include "modul/minta_surat/minta_surat.php";
}
else if ($_GET['dir']=='arsip-disposisi')
{ include "modul/arsip_disposisi/arsip_disposisi.php";
}
else if ($_GET['dir']=='laporan-suratmasuk')
{ include "modul/laporan_suratmasuk/laporan_suratmasuk.php";
}

?>
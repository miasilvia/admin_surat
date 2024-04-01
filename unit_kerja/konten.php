<?php
 if ($_GET['unit']=='dashboard')
{ include "home.php";}
else if ($_GET['unit']=='data-suratmasuk')
{ include "modul/surat_masuk/data_suratmasuk.php";
}
else if ($_GET['unit']=='arsip-suratmasuk')
{ include "modul/arsip_suratmasuk/arsip_suratmasuk.php";
}
else if ($_GET['unit']=='arsip-disposisi')
{ include "modul/arsip_disposisi/arsip_disposisi.php";
}
else if ($_GET['unit']=='minta-surat')
{ include "modul/minta_surat/minta_surat.php";
}
else if ($_GET['dir']=='laporan-arsipsuratmasuk')
{ include "modul/laporan_arsipsuratmasuk/laporan_arsipsuratmasuk.php";
}
else if ($_GET['dir']=='nomor-surat')
{ include "modul/nomor_surat/nomor_surat.php";
}
else if ($_GET['dir']=='buat-suratdinas')
{ include "modul/buat_suratdinas/surat_dinas.php";
}
else if ($_GET['dir']=='data-suratkeluar')
{ include "modul/surat_keluar/data_suratkeluar.php";
}
else if ($_GET['dir']=='unit-pengelola')
{ include "modul/unit_pengelola/unit_pengelola.php";
}
elseif  ($_GET['dir']=='unit-kerja')
{ include "modul/unit_kerja/unit_kerja.php";
}

?>
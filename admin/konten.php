<?php
if ($_GET['hal']=='upload_design')
{ include "modul/upload_design/upload_design.php";}

else if ($_GET['hal']=='design_sendiri')
{ include "modul/design_sendiri/design_sendiri.php";}

else if ($_GET['hal']=='dashboard')
{ include "home.php";}
else if ($_GET['hal']=='data-suratmasuk')
{ include "modul/surat_masuk/data_suratmasuk.php";
}
else if ($_GET['hal']=='arsip-suratmasuk')
{ include "modul/arsip_suratmasuk/arsip_suratmasuk.php";
}
else if ($_GET['hal']=='arsip-disposisi')
{ include "modul/arsip_disposisi/arsip_disposisi.php";
}
else if ($_GET['hal']=='proses-surat')
{ include "modul/proses_surat/proses_surat.php";
}
else if ($_GET['hal']=='laporan-suratmasuk')
{ include "modul/laporan_suratmasuk/laporan_suratmasuk.php";
}
else if ($_GET['hal']=='laporan-suratkeluar')
{ include "modul/laporan_suratkeluar/laporan_suratkeluar.php";
}
else if ($_GET['hal']=='nomor-surat')
{ include "modul/nomor_surat/nomor_surat.php";
}
else if ($_GET['hal']=='buat-suratdinas')
{ include "modul/buat_suratdinas/surat_dinas.php";
}
else if ($_GET['hal']=='data-suratkeluar')
{ include "modul/surat_keluar/data_suratkeluar.php";
}
else if ($_GET['hal']=='unit-pengelola')
{ include "modul/unit_pengelola/unit_pengelola.php";
}
elseif  ($_GET['hal']=='unit-kerja')
{ include "modul/unit_kerja/unit_kerja.php";
}
elseif  ($_GET['hal']=='jabatan')
{ include "modul/jabatan/jabatan.php";
}
elseif  ($_GET['hal']=='direktur')
{ include "modul/direktur/direktur.php";
}
elseif  ($_GET['hal']=='admin')
{ include "modul/admin/admin.php";
}
elseif  ($_GET['hal']=='permintaan')
{ include "modul/minta_surat/minta_surat.php";
}

else
if ($_GET['hal']=='lupa_pasword')
{include "lupa_pasword.php";}
?>
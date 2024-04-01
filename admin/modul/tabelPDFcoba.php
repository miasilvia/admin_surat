<?php
// menyertakan autoloader
require_once '../../dompdf/dompdf_config.inc.php';
$html = 
'<html><body><pre>'.
'<br><br><br>'.
'<center><font face="times new roman">KEMENTERIAN RISET, TEKNOLOGI, DAN PENDIDIKAN TINGGI'.
'<br><strong>POLITEKNIK NEGERI INDRAMAYU</strong></font>'.
' <br><font face="times new roman" size="2"> Jalan Raya Lohbener Lama Nomor 8 Lohbener - Indramayu 45252'.
'<br>Telepon/Faksimile: (0234) 5746464'.
'<br>Laman: http://www.polindra.ac.id Email: info@polindra.ac.id'.
'<br>_______________________________________________________________________________________________________________</font></center>'.
'<p align="right"><font face="times new roman" size="2">Tanggal:ejgf gd s dg gdfgfd
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</font></p>'.
'<br><font face="times new roman" size="2">																						Nomor Surat&emsp;&emsp;&emsp;:'.
'<br>																						Lampiran								:'.

'<br>																						Hal 																	:'.


'<br><br><br><br>																						Yth.</font>'.

'<br><br><br>																	<table border="3" cellspacing="-2">
    <tr>
        <td>Baris 1, Kolom 1</td>
        <td>Baris 1, Kolom 2</td>
        <td>Baris 1, Kolom 3</td>
    </tr>
    <tr>
        <td>Baris 2, Kolom 1</td>
        <td>Baris 2, Kolom 2</td>
        <td> Baris 2, Kolom 3</td>
    </tr>
    <tr>
        <td> Baris 3, Kolom 1</td>
        <td> Baris 3, Kolom 2</td>
        <td> Baris 3, Kolom 3</td>
    </tr>
    <tr>
        <td> Baris 4, Kolom 1</td>
        <td> Baris 4, Kolom 2</td>
        <td> Baris 4, Kolom 3</td>
    </tr>
</table>'.


'</pre></body></html>';
// mengacu ke namespace DOMPDF


// menggunakan class dompdf
$dompdf = new Dompdf();


$dompdf->load_Html($html);

// (Opsional) Mengatur ukuran kertas dan orientasi kertas


// Menjadikan HTML sebagai PDF
$dompdf->render();

// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("Data.pdf",array("Attachment"=>0));

?>
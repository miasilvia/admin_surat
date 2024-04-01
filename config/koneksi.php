<?php $host = "localhost"; 
$user = "root"; 
$pass = ""; 
$db = "surat"; 
try {
    $konek = new mysqli($host, $user, $pass, $db);
    // Setel mode error untuk mysqli menjadi exception
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
} catch (mysqli_sql_exception $e) {
    throw new Exception("Koneksi ke database gagal: " . $e->getMessage());
}
?>
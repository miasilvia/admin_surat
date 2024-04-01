<?php
    include "../../../config/koneksi.php";
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $sql = mysqli_query($konek,"SELECT * FROM disposisi WHERE id = $id");
        while ($result = mysqli_fetch_array($sql)){
        ?>
        <form action="modul/surat_masuk/edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <div class="form-group">
                <label>Isi Disposisi</label>
                <input type="text" class="form-control" name="isi_disposisi" value="<?php echo $result['isi_disposisi']; ?>">
            </div>
           
              <button class="btn btn-primary" type="submit">Simpan</button>
        </form>     
        <?php } }
?>
<?php
if (!isset($_SESSION['nik'])){
    header ("location:../index.php");
}else{
    $nik=$_SESSION['nik'];
}
?>
<div class="card">
    <div class="card-header">
    <a href="template_catatan.php?aksi=awal" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
    </div>
    <div class="card-body">
    <form action="../eksekusi/proses_catatan.php" method="post">
        <div class="form-group">
            <div class="mb-3">
              <label class="form-label">ID</label> 
              <input type="text" name="id" class="form-control" value="<?php echo $id; ?>" readonly>
            </div>
            <label>Pilih Tanggal</label>
            <input name="tanggal" type="date" required class="form-control" placeholder="Masukan Tanggal">
        </div>
        <div class="form-group">
            <label>Pilih Jam</label>
            <input name="jam" type="time" required class="form-control" placeholder="Masukan Jam">
        </div>
        <div class="form-group">
            <label>Pilih Lokasi</label>
            <input name="lokasi" type="text" required class="form-control" placeholder="Masukan Lokasi">
        </div>
        <div class="form-group">
            <label>Suhu Tubuh</label>
            <input name="suhu" type="number" required class="form-control" placeholder="Masukan Suhu Tubuh">
        </div>
        <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i> UPDATE </button>
            <button type="reset" class="btn btn-warning"><i class="fa fa-trash"></i> KOSONGKAN </button>
        </div>
    </form>
    </div>
</div>
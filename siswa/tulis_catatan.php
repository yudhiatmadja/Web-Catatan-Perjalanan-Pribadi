<div class="card">
    <div class="card-header">
    <a href="dashboard.php" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
    </div>
    <div class="card-body">
    <form action="../eksekusi/eksekusi.php" method="post">
        <div class="form-group">
            <label>Pilih Tanggal</label>
            <input name="tanggal" type="date" required class="form-control" placeholder="Masukan Tanggal">
        </div>
        <div class="form-group">
            <label>Pilih Jam</label>
            <input name="jam" type="time" required class="form-control" placeholder="Masukan Jam">
        </div>
        <div class="form-group">
            <label>Tujuan</label>
            <input name="lokasi" type="text" required class="form-control" placeholder="Masukan Tujuan">
        </div>
        <div class="form-group">
            <label>Suhu Tubuh</label>
            <input name="suhu" type="number" required class="form-control" placeholder="Masukan Suhu Tubuh">
        </div>
        <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> SIMPAN </button>
            <button type="reset" class="btn btn-warning"><i class="fa fa-trash"></i> KOSONGKAN </button>
        </div>
    </form>
    </div>
</div>
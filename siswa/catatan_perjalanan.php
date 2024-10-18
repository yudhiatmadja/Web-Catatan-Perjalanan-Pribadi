<?php
include "../inc/config.php";
if (!isset($_SESSION['nik'])){
    header ("location:../index.php");
}else{
    $nik=$_SESSION['nik'];
}



?>
<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">CATATAN PERJALANAN</h6><br>
              <div class="col-3">
    <a href="dashboard.php" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fa fa-arrow-left"></i>
                                        </span>
                                        <span class="text">Kembali</span>
                                    </a>
    </div>
            </div>
             <div class="row">
              <div class="col-10 mx-auto">
                <form action="" method="get" class=" mx-auto my-2 align-items-center">
                    <input type="hidden" name="aksi" value="awal">
                  <label for="katakunci" class="text-center m-2">Cari Data Catatan Perjalanan</label>
                  <div class="input-group mb-5">
                    <input  type="text" name="katakunci" value="<?= isset($_GET['katakunci']) ? $_GET['katakunci'] : ''?>" id="katakunci" class="form-control text-center col-5" placeholder="Masukan Kata Kunci ">
                    <select  name="berdasarkan" class="form-select col-5" aria-label="Default select example">
                      <option readonly  value="">Cari Berdasarkan</option>
                      <option value="tanggal">Tanggal</option>
                      <option value="jam">Jam </option>
                      <option value="tujuan">Tujuan</option>
                      <option value="suhu">Suhu</option>
                      <option value="kondisi">Kondisi</option>
                    </select>
                    <button class="btn btn-primary col-2" type="submit" ><i class="bi bi-search text-white" style="margin-right: 5px;"></i> Cari</button>
                  </div>
                </form>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Tanggal</th>
                                            <th class="text-center">Jam</th>                                            
                                            <th class="text-center">Tujuan</th>
                                            <th class="text-center">Suhu Tubuh</th>
                                            <th class="text-center">Kondisi</th>
                                        </tr>
                                        </thead>
                                        
               
                  <tbody>
                                        <?php 
                                            $no = 1;
                                            foreach( $tabel as $data){
                                            ?>
                                    
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>
                                            <td class="text-center"><?php echo $data['tanggal'] ?></td>
                                            <td class="text-center"><?php echo $data['jam'] ?></td>
                                            <td class="text-center"><?php echo $data['lokasi'] ?></td>                                   
                                            <td class="text-center"><?php echo $data['suhu'] ?></td>
                                            <td class="text-center"><?php echo ($data['suhu'] >= 36 )? 'Tidak Normal' : 'Normal' ?></td>
                                        </tr>
                                    <?php }?>

                                           </tbody>
                                </table>
                                <!-- <a href="tulis_catatan.php?aksi=" class="btn btn-primary" >Tambah Catatan Perjalanan</a> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
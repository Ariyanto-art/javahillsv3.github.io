<?php
require '../function.php';

// Block masuk dari url
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aplikasi Javahills</title>
        <link href="css/simple-datatables@latest.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <!-- modal -->
        <link rel="stylesheet" href="css/bootstrap-1.min.css">
        <script src="js/jquery-1.min.js"></script>
        <script src="js/popper-1.min.js"></script>
        <script src="js/bootstrap-1.min.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#" style="color: gold;">Aplikasi Javahills</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="dash.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="kasir.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Kasir
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Stock Barang
                            </a>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link active"  href="pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                                Pelanggan
                            </a>
                            <a class="nav-link" href="user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                User
                            </a>
                            <a class="nav-link" href="supplier.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-map-marker-alt"></i></div>
                                Supplier
                            </a>
                            <div class="sb-sidenav-menu-heading">Master Web</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Master Web
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="website/multiflora_cms.php">Multiflora</a>
                                    <a class="nav-link" href="website/coffee_cms.php">Coffee Blossom</a>
                                    <a class="nav-link" href="website/acacia_cms.php">Acacia Blossom</a>
                                    <a class="nav-link" href="website/wild_cms.php">Wild Grass</a>
                                    <a class="nav-link" href="website/mint_cms.php">Madu Mint</a>
                                    <a class="nav-link" href="website/maag_cms.php">Madu Maag</a>
                                    <a class="nav-link" href="website/kalimantan_cms.php">Kalimantan Super</a>
                                    <a class="nav-link" href="website/diet_cms.php">Madu Diet</a>
                                    <a class="nav-link" href="website/randu_cms.php">Randu Blossom</a>
                                    <a class="nav-link" href="website/rambutan_cms.php">Rambutan Blossom</a>
                                    <a class="nav-link" href="website/javatrigona_cms.php">Javatrigona</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Master Web</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Master Web
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="laporan_kasir.php">Multiflora</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="nav-link">Ahlan : <?=$_SESSION['username'];?></div>
                        <a class="nav-link" href="../keluar.php">Keluar</a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 style="font-family: times new roman;">Kasir</h1>

                        <button type="button" class="btn btn-info mb-4 mt-2" data-toggle="modal" data-target="#myModal">
                            Data Pelanggan
                        </button>
                        <button type="button" class="btn btn-info mb-4 mt-2" data-toggle="modal" data-target="#pelangganbaru">
                            Pelanggan baru
                        </button>

                        <div>
                            <div>
                                <table class=" table table-bordered">
                                    <thead class="text-center">
                                        <tr>
                                            <th class="col-1">ID</th>
                                            <th class="col-1">Tanggal</th>
                                            <th>Nama Pelanggan</th>
                                            <th class="col-2">Jumlah</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $tampil = mysqli_query ($koneksi,"SELECT * FROM kasir k, pelanggan p WHERE k.id_pelanggan=p.id_pelanggan ");
                                    while ($data=mysqli_fetch_array($tampil)) {
                                        $idkasir = $data['id_kasir'];
                                        $idpelanggan = $data['id_pelanggan'];
                                        $namapelanggan = $data['namapelanggan'];
                                        $tanggal = $data['tanggal'];
                                        $alamat = $data['alamat'];
                                        $notelp = $data['notelp'];

                                        // cari subtotal per id kasir
                                        $getdetailkasir = mysqli_query($koneksi, "SELECT SUM(subtotal) AS              hasil FROM detailkasir WHERE id_kasir='$idkasir'");
                                        $hasildetailkasir = mysqli_fetch_array($getdetailkasir);
                                        $subtotal = $hasildetailkasir['hasil'];

                                        // cari ongkir per id kasir
                                        $getongkir = mysqli_query($koneksi,"SELECT * FROM ongkir WHERE id_kasir='$idkasir' ");
                                        $hasilongkir = mysqli_fetch_array($getongkir);
                                        $ongkir = isset($hasilongkir['ongkos_kirim'])?$hasilongkir['ongkos_kirim']:'0';
                                        // cari pembayaran per id kasir
                                        $getbayar = mysqli_query($koneksi, "SELECT * FROM bayar WHERE id_kasir='$idkasir' ");
                                        $hasilbayar = mysqli_fetch_array($getbayar);
                                        $bayar = isset($hasilbayar['bayar_tagihan'])?$hasilbayar['bayar_tagihan']:'0';

                                        // hitung jumlah
                                        $jumlah = $subtotal+$ongkir;

                                        
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$idkasir;?></td>
                                            <td><?=$tanggal;?></td>
                                            <td><?=$namapelanggan;?> - <?=$alamat;?></td>
                                            <td>Rp <?=number_format($jumlah);?></td>
                                            <td>
                                                <?php
                                                    $getstatus = mysqli_query($koneksi,"SELECT * FROM status WHERE id_kasir='$idkasir' ");
                                                    $hasilstatus = mysqli_fetch_array($getstatus);
                                                    $status = isset($hasilstatus['status_tagihan'])? $hasilstatus['status_tagihan']: '';
                                                ?>
                                                <?=$status;?>
                                            </td>
                                            <td>
                                                <a href="view.php?idp=<?=$idkasir?>" class="btn btn-primary">Detail</a>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idkasir;?>">
                                                    Hapus
                                                </button>
                                                <a href="https://api.whatsapp.com/send?phone=<?=$notelp;?>&text=Detail Kwitansi Penjualan%0ANama Pelanggan:%20<?=$namapelanggan;?>%0ANo Invoice :%20<?=$idkasir;?>%0ATotal Pembelian:%20RP <?=number_format($jumlah);?>%0ATerima%20kasih%20sudah%20berbelanja%20di%20lapak%20kami%0ANote:Total sudah termasuk dengan ongkir (jika ada)" class="btn btn-success mt-2">Ucapan WA</a>
                                            </td>
                                        </tr>
                                          <!-- The Modal Delete -->
                                          <div class="modal fade" id="delete<?=$idkasir;?>">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                              
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Hapus Data Pelanggan</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Hapus Pelanggan <?=$namapelanggan;?> ?
                                                    <input type="hidden" name="idkasir" value="<?=$idkasir;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapuskasir">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                                </form>
                                                
                                              </div>
                                            </div>
                                          </div>
                                    <?php }; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Java Hills Raw Honey 2021-<?=date('Y');?></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>

    <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Data Pelanggan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <form method="post">
            <!-- Modal body -->
            <div class="modal-body">
                Pilih Pelanggan
                <select name="idpelanggan" class="form-control">
                    <option></option>
                    <?php
                    $getpelanggan = mysqli_query($koneksi,"SELECT * FROM pelanggan");
                    while ($data = mysqli_fetch_array($getpelanggan)) {
                        $namapelanggan = $data['namapelanggan'];
                        $alamat = $data['alamat'];
                        $idpelanggan = $data['id_pelanggan'];
                        $notelp = $data['notelp'];
                    
                    ?>
                    <option value="<?=$idpelanggan?>"><?=$namapelanggan;?> - <?=$alamat;?></option>
                    <?php };?>
                </select>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="kasir">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </form>
            
          </div>
        </div>
      </div>

      <!-- Modal Pelanggan Baru -->
      <div class="modal fade" id="pelangganbaru">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Input Data Pelanggan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <form method="post">
            <!-- Modal body -->
            <div class="modal-body">
                <input type="text" name="nama_baru" class="form-control" placeholder="Input Nama">
                <textarea type="text" name="alamat_baru" class="form-control mt-2" placeholder="Jl.xyz123"></textarea>
                <input type="text" name="notelp_baru" class="form-control mt-2" placeholder="Input Nomor Telepon">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="kasir_user">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </form>
            
          </div>
        </div>
      </div>
</html>

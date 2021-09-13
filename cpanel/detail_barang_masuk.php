<?php
require '../function.php';
// Block masuk dari url
session_start();

if (isset($_GET['idm']))
{
   $idm = $_GET['idm'];
   $getsupplier = mysqli_query($koneksi,"SELECT * FROM masuk m ,supplier s WHERE m.id_supplier=s.id_supplier AND m.id_masuk='$idm' ");
   $data = mysqli_fetch_array($getsupplier);
   $namasupplier = $data['nama_supplier'];
   $alamat = $data['alamat_supplier'];
   $notelp = $data['telp_supplier'];
   $idsupplier = $data['id_supplier'];
}
else
{
    header('location:masuk.php');
}
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
                <nav class="sb-sidenav accordion sb-sidenav-info" id="sidenavAccordion">
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
                            <a class="nav-link active" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Stock Barang
                            </a>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link"  href="pelanggan.php">
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
                        <h5 style="font-family: times new roman;">ID Supplier : <?=$idm;?></h5>
                        <h5 style="font-family: times new roman;">Nama Supplier : <?=$namasupplier;?></h5>
                        <h5 style="font-family: times new roman;">Alamat : <?=$alamat;?></h5>
                        <h5 style="font-family: times new roman;">Nomor Telepon : <?=$notelp;?></h5>

                        <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                            Pesan
                        </button>

                        <div>
                            <div>
                                <table  class="table table-bordered">
                                    <thead >
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no=1;
                                    $tampil = mysqli_query ($koneksi,"SELECT * FROM detailmasuk m, stock s WHERE m.id_stock=s.id_stock AND id_masuk='$idm' ");
                                    while ($data=mysqli_fetch_array($tampil)) {
                                        $iddetailmasuk = $data['id_detailmasuk'];
                                        $idmasuk = $data['id_masuk'];
                                        $idstock = $data['id_stock'];
                                        $namabarang = $data['namabarang'];
                                        $ukuran = $data['ukuran'];
                                        $harga = $data['harga_masuk'];
                                        $qty = $data['qty_masuk'];
                                        $subtotal = $data['subtotal_masuk'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$namabarang;?> (<?=$ukuran;?>)</td>
                                            <td>Rp <?=number_format($harga);?></td>
                                            <td><?=$qty;?></td>
                                            <td>Rp <?=number_format($subtotal);?></td>
                                            <td>
                                                <button  id="hapus" type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$iddetailmasuk;?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- The Modal Delete -->
                                          <div class="modal fade" id="delete<?=$iddetailmasuk;?>">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                              
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Hapus Data Item</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="POST">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Hapus Item <?=$namabarang;?> <?=$ukuran;?> ?
                                                    <input type="hidden" name="ids" value="<?=$idstock;?>">
                                                    <input type="hidden" name="iddm" value="<?=$iddetailmasuk;?>">
                                                    <input type="hidden" name="idm" value="<?=$idm;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="hapusdetailsupplier">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                                </form>
                                                
                                              </div>
                                            </div>
                                          </div>
                                    <?php }; ?>
                                    </tbody>
                                </table>

                                <table class="table table-border">
                                    <tbody>
                                        <tr>
                                            <td colspan="4" class="text-right">Total Pembelian</td>
                                            <td colspan="2">
                                                <?php
                                                $totalbeli = mysqli_query($koneksi, "SELECT SUM(subtotal_masuk) AS hasil FROM detailmasuk WHERE id_masuk='$idm'");
                                                $data = mysqli_fetch_array($totalbeli);

                                                echo 'Rp '.number_format($data['hasil']);
                                                ?>

                                            </td>
                                            <td colspan="4" class="text-right">Ongkir</td>
                                            <td colspan="2">
                                                <?php
                                                $getongkir = mysqli_query($koneksi,"SELECT ongkos_masuk FROM ongkir_masuk WHERE id_masuk='$idm' ");
                                                $kirim = mysqli_fetch_array($getongkir);
                                                $dapat= isset($kirim['ongkos_masuk'])? $kirim['ongkos_masuk'] : '0';
                                                $idongkir = isset($kirim['id_ongkir_masuk']) ? $kirim['id_ongkir_masuk'] :'0';
                                                ?>
                                                <form method="post">
                                                <input type="num" name="ongkir" value="<?=$dapat;?>">
                                                <input type="hidden" name="idmasuk" value="<?=$idm;?>">
                                                <input type="hidden" name="idongkir" value="<?=$idongkir;?>">
                                            </td>
                                            <td colspan="4" class="text-right">Total Keseluruhan</td>
                                            <td colspan="2">
                                                <?php
                                                $total = $data['hasil'] + $dapat;
                                                echo 'Rp '.number_format($total);
                                                ?>
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <input type="hidden" name="idsupplier" value="<?=$idsupplier;?>">
                                    <button onclick="simpan();" type="submit" name="simpandetailsupplier" class="btn btn-primary">Simpan</button>
                                    <a href="print_masuk.php?hal=print&idm=<?=$idm;?>" class="btn btn-primary" name="print" target="blank">Print</a>
                                </form>
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
        <script >
            function simpan() {
              var x = document.getElementById("hapus");
              if (x == "block") {
                x.stye.display = 'none';
              }else {
                x.stye.display = 'block';
              }
            }
        </script>
    </body>

    <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Pilih Item</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <form method="post">
            <!-- Modal body -->
            <div class="modal-body">
                <select name="idstock" class="form-control">
                    <option></option>
                    <?php
                    $getstock = mysqli_query($koneksi,"SELECT * FROM stock");
                    while ($data = mysqli_fetch_array($getstock)) {
                        $namabarang = $data['namabarang'];
                        $ukuran = $data['ukuran'];
                        $idstock = $data['id_stock'];
                        $qty = $data['qty'];
                        $harga = $data['harga'];
                    
                    ?>
                    <option value="<?=$idstock;?>"><?=$namabarang;?> <?=$ukuran;?></option>
                    <?php };?>
                </select>
                <input type="number" name="harga" class="form-control mt-2" placeholder="Harga" min="1" required>
                <input type="number" name="qty" class="form-control mt-2" placeholder="Jumlah" min="1" required>
                <input type="hidden" name="idm" value="<?=$idm;?>">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="tambahitem">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </form>
            
          </div>
        </div>
      </div>
</html>

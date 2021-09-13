<?php
require '../function.php';
// Block masuk dari url
session_start();
 // ambil id kasir
if (isset($_GET['idp']))
{
   $idp = $_GET['idp'];
   $getpelanggan = mysqli_query($koneksi,"SELECT * FROM kasir k ,pelanggan p WHERE k.id_pelanggan=p.id_pelanggan AND k.id_kasir='$idp' ");
   $data = mysqli_fetch_array($getpelanggan);
   $namapelanggan = $data['namapelanggan'];
   $alamat = $data['alamat'];
   $notelp = $data['notelp'];
   $idpelanggan = $data['id_pelanggan'];
}
else
{
    header('location:kasir.php');
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
        <<link href="css/styles.css" rel="stylesheet" />
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
                        <h5 style="font-family: times new roman;">ID Pesanan : <?=$idp;?></h5>
                        <h5 style="font-family: times new roman;">Nama Pelanggan : <?=$namapelanggan;?></h5>
                        <h5 style="font-family: times new roman;">Alamat : <?=$alamat;?></h5>
                        <h5 style="font-family: times new roman;">Nomor Telepon : <?=$notelp;?></h5>

                        <button type="button" class="btn btn-info mb-4 mt-4" data-toggle="modal" data-target="#myModal">
                            Pesan
                        </button>

                        <div>
                            <div>
                                <table  class="table table-border">
                                    <thead >
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Diskon</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no=1;
                                    $tampil = mysqli_query ($koneksi,"SELECT * FROM detailkasir d, stock s WHERE d.id_stock=s.id_stock AND id_kasir='$idp' ");
                                    while ($data=mysqli_fetch_array($tampil)) {
                                        $iddetailkasir = $data['id_detailkasir'];
                                        $idkasir = $data['id_kasir'];
                                        $idstock = $data['id_stock'];
                                        $namabarang = $data['namabarang'];
                                        $ukuran = $data['ukuran'];
                                        $harga = $data['harga'];
                                        $qty = $data['qty_order'];
                                        $subtotal = $data['subtotal'];
                                        $diskon = $data['diskon'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$namabarang;?> (<?=$ukuran;?>)</td>
                                            <td>Rp <?=number_format($harga);?></td>
                                            <td><?=$qty;?></td>
                                            <td>Rp <?=number_format($diskon);?></td>
                                            <td>Rp <?=number_format($subtotal);?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$iddetailkasir;?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- The Modal Delete -->
                                          <div class="modal fade" id="delete<?=$iddetailkasir;?>">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                              
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Hapus Data Item</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah Anda Yakin Hapus Item <?=$namabarang;?> <?=$ukuran;?> ?
                                                    <input type="hidden" name="idstock" value="<?=$idstock;?>">
                                                    <input type="hidden" name="iddetailkasir" value="<?=$iddetailkasir;?>">
                                                    <input type="hidden" name="idp" value="<?=$idp;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="deleteitem">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                                </form>
                                                
                                              </div>
                                            </div>
                                          </div>
                                    <?php }; ?>
                                        <tr>
                                            <td colspan="4" class="text-right">Total Pembelian</td>
                                            <td colspan="2">
                                                <?php
                                                $totalbeli = mysqli_query($koneksi, "SELECT SUM(subtotal) AS hasil FROM detailkasir WHERE id_kasir='$idp'");
                                                $data = mysqli_fetch_array($totalbeli);

                                                echo 'Rp '.number_format($data['hasil']);
                                                ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Ongkir</td>
                                            <td colspan="2">
                                                <?php
                                                $getongkir = mysqli_query($koneksi,"SELECT * FROM ongkir WHERE id_kasir='$idp' ");
                                                $kirim = mysqli_fetch_array($getongkir);
                                                $dapat= isset($kirim['ongkos_kirim'])? $kirim['ongkos_kirim'] : '0';
                                                $idongkir = isset($kirim['id_ongkir']) ? $kirim['id_ongkir'] :'0';
                                                ?>
                                                <form method="post">
                                                <input type="num" name="ongkir" value="<?=$dapat;?>">
                                                <input type="hidden" name="idkasir" value="<?=$idp;?>">
                                                <input type="hidden" name="idongkir" value="<?=$idongkir;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total Pembayaran</td>
                                            <td colspan="2">
                                                <?php
                                                $total = $data['hasil'] + $dapat;
                                                echo 'Rp '.number_format($total);
                                                ?>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Bayar</td>
                                            <td colspan="2">
                                                <?php
                                                $getbayar = mysqli_query($koneksi,"SELECT * FROM bayar WHERE id_kasir='$idp' ");
                                                $lunas = mysqli_fetch_array($getbayar);
                                                $hasil= isset($lunas['bayar_tagihan'])? $lunas['bayar_tagihan'] :'0';
                                                $idbayar = isset($lunas['id_bayar']) ? $lunas['id_bayar'] :'0';
                                                ?>
                                                <input type="num" name="bayar" value="<?=@$hasil;?>">
                                                <input type="hidden" name="idkasir" value="<?=$idp;?>">
                                                <input type="hidden" name="idbayar" value="<?=$idbayar;?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Sisa Tagihan</td>
                                            <td colspan="2">
                                                <?php
                                                $sisa = $data['hasil'] + $dapat - $hasil;
                                                echo 'Rp '.number_format($sisa);
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                    <input type="hidden" name="idpelanggan" value="<?=$idpelanggan;?>">
                                    <button type="submit" name="simpanpesanan" class="btn btn-primary">Simpan</button>
                                    <a href="print.php?hal=print&idp=<?=$idp;?>" class="btn btn-primary" name="print" target="blank">Print</a>
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
    </body>

    <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Pesan</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <form method="post">
            <!-- Modal body -->
            <div class="modal-body">
                Pilih Item
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
                    <option value="<?=$idstock;?>"><?=$namabarang;?> <?=$ukuran;?> (<?=$qty;?>)</option>
                    <?php };?>
                </select>
                <input type="number" name="qty" class="form-control mt-2" placeholder="Jumlah" min="1" required>
                <input type="number" name="diskon" class="form-control mt-2" placeholder="Diskon" required>
                <input type="hidden" name="idp" value="<?=$idp;?>">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="pesan">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </form>
            
          </div>
        </div>
      </div>
</html>

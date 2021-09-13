<?php
require '../../function_2.php';
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
        <link href="../css/simple-datatables@latest.css" rel="stylesheet" />
        <<link href="../css/styles.css" rel="stylesheet" />
        <script src="../js/all.min.js" crossori../gin="anonymous"></script>
        <!-- modal -->
        <link rel="stylesheet" href="../css/bootstrap-1.min.css">
        <script src="../js/jquery-1.min.js"></script>
        <script src="../js/popper-1.min.js"></script>
        <script src="../js/bootstrap-1.min.js"></script>
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
                            <a class="nav-link" href="../dash.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="../kasir.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Kasir
                            </a>
                            <a class="nav-link" href="../masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="../stock.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-archive"></i></div>
                                Stock Barang
                            </a>
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link"  href="../pelanggan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-wrench"></i></div>
                                Pelanggan
                            </a>
                            <a class="nav-link" href="../user.php">
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
                                    <a class="nav-link" href="multiflora_cms.php">Multiflora</a>
                                    <a class="nav-link" href="coffee_cms.php">Coffee Blossom</a>
                                    <a class="nav-link" href="acacia_cms.php">Acacia Blossom</a>
                                    <a class="nav-link" href="wild_cms.php">Wild Grass</a>
                                    <a class="nav-link  active" href="#">Madu Mint</a>
                                    <a class="nav-link" href="maag_cms.php">Madu Maag</a>
                                    <a class="nav-link" href="kalimantan_cms.php">Kalimantan Super</a>
                                    <a class="nav-link" href="diet_cms.php">Madu Diet</a>
                                    <a class="nav-link" href="randu_cms.php">Randu Blossom</a>
                                    <a class="nav-link" href="rambutan_cms.php">Rambutan Blossom</a>
                                    <a class="nav-link" href="javatrigona_cms.php">Javatrigona</a>
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
                        <h1 style="font-family: times new roman;">Mint Herbal</h1>

                        <button type="button" class="btn btn-info mb-4" data-toggle="modal" data-target="#myModal">
                            Tambah Manfaat
                        </button>

                        <div>
                            <div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Manfaat Pertama</th>
                                            <th>Manfaat Kedua</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $no=1;
                                    $tampil = mysqli_query ($koneksi,"SELECT * FROM mint ");
                                    while ($data=mysqli_fetch_array($tampil)) {
                                        $idmint = $data['id_mint'];
                                        $manfaatkiri = $data['manfaat_kiri'];
                                        $manfaatkanan = $data['manfaat_kanan'];
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?=$no++;?></td>
                                            <td><?=$manfaatkiri;?></td>
                                            <td><?=$manfaatkanan;?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idmint;?>">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idmint;?>">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>
                                        <!-- The Modal Edit -->
                                          <div class="modal fade" id="edit<?=$idmint;?>">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                              
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Ubah Manfaat</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="text" name="manfaatkiri" class="form-control" placeholder="Input Manfaat" value="<?=$manfaatkiri;?>">
                                                    <input type="text" name="manfaatkanan" class="form-control mt-2" placeholder="Input Manfaat" value="<?=$manfaatkanan;?>">
                                                    <input type="hidden" name="idmint" value="<?=$idmint;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="editmint">Submit</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                                </form>
                                                
                                              </div>
                                            </div>
                                          </div>
                                          <!-- The Modal Delete -->
                                          <div class="modal fade" id="delete<?=$idmint;?>">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                              
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                  <h4 class="modal-title">Hapus Manfaat</h4>
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <form method="post">
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    Apakah Yakin Akan Hapus Manfaat Ini ?
                                                    <input type="hidden" name="idmint" value="<?=$idmint;?>">
                                                </div>
                                                
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success" name="deletemint">Submit</button>
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
        <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="../assets/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>

    <!-- The Modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Tambah Manfaat</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <form method="post">
            <!-- Modal body -->
            <div class="modal-body">
                <input type="text" name="manfaatkiri" class="form-control" placeholder="Input Manfaat">
                <input type="text" name="manfaatkanan" class="form-control mt-2" placeholder="Input Manfaat">
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success" name="mint">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

            </form>
            
          </div>
        </div>
      </div>
</html>

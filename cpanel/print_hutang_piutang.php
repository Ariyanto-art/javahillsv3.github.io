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
        <title>Laporan Hutang Piutang</title>
        <link href="css/simple-datatables@latest.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <!-- modal -->
        <link rel="stylesheet" href="css/bootstrap-1.min.css">
        <script src="js/jquery-1.min.js"></script>
        <script src="js/popper-1.min.js"></script>
        <script src="js/bootstrap-1.min.js"></script>
    </head>
    <body>
        <div class="container-fluid px-4">
            <h1 style="font-family: times new roman;" class="mb-4 text-center">Laporan Hutang Piutang</h1>
            <div>
                <div>
                    <table class="table-bordered" style="margin: auto;" cellpadding="5">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <?php
                        $no=1;

                        if (isset($_POST['cetak'])) 
                        {
                            $status = $_POST['print'];
                            $tampil = mysqli_query ($koneksi,"SELECT * FROM pelanggan p, status s WHERE p.id_pelanggan=s.id_pelanggan AND status_tagihan LIKE '%$status%' ");
                        }
                        else
                        {
                           $tampil = mysqli_query ($koneksi,"SELECT * FROM pelanggan p, status s WHERE p.id_pelanggan=s.id_pelanggan "); 
                        }
                        while ($data=mysqli_fetch_array($tampil)) {
                            $idpelanggan = $data['id_pelanggan'];
                            $namapelanggan = $data['namapelanggan'];
                            $alamat = $data['alamat'];
                            $notelp = $data['notelp'];
                            $status = $data['status_tagihan'];
                            $sisa = $data['sisa'];
                        ?>
                        <tbody>
                            <tr>
                                <td><?=$no++;?></td>
                                <td><?=$namapelanggan;?></td>
                                <td><?=$alamat;?></td>
                                <td><?=$notelp;?></td>
                                <td><?=$status;?></td>
                                <td><?=$sisa;?></td>
                            </tr>
                        <?php }; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript">window.print();</script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    </body>
</html>

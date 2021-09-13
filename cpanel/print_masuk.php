<?php
// htmlspdf
ob_start();
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
   $tanggal = $data['tanggal_masuk'];
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
        <title>Kwintasi-<?=$namasupplier;?></title>
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
        <div>
            <div>
                <main>
                    <div class="container-fluid px-4">
                        <div class="media p-3">
                          <img src="assets/img/logojavahills.jpg" width="15%">
                          <div class="media-body" style="padding-top: -100px;padding-left: 120px;">
                            <h6 class="mt-1">Hanna Suciati <small><i>Java Hills Raw Honey</i></small></h6>
                            <h6 >Jl.Fajar Baru Utara RT007/RW008 No.32</h6>
                            <h6 >No Telp : 0877-8053-4000</h6>
                          </div>
                        </div>
                        <div class="mt-2 text-center" style="font-size: 25px;font-family: arial;"><b>Tanda Terima Faktur</b></div>
                        <div class="mt-4" style="border-bottom: dotted; border-width: 2px;"></div>
                        <table >
                            <tbody class="table table-borderless">
                                <tr>
                                    <td>Tanggal Faktur</td>
                                    <td><?=$tanggal;?></td>
                                    <td></td>
                                    <td>Nama Supplier</td>
                                    <td><?=$namasupplier;?></td>
                                </tr>
                                <tr>
                                    <td>No. ID Faktur</td>
                                    <td><?=$idm;?></td>
                                    <td></td>
                                    <td>Alamat</td>
                                    <td><?=$alamat;?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="border-bottom: dotted; border-width: 2px;"></div>
                        <div>
                            <div>
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
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
                                        </tr>
                                        <?php }; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4" class="text-right">Total Pembelian</td>
                                            <td>
                                                <?php
                                                $totalbeli = mysqli_query($koneksi, "SELECT SUM(subtotal_masuk) AS hasil FROM detailmasuk WHERE id_masuk='$idm'");
                                                $data = mysqli_fetch_array($totalbeli);

                                                echo 'Rp '.number_format($data['hasil']);
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Ongkir</td>
                                            <td>
                                                <?php
                                                $getongkir = mysqli_query($koneksi,"SELECT ongkos_masuk FROM ongkir_masuk WHERE id_masuk='$idm' ");
                                                $kirim = mysqli_fetch_array($getongkir);
                                                $dapat= isset($kirim['ongkos_masuk'])? $kirim['ongkos_masuk'] : '0';
                                                $idongkir = isset($kirim['id_ongkir_masuk']) ? $kirim['id_ongkir_masuk'] :'0';
                                                ?>
                                                <h6>RP <?=@number_format($dapat);?> </h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="text-right">Total Tagihan</td>
                                            <td>
                                                <?php
                                                $total = $data['hasil'] + $dapat;
                                                echo 'Rp '.number_format($total);
                                                ?>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="text-right" style="padding-top: 25px; padding-right: 50px;">
                                    <h6>Jakarta,<?=date('d-m-Y');?></h6>
                                    <h6 class="mr-4">Penerima</h6>
                                </div>
                                <div class="mr-4 text-right" style="padding-top: 50px;padding-right: 50px;">
                                    <p>( <?=$_SESSION['username'];?> )</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
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
</html>
<?php
$html = ob_get_contents();
ob_end_clean();




    

require __DIR__.'/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->AddPage("P","","","","","0","0","0","0","","","","","","","","","","","","A4");
    $mpdf->writeHTML($html);
    $mpdf->Output();
?>

<?php
// htmlspdf
ob_start();
require '../function.php';


// Block masuk dari url
session_start();

if (isset($_GET['idp']))
{
   $idp = $_GET['idp'];
   $getpelanggan = mysqli_query($koneksi,"SELECT * FROM kasir k ,pelanggan p WHERE k.id_pelanggan=p.id_pelanggan AND k.id_kasir='$idp' ");
   $data = mysqli_fetch_array($getpelanggan);
   $namapelanggan = $data['namapelanggan'];
   $alamat = $data['alamat'];
   $notelp = $data['notelp'];
   $tanggal = $data['tanggal'];
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
        <title>Kwintasi-<?=$namapelanggan;?></title>
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
                        <div class="media p-3 text-center" style="border-bottom: dotted; border-width: 2px;">
                          <img src="assets/img/logojavahills.jpg" width="20%">
                          <div class="media-body">
                            <h6 class="mt-1">Hanna Suciati <small><i>Java Hills Raw Honey</i></small></h6>
                            <h6 >Jl.Fajar Baru Utara RT007/RW008 No.32</h6>
                            <h6 >No Telp : 0877-8053-4000</h6>
                          </div>
                        </div>
                        <table >
                            <tbody class="table table-borderless">
                                <tr>
                                    <td width="10px"><?=$tanggal;?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?=$namapelanggan;?></td>
                                </tr>
                                <tr>
                                    <td width="10px">No. <?=$idp;?></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><?=$alamat;?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div style="border-bottom: dotted; border-width: 2px;"></div>
                        <div>
                            <div>
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
                                <div class="row">
                                    <div class="col">
                                        <?=$namabarang;?> (<?=$ukuran;?>)
                                    </div>
                                </div>
                                <table >
                                    <tbody class="table table-borderless">
                                        <tr>
                                            <td>Rp <?=number_format($harga);?> x <?=$qty;?> (Diskon Rp <?=number_format($diskon);?>)</td>
                                            <td></td>
                                            <td></td>
                                            <td>Rp <?=number_format($subtotal);?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <?php }; ?>
                                <div style="border-top: dotted; border-width: 2px;"></div>
                                <table >
                                    <tbody class="table table-borderless">
                                        <tr>
                                            <td>Total Pembelian</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <?php
                                                $totalbeli = mysqli_query($koneksi, "SELECT SUM(subtotal) AS hasil FROM detailkasir WHERE id_kasir='$idp'");
                                                $data = mysqli_fetch_array($totalbeli);

                                                echo 'Rp '.number_format($data['hasil']);
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Ongkir</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <?php
                                                $getongkir = mysqli_query($koneksi,"SELECT * FROM ongkir WHERE id_kasir='$idp' ");
                                                $kirim = mysqli_fetch_array($getongkir);
                                                $dapat= isset($kirim['ongkos_kirim'])? $kirim['ongkos_kirim'] : '0';
                                                $idongkir = isset($kirim['id_ongkir']) ? $kirim['id_ongkir'] :'0';
                                                ?>
                                                <h6>RP <?=@number_format($dapat);?> </h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Tagihan</td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <?php
                                            $total = $data['hasil'] + $dapat;
                                            echo 'Rp '.number_format($total);
                                            ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div style="border-top: dotted; border-width: 2px;"></div>
                                <table class="table table-borderless">
                                    <tfoot>
                                        <tr>
                                            <th >Bayar</th>
                                            <th></th>
                                            <th >
                                                <?php
                                                $getbayar = mysqli_query($koneksi,"SELECT * FROM bayar WHERE id_kasir='$idp' ");
                                                $lunas = mysqli_fetch_array($getbayar);
                                                $hasil= isset($lunas['bayar_tagihan'])? $lunas['bayar_tagihan'] :'0';
                                                $idbayar = isset($lunas['id_bayar']) ? $lunas['id_bayar'] :'0';

                                                echo "Rp ".number_format($hasil);
                                                ?>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th >Sisa Tagihan</th>
                                            <th></th>
                                            <th >
                                                <?php
                                                $sisa = $data['hasil'] + $dapat - $hasil;
                                                echo 'Rp '.number_format($sisa);
                                                ?>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="mt-3 text-center">
                                    <h6>Terima kasih</h6>
                                    <h6>Telah Berbelanja Di Lapak kami</h6>
                                </div>
                                <div class="mt-3 text-center">
                                    <img src="assets/img/qrcode.jpeg" width="20%">
                                    <p> Scan Untuk Pesan Kembali </p>
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
    $mpdf = new \Mpdf\Mpdf(['mode'=> 'utf-8','default_font_size'=>9,'format'=>[76,200]]);
    $mpdf->AddPage("P","","","","","0","0","0","0","","","","","","","","","","","","");
    $mpdf->writeHTML($html);
    $mpdf->Output();
?>

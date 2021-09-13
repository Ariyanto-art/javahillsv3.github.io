<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "dbjh";


$koneksi = mysqli_connect($server, $user , $pass , $database)or die (mysqli_eror($koneksi));


// tambah pelanggan

if (isset($_POST['pelanggan'])) 
{
	$nama = $_POST['name'];
	$alamat = $_POST['alamat'];
	$notelp = $_POST['notelp'];

	$getpelanggan = mysqli_query($koneksi, "INSERT INTO pelanggan (namapelanggan,alamat,notelp) VALUES ('$nama','$alamat','$notelp') ");
	if ($getpelanggan) 
	{
		header('location:pelanggan.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Input Pelanggan");
		window.location.href="pelanggan.php";
		</script>'; 
	}
}

// edit pelanggan
if (isset($_POST['editpelanggan'])) 
{
	$nama = $_POST['name'];
	$alamat = $_POST['alamat'];
	$notelp = $_POST['notelp'];
	$idpel = $_POST['idpel'];

	$geteditpelanggan = mysqli_query($koneksi, "UPDATE pelanggan SET namapelanggan='$nama',alamat='$alamat',notelp='$notelp' WHERE id_pelanggan='$idpel'");

	if ($geteditpelanggan)
	{
		header('location:pelanggan.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Edit Pelanggan");
		window.location.href="pelanggan.php";
		</script>';
	}
}

// Delete Pelanggan
if (isset($_POST['deletepelanggan'])) 
{
	$idpel = $_POST['idpel'];

	$geteditpelanggan = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE id_pelanggan='$idpel'");

	if ($geteditpelanggan)
	{
		header('location:pelanggan.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Hapus Pelanggan");
		window.location.href="pelanggan.php";
		</script>';
	}
}

// tambah User

if (isset($_POST['user'])) 
{
	$nama = $_POST['name'];
	$password = md5($_POST['password']);

	$getuser = mysqli_query($koneksi, "INSERT INTO user (namauser,password) VALUES ('$nama','$password') ");
	if ($getuser) 
	{
		header('location:user.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Input User");
		window.location.href="user.php";
		</script>'; 
	}
}

// edit User
if (isset($_POST['edituser'])) 
{
	$nama = $_POST['name'];
	$password = md5($_POST['password']);
	$iduser = $_POST['iduser'];

	$getedituser = mysqli_query($koneksi, "UPDATE user SET namauser='$nama',password='$password' WHERE id_user='$iduser'");

	if ($getedituser)
	{
		header('location:user.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Edit User");
		window.location.href="user.php";
		</script>';
	}
}

// Delete User
if (isset($_POST['deleteuser'])) 
{
	$iduser = $_POST['iduser'];

	$getdeleteuser = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$iduser'");

	if ($getdeleteuser)
	{
		header('location:user.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Hapus User");
		window.location.href="user.php";
		</script>';
	}
}

// tambah Stock

if (isset($_POST['stock'])) 
{
	$namabarang = $_POST['namabarang'];
	$ukuran = $_POST['ukuran'];
	$harga = $_POST['harga'];
	$qty = $_POST['qty'];

	$getstock = mysqli_query($koneksi, "INSERT INTO stock (namabarang,ukuran,harga,qty) VALUES ('$namabarang','$ukuran','$harga','$qty') ");
	if ($getstock) 
	{
		header('location:stock.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Input Stock");
		window.location.href="stock.php";
		</script>'; 
	}
}

// edit Stock
if (isset($_POST['editstock'])) 
{
	$namabarang = $_POST['namabarang'];
	$ukuran = $_POST['ukuran'];
	$harga = $_POST['harga'];
	$qty = $_POST['qty'];
	$idstock = $_POST['idstock'];

	$geteditstock = mysqli_query($koneksi, "UPDATE stock SET namabarang='$namabarang',ukuran='$ukuran',harga='$harga',qty='$qty' WHERE id_stock='$idstock'");

	if ($geteditstock)
	{
		header('location:stock.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Edit Stock");
		window.location.href="stock.php";
		</script>';
	}
}

// barang masuk

// if (isset($_POST['barangmasuk'])) 
// {
// 	$idstock = $_POST['idstock'];
// 	$jumlah = $_POST['jumlah'];

// 	// cek stock sekarang
// 	$getstock = mysqli_query($koneksi,"SELECT * FROM stock WHERE id_stock = '$idstock'");
// 	$dapatstock = mysqli_fetch_array($getstock);
// 	$hasil = $dapatstock['qty'];

// 	// hitung stock
// 	$stockmasuk = $hasil+$jumlah;

// 	// updated stock dan masukkan barang masuk
// 	$masuk = mysqli_query($koneksi, "INSERT INTO barangmasuk (id_produk,jumlah) VALUES ('$idstock','$jumlah')");
// 	$updatestock = mysqli_query($koneksi, "UPDATE stock SET qty = '$stockmasuk' WHERE id_stock = '$idstock' ");

// 	if($masuk&&$updatestock) 
// 	{
// 		header('location:masuk.php');
// 	}
// 	else
// 	{
// 		echo '<script>
// 		alert("Gagal Simpan Barang Masuk");
// 		window.location.href="masuk.php";
// 		</script>';
// 	}

// }

// delete barang masuk
// if (isset($_POST['deletebarangmasuk'])) 
// {
// 	$idbarangmasuk = $_POST['idbarangmasuk'];
// 	$idstock = $_POST['idstock'];

// 	// cari tahu barang masuk
// 	$getbarangmasuk = mysqli_query($koneksi,"SELECT * FROM barangmasuk WHERE id_barangmasuk='$idbarangmasuk'");
// 	$barangmasuk = mysqli_fetch_array($getbarangmasuk);
// 	$hasil = $barangmasuk['jumlah'];

// 	// cari tahu stock yang ada
// 	$getstock = mysqli_query($koneksi,"SELECT * FROM stock WHERE id_stock='$idstock'");
// 	$stock = mysqli_fetch_array($getstock);
// 	$hasilstock = $stock ['qty'];

// 	// hitung selisih
// 	$selisih = $hasilstock-$hasil;

// 	// updated stock dan masukkan barang masuk
// 	$hasildelete = mysqli_query($koneksi,"DELETE FROM barangmasuk WHERE id_barangmasuk='$idbarangmasuk'");
// 	$updatedelete	= mysqli_query($koneksi,"UPDATE stock SET qty = '$selisih' WHERE id_stock='$idstock'");

// 	if ($hasildelete&&$updatedelete) 
// 	{
// 		header('location:masuk.php');
// 	}
// 	else
// 	{
// 		echo '<script>
// 		alert("Gagal Edit Barang Masuk");
// 		window.location.href="masuk.php";
// 		</script>';
// 	}
// }

// kasir pilih pelanggan
if (isset($_POST['kasir'])) 
{
	$idpelanggan = $_POST['idpelanggan'];

	$datapelanggan = mysqli_query($koneksi, "INSERT INTO kasir (id_pelanggan) VALUES('$idpelanggan')");
	if ($datapelanggan) 
	{
		header('location:kasir.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Menambahkan Pelanggan");
		window.location.href="kasir.php";
		</script>'; 
	}
}

// input pesanan pelanggan

if (isset($_POST['pesan'])) 
{
	$idstock = $_POST['idstock'];
	$idp = $_POST['idp'];
	$qty = $_POST['qty'];
	$diskon = $_POST['diskon'];

	$getqtysekarang = mysqli_query($koneksi,"SELECT * FROM stock WHERE id_stock='$idstock'");
	$qtysekarang = mysqli_fetch_array($getqtysekarang);
	$sekarang = $qtysekarang['qty'];
	$harga = $qtysekarang['harga'];

	if ($sekarang>=$qty) 
	{
		//Hitung Selisih
		$selisih = $sekarang-$qty;

		//Hitung Subtotal
		$subtotal = $qty*$harga-$diskon;

		//esekusi
		$updatestock = mysqli_query($koneksi,"UPDATE stock SET qty='$selisih' WHERE id_stock='$idstock'");
		$getdetail = mysqli_query($koneksi,"INSERT INTO detailkasir (id_kasir,id_stock,qty_order,diskon,subtotal) VALUES('$idp','$idstock','$qty','$diskon','$subtotal')");

		if ($updatestock&&$getdetail) 
		{
			header('location:view.php?idp='.$idp);
		}
		else
		{
			header('location:view.php?idp='.$idp);
		}
	}
	else
	{
		header('location:view.php?idp='.$idp);
	}
}

// hapus item 

if (isset($_POST['deleteitem'])) 
{
	$idstock = $_POST['idstock'];
	$iddetailkasir = $_POST['iddetailkasir'];
	$idp = $_POST['idp'];

	// cek qty sekarang
	$cek1 = mysqli_query($koneksi, "SELECT * FROM detailkasir WHERE id_detailkasir = '$iddetailkasir'");
	$cek2 = mysqli_fetch_array($cek1);
	$qtysekarang = $cek2['qty_order'];

	// cek stock sekarang
	$cek3 = mysqli_query($koneksi, "SELECT * FROM stock WHERE id_stock = '$idstock'");
	$cek4 = mysqli_fetch_array($cek3);
	$stocksekarang = $cek4['qty'];

	$hitung = $stocksekarang + $qtysekarang;

	$update = mysqli_query($koneksi , "UPDATE stock SET qty = '$hitung' WHERE id_stock = '$idstock'");
	$hapus = mysqli_query($koneksi, "DELETE FROM detailkasir WHERE id_stock = '$idstock' AND id_detailkasir = '$iddetailkasir'");
	if ($update && $hapus)
	{
		header('location:view.php?idp='.$idp);
	}
	else
	{
		header('location:view.php?idp='.$idp);
	}
}

// Total pembayaran

if (isset($_POST['simpanpesanan'])) 
{
	$hasil = $_POST['ongkir'];
	$idp = $_POST['idkasir'];
	$ido = $_POST['idongkir'];
	$bayar = $_POST['bayar'];
	$idb = $_POST['idbayar'];
	$idpelanggan = $_POST['idpelanggan'];
	$ph = $_POST['ss'];
	
	$getongkir = mysqli_query($koneksi,"INSERT INTO ongkir (id_kasir,ongkos_kirim) VALUES('$idp','$hasil')");
	$editongkir = mysqli_query($koneksi, "UPDATE ongkir SET ongkos_kirim='$hasil' WHERE id_kasir='$idp' AND id_ongkir='$ido'");

	$getbayar = mysqli_query($koneksi,"INSERT INTO bayar (id_kasir,bayar_tagihan) VALUES('$idp','$bayar')");
	$bayar = mysqli_query($koneksi, "UPDATE bayar SET bayar_tagihan='$bayar' WHERE id_kasir='$idp' AND id_bayar='$idb'");

	if ($getongkir&&$editongkir&&$bayar&&$getbayar)
	{
		// cari nama pelanggan
		$getpelanggan = mysqli_query($koneksi, "SELECT * FROM kasir k, pelanggan p WHERE k.id_pelanggan=p.id_pelanggan AND k.id_kasir='$idp'");
		$pelanggan = mysqli_fetch_array($getpelanggan);
		$didapat = $pelanggan['id_pelanggan'];

	    // cari subtotal per id kasir
	    $getdetailkasir = mysqli_query($koneksi, "SELECT SUM(subtotal) AS hasil FROM detailkasir WHERE id_kasir='$idp'");
	    $hasildetailkasir = mysqli_fetch_array($getdetailkasir);
	    $subtotal = $hasildetailkasir['hasil'];

	    // cari ongkir per id kasir
	    $getongkir = mysqli_query($koneksi,"SELECT * FROM ongkir WHERE id_kasir='$idp' ");
	    $hasilongkir = mysqli_fetch_array($getongkir);
	    $ongkir = isset($hasilongkir['ongkos_kirim'])?$hasilongkir['ongkos_kirim']:'0';
	    // cari pembayaran per id kasir
	    $getbayar = mysqli_query($koneksi, "SELECT * FROM bayar WHERE id_kasir='$idp' ");
	    $hasilbayar = mysqli_fetch_array($getbayar);
	    $bayar = isset($hasilbayar['bayar_tagihan'])?$hasilbayar['bayar_tagihan']:'0';

	    // hitung jumlah
	    $jumlah = $subtotal+$ongkir;

	    //sisa tagihan
	    $sisa = $bayar-$jumlah;
	    //sebelum sisa
		$akhir = $jumlah-$bayar;


		if ($sisa == 0)
		{
			$getsisa = 'Lunas';
			$getsisatagihan = mysqli_query($koneksi,"INSERT INTO status (id_kasir,id_pelanggan,status_tagihan,sisa) VALUES('$idp','$idpelanggan','$getsisa','$akhir')");
			$sisatagihan = mysqli_query($koneksi, "UPDATE status SET id_pelanggan='$idpelanggan',status_tagihan='$getsisa',sisa='$akhir' WHERE id_kasir='$idp'");

			if ($getsisatagihan&&$sisatagihan) 
			{
				header('location:view.php?idp='.$idp);
			}
			else
			{
				header('location:view.php?idp='.$idp);
			}
		}
		else
		{
			$getsisa = 'Belum Lunas';

			$getsisatagihan = mysqli_query($koneksi,"INSERT INTO status (id_kasir,id_pelanggan,status_tagihan,sisa) VALUES('$idp','$idpelanggan','$getsisa','$akhir')");
			$sisatagihan = mysqli_query($koneksi, "UPDATE status SET id_pelanggan='$idpelanggan',status_tagihan='$getsisa',sisa='$akhir' WHERE id_kasir='$idp'");
			if ($getsisatagihan&&$sisatagihan) 
			{
				header('location:view.php?idp='.$idp);
			}
			else
			{
				header('location:view.php?idp='.$idp);
			}

		}
	}
	else
	{
		header('location:view.php?idp='.$idp);
	}
}

// Delete Pelanggan

if (isset($_POST['hapuskasir'])) 
{
	$idkasir = $_POST['idkasir'];

	// cek detail kasir
	$cekdetailkasir = mysqli_query($koneksi,"SELECT * FROM detailkasir WHERE id_kasir='$idkasir'");
	while($hasil= mysqli_fetch_array($cekdetailkasir))
	{
		$jumlah = isset($hasil['qty_order']) ? $hasil['qty_order'] : '0';
		$idstock = $hasil['id_stock'];
		$iddetailkasir = $hasil['id_detailkasir'];

		//cari tahu stock sekarang
		$getstock = mysqli_query($koneksi,"SELECT * FROM stock WHERE id_stock='$idstock'");
		$dapat = mysqli_fetch_array($getstock);
		$qty = isset($dapat['qty']) ? $dapat['qty'] : '0';

		// hitung total stock
		$newstock = $qty+$jumlah;

		// update stock
		$stocksekarang = mysqli_query($koneksi,"UPDATE stock SET qty='$newstock' WHERE id_stock='$idstock'");

		// hapus detail kasir di database
		$gethapuspelanggan = mysqli_query($koneksi,"DELETE FROM detailkasir WHERE id_detailkasir='$iddetailkasir'");
	}
	// hapus ongkir
	$getongkir = mysqli_query($koneksi,"DELETE FROM ongkir WHERE id_kasir='$idkasir'");

	// hapus pesanan
	$getkasir = mysqli_query($koneksi,"DELETE FROM kasir WHERE id_kasir='$idkasir'");

	if ($stocksekarang&&$gethapuspelanggan&&$getkasir&&$getongkir) 
	{
		echo "<script>
		alert('Berhasil Hapus Pelanggan');
		document.location='kasir.php';
		</script>";
	}
	else
	{
		echo "<script>
		alert('Gagal Hapus Pelanggan');
		document.location='kasir.php';
		</script>"; 
	}
}

// kasir pilih pelanggan
if (isset($_POST['kasir_user'])) 
{
	$nama_baru = $_POST['nama_baru'];
	$notelp_baru = $_POST['notelp_baru'];
	$alamat_baru = $_POST['alamat_baru'];

	$getpelangganbaru = mysqli_query($koneksi, "INSERT INTO pelanggan (namapelanggan,alamat,notelp) VALUES('$nama_baru','$alamat_baru','$notelp_baru')");
	if ($getpelangganbaru) 
	{
		$pelangganbaru = mysqli_query($koneksi,"SELECT * FROM pelanggan WHERE namapelanggan='$nama_baru'");
		$baru = mysqli_fetch_array($pelangganbaru);
		$dapat = $baru['id_pelanggan'];

		$kasir_baru = mysqli_query($koneksi,"INSERT INTO kasir (id_pelanggan) VALUES ('$dapat')");
		if ($kasir_baru) 
		{
			echo '<script>
			alert("Berhasil Menambahkan Pelanggan");
			window.location.href="kasir.php";
			</script>';
		}
		else
		{
			echo '<script>
			alert("Gagal Menambahkan Pelanggan");
			window.location.href="kasir.php";
			</script>';
		}
	}
	else
	{
		echo '<script>
		alert("Gagal Menambahkan Pelanggan");
		window.location.href="kasir.php";
		</script>'; 
	}
}

// tambah supplier

if (isset($_POST['supplier'])) 
{
	$nama = $_POST['name_supplier'];
	$alamat = $_POST['alamat_supplier'];
	$notelp = $_POST['telp_supplier'];

	$getsupplier = mysqli_query($koneksi, "INSERT INTO supplier (nama_supplier,alamat_supplier,telp_supplier) VALUES ('$nama','$alamat','$notelp') ");
	if ($getsupplier) 
	{
		header('location:supplier.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Input Supplier");
		window.location.href="supplier.php";
		</script>'; 
	}
}

// edit Supllier
if (isset($_POST['editsupplier'])) 
{
	$nama = $_POST['name_supplier'];
	$alamat = $_POST['alamat_supplier'];
	$notelp = $_POST['telp_supplier'];
	$ids = $_POST['ids'];

	$geteditsupplier = mysqli_query($koneksi, "UPDATE supplier SET nama_supplier='$nama',alamat_supplier='$alamat',telp_supplier='$notelp' WHERE id_supplier='$ids'");

	if ($geteditsupplier)
	{
		header('location:supplier.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Edit Supplier");
		window.location.href="supplier.php";
		</script>';
	}
}

// Delete Supplier
if (isset($_POST['deletesupplier'])) 
{
	$ids = $_POST['ids'];

	$getdeletesupplier = mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier='$ids'");

	if ($getdeletesupplier)
	{
		header('location:supplier.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Hapus Supplier");
		window.location.href="supplier.php";
		</script>';
	}
}

// pilih supplier
if (isset($_POST['masuk'])) 
{
	$idsupplier = $_POST['idsupplier'];

	$datasupplier = mysqli_query($koneksi, "INSERT INTO masuk (id_supplier) VALUES('$idsupplier')");
	if ($datasupplier) 
	{
		header('location:masuk.php');
	}
	else
	{
		echo '<script>
		alert("Gagal Menambahkan Pelanggan");
		window.location.href="masuk.php";
		</script>'; 
	}
}

// Masukkan item supplier
if (isset($_POST['tambahitem'])) 
{
	$idstock = $_POST['idstock'];
	$harga = $_POST['harga'];
	$qty = $_POST['qty'];
	$idmasuk = $_POST['idm'];

	//cari stock sekarang
	$stocksekarang = mysqli_query($koneksi,"SELECT * FROM stock WHERE id_stock='$idstock'");
	$getstocksekarang = mysqli_fetch_array($stocksekarang);
	$oldstock = $getstocksekarang['stcok_masuk'];

	// hitung stock
	$stockbaru = $oldstock+$qty;

	// hitung subtotal
	$subtotal_masuk = $qty*$harga;

	$gettambahitem = mysqli_query($koneksi, "INSERT INTO detailmasuk (id_masuk,id_stock,qty_masuk,harga_masuk,subtotal_masuk) VALUES('$idmasuk','$idstock','$qty','$harga','$subtotal_masuk')");
	$getnewstock = mysqli_query($koneksi,"UPDATE stock SET stock_masuk='$stockbaru' WHERE id_stock='$idstock'");
	if ($gettambahitem&&$getnewstock) 
	{
		header('location:detail_barang_masuk.php?idm='.$idmasuk);
	}
	else
	{
		header('location:detail_barang_masuk.php?idm='.$idmasuk);
	}
}

// hapus item supplier

if (isset($_POST['hapusdetailsupplier'])) 
{
	$idstock = $_POST['ids'];
	$idmasuk = $_POST['idm'];
	$iddetailmasuk = $_POST['iddm'];

	// cari barang masuk
	$getbarangmasuk = mysqli_query($koneksi,"SELECT * FROM detailmasuk WHERE id_detailmasuk='$iddetailmasuk'");
	$barangmasuk = mysqli_fetch_array($getbarangmasuk);
	$masuk = $barangmasuk['qty_masuk'];

	// cari stock sekarang
	$getstocksekarang = mysqli_query($koneksi,"SELECT * FROM stock WHERE id_stock='$idstock'");
	$stocksekarang = mysqli_fetch_array($getstocksekarang);
	$stock = $stocksekarang['qty'];

	// hitung kurang stock
	$selisih = $stock-$masuk;

	$gethapusdetailsupplier = mysqli_query($koneksi,"DELETE FROM detailmasuk WHERE id_stock='$idstock' AND id_detailmasuk='$iddetailmasuk'");
	$selisihstock = mysqli_query($koneksi,"UPDATE stock SET qty='$selisih' WHERE id_stock='$idstock' ");
	if ($gethapusdetailsupplier&&$selisihstock)
	{
		header('location:detail_barang_masuk.php?idm='.$idmasuk);
	}
	else
	{
		header('location:detail_barang_masuk.php?idm='.$idmasuk);
	}
}

// simpan invoice supplier

if (isset($_POST['simpandetailsupplier'])) 
{
	$ongkir = $_POST['ongkir'];
	$idm = $_POST['idmasuk'];
	$ido = $_POST['idongkir'];
	$ids = $_POST['idsupplier'];

	// masukkan ongkir masuk
	$getongkirmasuk = mysqli_query($koneksi,"INSERT INTO ongkir_masuk (id_masuk,ongkos_masuk) VALUES ('$idm','$ongkir')");
	$geteditongkirmasuk = mysqli_query($koneksi,"UPDATE ongkir_masuk SET ongkos_masuk='$ongkir' WHERE id_masuk='$idm' AND id_ongkir_masuk='$ido'");
	if ($getongkirmasuk&&$geteditongkirmasuk) 
	{
		header('location:detail_barang_masuk.php?idm='.$idm);
		
	}
	else
	{
		header('location:detail_barang_masuk.php?idm='.$idm);
	}

}

// Delete Supplier

if (isset($_POST['deletemasuk'])) 
{
	$idmasuk = $_POST['idmasuk'];

	// cek detail kasir
	$cekdetailsupplier = mysqli_query($koneksi,"SELECT * FROM detailmasuk WHERE id_masuk='$idmasuk'");
	while($hasil= mysqli_fetch_array($cekdetailsupplier))
	{
		$jumlah = isset($hasil['qty_masuk']) ? $hasil['qty_masuk'] : '0';
		$idstock = $hasil['id_stock'];
		$iddetailmasuk = $hasil['id_detailmasuk'];

		//cari tahu stock sekarang
		$getstock = mysqli_query($koneksi,"SELECT * FROM stock WHERE id_stock='$idstock'");
		$dapat = mysqli_fetch_array($getstock);
		$qty = isset($dapat['qty']) ? $dapat['qty'] : '0';

		// hitung total stock
		$newstock = $qty-$jumlah;

		// update stock
		$stocksekarang = mysqli_query($koneksi,"UPDATE stock SET qty='$newstock' WHERE id_stock='$idstock'");

		// hapus detail kasir di database
		$gethapussupplier = mysqli_query($koneksi,"DELETE FROM detailmasuk WHERE id_detailmasuk='$iddetailmasuk'");
	}
	// hapus ongkir
	$getongkir = mysqli_query($koneksi,"DELETE FROM ongkir_masuk WHERE id_masuk='$idmasuk'");

	// hapus pesanan
	$getsupplier = mysqli_query($koneksi,"DELETE FROM masuk WHERE id_masuk='$idmasuk'");

	if ($stocksekarang&&$gethapussupplier&&$getsupplier&&$getongkir) 
	{
		echo "<script>
		alert('Berhasil Hapus Supplier');
		document.location='masuk.php';
		</script>";
	}
	else
	{
		echo "<script>
		alert('Gagal Hapus Supplier');
		document.location='masuk.php';
		</script>"; 
	}
}

?>
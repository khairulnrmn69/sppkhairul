<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include 'koneksi.php';

	// membuat variabel untuk menampung data dari form
  $nisn = $_POST['nisn'];
  $nis = $_POST['nis'];
  $nama = ($_POST['nama']);
  $id_kelas = ($_POST['id_kelas']);
  $alamat = ($_POST['alamat']);
  $no_tlp = ($_POST['no_tlp']);
  $id_spp = ($_POST['id_spp']);
  
  //cek dulu jika merubah gambar produk jalankan coding inidi
  
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                   $query  = "UPDATE tb_siswa SET 'nisn' = '$nisn', 'nis' = '$nis', nama = '$nama', 'id_kelas' = '$id_kelas', alamat = '$alamat', no_tlp = '$no_tlp', id_spp = 'id_spp' ";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil diubah.');window.location='siswa.php';</script>";
                    }
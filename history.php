<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      tr {
        text-transform: uppercase;
        color:salmon;
      }
    h2 {
        text-transform: uppercase;
        color:salmon;
      }
    h3 {
        text-transform: uppercase;
        color:salmon;
      }
       label {
        text-transform: uppercase;
        color:salmon;
      }
    th {
        text-transform: uppercase;
        color:salmon;
      }
      td {
        text-transform: uppercase;
        color:#999999;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: salmon;
    }
    div {
      text-transform: uppercase;
        color:#999999;
    }
 
  
    </style>
  </head>
<body>

<?php 
include 'koneksi.php';
include 'header.php';
 ?>

       <div class="container">
  <div class="page-header">
<center><h2>Cari Siswa Berdasarkan Nisn</h2>
  </div>
 <form action="" method="get">
  <table class="table">
    <tr>
      <td>Nisn </td>

      <td>:</td>
      <td>
        <input class="form-control" type="text" name="nisn">
      </td>
      <td>
        <button class="btn btn-success" type="submit" name="cari">Cari</button>
      </td>
    </tr>
  </table>
 </form>


<?php 
if (isset($_GET['nisn']) && $_GET['nisn'] != ''){
  $data = $koneksi->query("SELECT * FROM tb_siswa WHERE nisn = '$_GET[nisn]'");
  $data = mysqli_fetch_assoc($data);
  $nisn = $data['nisn'];

?>
<div class="panel panel-info">
  <div class="panel-heading">
<center><h3>Biodata siswa</h3>
</div>
<div class="panel panel-body">
  <table class="table table-bordered table-striped">
    <tr>
      <td>Nisn</td>
      <td><?=$data['nisn'] ?></td>
    </tr>
    <tr>
      <td>Nis</td>
      <td><?= $data['nis'] ?></td>
    </tr>
    <tr>
      <td>Nama</td>
      <td><?= $data['nama'] ?></td>
    </tr>
    <tr>
      <td>Id Kelas</td>
      <td><?= $data['id_kelas'] ?></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td><?= $data['alamat'] ?></td>
    </tr>
    <tr>
      <td>No Telepon</td>
      <td><?= $data['no_tlp'] ?></td>
    </tr>
    <tr>
      <td>ID SPP</td>
      <td><?= $data['id_spp'] ?></td>
    </tr>
  </table>
</div>
</div>

<div class="panel panel-info">
  <div class="panel-heading">
<center><h3>Tagihan SPP Siswa</h3>
</div>
<div class="panel-body ">
  <table class="table table-bordered table-striped">
<tr>
  <th>NO</th>
  <th>Id Pembayaran</th>
  <th>Id Petugas</th>
  <th>Nisn</th>
  <th>Tanggal Bayar</th>
  <th>Bulan Bayar</th>
  <th>Tahun Bayar</th>
  <th>Id Spp</th>
  <th>Jumlah Bayar</th>
  
</tr>
<?php 
$sql= mysqli_query($koneksi ," SELECT * FROM tb_pembayaran WHERE nisn = '$data[nisn]' ORDER BY jumlah_bayar ASC ");
$i=1;
while($sq= mysqli_fetch_assoc($sql)){
  echo "

    <tr>
      <td>$i</td>
      <td>$sq[id_pembayaran]</td>
      <td>$sq[id_petugas]</td>
      <td>$sq[nisn]</td>
      <td>$sq[tgl_bayar]</td>
      <td>$sq[bulan_dibayar]</td>
      <td>$sq[tahun_dibayar]</td>
      <td>$sq[id_spp]</td>
      <td>$sq[jumlah_bayar]</td>
      

    </tr>

    ";
    $i++;
}
 ?>
</table>
</div>
</div>
<?php 
}
?>
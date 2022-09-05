<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
  $id_siswa = $_POST['id_siswa'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $NIS = $_POST['NIS'];
  $kelas = $_POST['kelas'];
  $tanggal_absen = $_POST['tanggal_absen'];
  $jam_datang = $_POST['jam_datang'];
  $jam_pulang = $_POST['jam_pulang'];

  $query = "INSERT INTO tb_siswa (id_siswa, nama_lengkap, NIS, kelas, tanggal_absen, jam_datang, jam_pulang) VALUES ('$id_siswa','$nama_lengkap','$NIS','$kelas','$tanggal_absen','$jam_datang','$jam_pulang')";
  $sql = mysqli_query($conn, $query);

  if($sql) {
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    header("Refresh:0; url=lihat_presensi.php");
  } else {
    echo "<script>alert('Data gagal ditambahkan')</script>";
    header("Refresh:0; url=presensi.php?status=gagal");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lihat Data</title>
  </head>
  <body>
    <h1 style="text-align: center; font-weight: bold">PRESENSI</h1>
    <form method="post" action="">
      <table border="0">
        <tr>
          <td>Id Siswa</td>
          <td>:</td>
          <td><input type="text" name="id_siswa" required autocomplete="off" /></td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td>:</td>
          <td><input type="text" name="nama_lengkap" required autocomplete="off" /></td>
        </tr>
        <tr>
          <td>NIS</td>
          <td>:</td>
          <td><input type="text" name="NIS" required autocomplete="off" /></td>
        </tr>
        <tr>
          <td>Kelas</td>
          <td>:</td>
          <td><input type="text" name="kelas" required autocomplete="off" /></td>
        </tr>
        <tr>
          <td>Tanggal Absen</td>
          <td>:</td>
          <td><input type="date" name="tanggal_absen" required autocomplete="off" /></td>
        </tr>
        <tr>
          <td>Jam Datang</td>
          <td>:</td>
          <td><input type="time" name="jam_datang" required autocomplete="off" /></td>
        </tr>
        <tr>
          <td>Jam Pulang</td>
          <td>:</td>
          <td><input type="time" name="jam_pulang" required autocomplete="off" /></td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" value="Simpan" /></td>
        </tr>
      </table>
    </form>
  </body>
</html>

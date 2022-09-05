<?php
include 'koneksi.php';

$id_siswa = $_GET['id_siswa'];
$query = "SELECT * FROM tb_siswa WHERE id_siswa=$id_siswa";
$sql = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($sql);
if (mysqli_num_rows($sql) < 1) {
  echo "<script>alert('Data tidak ditemukan')</script>";
}

if (isset($_POST['submit'])) {
  $id_siswa = $_POST['id_siswa'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $NIS = $_POST['NIS'];
  $kelas = $_POST['kelas'];
  $tanggal_absen = $_POST['tanggal_absen'];
  $jam_datang = $_POST['jam_datang'];
  $jam_pulang = $_POST['jam_pulang'];

  $query = "UPDATE tb_siswa SET id_siswa='$id_siswa', nama_lengkap='$nama_lengkap', NIS='$NIS', kelas='$kelas', tanggal_absen='$tanggal_absen', jam_datang='$jam_datang', jam_pulang='$jam_pulang' WHERE id_siswa=$id_siswa";
  $sql = mysqli_query($conn, $query);

  if ($query)  {
    header('Location: lihat_presensi.php?edit=sukses.php');
  } else {
    echo "<script>alert('Data gagal diedit')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Data</title>
  </head>
  <body>
    <h1 style="text-align: center; font-weight: bold">EDIT PRESENSI</h1>
    <form method="post" action="">
      <table  border="0">
          <tr>
              <td>Id Siswa</td>
              <td>:</td>
              <td><input type="text" name="id_siswa" required autocomplete="off" value="<?php echo $data['id_siswa']; ?>" /></td>
            </tr>
            <tr>
              <td>Nama Lengkap</td>
              <td>:</td>
              <td><input type="text" name="nama_lengkap" required autocomplete="off" value="<?php echo $data['nama_lengkap']; ?>"  /></td>
            </tr>
            <tr>
              <td>NIS</td>
              <td>:</td>
              <td><input type="text" name="NIS" required autocomplete="off" value="<?php echo $data['NIS']; ?>"  /></td>
            </tr>
            <tr>
              <td>Kelas</td>
              <td>:</td>
              <td><input type="text" name="kelas" required autocomplete="off" value="<?php echo $data['kelas']; ?>" /></td>
            </tr>
            <tr>
              <td>Tanggal Absen</td>
              <td>:</td>
              <td><input type="date" name="tanggal_absen" required autocomplete="off" value="<?php echo $data['tanggal_absen']; ?>" /></td>
            </tr>
            <tr>
              <td>Jam Datang</td>
              <td>:</td>
              <td><input type="time" name="jam_datang" required autocomplete="off" value="<?php echo $data['jam_datang']; ?>" /></td>
            </tr>
            <tr>
              <td>Jam Pulang</td>
              <td>:</td>
              <td><input type="time" name="jam_pulang" required autocomplete="off" value="<?php echo $data['jam_pulang']; ?>" /></td>
            </tr>
            <tr>
            <td colspan="3"><input type="submit" name="submit" value="simpan" /></td>
          </tr>
      </table>
    </form>
  </body>
</html>

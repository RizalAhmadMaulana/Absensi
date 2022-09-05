<?php 
include 'koneksi.php';

if (isset($_GET['id_siswa'])) {
    $id_siswa = $_GET['id_siswa'];
    $query = "DELETE FROM tb_siswa WHERE id_siswa=$id_siswa";
    $sql = mysqli_query($conn, $query);

    if ($sql) {
        header('Location: lihat_presensi.php?hapus=sukses');
    } else {
        echo "<script>alert('Data gagal dihapus')</script>";
    }
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tampil Data</title>
  </head>
  <body>
    <h1 style="text-align: center; font-weight: bold">LIHAT PRESENSI</h1>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Id Siswa</th>
            <th>Nama Lengkap</th>
            <th>NIS</th>
            <th>Kelas</th>
            <th>Tanggal Absen</th>
            <th>Jam Datang</th>
            <th>Jam Pulang</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM tb_siswa");
              while ($data = mysqli_fetch_array($query)) {
                $no++;
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data['id_siswa']?></td>
              <td><?php echo $data['nama_lengkap']?></td>
              <td><?php echo $data['NIS']?></td>
              <td><?php echo $data['kelas']?></td>
              <td><?php echo $data['tanggal_absen']?></td>
              <td><?php echo $data['jam_datang']?></td>
              <td><?php echo $data['jam_pulang']?></td>
              <td><a href='edit_presensi.php?id_siswa="<?= $data['id_siswa'] ?>"'>Edit | <a href='lihat_presensi.php?id_siswa="<?= $data['id_siswa'] ?>"'>Hapus</a></a></td>
            </tr>
            <?php
              }
            ?>
        </tr>
    </table>
  </body>
</html>

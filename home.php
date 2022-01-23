<?php
include "koneksi.php";

$sql = "SELECT data_siswa.* FROM data_siswa ORDER BY nama_siswa";
$r_datasiswa = mysqli_query($koneksi,$sql) or die(mysqli_error());
$row_r_datasiswa = mysqli_fetch_assoc($r_datasiswa);
$totalRows_r_datasiswa = mysqli_num_rows($r_datasiswa);
?>
<h3>List Data Siswa | <a href="form_input_siswa.php">Data Baru</a></h3>

<table width="100%" border="1" cellpadding="5" cellspacing="0">
  <thead>
  	<tr style="background-color:#7B5DF8; color:#FFFFFF">
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>Hobi</th>
		<th>Alamat</th>
		<th>Action</th>
  	</tr>
  
  </thead>
  <tbody>
    <?php
	do {
	   if(!($row_r_datasiswa['nama_siswa']=="")){?>
	<tr>
      <td><?php echo $row_r_datasiswa['nama_siswa'];?></td>
      <td><?php echo $row_r_datasiswa['jenis_kelamin'];?></td>
      <td><?php echo $row_r_datasiswa['hobi'];?></td>
      <td><?php echo $row_r_datasiswa['alamat'];?></td>
      <td align="center"><a href="form_edit_siswa.php?idsiswa=<?php echo $row_r_datasiswa['id_siswa'];?>">Edit</a> | <a href="form_hapus_siswa.php?idsiswa=<?php echo $row_r_datasiswa['id_siswa'];?>">Hapus</a></td>
    </tr>
		<?php
		}
	}while($row_r_datasiswa=mysqli_fetch_assoc($r_datasiswa));?>
  </tbody>
</table>

<?php
mysqli_close($koneksi);
?>


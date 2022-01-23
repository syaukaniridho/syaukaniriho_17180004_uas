<?php
include "koneksi.php";

$pesan="";
if (isset($_POST['proses'])) {

    $sql = "DELETE FROM data_siswa WHERE id_siswa=".$_POST["idsiswa_dihapus"]." LIMIT 1";
	
    if (mysqli_query($koneksi, $sql)) {
	   $pesan = "Data telah berhasil dihapus..";
    } else {
	   $pesan = "Data gagal dihapus! Coba kembali..";
    }

}else{
	$idsiswa = $_GET['idsiswa'];
	$sql = "SELECT data_siswa.* FROM data_siswa WHERE id_siswa=$idsiswa";
	$r_datasiswa = mysqli_query($koneksi,$sql) or die(mysqli_error());
	$row_r_datasiswa = mysqli_fetch_assoc($r_datasiswa);
	$totalRows_r_datasiswa = mysqli_num_rows($r_datasiswa);

	if(!($totalRows_r_datasiswa>0)){
	    echo '<script>function kembali(){window.location = "home.php";}</script>';
   		echo "Data Tidak ditemukan!<br>";
		echo '<button type="button" onClick="kembali();">Kembali</button>';
		exit;
	}
}
?>

<h3>Form Hapus Siswa</h3>

<?php
if($pesan=="Data telah berhasil dihapus.."){
   echo '<script>function kembali(){window.location = "home.php";}</script>';
   echo $pesan."<br>";
   echo '<button type="button" onClick="kembali();">Kembali</button>';
   exit;
}
?>

<form action="form_hapus_siswa.php?idsiswa=<?php echo $_GET['idsiswa'];?>" method="POST">
    <table>
        <tr>
            <td width="110">Nama Siswa</td>
            <td><?php echo $row_r_datasiswa['nama_siswa'];?></td>

        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?php echo $row_r_datasiswa['jenis_kelamin'];?>
            </td>

        </tr>
        <tr>
            <td>Alamat</td>
            <td><?php echo $row_r_datasiswa['alamat'];?></td>

        </tr>
        <tr>
            <td>Hobi</td>
            <td><?php echo $row_r_datasiswa['hobi'];?></td>

        </tr>
        <tr>
            <td></td>
            <td>
			<input type="hidden" name="idsiswa_dihapus" value="<?php echo $row_r_datasiswa['id_siswa'];?>">
			<input type="submit" value="Hapus" name="proses">&nbsp;<button type="button" onClick="kembali();">Kembali</button></td>
        </tr>
    </table>


</form>

<script>
function kembali(){
window.location = "home.php";
}
</script>


<?php
mysqli_close($koneksi);
?>

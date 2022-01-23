<?php
include "koneksi.php";

$pesan="";
if (isset($_POST['proses'])) {

    $sql = "UPDATE data_siswa SET nama_siswa='".$_POST["nama_siswa"]."', jenis_kelamin='".$_POST["jenis_kelamin"]."', alamat='".$_POST["alamat"]."', hobi='".$_POST["hobi"]."' WHERE id_siswa=".$_POST["idsiswa_diedit"];
	
    if (mysqli_query($koneksi, $sql)) {
	   $pesan = "Data telah berhasil tersimpan..";
    } else {
	   $pesan = "Data gagal tersimpan! Coba kembali..";
    }

}

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

?>

<h3>Form Edit Siswa</h3>

<?php
if($pesan=="Data Tidak ditemukan!"){
   echo $pesan."<br>";
   echo '<button type="button" onClick="kembali();">Kembali</button>';
}else{
   echo $pesan."<br>";
?>

<form action="form_edit_siswa.php?idsiswa=<?php echo $_GET['idsiswa'];?>" method="POST">
    <table>
        <tr>
            <td width="110">Nama Siswa</td>
            <td><input type="text" name="nama_siswa" value="<?php echo $row_r_datasiswa['nama_siswa'];?>"></td>

        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
			<input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if($row_r_datasiswa['jenis_kelamin']=="Laki-laki"){echo "checked";}?>>
            <label for="Laki-laki">Laki-laki</label>
            <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($row_r_datasiswa['jenis_kelamin']=="Perempuan"){echo "checked";}?>>
            <label for="Perempuan">Perempuan</label>
            </td>

        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat" cols="40" rows="6"><?php echo $row_r_datasiswa['alamat'];?></textarea></td>

        </tr>
        <tr>
            <td>Hobi</td>
            <td><input type="text" name="hobi" value="<?php echo $row_r_datasiswa['hobi'];?>"></td>

        </tr>
        <tr>
            <td></td>
            <td>
			<input type="hidden" name="idsiswa_diedit" value="<?php echo $row_r_datasiswa['id_siswa'];?>">
			<input type="submit" value="Simpan" name="proses">&nbsp;<button type="button" onClick="kembali();">Kembali</button></td>
        </tr>
    </table>

<?php
}?>
</form>

<script>
function kembali(){
window.location = "home.php";
}
</script>


<?php
mysqli_close($koneksi);
?>

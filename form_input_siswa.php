<?php
include "koneksi.php";

$pesan="";
if (isset($_POST['proses'])) {

	$sql = "INSERT INTO data_siswa (nama_siswa, jenis_kelamin, alamat, hobi) VALUES ('".$_POST['nama_siswa']."','".$_POST["jenis_kelamin"]."','".$_POST["alamat"]."','".$_POST["hobi"]."')";

    if (mysqli_query($koneksi, $sql)) {
	    mysqli_close($koneksi);
  		echo '<script>function kembali(){window.location = "home.php";}</script>';
   		echo "Data Baru telah berhasil tersimpan..<br>";
		echo '<button type="button" onClick="kembali();">Kembali</button>';
		exit;
    } else {
	   mysqli_close($koneksi);
	   $pesan = "Data gagal tersimpan! Coba kembali..";
    }

}
?>

<h3>Form Input Siswa</h3>

<form action="form_input_siswa.php?idsiswa=<?php echo $_GET['idsiswa'];?>" method="POST">
    <table>
        <tr>
            <td width="110">Nama Siswa</td>
            <td><input type="text" name="nama_siswa" value="<?php echo $_POST['nama_siswa'];?>"></td>

        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>
			<input type="radio" name="jenis_kelamin" value="Laki-laki" <?php if(!(isset($_POST['jenis_kelamin']))){echo "checked";}else{if($_POST['jenis_kelamin']=="Laki-laki"){echo "checked";}}?>>
            <label for="Laki-laki">Laki-laki</label>
            <input type="radio" name="jenis_kelamin" value="Perempuan" <?php if($_POST['jenis_kelamin']=="Perempuan"){echo "checked";}?>>
            <label for="Perempuan">Perempuan</label>
            </td>

        </tr>
        <tr>
            <td>Alamat</td>
            <td><textarea name="alamat" cols="40" rows="6"><?php echo $_POST['alamat'];?></textarea></td>

        </tr>
        <tr>
            <td>Hobi</td>
            <td><input type="text" name="hobi" value="<?php echo $_POST['hobi'];?>"></td>

        </tr>
        <tr>
            <td></td>
            <td>
			<input type="submit" value="Simpan" name="proses">&nbsp;<button type="button" onClick="kembali();">Kembali</button></td>
        </tr>
    </table>
</form>

<script>
function kembali(){
window.location = "home.php";
}
</script>


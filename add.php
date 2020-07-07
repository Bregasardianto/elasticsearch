<?php

require_once 'app/init.php';

if (!empty($_POST)) {
	if(isset($_POST['nama'], $_POST['nim'], $_POST['jurusan'])) {

		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$jurusan = $_POST['jurusan'];

		$indexed = $client->index([
			'index' => 'mahasiswa',
			'type' => 'maha',
			'body' => [
				'nama' => $nama,
				'nim' => $nim,
				'jurusan' => $jurusan
				]
			]);

			if($indexed) {
				print_r($indexed);
			}
	}
}

?>




<html lang="en">
<head>
     <!-- Load file CSS Bootstrap offline -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
     <Link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<br>
    <tr>
      <td><a href="index.php" class="btn btn-primary btn-lg" >Index</a> </td>
    </tr>
<br>
<form action="add.php" method="post" autocomplete="off">
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Nama</label>
            <input type="jurusan" class="form-control" id="nama" placeholder="Nama" name="nama">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">NIM</label>
            <input type="jurusan" class="form-control" id="nim" placeholder="NIM" name="nim">
        </div>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">jurusan</label>
            <input type="jurusan" class="form-control" id="jurusan" placeholder="Jurusan" name="jurusan">
        </div>
        <!-- <div class="form-group col-md-4">
            <label for="exampleFormControlSelect1">pilih semester</label>
            <select class="form-control" id="exampleFormControlSelect1" name="semester">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            </select>
        </div> -->
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>  
</body>
</html>
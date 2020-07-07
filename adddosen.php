<?php

require_once 'app/init.php';

if (!empty($_POST)) {
	if(isset($_POST['namadosen'], $_POST['nip'], $_POST['jurusandosen'])) {

		$namadosen = $_POST['namadosen'];
		$nip = $_POST['nip'];
		$jurusandosen = $_POST['jurusandosen'];

		$indexed = $client->index([
			'index' => 'dosen',
			'type' => 'maha',
			'body' => [
				'namadosen' => $namadosen,
				'nip' => $nip,
				'jurusandosen' => $jurusandosen
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
<ul class="nav nav-tabs">
    <li role="presentation"><a href="index.php">index</a></li>
  </ul>
<form action="adddosen.php" method="post" autocomplete="off">
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">namadosen</label>
            <input type="jurusandosen" class="form-control" id="namadosen" placeholder="namadosen" name="namadosen">
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">nip</label>
            <input type="jurusandosen" class="form-control" id="nip" placeholder="nip" name="nip">
        </div>
        </div>
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">jurusandosen</label>
            <input type="jurusandosen" class="form-control" id="jurusandosen" placeholder="jurusandosen" name="jurusandosen">
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>  
</body>
</html>
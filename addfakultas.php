<?php

require_once 'app/init.php';

if (!empty($_POST)) {
	if(isset($_POST['fakultas'], $_POST['jurusans'])) {

		$fakultas = $_POST['fakultas'];
		
		$jurusans = $_POST['jurusans'];

		$indexed = $client->index([
			'index' => 'fakultas',
			'type' => 'maha',
			'body' => [
				'fakultas' => $fakultas,
				'jurusans' => $jurusans
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
<form action="addfakultas.php" method="post" autocomplete="off">
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">fakultas</label>
            <input type="jurusans" class="form-control" id="fakultas" placeholder="fakultas" name="fakultas">
        </div>
        
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">jurusans</label>
            <input type="jurusans" class="form-control" id="jurusans" placeholder="jurusans" name="jurusans">
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
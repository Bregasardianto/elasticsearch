<?php
require_once 'app/init.php';

if(isset($_GET['q'])) {

	$q = $_GET['q'];

	$query = $client->search([
		'body' => [
		    'query' => [
		        'bool' => [
			         'should' => [
                        [ 'match' => [ 'namadosen' => $q ] ],
                        [ 'match' => [ 'jurusandosen' => $q ] ],
                        [ 'match' => [ 'nip' => $q ] ]
		            ]
		        ]
            ]
	    ]
  ]); 
  
// echo'<pre>',print_r($query) ,'</pre>';
// die();

	if($query['hits']['total'] >=1 ) {
        $results = $query['hits']['hits'];
	  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Search | Document Search</title> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <Link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<br>
    <tr>
      <td><a href="adddosen.php" class="btn btn-secondary btn-lg " >Tambah DOsen</a> </td>
      <td><a href="indexdosen.php" class="btn btn-primary btn-lg" >Cari Dosen</a> </td>
      <td><a href="index.php" class="btn btn-primary btn-lg" >Cari mahasiswa</a> </td>
      <td><a href="indexmatakuliah.php" class="btn btn-primary btn-lg" >Cari Mata Kuliah</a> </td>
    </tr>
<br>
<br>
<br>

<div class="row vertical-center-row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
	    <h1>Document Search</h1><p>
	    <h3>powered by php and elasticsearch</h3>
        </div>
    </div>
</div>
<br>
<br>

<form action="indexdosen.php" method="get" autocomplete="on">
<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
          <input type="text" name="q" placeholder="Search..." class="form-control" /> 
            <span class="input-group-btn"> 

                <button type="submit" class="btn btn-primary">Search</button>
            </span>
        </div>
    </div>
</div>
</form>
<br>
          <table class="table table-striped col-sm-12 ">
                <thead>
                    <tr>
                    <th scope="col-sm-2">No</th>      
                    <th scope="col-2">namadosen</th>
                    <th scope="col-2">NIM</th>
                    <th scope="col-2">jurusandosen</th>
                    <th scope="col-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php $i=1; ?>
                    <?php
                    if(isset($results)){
                      foreach($results as $r){
                        ?>
                        <tr>
                            <td><?= $i ;?></td>
                            <td><?= $r['_source']['namadosen'];?></td>
                            <td> <?= $r['_source']['nip'];?></td>
                            <td> <?= $r['_source']['jurusandosen'];?></td>
                            <td><a href="hapusdosen.php?id=<?= $r["_id"]?>" class="btn btn-danger" onclick="
                                return confirm('Yakin?');" >Hapus</a>
                        </tr>
                        <?php $i++; ?>
                        <?php
                      }
                    }
                   ?>
                    </tr>
                </tbody>
            </table>
  </body>
</html>
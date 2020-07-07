<?php
require_once 'app/init.php';

if (isset($_GET['cari'])) {

	$cari = $_GET['cari'];

	$query = $client->search([
		'body' => [
		    'query' => [
		        'bool' => [
			         'should' => [
                [ 'match' => [ 'matakuliah' => $cari ] ],
                [ 'match' => [ 'semester' => $cari ] ],
                [ 'match' => [ 'sks' => $cari ] ],
                [ 'match' => [ 'kurikulum' => $cari ] ]
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
      <td><a href="addmatakuliah.php" class="btn btn-secondary btn-lg " >Tambah Mata Kuliah</a> </td>
      <td><a href="indexdosen.php" class="btn btn-primary btn-lg" >Cari Dosen</a> </td>
      <td><a href="indexfakultas.php" class="btn btn-primary btn-lg" >Cari Fakultas</a> </td>
      <td><a href="indexmatakuliah.php" class="btn btn-primary btn-lg" >Cari Mata Kuliah</a> </td>
   
    </tr>
<br>
<br>
<br>

<form action="indexmatakuliah.php" method="get" autocomplete="on">
<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <div class="input-group">
          <input type="text" name="cari" placeholder="Search..." class="form-control" /> 
            <span class="input-group-btn"> 
                <button type="submit" class="btn btn-primary">Search</button>
            </span>
        </div>
    </div>
</div>
</form>
<br>
<br>
          <table class="table table-striped col-sm-12 ">
                <thead>
                    <tr>
                    <th scope="col-sm-2">No</th>      
                    <th scope="col-2">Mata Kuliah</th>
                    <th scope="col-2">Semester</th>
                    <th scope="col-2">SKS</th>
                     <th scope="col-2">Kurikulum</th>
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
                            <td><?= $r['_source']['matakuliah'];?></td>
                            <td> <?= $r['_source']['semester'];?></td>
                            <td> <?= $r['_source']['sks'];?></td>
                             <td> <?= $r['_source']['kurikulum'];?></td>
                            <td><a href="hapus.php?id=<?= $r["_id"]?>" class="btn btn-danger" onclick="
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
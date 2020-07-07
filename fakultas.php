<?php
require_once 'app/init.php';

if(isset($_GET['cari'])) {

  $cari = $_GET['cari'];

  $query = $client->search([
    'body' => [
        'query' => [
            'bool' => [
               'should' => [
                        [ 'match' => [ 'fakultas' => $cari ] ],
                        [ 'match' => [ 'jurusans' => $cari ] ],
                        
                ]
            ]
       ]
      ]
  ]);
  
//    echo'<pre>',print_r($query) ,'</pre>';
//   die();

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
      <td><a href="addfakultas.php" class="btn btn-secondary btn-lg " >Tambah Fakultas</a> </td>
      <td><a href="fakultas.php" class="btn btn-primary btn-lg" >Cari Fakultas</a> </td>
      <td><a href="index.php" class="btn btn-primary btn-lg" >Cari mahasiswa</a> </td>
    </tr>
<br>
<br>
<br>

<form action="fakultas.php" method="get" autocomplete="on">
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
                    <th scope="col-2">Fakultas</th>
                  
                    <th scope="col-2">jurusans</th>
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
                            <td><?= $r['_source']['fakultas'];?></td>  
                            <td> <?= $r['_source']['jurusans'];?></td>
                            <td><a href="hapusfakultas.php?id=<?= $r["_id"]?>" class="btn btn-danger" onclick="
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
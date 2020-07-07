<?php
require_once 'app/init.php';

if (!empty($_POST)) {
  if(isset($_POST['matakuliah'], $_POST['semester'],$_POST['sks'],$_POST['kurikulum'])) {

    $matakuliah = $_POST['matakuliah'];
    
    $semester = $_POST['semester'];
    $sks = $_POST['sks'];
    $kurikulum = $_POST['kurikulum'];

    $indexed = $client->index([
      'index' => 'matakuliah',
      'type' => 'maha',
      'body' => [
        'matakuliah' => $matakuliah,
        'semester' => $semester,
        'sks'=>$sks,
        'kurikulum'=>$kurikulum
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
<form action="addmatakuliah.php" method="post" autocomplete="off">
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">fakultas</label>
            <input type="jurusan" class="form-control" id="matakuliah" placeholder="Matakuliah" name="matakuliah">
        </div>
        
        <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">jSemester</label>
            <input type="jurusan" class="form-control" id="semester" placeholder="Semester" name="semester">
        </div>
         <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">SKS</label>
            <input type="jurusan" class="form-control" id="sks" placeholder="Sks" name="sks">
        </div>
         <div class="form-group col-md-4">
            <label for="exampleFormControlInput1">Kurikulum</label>
            <input type="jurusan" class="form-control" id="kurikulum" placeholder="Kurikulum" name="kurikulum">
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
        </form>  
</body>
</html>
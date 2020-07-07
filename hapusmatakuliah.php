<?php
    require_once 'app/init.php';
    $id = $_GET["id"];
    $params = [
        'index' => 'matakuliah',
        'id'    => $id
    ];
    
    $response = $client->delete($params);
    echo"
        <script>
            alert('Data Berhasil Di Dihapus');
            document.location.href = 'index.php';
        </script>
     "
?>
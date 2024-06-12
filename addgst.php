<?php
    include_once 'classes/guest.php';
    $re = new Guest();
    if (isset($_GET['delGst'])) {
        $id = base64_decode($_GET['delGst']);
        $delGuest = $re->delGuest($id);
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Data Pengunjung</title>
  </head>
<body>
    <br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="card shadow">
                <?php
                        if(isset($delGuest)) {
                    ?>
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong><?=$delGuest?></strong>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><br>
                                <h4> Informasi Data Pengunjung</h4>
                            </div>
                            <div class="col-md-6"><br>
                                <a href="index.php" class="btn btn-info float-left"><img src="images/tombol.png">ㅤㅤ  Kembali</a>
                            </div>
                        </div> 
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Tujuan</th>
                            <th>No. Telepon</th>
                            <th>Alamat</th>
                            <th>Pilihan</th>
                        </tr>
                        <?php
                            $allGst = $re->allGuest();
                            if ($allGst) {
                                while ($row = mysqli_fetch_assoc($allGst)){
                                    ?>
                                <tr>
                                    <td><?=$row['nama']?></td>
                                    <td><?=$row['tujuan']?></td>
                                    <td><?=$row['nohp']?></td>
                                    <td><?=$row['alamat']?></td>
                                    <td>

                                        <a href="edit.php?id=<?=base64_encode($row['id'])?>" class="btn btn-sm"><img src="images/change.png"></a>
                                        <a href="?delGst=<?=base64_encode($row['id'])?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="btn btn-sm"><img src="images/trash.png"></a>
                                    </td>
                                </tr>
                                    <?php
                                }
                            }
                        ?>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
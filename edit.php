<?php
    include_once 'classes/guest.php';
    $re = new Guest();
    if(isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $guest = $re->updateGuest($_POST, $_FILES, $id);
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Buku Tamu Fakultas Sains dan Teknologi</title>
  </head>
  <body>

    <br><br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card shadow">
                    <?php
                        if(isset($guest)) {
                    ?>
                        <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong><?=$guest?></strong>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><br>
                                    <h4> Perbarui Data Pengunjung</h4>
                                </div>
                                <div class="col-md-6"><br>
                                    <a href="addgst.php" class="btn btn-info"><img src="images/tombol.png"> Kembali</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php
                        $getGst = $re->getGstById($id);
                        if ($getGst) {
                            while ($row = mysqli_fetch_assoc($getGst)) {
                                ?>
                        <form method="POST" enctype="multipart/form-data">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" value="<?=$row['nama']?>" class="form-control"><br>

                            <label for="">Tujuan</label>
                            <input type="text" name="tujuan" value="<?=$row['tujuan']?>" class="form-control"><br>

                            <label for="">No. Telepon</label>
                            <input type="number" name="nohp" value="<?=$row['nohp']?>" class="form-control"><br>

                            <label for="">Alamat</label>
                            <textarea name="alamat" class="form-control"><?=$row['alamat']?></textarea><br>

                            <button class="btn btn-dark"><img src="images/tombol.png">ㅤㅤ  Perbarui</button>
                        </form>
                                <?php
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
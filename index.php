<?php
    include_once 'classes/guest.php';
    $re = new Guest();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $guest = $re->addGuest($_POST, $_FILES);
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
    <title>GUEST BOOK</title>
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
                        <div><br><center><h4>GUEST BOOK</h4></center></div>
                    </div>
                    <div class="card-body">
                    <center><img src="images/UIn logo.png" alt="Logo" width="150" height="190"/></center>
                        <form method="POST" enctype="multipart/form-data">
                            <br>
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control"><br>

                            <label for="">Alamat</label>
                            <input type="text" name="tujuan" class="form-control"><br>

                            <label for="">No. Telepon</label>
                            <input type="number" name="nohp" class="form-control"><br>

                            <label for="">Tujuan</label>
                            <textarea name="alamat" class="form-control"></textarea><br>

                            <center><button type="submit" value="Simpan" class="btn btn-dark">Simpan</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
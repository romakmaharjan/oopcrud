<?php 

    include_once 'classes/Register.php';
    $re = new Register();

    if (isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $register = $re->updateStudent($_POST, $_FILES, $id);
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Registration Form</title>
  </head>
  <body>
    
    <br>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card shadow">
                    <?php 
                        if (isset($register)) {
                            ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong><?=$register?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            <?php 
                        }
                    ?>
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Update Student</h3>
                            </div>
                            <div class="col-md-6">
                                <a href="index.php" class="btn btn-info float-right">Show Student Info</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php 
                        $getStd = $re->getStdById($id);
                        if ($getStd) {
                            while ($row = mysqli_fetch_assoc($getStd)) {
                                ?>
                        <form method="POST" enctype="multipart/form-data">
                            <label for="">Name</label>
                            <input type="text" name="name" value="<?=$row['name']?>" class="form-control">

                            <label for="">Email</label>
                            <input type="email" name="email" value="<?=$row['email']?>" class="form-control">

                            <label for="">Phone</label>
                            <input type="number" name="phone" value="<?=$row['phone']?>" class="form-control">

                            <label for="">Photo</label>
                            <input type="file" name="photo" class="form-control">
                            <img src="<?=$row['photo']?>" style="width: 200px;" class="img-thumbnail" alt=""><br>

                            <label for="">Address</label>
                            <textarea name="address" class="form-control"><?=$row['address']?></textarea><br>

                            <input type="submit" value="Update Student" class="btn btn-success form-control">
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


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </body>
</html>

<?php
session_start();
  if(!isset($_SESSION['userid'])){
    header("location:login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman  Edit Foto</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-info text-light border-bottom border-dark">
        <di<v class="container">
            <h2 class="navbar-brand" href="index.php">Halaman Edit Album</h2>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 24 24">
                    <path
                        d="M 3 5 A 1.0001 1.0001 0 1 0 3 7 L 21 7 A 1.0001 1.0001 0 1 0 21 5 L 3 5 z M 3 11 A 1.0001 1.0001 0 1 0 3 13 L 21 13 A 1.0001 1.0001 0 1 0 21 11 L 3 11 z M 3 17 A 1.0001 1.0001 0 1 0 3 19 L 21 19 A 1.0001 1.0001 0 1 0 21 17 L 3 17 z">
                    </path>
                </svg>
            </button>
            <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
                <div class="navbar-nav me-auto"> </div>

           <?php
           //session_start();
           if(!isset($_SESSION['userid'])){
            ?>
            <ul>
                <li><a href="register.php" class="btn btn-outline-primary m-1">Register</a> </li>
                <li><a href="login.php" class="btn btn-outline-success m-1">Login</a> </li>
           </ul>
            <?php
           }else{
           ?>

    <ul>
        <li class="nav-item"><a href="index.php" class="btn text-light m-1">Home</a></li>
        <li class="nav-item"><a href="album.php" class="btn text-light m-1">Album</a></li>
        <li class="nav-item"><a href="foto.php" class="btn text-light m-1">Foto</a></li>
        <li class="nav-item"><a href="logout.php" class="btn btn-danger m-1">Logout</a></li>
    </ul>
    <?php
           }
    ?>
     </div>
        </div>
        </nav>
     <form action="update_foto.php" method="post" enctype="multipart/from-data">
        <?php
          include "koneksi.php";
          $fotoid=$_GET['fotoid'];
          $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
          while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>"hidden>
        <div class="table-responsive">
            <div class ="container mb-4 mt-4">
                <table class="table table-bordered table-striped">
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>  
           </tr>
           <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
           </tr>
           <tr>
                <td>Lokasi File</td>
                <td><input type="file" name="lokasifile"></td>
           </tr>
           <tr>
           
                <td>Album</td>
                <td>
                    <select name="albumid" class="form-select">
                        <?php
                        $userid = $_SESSION['userid'];
                        $sql2 = mysqli_query($conn, "select * from album where userid='$userid'");
                        while ($data2 = mysqli_fetch_array($sql2)) {
                            ?>
                            <option value="<?=$data2['albumid']?>" <?php if($data2['albumid']==$data2['albumid']){echo 'selected';}?>><?=$data2['namaalbum']?></option>

                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <div class="d-grid gap-2 d-md-block">
                <tr>

                <td></td>
                <td>
                    <button class="btn btn-primary" type="submit">
                Ubah
                    </button>
                    </td>
           </tr>
                    </div>
      </table>
                    </div>
      <?php
          }
      ?>
     </form> 
     
     <br><br><br><br><br>
     <footer class="d-flex juswtify-content-center border-top mt-2 bg-secondary fixed-bottom">
	<p class="pt-2 text-light"> &copy; UKK RPL |Naisyela Amelia Putri</p>
</footer>

    <script src="assets/js/bootstrap.min.js"></script>
     
     
     
</body>
</html>

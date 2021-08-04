<?php
 
include '../../controllers/koneksi.php';

 
  if (isset($_GET['id'])) {
   
    $id = ($_GET["id"]);

    
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
   
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
   
    $data = mysqli_fetch_assoc($result);
    
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='kelola_user.php';</script>";
       }
  } else {
 
    echo "<script>alert('Masukkan data id.');window.location='kelola_user.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>edit data user</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #5f9ea0;
      }
    button {
          background-color: #5f9ea0;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #ccc;
      outline-color: #5f9ea0;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit user <?php echo $data['username']; ?></h1>
      <center>
      <form method="POST" action="proses_edit_user.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Username</label>
          <input type="text" name="username" value="<?php echo $data['username']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Password</label>
         <input type="password" name="password" value="<?php echo $data['password']; ?>" />
        </div>
        <div>
          <label>kode pendaftar</label>
         <input type="text" name="kode_pendaftar" required="" value="<?php echo $data['kode_pendaftar']; ?>"/>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>
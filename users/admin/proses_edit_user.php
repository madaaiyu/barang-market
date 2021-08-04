<?php

include '../../controllers/koneksi.php';


  $id                = $_POST['id'];
  $username          = $_POST['username'];
  $password         = $_POST['password'];
  $kode_pendaftar    = $_POST['kode_pendaftar'];
                      

      $query  = "UPDATE users SET username = '$username', password = '$password', kode_pendaftar = '$kode_pendaftar'";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($koneksi, $query);

      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {


          echo "<script>alert('Data berhasil diubah.');window.location='kelola_user.php';</script>";
      }

 


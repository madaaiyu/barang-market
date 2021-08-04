<?php
	@session_start();
  include('../../controllers/koneksi.php'); 
  if(@$_SESSION['admin']){
?>
<!DOCTYPE html>
<html>
  <head>
    <title>pengelolaan barang</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #5f9ea0;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: #5f9ea0;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    </style>
  </head>
  <body>
  <?php
    $admin=mysqli_query($koneksi,"select*from pendaftar where id_pendaftar='$_SESSION[admin]'");
    $da=mysqli_fetch_array($admin);
?>
    <center><h1>Data barang</h1><center>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a> <a href="kelola_user.php">+ &nbsp; Kelola user</a>
    <a href="../../controllers/logout.php?page=admin" onclick="return confirm('Apakah anda ingin keluar dari halaman admin?')">Log Out</a>
    <center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Barang</th>
          <th>Dekripsi</th>
          <th>Harga Masuk</th>
          <th>Harga Keluar</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
     
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
     
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }


      $no = 1; 

      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
          <td>Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
          <td>Rp <?php echo $row['harga_jual']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> 
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; 
      }
      ?>
    </tbody>
    </table>
    
  </body>
</html>
<?php
}
else
{
	header('location:../../index.php');
}
?>
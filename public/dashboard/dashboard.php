<?php
include_once ("../../config/koneksi.php");
session_start();
//memeriksa apakah pengguna sudah login
if (!isset($_SESSION["user_id"])){
 header("Location:../login.php");
exit();
}
//Mengambil data pengguna dari session
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
</head>
<body>
    <h2>Selamat datang, Ini halaman dashboard <?php echo $username; ?>!</h2>
    <form action="dashboard.php" method="get">
        <label>Cari:</label>
        <input type="text" name="cari">
        <input type="submit" value="cari">
    </form>
<?php
if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    //echo "<b>Hasil pencarian:" .$cari."</b>";
}
?>
<table border=1>
    <h1>Data Kelas</h1>
    <a href="../guru/view/tambah.php"> Tambah Data </a>
    <a href="../guru/cetak.php" taget="_blank"> Cetak </a>
    <?php
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $ambildata = mysqli_query($kon, "select * from guru where id like '%".$cari."%' OR namaguru like '%".$cari."%'");
    } else {
        $ambildata = mysqli_query($kon, "select * from guru order by id asc");
        $num=mysqli_num_rows($ambildata);
    }
?>
<tr>
    <th>Id</th>
    <th>Nama Guru</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
    <th>Email</th>
    <th>Aksi</th>
</tr>
<?php {
        while($userAmbilData = mysqli_fetch_array($ambildata)){
            echo "<tr>";
                echo "<td>" .$id = $userAmbilData ['id']. "</td>";
                echo "<td>" .$namaguru = $userAmbilData ['namaguru']. "</td>";
                echo "<td>" .$alamat = $userAmbilData ['alamat']. "</td>";
                echo "<td>" .$jeniskelamin = $userAmbilData ['jeniskelamin']. "</td>";
                echo "<td>" .$email = $userAmbilData ['email']. "</td>";
                echo "<td> <a href=''> View </a> | <a href= ''> Edit  </a> | <a href=''> Hapus </a> </td>";
            echo "</tr>";
        }
}
?>
</table>
    <a href="../../logout.php">Logout</a>
</body>
</html>



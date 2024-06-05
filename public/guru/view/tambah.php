<?php
include ("../../../config/koneksi.php");
include ("../controler/gurutambah.php");
$guruController = new GuruController($kon);
if (isset($_POST['submit'])){
    $id = $guruController->tambahGuru();

    $data = [
        'id' => $id,
        'namaguru' => $_POST['namaguru'],
        'alamat' => $_POST['alamat'],
        'jeniskelamin' => $_POST['jeniskelamin'],
        'email' => $_POST['email'],
    ];
    $message = $guruController ->tambahDataGuru($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Guru</title>
</head>
<body>
    <h1>Tambah Data Guru</h1>
    <a href="../../dashboard.php">Home</a>

    <form action="tambah.php" method="post" name="tambah" enctype = "multipart/form-data">
        <table border=1> 
            <tr>
                <td>Id</td>
                <td><input style="background-color: Tomato;width:100%;" type="text" name="id" value="<?php echo $guruController->tambahGuru();?>" readonly></td>
            </tr>
            <tr>
                <td>Nama Guru</td>
                <td><input type="text" name="namaguru" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text"name="jeniskelamin" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="int"name="email" style="width: 100%;"></td>
            </tr>
            </table>
            <input type="submit" name ="submit" value= "Tambah Data">
            <?php if (isset($message)): ?>
                <div class="sukses-message">
                <?php echo $message;?>
                </div>
            <?php endif;?>
    </form>
</body>
</html>

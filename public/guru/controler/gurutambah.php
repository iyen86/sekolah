<?php
include_once("../../../config/koneksi.php");
class GuruController{
    private $kon;
    public function __construct($connection){
        $this->kon = $connection;
    }

    public function tambahGuru(){
    // Koding menentukan Nomor Unik Id secara Auto
    $setAuto = mysqli_query($this->kon, "SELECT MAX(id) as max_id FROM guru");
    $result = mysqli_fetch_assoc($setAuto);
    $max_id = $result['max_id'];

    if (is_numeric($max_id)){
        $nounik = $max_id + 1;
    } else {
        $nounik=1; // Jika belum ada data, mulai dari 1
    } return $nounik;
    }
    
public function tambahDataGuru($data) {
    $id = $data['id'];
    $namaguru = $data['namaguru'];
    $alamat = $data ['alamat'];
    $jeniskelamin = $data ['jeniskelamin'];
    $email = $data ['email'];
    //Pengecekan dan input data
    $insertData = mysqli_query($this->kon, "INSERT into guru (id, namaguru, alamat, jeniskelamin, email) values 
                 ('$id','$namaguru','$alamat','$jeniskelamin','$email')");
    if ($insertData){
        return "Data berhasil disimpan.";
    } else {
        return "Gagal menyimpan data.";
    } 
}   
}
?>

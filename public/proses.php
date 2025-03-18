<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "gudang");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Jika form dikirim, simpan data ke database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    
    $sql = "INSERT INTO inventaris (nama_barang, jumlah) VALUES ('$nama_barang', '$jumlah')";
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan!'); window.location='tables.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
$koneksi->close();
?>

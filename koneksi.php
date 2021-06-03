<?php
$koneksi = mysqli_connect("localhost","root","root","absen");

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $koneksi;
    $id = htmlspecialchars($data["id"]);
    $kode_kelas = htmlspecialchars($data["kode_kelas"]);
    $kode_makul = htmlspecialchars($data["kode_makul"]);
    $nama_makul = htmlspecialchars($data["nama_makul"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $semester = htmlspecialchars($data["semester"]);
    $sks = htmlspecialchars($data["sks"]);
    $query = "INSERT INTO kelas VALUES($id,'$kode_kelas','$kode_makul','$nama_makul',$tahun,$semester,$sks)";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function tambah1($data)
{
    global $koneksi;
    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $password = htmlspecialchars($data["password"]);
    $query = "INSERT INTO mahasiswa VALUES($id,'$nama','$nim','$email',$tipe,$password)";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
} 

function ubah($data)
{
    global $koneksi;
    $id = htmlspecialchars($data["id"]);
    $kode_kelas = htmlspecialchars($data["kode_kelas"]);
    $kode_makul = htmlspecialchars($data["kode_makul"]);
    $nama_makul = htmlspecialchars($data["nama_makul"]);
    $tahun = htmlspecialchars($data["tahun"]);
    $semester = htmlspecialchars($data["semester"]);
    $sks = htmlspecialchars($data["sks"]);
    $query = "UPDATE kelas SET kode_kelas = '$kode_kelas', kode_makul = '$kode_makul', nama_makul = '$nama_makul', tahun = '$tahun', semester = '$semester' , sks = '$sks'
        WHERE id = '$id'";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function ubah1($data)
{
    global $koneksi;
    $id = htmlspecialchars($data["id"]);
    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $email = htmlspecialchars($data["email"]);
    $tipe = htmlspecialchars($data["tipe"]);
    $password = htmlspecialchars($data["password"]);
    $query = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', email = '$email', password = '$password' 
        WHERE id = '$id'";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

function hapus1($id)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id'");
    return mysqli_affected_rows($koneksi);
}

?>
<?php
require 'koneksi.php';
$id = $_GET["id"];
if (hapus1($id) > 0) {
    echo "
        <script>
            alert ('data berhasil dihapus!');
            document.location.href = 'dmahasiswa.php';
        </script>
        ";
} else {
    echo "
        <script>
            alert ('data gagal dihapus!');
            document.location.href = 'dmahasiswa.php';
        </script>
        ";
}
<?php
session_start();

// Pastikan GD Library aktif
if (!function_exists('imagecreatetruecolor')) {
    die("Error: GD Library tidak tersedia!");
}

// Generate bilangan acak 5 digit
$bilangan = rand(10000, 99999);

// Simpan bilangan dalam session untuk validasi nanti
$_SESSION["bilangan"] = $bilangan;

// Buat gambar captcha
$width = 80;  // Lebar gambar diperbesar agar teks tidak terpotong
$height = 35; // Tinggi gambar sedikit ditingkatkan
$gambar = imagecreatetruecolor($width, $height);

// Warna background & teks
$background = imagecolorallocate($gambar, 244, 67, 54); // Merah
$foreground = imagecolorallocate($gambar, 255, 255, 255); // Putih

// Isi background gambar
imagefill($gambar, 0, 0, $background);

// Tambahkan teks captcha
imagestring($gambar, 5, 15, 8, $bilangan, $foreground); // Gunakan font ukuran 5 & atur posisi teks

// Pastikan tidak ada output sebelum header
ob_clean();

// Tentukan header agar browser tahu ini adalah gambar PNG
header("Cache-Control: no-cache, must-revalidate");
header("Content-Type: image/png");

// Output gambar
imagepng($gambar);
imagedestroy($gambar);
?>

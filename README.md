# Laporan Praktikum 7: Implementasi PHP Dasar dan Tugas Akhir (Server-Side Scripting)
Repository ini mendokumentasikan hasil implementasi kode untuk Modul Praktikum Pemrograman Web 7: PHP Dasar. Proyek ini bertujuan untuk menguasai konsep fundamental Server Side Scripting menggunakan PHP (PHP Hypertext Preprocessor), mulai dari konfigurasi environment hingga implementasi kontrol struktur data dan form processing.

# Objektif Pembelajaran
Tujuan utama dari praktikum ini mencakup kemampuan untuk:
[cite_start]Memahami arsitektur Server-Side Scripting dan perannya dalam pengembangan web dinamis.   
[cite_start]Menguasai sintaks dasar, deklarasi Variabel, dan penggunaan Operator PHP.   
[cite_start]Mengimplementasikan Struktur Kontrol data, yaitu Kondisi (if-elseif-else, switch) dan Perulangan (for, do-while).   
[cite_start]Menyelesaikan Tugas Akhir yang melibatkan data processing dari Form Input ($_POST).

# Analisis dan Implementasi Kode (index.php)
Seluruh logika program dan user interface diintegrasikan ke dalam satu script PHP, index.php, menggunakan pendekatan single-file processing.

1. Demonstrasi Variabel dan Data Mahasiswa
Pada awal script, deklarasi variabel PHP digunakan untuk menampilkan identitas mahasiswa.
// Deklarasi variabel untuk data statis

```
$nama_mhs = "Habib Fatih Zanjabilah";
$nim_mhs = 312410135;
$matkul = "Pemrograman Web1";
// Output menggunakan short echo tag: <h4>Nama : </h4><p><?= $nama_mhs ?></p>

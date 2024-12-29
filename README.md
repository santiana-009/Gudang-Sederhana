
<p><b>
proyek yang dibuat saat magang tentang manajemen keluar masuknya barang di gudang menggunakan laravel 10
</b></p>

## Instalasi

git clone https://github.com/rahmathidayat9/laraschool

## Setup
#Mengunakan Windows
- buka direktori project terkait menggunakan terminal
- ketikan command : cp .env.example .env (copy paste file .env.example)
- import dumbgudang.sql ke database lokal
- seuaikan database pada .env
- composer install
- php artisan key:generate (generate app key)
- php artisan serve
 
#Mengunakan Linux (Docker)
- buka direktori project terkait
- sudo mv .env.example .env
- sudo docker-compose up -d --build 
- sudo docker exec -it WebsiteGudang bash (terminlan container Website)
- composer install --no-interaction --prefer-dist ( memastikan composer telah terinstal)
- chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache (untuk mengubah akses direktori)
- php artisan key:generate (generate app key)
- exit
## Login

Username : Admin
Password : Admin

## Fitur

#Incoming
- From Incoming -> Dingunkan untuk membuat daftar barang apa saja yang akan masuk ke gudang
- List Incoming -> Daftar surat incoming yang telah dibuat

#Outgoing
- From Outgoing -> Digunakan untuk membuat daftar barang yang keluar dari gudang untuk keperluan dinas
- List Outgoing -> Daftar surat outgoing yang telah dibuat
- List Outgoing ~END -> Daftar surat outgoing dimana setelah dinas akan di data lagi apakah ada brang yang tidak jadi dipakai dan kembali ke gudang

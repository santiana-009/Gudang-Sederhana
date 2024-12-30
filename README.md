
<p><b>
proyek yang dibuat saat magang tentang manajemen keluar masuknya barang di gudang menggunakan laravel 10
</b></p>

# Instalasi

git clone https://github.com/rahmathidayat9/laraschool

# Setup
## Mengunakan Windows
- buka direktori project terkait menggunakan terminal
- copy paste file .env.example
```
cp .env.example .env
```
- import database dumbgudang.sql ke database lokal
- seuaikan database pada .env
- install composer
```
composer install
```
- generate app key
```
php artisan key:generate
```
- command :
```
php artisan serve
```
 
## Mengunakan Linux (Docker)
- buka direktori project terkait
- command : sudo mv .env.example .env
- seuaikan database pada .env
- command : sudo docker-compose up -d --build 
- command : sudo docker exec -it WebsiteGudang bash (terminlan container Website)
- command : composer install --no-interaction --prefer-dist ( memastikan composer telah terinstal)
- command : chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache (untuk mengubah akses direktori)
- command : php artisan key:generate (generate app key)
- command : exit
- import database dumbgudang.sql ke PHPmyadmin
# Login

## Username : admin
## Password : admin

# Fitur

## Incoming
- From Incoming -> Dingunkan untuk membuat daftar barang apa saja yang akan masuk ke gudang
- List Incoming -> Daftar surat incoming yang telah dibuat

## Outgoing
- From Outgoing -> Digunakan untuk membuat daftar barang yang keluar dari gudang untuk keperluan dinas
- List Outgoing -> Daftar surat outgoing yang telah dibuat
- List Outgoing ~END -> Daftar surat outgoing dimana setelah dinas akan di data lagi apakah ada brang yang tidak jadi dipakai dan kembali ke gudang

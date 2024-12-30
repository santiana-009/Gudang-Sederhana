
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
- merubah file .env.example ke .env
```
sudo mv .env.example .env
```
- seuaikan database pada .env
- membuat container docker
```
sudo docker-compose up -d --build 
```
- masuk kedalam bash container website
```
sudo docker exec -it WebsiteGudang bash (terminlan container Website)
```
- memastikan composer telah terinstal
```
composer install --no-interaction --prefer-dist
```
- untuk mengubah akses direktori
```
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
```
- generate app key
```
php artisan key:generate
```
- exit bash
```
exit
```
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


# preview
<img src="https://github.com/santiana-009/Gudang-Sederhana/blob/main/preview/Screenshot%202024-12-29%20131224.png"/>
<img src="https://github.com/santiana-009/Gudang-Sederhana/blob/main/preview/Screenshot%202024-12-29%20131302.png"/>
<img src="https://github.com/santiana-009/Gudang-Sederhana/blob/main/preview/Screenshot%202024-12-29%20131517.png"/>
<img src="https://github.com/santiana-009/Gudang-Sederhana/blob/main/preview/Screenshot%202024-12-29%20131537.png"/>

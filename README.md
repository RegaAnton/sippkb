<h1 align="center">
   <a href="https://github.com/RegaAnton/sippkb.git" target="_blank" align="center">
      SIPPKB
   </a>
</h1>

<p align="center">Sistem Informasi Presensi Pegawai Kominfo Banten</p>

![App Screenshot]()

## Introduction 🚀

Sistem Informasi Presensi Pegawai Kominfo Banten (SIPPKB) adalah aplikasi berbasis web yang dirancang untuk mempermudah pencatatan dan pemantauan kehadiran pegawai di lingkungan Kominfo Provinsi Banten. Aplikasi ini memungkinkan pegawai untuk mencatat waktu kehadiran dan kepulangan secara terstruktur, serta memberikan kemudahan bagi bagian SDM dalam melakukan pengelolaan absensi dan pelaporan kehadiran secara real-time dan akurat. Dengan SIMBAKOM, proses absensi menjadi lebih efisien, transparan, dan mendukung tata kelola kepegawaian yang lebih modern di Kominfo Banten.

## Installation ⚒️

Installing and running Sneat is super easy, please Follow below steps and you will be ready to rock 🤘

-   Open the terminal in your root directory.

-   Clone Project

```bash
git clone https://github.com/RegaAnton/sippkb.git
```

-   Use the following command to install the composer

```bash
composer install
```

-   Copy .env.example ke .env

```bash
cp .env.example .env
```

-   Run the following command to generate the key

```bash
php artisan key:generate
```

-   Open the env file to change the database according to the one you are using

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sippkb
DB_USERNAME=root
DB_PASSWORD=
```

-   Create Database

```bash
php artisan migrate
```

-   Start Project

```bash
php artisan serve
```

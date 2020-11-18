# pdd-next

Portal Desa Digital (PDD) versi lanjutan, menggunakan teknologi web terkini seperti Laravel untuk mendapatkan performa dan pengalaman terbaik.

## Deployment

Panduan untuk installasi paket rilis (.zip) untuk penggunaan production:

1. Unduh paket arsip rilis.
2. Ekstrak pada direktori utama hosting (misal: www, public_html)
3. Import file `install.sql`
4. Ubah konfigurasi database pada file `.env` sesuai host:
    ```
    DB_CONNECTION=mysql
    DB_HOST=localhost
    DB_PORT=3306
    DB_DATABASE=pdd
    DB_USERNAME=root
    DB_PASSWORD=
    ```
5. Ubah permission folder:
    ```
    sudo chmod -R 775 storage
    sudo chmod -R 775 bootstrap/cache
    sudo chown -R $USER:www-data storage
    sudo chown -R $USER:www-data bootstrap/cache
    ```
6. Login **Super Admin**:
    ```
    User: admin
    Password: password
    ```
7. Selesai, jangan lupa untuk mengubah kata sandi default ;)

## Lokal Development

Untuk ikut berkontribusi dalam pengembangan, ikuti panduan berikut:

1. Clone / download repo ini.
2. Jalankan prosedur installasi projek laravel:'
    - `composer install`
    - `php artisan pdd:install --dummy` Opsi *--dummy* untuk membuat data acak (jika pertama kali maka installer akan membuat konfigurasi database setelah itu jalankan kembali installer untuk kedua kalinya)
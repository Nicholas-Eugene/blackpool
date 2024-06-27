BlackPool Billiard Website

Kelompok 8:
- Vincent Wijaya 535220064
- Nathanael Kenneth Lay 535220066
- Nicholas Eugene Supardi 535220102

Topik Apps: Website Pemesanan Table untuk Bermain Billiard

Pembagian Tugas: 
- Nicholas Eugene Supardi (Ketua): Pembuatan Database User, Booking, dan juga History untuk booking. Membuat UI untuk Log In dan Sign In, Booking Page, dan History Booking Page.
- Vincent Wijaya: Membuat Shop page, cart page, history untuk shop, fitur admin untuk edit shop dan delete pada shop.
- Nathanael Kenneth Lay: Membuat UI untuk Admin Dashboard. beserta REST Api untuk melakukan CRUD untuk user dan menampilkan total booking pada Admin Dashboard.

Step Instalasi:
1. Silahkan meng-clone project Github ini dan masukan ke dalam folder dalam directory C:/XAMPP/htdocs.
2. setelah project telah di clone buka source-code editor dan edit file .env.example dan ubah di bagian database untuk menyambukannya kedalam pgsql,
   ```bash
   DB_CONNECTION=pgsql
   DB_HOST=localhost
   DB_PORT=5432 (port yang di setting dalam postgres anda)
   DB_DATABASE=BlackPool
   DB_USERNAME=postgres (username postgres anda)
   DB_PASSWORD=(password anda)
   ```
3. setelah mengubah folder .env.example sekarang tinggal copy dan rename dan dijadikan file .env dengan cara memasukan code ini dalam terminal anda
   ```bash
   cp .env.example .env
   ```
4. step selanjutnya adalah melakukan menginstallasi composer untuk menjalankan project ini.
   Lakukan code ini dalam terminal di folder project:
   ```bash
   composer install
   php artisan storage:link
   ```
5.setelah melakukan perubahan pada file .env, kita akan membuat database untuk project ini (saya menggunakan pgadmin untuk memasukan databasenya). berikut adalah stepnya:
    - Membuat Database  
      ![Screenshot 2024-06-27 180915](https://github.com/Nicholas-Eugene/blackpool/assets/59018883/db015a92-083e-4685-b457-c7fa59210fc3)  
      ![Screenshot 2024-06-27 180924](https://github.com/Nicholas-Eugene/blackpool/assets/59018883/50b5d7f8-e3ff-4c10-9648-51bb80032a93)  
    - Import file BlackPool.sql untuk mengimport data data kedalam pgadmin.  
      ![Screenshot 2024-06-27 180932](https://github.com/Nicholas-Eugene/blackpool/assets/59018883/33820d40-2d76-48e6-aa53-b3ea3b4ad79a)  
      ![Screenshot 2024-06-27 180953](https://github.com/Nicholas-Eugene/blackpool/assets/59018883/b8a67bae-6bfb-4b47-8c91-705d56a5a6d1)  
    - Jika anda tidak mau menggunakan file sql untuk pre-loading data maka anda bisa menggunakan step command ini untuk memasukan datanya  
      ```bash
      php artisan migrate:fresh --seed
      ```  
6. Website pemesanan Billiard Blackpool siap dijalankan. untuk meng-akses sebagai user anda bisa menggunakan account bawaan:  
    Akun User  
    - username: user  
    - password: user  
    Jika anda ingin masuk sebagai admin maka:  
    Akun Admin:  
    - username: admin  
    - password: admin  
